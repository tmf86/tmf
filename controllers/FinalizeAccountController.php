<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\middleware\Auth;
use Model\Account;
use Model\User;
use Validator\FinalizeAccountValidator;
use View\View;

class FinalizeAccountController extends Controller
{
    use Auth;

    public function index(string $id, string $email): View
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
        $request = $this->request;
        return $this->load_views("pages.finalize_account_creation", compact('scripts', 'title', 'request'));

    }

    /**
     * @param string $id
     * @param string $email
     * @return View
     * @throws \Exception
     */
    public function accountStore(string $id, string $email): View
    {
        if (!$this->urlValidate($id, $email)) {
            Request::abort(404);
            exit();
        }

        $validator = new FinalizeAccountValidator();
        $validation = $validator->validateCustermer($this->request->inputs());
        $request = $this->request;
        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();
            foreach ($errors as $key => $value) {
                $this->request->error($key, $value);
            }
            $title = 'Finalisation de creation de compte';
            $scripts =
                [
                    sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                    sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
                ];
            if (($this->request->hasError('mot_pass') && $this->request->hasError('password_verify')) && $this->request->error('mot_pass') === $this->request->error('password_verify')) {
                $this->request->setErrors(['mot_pass' => $this->request->error('mot_pass'), 'password_verify' => '']);
            }
            return redirect('pages.finalize_account_creation', false, 301, compact('request', 'scripts', 'title'));
        }

        $user = new User();
        $user = $user->select('membre')->whereEqual('email', $email)->run();
//        $user = $user->query(sprintf("select * from membre where email='%s'", $email));
        $account_data =
            [
                'identifiant' => $id,
                'mot_pass' => password_hash($this->request->mot_pass, PASSWORD_BCRYPT, ['cost' => 12]),
                'mat_membre' => $user->mat_membre
            ];
        $account = new Account();
        $account->create($account_data);
        $this->request->session('user_id', $user->mat_membre);
        $this->request->session('token', $this->generateToken());
        $this->request->session('name', sprintf("%s %s", $user->nom, $user->prenom));
        return redirect('pages.account_created', false, 301, compact('request'), false);
    }

    /**
     * @param string $id
     * @param string $email
     * @return bool
     * @throws \Exception
     */
    private
    function urlValidate(string $id, string $email): bool
    {
        $user = new User();
        $account = new Account();
        $bool = false;
//        $user = $user->query(sprintf("select * from membre where email='%s'", $email));
        $user = $user->select('membre')->whereEqual('email', $email)->run();
//        $account = $account->query(sprintf("select * from compte where identifiant='%s'", $id));
        $account = $account->select('compte')->whereEqual('identifiant', $id)->run();
        if ($user && !$account) {
            $name_id = sprintf("%s%s", str_replace(" ", '', $user->nom), str_replace(" ", '', $user->prenom));
            $bool = buildUniqueID($user->mat_membre, $user->filiere, $user->contact, $name_id) === $id;
        }
        return $bool;
    }
}