<?php


namespace Contoller;


use Contoller\Http\Request;
use Model\Account;
use Model\User;
use Validator\FinalizeAccountValidator;
use View\View;

class FinalizeAccountController extends Controller
{

    /***
     * @param Request $request
     * @param string $id
     * @param string $email
     * @return View
     */
    public function index(Request $request, string $id, string $email): View
    {
        if (!$this->urlValidate($id, $email)) {
            Request::abort(404);
            exit();
        }
        $title = 'Finalisation de creation de compte';
        $scripts =
            [
                sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
            ];
        return $this->load_views("pages.finalize_account_creation", compact('scripts', 'title', 'request'));

    }

    /**
     * @param Request $request
     * @param string $id
     * @param string $email
     * @return $this
     * @throws \Exception
     */
    public function accountStore(Request $request, string $id, string $email): View
    {
        if (!$this->urlValidate($id, $email)) {
            Request::abort(404);
            exit();
        }
        $validator = new FinalizeAccountValidator();
        $validation = $validator->validateCustermer($request->inputs());
        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();
            foreach ($errors as $key => $value) {
                $request->error($key, $value);
            }
            $title = 'Finalisation de creation de compte';
            $scripts =
                [
                    sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                    sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
                ];
            if (($request->hasError('mot_pass') && $request->hasError('password_verify')) && $request->error('mot_pass') === $request->error('password_verify')) {
                $request->setErrors(['mot_pass' => $request->error('mot_pass'), 'password_verify' => '']);
            }
            return redirect('pages.finalize_account_creation', false, 301, compact('request', 'scripts', 'title'));
        }

        $user = new User();
        $user = $user->query(sprintf("select * from membre where email='%s'", $email));
        $account_data =
            [
                'identifiant' => $id,
                'mot_pass' => password_hash($request->mot_pass, PASSWORD_BCRYPT, ['cost' => 12]),
                'mat_membre' => $user->mat_membre
            ];
        $account = new Account();
        $account = $account->create($account_data);
        return $this;
    }

    /**
     * @param string $id
     * @param string $email
     * @return bool
     */
    private function urlValidate(string $id, string $email): bool
    {
        $user = new User();
        $account = new Account();
        $bool = false;
        $user = $user->query(sprintf("select * from membre where email='%s'", $email));
        $account = $account->query(sprintf("select * from compte where identifiant='%s'", $id));
        if ($user && !$account) {
            $bool = buildUniqueID($user->mat_membre, $user->filiere, $user->contact, sprintf("%s%s", $user->nom, $user->prenom)) === $id;
        }
        return $bool;
    }
}