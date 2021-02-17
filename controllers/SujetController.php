<?php


namespace Contoller;


use Model\Sujet;

class SujetController extends Controller
{
    public function index()
    {
    $s = new Sujet();
    $sujet_bts = $s->show_all_bts();
    $sujet_autre = $s->show_all_other();
    $sujet_projet = $s->show_all_projet();
   $all_date = $s->show_all();
        return $this->load_views("pages.sujets",compact('sujet_bts','sujet_projet','all_date','sujet_autre'));
    }
}