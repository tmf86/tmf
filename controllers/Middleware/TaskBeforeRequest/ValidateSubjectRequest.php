<?php


namespace Contoller\Middleware\TaskBeforeRequest;


use Model\ForumSubject;
use View\View;

class ValidateSubjectRequest implements BeforeRequestInterface
{

    /**
     * @inheritDoc
     */
    public function doTask(...$data)
    {
        // TODO: Implement doTask() method.
        $subject = new ForumSubject();
        $subject = $subject->select('forum_subject')->whereEqual('slug', ...$data)->run();
        return ($subject) ? $subject : \redirect('pages.404.404', false, 404, [], false);
    }
}