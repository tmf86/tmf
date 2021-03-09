<?php


namespace Contoller;


use Model\Formation;
use Model\Videos;

class FormationController extends Controller
{
    public function index()
    {
        $fm = new Formation();
        $vd = new Videos();
        $user_image = $this->getUserImage();
        $scripts =
            [
                sprintf("<script src='%spublic/js/script.js'></script>", rootUrl()),
                "<script  src='public/js/import/Venobox-master/venobox/venobox.min.js'></script>",
                "<script  src='public/js/import/Venobox-master/venobox/venoboxActive.js'></script>"
            ];
        if ($this->request->hasGetKey('id')) {
            $videos = $vd->show_formation_videos($this->request->id);
            $this->load_views("pages.cours", compact("videos", "scripts", 'user_image'));
        } else {
            $formations = $fm->show_all();
            $this->load_views("pages.formation", compact("formations", 'user_image'));
        }
    }
}