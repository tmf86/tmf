<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Service\File\Files;
use Service\File\FilesUpload;
use View\View;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
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
        $user = $this->user();
        return $this->load_views('dashbord.profile', compact('title', 'user', 'scripts'));
    }

    public function profileUpdate()
    {
        $fileManager = new Files();
//        debug($fileManager->file('user-pic')->save('',$this->user()->id);
    }
}