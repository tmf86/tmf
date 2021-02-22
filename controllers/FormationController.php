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
        $scripts =
            [
                "<script  src='public/js/import/Venobox-master/venobox/venobox.min.js'></script>",
                "<script  src='public/js/import/Venobox-master/venobox/venoboxActive.js'></script>"
            ];
        if (isset($_GET['id'])) {
            $videos = $vd->show_formation_videos($_GET["id"]);
            $this->load_views("pages.cours", compact("videos", "scripts"));
        } else {
            $formations = $fm->show_all();
            $this->load_views("pages.formation", compact("formations"));
        }
    }
}