<?php

namespace Contoller;

use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Model\User;
use Service\FinalizeAccountMailer;
use Validator\RegisterValidator;
use View\View;

class RegisterController extends Controller
{
    use Auth;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->AuthProcess();
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
     * @return $this|Request
     * @throws \Exception
     */
    public function registerStore()
    {
        if ($this->request->isAjax()) {
            $validator = new RegisterValidator();
            $this->processInputsData();
            $validation = $validator->validateCustermer($this->request->inputs());
            if ($validation->fails()) {
                $errors = $validation->errors()->firstOfAll();
                $validator->custumErrorMessages($errors);
                $errors['input_error'] = true;
                return $this->request->ajax($errors, 400);
            }

            $user = new User();
            $user = $user->create($this->request->inputs());
            if ($user) {
                $name = sprintf("%s %s", $this->request->nom, $this->request->prenom);
                $name_id = sprintf("%s%s", str_replace(" ", '', $this->request->nom), str_replace(" ", '', $this->request->prenom));
                $url = buildpath(sprintf('finalize_account_creation/%s/%s', buildUniqueID($user->mat_membre, $user->filiere, $user->contact, $name_id), $this->request->email));
                $maller = new FinalizeAccountMailer($name, $this->request->email, $url);
                $maller->push();
                $this->request->session('name', $name);
                $this->request->session('email', $this->request->email);
                $this->request->session('url', $url);
                return $this->request->ajax(["success" => true, 'redirectTo' => buildpath('registration-success')], 200);
            }
            return $this->request->ajax(["input_error" => false], 400);

        }
        Request::abort(404);
        return $this;
    }

    /**
     * @return void
     */
    public function AuthProcess(): void
    {
        if ($this->isAuth()) {
            redirect('profile', true);
        }
    }

    /**
     * @return void
     */
    private function processInputsData()
    {
        if (isset($_POST["annee"], $_POST["mois"], $_POST["jour"])) {
            $_POST["date_naissance"] = sprintf("%s-%s-%s", $_POST["annee"], $_POST["mois"], $_POST["jour"]);
            unset($_POST["jour"], $_POST["annee"], $_POST["mois"]);
        }
    }

}