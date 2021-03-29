<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use View\View;

class ProfileController extends Controller
{
    use Auth;

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
        $user = $this->user();
        return $this->load_views('dashbord.profile', compact('title', 'user'));
    }
}