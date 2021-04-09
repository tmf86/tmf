<?php

namespace Contoller;

use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Model\User;
use Service\Mailer\FinalizeAccountMailer;
use Validator\RegisterValidator;
use View\View;

class RegisterController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authenticated();
    }

    /**
     * @return View
     */
    public function index()
    {
        $title = "Inscription";
        $scripts = [
            sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
            sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
        ];
        $user_image = $this->getUserImage();
        return new  View("pages.register", compact("title", "scripts", 'user_image'));
    }

    /**
     * @param RegisterValidator $registerValidator
     * @return bool|View
     * @throws \Exception
     */
    public function registerStore(RegisterValidator $registerValidator)
    {
        if (Request::isAjax()) {
            $registerValidator->makeValidate();
            $user = new User();
            $user = $user->create($this->request->inputs());
            if ($user) {
                $name = sprintf("%s %s", $this->request->nom, $this->request->prenom);
                $name_id = sprintf("%s%s", str_replace(" ", '', $this->request->nom), str_replace(" ", '', $this->request->prenom));
                $url = makeRootOrFileUrl(sprintf('finalize_account_creation/%s/%s',
                    buildUniqueID($user->mat_membre, $user->filiere, $user->contact, $name_id), $this->request->email));
                $this->setSessions($name, $url);
//                Envoie du mail de finalisation de la creation de compte
                $mailer = new FinalizeAccountMailer(['name' => $name, 'url' => $url]);
                $mailer->to($this->request->email, $name)->forward();
                Request::ajax(["success" => true, 'redirectTo' => makeRootOrFileUrl('registration-success')], 200);
            }
            Request::ajax(["inputs" => false], 400);

        }
        return Request::abort(404);
    }


    /**
     * @param string $name
     * @param string $url
     * @throws \Exception
     */
    private function setSessions(string $name, string $url)
    {
        $this->request->session('name', $name);
        $this->request->session('email', $this->request->email);
        $this->request->session('url', $url);
    }


}