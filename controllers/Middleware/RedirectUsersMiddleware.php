<?php


namespace Contoller\Middleware;


trait RedirectUsersMiddleware
{

    /**
     * @param string $url
     * @return void
     * @throws \Exception
     */
    public function setRedirectToURL(string $url)
    {
        if ($url != makeRootOrFileUrl('login') && $url != makeRootOrFileUrl('register')) {
            session('redirectTo', $url);
        }
    }

    /**
     * @return string
     */
    public function redirectTo()
    {
        if (session('redirectTo')) {
            return session('redirectTo');
        }
        return makeRootOrFileUrl('profile');
    }
}