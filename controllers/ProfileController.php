<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Contoller\Middleware\RedirectUsers;
use Model\Account;
use Model\User;
use Service\File\Files;
use Service\File\FilesUpload;
use Validator\ProfileUpdateValidator;
use View\View;

class ProfileController extends Controller
{
    use RedirectUsers;

    /**
     * @var bool|\Model\Account|\Model\User
     */
    private $user;

    /**
     * ProfileController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->user = $this->user();
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }

    /**
     * @return View
     */
    public function index()
    {
        $title = 'Profile';
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        $user = $this->user;
        return $this->load_views('dashbord.profile', compact('title', 'user', 'scripts'));
    }

    public function profileUpdate(ProfileUpdateValidator $profileUpdateValidator)
    {
        if (Request::isAjax()) {
            $profileUpdateValidator->makeValidate();
            $account = false;
            $password = $this->request->password;
            if (!empty($password)) {
                $account = $this->updateUserAcountInfo();
            }
            $user = $this->updateUserPersonaLInfo();
            debug($user, $account);

        }
        return Request::abort(404);
    }

    /**
     * @return false|int
     * @throws \Exception
     */
    private function updateUserPersonaLInfo()
    {
        $user = new User();
        $path = sprintf('storage/users/%s/', $this->user->identifiant);
        $fileName = $this->user->identifiant;
        $image = (!$this->request->file('user-pic')->asError()) ?
            $this->request->file('user-pic')->save($path, $fileName, true) : '';
        $fields = ['contact', 'email', 'about'];
        $last_update = '';
        foreach ($fields as $field) {
            if ($this->request->{$field} != '' || $image != '') {
                $last_update = date('Y-m-d H:i:s');
            }
        }
        return $user->update([
            'image' => $image,
            'contact' => $this->request->contact,
            'email' => $this->request->email,
            'about_me' => $this->request->about,
            'last_update' => $last_update
        ], (int)$this->user->mat_membre);
    }

    /**
     * @return false|int
     */
    private function updateUserAcountInfo()
    {
        $account = new Account();
        return $account->update([
            'mot_pass' => password_hash($this->request->password, PASSWORD_BCRYPT, ['cost' => 12]),
            'last_update' => date('Y-m-d H:i:s')
        ], (int)$this->user->id_compte);
    }

}