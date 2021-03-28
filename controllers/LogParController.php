<?php


namespace Contoller;


use Validator\Rules\LogParValidator;

class LogParController extends Controller
{
    public function index(){
        $title="Acceder au Parrainage";
        $this->load_views('pages.parrainage',compact("title"));
    }

    public function loging(){
        $vld = new LogParValidator();
        $vld = $vld->validateCustermer($this->request->inputs());
        if ($vld->fails()){
            $erreurs = $vld->errors()->firstOfAll();
            foreach ($erreurs as $key => $value){
                $this->request->error($key,$value);
            }
        }
        $title="Tableau de Bord";
        $this->load_views('pages.dashbord_par',compact("title"));
    }
}