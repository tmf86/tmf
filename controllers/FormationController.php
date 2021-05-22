<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Formation;
use Model\Videos;

class FormationController extends Controller
{
    use RedirectUsersMiddleware;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }
    /**
     * @throws \Exception
     */
    public function index()
    {
        $title="Formation";
        $fm = new Formation();
        $vd = new Videos();
        $user_image = $this->getUserImage();
        if ($this->request->hasGetKey('id')) {
            $videos = $vd->show_formation_videos($this->request->id);
            $this->load_views("pages.cours", compact("videos", 'user_image'),false);
        } else {
            $formations = $fm->show_all();
            $this->load_views("pages.formation", compact("formations", 'user_image',"title"),false);
        }
    }
}