<?php


namespace Contoller;


use Contoller\Http\Request;
use Repositories\Mailer;
use View\View;

class RegisterSuccess extends Controller
{

    /**
     * @param Request $request
     * @return View|Request
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->hasGetKey('resend')) {
            $this->resendEmail($request);
        } else {
            if ($request->hasSession('name') && $request->hasSession('email') && $request->hasSession('url')) {
                return $this->load_views('pages.register_success', compact('request'), false);
            }
            Request::abort(404);
            exit();
        }
        return $request;
    }

    /**
     * @param Request $request
     * @return View
     * @throws \Exception
     */
    private function resendEmail(Request $request)
    {
        if ($request->resend === 'true') {
            if ($request->hasSession('name') && $request->hasSession('email') && $request->hasSession('url')) {
                $mailer = new Mailer($request->session('name'), $request->session('email'), $request->session('url'));
                $mailer->mail($request, false);
                $request->session('resend', true);
                return redirect('registration-success', true);
                exit();
            }
            Request::abort(404);
            exit();
        }
        Request::abort(404);
        exit();
    }

}