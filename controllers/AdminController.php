<?php


namespace Contoller;


use Model\Admin;

class AdminController extends Controller
{
    public function index(){
        $this->load_views("admin.home.login",[],false);
    }
    public function home_admin(){
        $this->load_views("admin.home.home",[],true);
    }
    public function login(){
       //var_dump($_POST);
        $adm = new Admin();
        $adm = $adm->select("admin")->whereEqual("login_admin",$_POST["login"])->andEqual("mdp_admin",$_POST["pwd"])->run();
        if ($adm){
            echo "connected";
        }else{
            echo "denied";
        }
    }
}