<?php


namespace Contoller;


use Contoller\Http\Request;
use Model\Demande;
use Validator\DemandeValidator;
use View\View;


class ParrainageController extends Controller
{
    public function index(){
        $this->load_views('pages.parrainage');
    }
    public function demande(){

       $this->load_views('pages.demande_parrainage');
        //return new View("pages.demande_parrainage",[]);
    }
    public function enregistre_demende(){
            $valide_par= new DemandeValidator();
            $valide_par = $valide_par->validateCustermer($this->request->inputs());
            if($valide_par->fails()){
                $erreurs = $valide_par->errors()->firstOfAll();
                foreach ($erreurs as $key => $value){
                    $this->request->error($key,$value);
                }
            }
        $dm = new Demande();
           $dm=  $dm->create($this->request->inputs());


    }
    public function tableau_de_bord(){
        $this->load_views('pages.dashbord_par');
    }
}