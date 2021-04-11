<?php


namespace Contoller;


use Model\Demande;
use Model\User;

class DashbordParController extends Controller
{
    public  function index(){
        $current_usr = $this->user();
        $dm = new Demande();
        $dm = $dm->select("demande")->whereEqual("id_membre",$current_usr->mat_membre)->run();
        $mb = new User();
        $mb_par = $mb
            ->select("menbre")
            ->whereEqual("filiere");
    }
}