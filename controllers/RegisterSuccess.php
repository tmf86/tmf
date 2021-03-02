<?php


namespace Contoller;


use Contoller\Http\Request;
use Repositories\Mailer;

class RegisterSuccess extends Controller
{


    public function index()
    {
        if ($this->request->hasGetKey('resend')) {
            $this->resendEmail();
        } else {
            if ($this->request->hasSession('name') && $this->request->hasSession('email') && $this->request->hasSession('url')) {
                $request = $this->request;
                return $this->load_views('pages.register_success', compact('request'), false);
            }
            Request::abort(404);
            exit();
        }
        return $this->request;
    }


    private function resendEmail()
    {
        if ($this->request->resend === 'true' && ($this->request->hasSession('name') && $this->request->hasSession('email') && $this->request->hasSession('url'))) {
            try {
                $mailer = new Mailer($this->request->session('name'), $this->request->session('email'), $this->request->session('url'));
            } catch (\Exception $e) {
                debug(true, $e->getMessage());
            }
            $mailer->mail($this->request, false);
            $this->request->session('resended', true);
            return redirect('registration-success', true);
            exit();
        }
        Request::abort(404);
        exit();
    }

}