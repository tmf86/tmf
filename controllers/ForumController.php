<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Contoller\Middleware\RedirectUsersMiddleware;
use Contoller\Middleware\TaskBeforeRequest\ValidateForumCategoryRequest;
use Contoller\Middleware\TaskBeforeRequest\ValidateSubjectRequest;
use Model\Forum;
use Model\ForumSubject;
use Validator\ForumAddSubjectValidator;
use View\View;

class ForumController extends Controller
{

    use RedirectUsersMiddleware, AuthMiddleware;

    /**
     * @var \Model\User
     */
    private $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->user = $this->user();
    }

    /**
     * @return View
     */
    public function index()
    {
        $title = 'Forum';
        $user = $this->user;
        $forums = new Forum();
        $forums = $forums->all();
        return $this->load_views('dashbord.forum', compact('title', 'user', 'forums'));
    }

    /**
     * @param string $category
     * @return View
     */
    public function category(ValidateForumCategoryRequest $validateForumCategoryRequest, string $slug)
    {
        $forum = $validateForumCategoryRequest->doTask($slug);
        $recentSubjects = $this->addSubjectProcess($forum, $slug);
        $subjects = $this->checkIfHasSubject($forum);
        $forumName = ucfirst($forum->name);
        $title = 'Forum | ' . $forumName;
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        $user = $this->user;
        return $this->load_views('dashbord.forum-category', compact('title', 'user', 'forumName', 'slug', 'forum', 'subjects', 'scripts', 'recentSubjects'));
    }

    /**
     * @param ForumAddSubjectValidator $addSubjectValidator
     * @param ValidateForumCategoryRequest $validateForumCategoryRequest
     * @param string $slug
     * @throws \Exception
     */
    public function addNewSubject(ForumAddSubjectValidator $addSubjectValidator, ValidateForumCategoryRequest $validateForumCategoryRequest, string $slug)
    {
        $forum = $validateForumCategoryRequest->doTask($slug);
        $addSubjectValidator->makeValidate();
        $this->addSubjectProcess($forum, $slug);
        $this->setRedirectToURL(current_route());
        $this->setSubjectSession();
        Request::ajax(['inputs' => false, 'setsession' => true], 400);

    }

    public function subjectView(ValidateSubjectRequest $validateSubjectRequest, string $subject)
    {
        $subject = $validateSubjectRequest->doTask($subject);
        $forum = $subject->forum;
        $user = $this->user;
        return $this->load_views('dashbord.subject', compact('user', 'subject', 'forum'));
    }

    /**
     * @param Forum $forum
     * @return array|false|mixed
     * @throws \Exception
     */
    private function checkIfHasSubject(Forum $forum)
    {
        if ($forum->subjects) {
            return $forum->select('forum_subject')
                ->whereEqual('forum_id', $forum->id)
                ->OrderByDesc('created_at')
                ->limit(5)->run(true);
        }
        return false;
    }

    /**
     * @param Forum $forum
     * @param false $useSession
     * @return array|ForumSubject
     */
    private function addSubject(Forum $forum, $useSession = false)
    {

        $forumSubject = new ForumSubject();
        if ($useSession) {
            $data = session($this->request->getClientIp());
            $subjects = [];
            if (is_array($data)) {
                foreach ($data as $value) {
                    $subjects[] = $forumSubject->create(
                        [
                            'title' => strtolower($value['title']),
                            'subtitle' => str_replace(' ', '-', $value['subtitle']),
                            'message' => strtolower($value['message']),
                            'forum_id' => $forum->id,
                            'user_id' => $this->user->mat_mmbre
                        ]
                    );
                }
            }
            $this->request->sessionUnset($this->request->getClientIp());
            return $subjects;
        }
        return $forumSubject->create(
            [
                'title' => strtolower($this->request->title),
                'subtitle' => str_replace(' ', '-', $this->request->subtitle),
                'message' => strtolower($this->request->message),
                'forum_id' => $forum->id,
                'user_id' => $this->user->mat_mmbre
            ]
        );
    }

    /**
     * @return array|false|mixed|string
     * @throws \Exception
     */
    private function setSubjectSession()
    {
        $data = [
            'title' => $this->request->title,
            'subtitle' => $this->request->subtitle,
            'message' => $this->request->message
        ];
        if (session($this->request->getClientIp())) {
            $newData = $this->request->session($this->request->getClientIp());
            if ($this->hasSameSubject($data, $newData)) {
                $newData[] = $data;
                return $this->request->session($this->request->getClientIp(), $newData);
            }
            return false;
        }
        return $this->request->session($this->request->getClientIp(), [$data]);
    }

    /**
     * @param $data1
     * @param $data2
     * @return bool
     */
    private function hasSameSubject($data1, $data2)
    {
        foreach ($data2 as $value) {
            $title = ($data1['title'] === $value['title']);
            $subtitle = ($data1['subtitle'] === $value['subtitle']);
            $message = ($data1['message'] === $value['message']);
            if ($title || $subtitle || $message) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $forum
     * @param $slug
     * @return array|Request|ForumSubject
     */
    private function addSubjectProcess($forum, $slug)
    {
        if (AuthMiddleware::asUserAuthenticated() && $this->request->httpMethod() === 'post' && !session($this->request->getClientIp())) {
            if (Request::isAjax()) {
                if ($this->addSubject($forum)) {
                    session('subject', true);
                    return Request::ajax(['success' => true, 'refresh' => true], 200);
                }
                return Request::ajax(['success' => false, 'refresh' => false], 200);
            }
        }
        if (AuthMiddleware::asUserAuthenticated() && session($this->request->getClientIp())) {
            if ($this->addSubject($forum, true)) {
                session('subject', true);
                return $this->addSubject($forum, true);
            }
        }
        return [];
    }
}