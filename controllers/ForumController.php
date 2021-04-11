<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Contoller\Middleware\RedirectUsersMiddleware;
use Contoller\Middleware\TaskBeforeRequest\ValidateForumCategoryRequest;
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
        $subject = $this->checkIfHasSubject($forum);
        $forumName = ucfirst($forum->name);
        $title = 'Forum | ' . $forumName;
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        $user = $this->user;
        return $this->load_views('dashbord.forum-category', compact('title', 'user', 'forumName', 'slug', 'forum', 'subject', 'scripts'));
    }

    public function addNewSubject(ForumAddSubjectValidator $addSubjectValidator, ValidateForumCategoryRequest $validateForumCategoryRequest, string $slug)
    {
        $forum = $validateForumCategoryRequest->doTask($slug);
        $addSubjectValidator->makeValidate();
        if (AuthMiddleware::asUserAuthenticated()) {
            $this->addSubject($forum);
        }
        Request::ajax(['inputs' => false, 'setsession' => true], 400);

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

    private function addSubject(Forum $forum)
    {
        $forumSubject = new ForumSubject();
        debug($forumSubject->create(
            [
                'title' => $this->request->title,
                'subtitle' => $this->request->subtitle,
                'message' => $this->request->message,
                'forum_id' => $forum->id
            ]
        ));
    }
}