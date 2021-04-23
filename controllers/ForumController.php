<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Contoller\Middleware\RedirectUsersMiddleware;
use Contoller\Middleware\TaskBeforeRequest\ValidateForumCategoryRequest;
use Contoller\Middleware\TaskBeforeRequest\ValidateSubjectRequest;
use Model\AnswerFromSubject;
use Model\Forum;
use Model\ForumSubject;
use Service\File\Files;
use Service\File\FilesUpload;
use Validator\ForumAddSubjectValidator;
use Validator\ReplaySubjectValidator;
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
        $this->setRedirectToURL(current_route());
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
        $forumRecentSubjects = new ForumSubject();
        $forumRecentSubjects = $forumRecentSubjects->select('forum_subject')->OrderByDesc('created_at')->limit(5)->run(true);
        return $this->load_views('dashbord.forum', compact('title', 'user', 'forums', 'forumRecentSubjects'));
    }

    /**
     * @param string $category
     * @return View
     */
    public function category(ValidateForumCategoryRequest $validateForumCategoryRequest, string $slug)
    {
        $forum = $validateForumCategoryRequest->doTask($slug);
        $recentSubjects = $this->addSubjectProcess($forum);
        $subjects = $this->checkIfHasSubject($forum);
        $forumName = ucfirst($forum->name);
        $title = 'Forum | ' . ucwords($forumName);
        $scripts =
            [
                sprintf("<script src='%snode_modules/ckeditor4/ckeditor.js'></script>", rootUrl()),
                "<script>CKEDITOR.replace('message')</script>",
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
        if ($addSubjectValidator->makeValidate()) {
            $this->addSubjectProcess($forum);
            $this->setSubjectSession();
            Request::ajax(['inputs' => false, 'setsession' => true], 400);
        }
    }

    /**
     * @param ForumSubject $subject
     * @return array
     */
    private function subjectViewVariables(ForumSubject $subject)
    {
        $links = [sprintf('<link rel="stylesheet" href="%spublic/css/lightbox.css">', rootUrl())];
        $scripts = [
            sprintf("<script src='%snode_modules/ckeditor4/ckeditor.js'></script>", rootUrl()),
            "<script>CKEDITOR.replace('message')</script>",
            sprintf('<script src="%spublic/js/lightbox.js"></script>', rootUrl()),
            sprintf('<script src="%spublic/js/script.js"></script>', rootUrl())
        ];
        $forum = $subject->forum;
        $user = $this->user;
        $title = 'Forum | ' . ucwords($forum->name);
        $answer = new AnswerFromSubject();
//        $answers = $answer->select('answers_from_subjects')->whereEqual('subject_id', $subject->id)->run(true);
        $answers = $subject->answers;
        return compact('links', 'forum', 'user', 'scripts', 'subject', 'answers', 'title');
    }

    /**
     * @param ValidateSubjectRequest $validateSubjectRequest
     * @param string $slug
     * @return View
     */
    public function subjectView(ValidateSubjectRequest $validateSubjectRequest, string $slug)
    {
        $subject = $validateSubjectRequest->doTask($slug);
        $this->replaySubjectProcess($subject);
        return $this->load_views('dashbord.subject', $this->subjectViewVariables($subject));
    }

    /**
     * @param ValidateSubjectRequest $validateSubjectRequest
     * @param ReplaySubjectValidator $replaySubjectValidator
     * @param string $slug
     * @return View
     */
    public function replyToSubject(ValidateSubjectRequest $validateSubjectRequest, ReplaySubjectValidator $replaySubjectValidator, string $slug)
    {
        $subject = $validateSubjectRequest->doTask($slug);
        if ($replaySubjectValidator->makeValidate()) {
            $this->replaySubjectProcess($subject);
            $this->setReplaySubjectSession();
            return redirect('dashbord.subject', false, 200, $this->subjectViewVariables($subject));
        }
        return redirect('dashbord.subject', false, 301, $this->subjectViewVariables($subject));
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
                ->run(true);
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
            $data = session(UuidToString());
            $subjects = [];
            if (is_array($data)) {
                foreach ($data as $value) {
                    $attachment = ($value['attachment']) ? $this->saveSubjectAttachment(true, $value['attachment']) : NULL;
                    $subjects[] = $forumSubject->create(
                        [
                            'title' => strtolower($value['title']),
                            'slug' => slug(strtolower($value['title'])),
                            'subtitle' => str_replace(' ', '-', $value['subtitle']),
                            'message' => $value['message'],
                            'attachment' => $attachment,
                            'forum_id' => $forum->id,
                            'user_id' => $this->user->mat_membre
                        ], false
                    );
                    Request::sleep(2);
                }
            }
            $this->request->sessionUnset(UuidToString());
            return $subjects;
        }
        return $forumSubject->create(
            [
                'title' => strtolower($this->request->title),
                'slug' => slug(strtolower($this->request->title)),
                'subtitle' => strtolower($this->request->subtitle),
                'message' => $this->request->message,
                'attachment' => $this->saveSubjectAttachment(),
                'forum_id' => $forum->id,
                'user_id' => $this->user->mat_membre
            ], false
        );
    }

    private function replaySubject(ForumSubject $forumSubject, $useSession = false)
    {
        $sessionName = sprintf('replay-%s', UuidToString());
        $answerFromSubject = new AnswerFromSubject();
        if ($useSession) {
            $data = session($sessionName);
            $answers = [];
            if (is_array($data)) {
                foreach ($data as $value) {
                    $attachment = ($value['attachment']) ? $this->saveSubjectAttachment(true, $value['attachment']) : NULL;
                    $answers[] = $answerFromSubject->create(
                        [
                            'message' => $value['message'],
                            'attachment' => $attachment,
                            'subject_id' => $forumSubject->id,
                            'user_id' => $this->user->mat_membre
                        ], false
                    );
                    Request::sleep(2);
                }
            }
            $this->request->sessionUnset($sessionName);
            return $answers;
        }
        return $answerFromSubject->create(
            [
                'message' => $this->request->message,
                'attachment' => $this->saveSubjectAttachment(),
                'subject_id' => $forumSubject->id,
                'user_id' => $this->user->mat_membre
            ], false
        );
    }

    /**
     * @return array|false|mixed|string
     * @throws \Exception
     */
    private function setSubjectSession()
    {
        if (!AuthMiddleware::asUserAuthenticated()) {
            $data = [
                'title' => $this->request->title,
                'slug' => slug(strtolower($this->request->title)),
                'subtitle' => $this->request->subtitle,
                'message' => $this->request->message,
                'attachment' => $this->sessionAttachmentSaving($this->request->file('attachment'))
            ];
            if (session(UuidToString())) {
                $newData = $this->request->session(UuidToString());
                if ($this->hasSameSubject($data, $newData)) {
                    $newData[] = $data;
                    return $this->request->session(UuidToString(), $newData);
                }
                return false;
            }
            return $this->request->session(UuidToString(), [$data]);
        }
        return false;
    }

    private function setReplaySubjectSession()
    {
        if (!AuthMiddleware::asUserAuthenticated()) {
            $data = [
                'message' => $this->request->message,
                'attachment' => $this->sessionAttachmentSaving($this->request->file('attachment'))
            ];
            $sessionName = sprintf('replay-%s', UuidToString());
            if (session($sessionName)) {
                $newData = $this->request->session($sessionName);
                if ($this->hasSameSubject($data, $newData, true)) {
                    $newData[] = $data;
                    $this->request->session('setreplaysession', true);
                    return $this->request->session($sessionName, $newData);
                }
                return false;
            }
            $this->request->session('setreplaysession', true);
            return $this->request->session($sessionName, [$data]);
        }
        return false;
    }

    /**
     * @param $data1
     * @param $data2
     * @return bool
     */
    private function hasSameSubject($data1, $data2, $replay = false)
    {
        if ($replay) {
            foreach ($data2 as $value) {
                $message = ($data1['message'] === $value['message']);
                if ($message) {
                    return false;
                }
            }
        } else {
            foreach ($data2 as $value) {
                $title = ($data1['title'] === $value['title']);
                $subtitle = ($data1['subtitle'] === $value['subtitle']);
                $message = ($data1['message'] === $value['message']);
                if ($title || $subtitle || $message) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * @param $forum
     * @return array|Request|ForumSubject
     */
    private function addSubjectProcess($forum)
    {
        if (AuthMiddleware::asUserAuthenticated() && $this->request->httpMethod() === 'post' && !session(UuidToString())) {
            if (Request::isAjax()) {
                if ($this->addSubject($forum)) {
                    session('subject', true);
                    return Request::ajax(['success' => true, 'refresh' => true], 200);
                }
                return Request::ajax(['success' => false, 'refresh' => false], 200);
            }
        }
        if (AuthMiddleware::asUserAuthenticated() && session(UuidToString())) {
            session('subject', true);
            return $this->addSubject($forum, true);
        }
        return [];
    }

    private function replaySubjectProcess($forumSubject)
    {
        $sessionName = sprintf('replay-%s', UuidToString());
        if (AuthMiddleware::asUserAuthenticated() && $this->request->httpMethod() === 'post' && !session($sessionName)) {
            session('replay', true);
            return $this->replaySubject($forumSubject);
        }
        if (AuthMiddleware::asUserAuthenticated() && session($sessionName)) {
            session('replay', true);
            return $this->replaySubject($forumSubject, true);
        }
        return [];
    }

    /**
     * @param bool $fromSession
     * @return string|null
     * @throws \Exception
     */
    private function saveSubjectAttachment(bool $fromSession = false, string $tempSavingPath = '')
    {
        Request::sleep(1);
        if ($fromSession && $tempSavingPath) {
            $path = sprintf('storage/forums/subject/attachment/%s/', $this->user->identifiant);
            $name = date('Y-m-d-H-i-s') . md5(Request::getClientIp());
            $fileName = uniqid($name, true) . getFileExtension($tempSavingPath);
            $this->sessionAttachmentCreateFileIfNotExist($path);
            $tempSavingPath = ROOT_DIRECTORY . $tempSavingPath;
            return (rename($tempSavingPath, ROOT_DIRECTORY . $path . $fileName)) ? $path . $fileName : false;
        }
        $path = sprintf('storage/forums/subject/attachment/%s', $this->user->identifiant);
        return $this->request->file('attachment')->save($path);
    }

    private function sessionAttachmentCreateFileIfNotExist($path)
    {
        if (!file_exists(ROOT_DIRECTORY . $path)) {
            return Files::createDirectory($path);
        }
        return false;
    }

    private function sessionAttachmentSaving(FilesUpload $filesUpload)
    {
        Request::sleep(1);
        $path = sprintf('storage/temp');
        return $filesUpload->file('attachment')->save($path, UuidToString() . date('Y-m-d-H-i-s'));
    }

}