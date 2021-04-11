<?php


namespace Contoller\Middleware\TaskBeforeRequest;

use Model\Forum;
use View\View;


class ValidateForumCategoryRequest implements BeforeRequestInterface
{
    /**
     * @param mixed ...$data
     * @return mixed|View
     */
    public function doTask(...$data)
    {
        // TODO: Implement doTask() method.
        $forum = new Forum();
        $forum = $forum->select('forum')->whereEqual('slug', ...$data)->run();
        return ($forum) ? $forum : \redirect('pages.404.404', false, 404, [], false);
    }
}