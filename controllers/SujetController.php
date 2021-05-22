<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Sujet;
use View\View;

class SujetController extends Controller
{
    use RedirectUsersMiddleware;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }
    /**
     * @return View
     * @throws \Exception
     */
    public function index()
    {
        $s = new Sujet();
        $sujet_bts = $s->show_all_bts();
        $sujet_autre = $s->show_all_other();
        $sujet_projet = $s->show_all_projet();
        $all_date = $s->show_all();
        $user_image = $this->getUserImage();
        $title = "Sujets";
        return $this->load_views("pages.sujets", compact('sujet_bts', 'sujet_projet', 'all_date', 'sujet_autre', 'user_image', 'title'), false);
    }
}