<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use View\View;

class ForumController extends Controller
{
    use Auth;

    /**
     * @var \Model\User
     */
    private $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->user = $this->user();
    }

    /**
     * @return View
     */
    public function index()
    {
        $title = 'Forum';
        $user = $this->user;
        return $this->load_views('dashbord.forum', compact('title', 'user'));
    }

    /**
     * @return View
     */
    public function detail()
    {
        $title = 'Forum';
        $user = $this->user;
        return $this->load_views('dashbord.forum-detail', compact('title', 'user'));
    }
}