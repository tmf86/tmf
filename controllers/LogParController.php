<?php


namespace Contoller;


use Validator\LogParValidator;
use View\View;

class LogParController extends Controller
{
    public function parrainage(){
        $title="Acceder au Parrainage";
        $this->load_views('pages.parrainage',compact("title"),false);
    }

    public function loging(){
        $vld = new LogParValidator();
        $rq = $this->request;
        $title="Acceder au Parrainage";
        $vld = $vld->validateCustermer($this->request->inputs());
        if ($vld->fails()){
            $erreurs = $vld->errors()->firstOfAll();
            foreach ($erreurs as $key => $value){
                $this->request->error($key,$value);
            }
            return new View("pages.parrainage", compact("title","rq"), false);

        }else{
            $rq = $this->request;
            $title="Tableau de Bord";
            $this->load_views('pages.dashbord_par',compact("title","rq"));
        }

    }
}