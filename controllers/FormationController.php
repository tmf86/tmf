<?php


namespace Contoller;


use Model\Formation;
use Model\Videos;

class FormationController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $fm = new Formation();
        $vd = new Videos();
        $user_image = $this->getUserImage();
        if ($this->request->hasGetKey('id')) {
            $videos = $vd->show_formation_videos($this->request->id);
            $this->load_views("pages.cours", compact("videos", 'user_image'),false);
        } else {
            $formations = $fm->show_all();
            $this->load_views("pages.formation", compact("formations", 'user_image'),true);
        }
    }
}