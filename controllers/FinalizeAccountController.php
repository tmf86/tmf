<?php


namespace Contoller;


use Contoller\Http\Request;
use Model\Account;
use Model\User;

class FinalizeAccountController extends Controller
{

    /***
     * @param string $email
     * @return \View\View
     */
    public function index(string $id, string $email)
    {
        if (!$this->urlValidate($id, $email)) {
            Request::abort(404);
            exit();
        }
        $scripts =
            [
                sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
            ];
        return $this->load_views("pages.finalize_account_creation", compact('scripts'));

    }

    /**
     * @param Request $request
     * @param string $email
     */
    public function accountStore(Request $request, string $id, string $email)
    {

    }

    /**
     * @param string $id
     * @param string $email
     * @return bool
     */
    private function urlValidate(string $id, string $email)
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