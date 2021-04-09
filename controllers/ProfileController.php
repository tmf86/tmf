<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Contoller\Middleware\RedirectUsers;
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
            $this->updateUserPersonaLInfo();
        }
        return Request::abort(404);
    }

    private function updateUserPersonaLInfo()
    {
        $user = new User();
        $image = (!$this->request->file('user-pic')->asError()) ?
            $this->request->file('user-pic')->save('storage/users/', $this->user->identifiant) : '';
        $user->update([
            'image' => $image,
            'contact' => $this->request->contact,
            'email' => $this->request->email
        ], (int)$this->user->mat_membre);
    }
}