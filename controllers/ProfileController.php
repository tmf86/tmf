<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Service\File\Files;
use Service\File\FilesUpload;
use Validator\ProfileUpdateValidator;
use View\View;

class ProfileController extends Controller
{
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

    public function profileUpdate()
    {
        $profileUpdateValidator = new ProfileUpdateValidator();
        $validator = $profileUpdateValidator->validateCustermer($this->request->inputs());
        if ($validator->fails()) {
            $errors = $validator->errors()->firstOfAll();
            $errors['input_error'] = true;
            return $this->request->ajax($errors, 400);
        }
        return true;
    }
}