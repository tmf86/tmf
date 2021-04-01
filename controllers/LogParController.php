<?php


namespace Contoller;


use Validator\LogParValidator;

class LogParController extends Controller
{
    public function parrainage(){
        $title="Acceder au Parrainage";
        $this->load_views('pages.parrainage',compact("title"),false);
    }

    public function loging(){
        $vld = new LogParValidator();
        $vld = $vld->validateCustermer($this->request->inputs());
        if ($vld->fails()){
            $erreurs = $vld->errors()->firstOfAll();
            foreach ($erreurs as $key => $value){
                $this->request->error($key,$value);
            }
        }else{
            $title="Tableau de Bord";
            $this->load_views('pages.dashbord_par',compact("title"));
        }

    }
}