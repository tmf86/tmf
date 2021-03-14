<?php


namespace Contoller;


class ParrainageController extends Controller
{
    public function index(){
        $this->load_views('pages.parrainage');
    }
    public function demande(){
        $this->load_views('pages.demande_parrainage');
    }
    public function tableau_de_bord(){
        $this->load_views('pages.dashbord_par');
    }
}