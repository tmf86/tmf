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
     * @param string $email
     * @throws \Exception
     */
    public function accountStore(Request $request, string $id, string $email)
    {
        if (!$this->urlValidate($id, $email)) {
            Request::abort(404);
            exit();
        }
        $validator = new FinalizeAccountValidator();
        $validation = $validator->validateCustermer($request->inputs());
        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();
            $validator->custumErrorMessages($errors);
            foreach ($errors as $key => $value) {
                $request->error($key, $value);
            }
            $scripts =
                [
                    sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                    sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
                ];
            return redirect('pages.finalize_account_creation', false, 301, compact('request', 'scripts'));
        } else {
            debug($request->inputs());
        }

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