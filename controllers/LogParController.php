<?php


namespace Contoller;


class LogParController extends Controller
{
    public function index(){
        $title="Acceder au Parrainage";
        $this->load_views('pages.parrainage',compact("title"));
    }
}