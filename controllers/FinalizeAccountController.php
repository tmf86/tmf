<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Model\Account;
use Model\User;
use Service\Mailer\AccountCreatedMailer;
use Validator\FinalizeAccountValidator;
use View\View;

class FinalizeAccountController extends Controller
{
    use AuthMiddleware;

    /**
     * @param string $id
     * @param string $email
     * @return View
     * @throws \Exception
     */
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
            Request::setErrors($errors);
            $title = 'Finalisation de creation de compte';
            $scripts =
                [
                    sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                    sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
                ];
            if ((Request::hasError('mot_pass') && Request::hasError('password_verify')) && Request::error('mot_pass') === Request::error('password_verify')) {
                Request::setErrors(['mot_pass' => Request::error('mot_pass'), 'password_verify' => '']);
            }
            return redirect('pages.finalize_account_creation', false, 301, compact('scripts', 'title'));
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
        $account = $account->create($account_data);
        $this->request->session('user_id', $user->mat_membre);
        $this->request->session('token', $this->generateToken());
        $this->request->session('name', sprintf("%s %s", $user->nom, $user->prenom));
        $data = [
            'title' => 'Envoie d\'identifiant de connexion',
            'name' => sprintf("%s %s", $user->nom, $user->prenom),
            'email' => $email,
            'id' => $id
        ];
        $mailer = new AccountCreatedMailer($data);
        $mailer->to($email, $user->prenom)->forward();
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