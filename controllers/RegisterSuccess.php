<?php


namespace Contoller;


use Contoller\Http\Request;
use Service\FinalizeAccountMailer;
use View\View;

class RegisterSuccess extends Controller
{

    /**
     * @return Request|View
     * @throws \Exception
     */
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

    /**
     * @return View
     * @throws \Exception
     */
    private function resendEmail(): View
    {
        if ($this->request->resend === 'true' && ($this->request->hasSession('name') && $this->request->hasSession('email') && $this->request->hasSession('url'))) {
            try {
                $mailer = new FinalizeAccountMailer($this->request->session('name'), $this->request->session('email'), $this->request->session('url'));
            } catch (\Exception $e) {
                debug(true, $e->getMessage());
            }
            $mailer->push();
            $this->request->session('resended', true);
            return redirect('registration-success', true);
            exit();
        }
        Request::abort(404);
        exit();
    }

}