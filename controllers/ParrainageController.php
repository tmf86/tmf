<?php


namespace Contoller;


use Contoller\Http\Request;
use Model\Demand_Acount;
use Model\Demande;
use Validator\DemandeValidator;
use View\View;


class ParrainageController extends Controller
{
    /*public function index(){
        $title="Acceder au Parrainage";
        $this->load_views('pages.parrainage',compact("title"));
    }*/
    public function demande(){
        $title="Faire une Demande";

       $this->load_views('pages.demande_parrainage',compact("title"));
        //return new View("pages.demande_parrainage",[]);
    }
    public function generatDemand(){
        echo "ok";
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
           $cmpt_dmd= new Demand_Acount();
           $cmpt_dmd = $cmpt_dmd->create($this->demand_cmpt_info($dm));
    }
    private function demand_cmpt_info($dm){
        $cmpt= new Demand_Acount();
        $cmpt = $cmpt->generate_Code();
        $dt = new \DateTime();
        $dt= $dt->format("Y");
        $userName = $this->request->filiere.$dt;
        $mdp = str_shuffle(substr($cmpt,0,8));
        $id_dmd = $dm->id_demad;
        return $tb_info = [
          "identifiant"=>$userName,
            "mdp_cmpt"=>$mdp,
            "code_dmd"=>$cmpt,
            "id_demande"=>$id_dmd
        ];

    }
    public function tableau_de_bord(){
        $this->load_views('pages.dashbord_par');
    }
}