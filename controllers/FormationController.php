<?php


namespace Contoller;


use Model\Formation;
use Model\Videos;

class FormationController extends Controller
{
    public function index(){
        $fm= new Formation();
        $vd= new Videos();
        if (isset($_GET['id'])){
            $videos = $vd->show_formation_videos($_GET["id"]);
                $this->load_views("pages.cours",compact("videos"));
        }else{
            $formations = $fm->show_all();
            $this->load_views("pages.formation",compact("formations"));
        }
    }
}