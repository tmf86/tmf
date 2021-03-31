<?php


namespace Contoller;


//use Contoller\Http\Request;
use Model\Demand_Acount;
use Model\Demande;
use Validator\DemandeValidator;
//use View\View;


class ParrainageController extends Controller
{
    public function demande(){
        $rq = $this->request;
        $title="Faire une Demande";
       $this->load_views('pages.demande_parrainage',compact("title","rq"));
        //return new View("pages.demande_parrainage",[]);
    }
    public function generatDemand(){
        echo "ok";
            $valide_par= new DemandeValidator();
            $valide_par = $valide_par->validateCustermer($this->request->inputs());
            if($valide_par->fails()){
                $erreurs = $valide_par->errors()->firstOfAll();
                //var_dump($erreurs);
                foreach ($erreurs as $key => $value){
                    try {
                        $this->request->error($key, $value);
                    } catch (\Exception $e) {
                    }
                }
                $rq = $this->request;
                $title="Faire une Demande";
                $scripts =
                    [
                        sprintf("<script src='%spublic/js/congrat_demand.js'></script>", rootUrl())
                    ];
                return redirect("pages.demande_parrainage",false,301,compact("rq","title","scripts"));

            }else{
                $title="Faire une Demande";
                $dm = new Demande();
                $dm=  $dm->create($this->request->inputs());
                $cmpt_dmd= new Demand_Acount();
                $cmpt_dmd = $cmpt_dmd->create($this->demand_cmpt_info($dm));
                return redirect("pages.demande_congrate",false,200,compact("title"));

            }
    }
    private function demand_cmpt_info($dm){
        $cmpt= new Demand_Acount();
        $cmpt = $cmpt->generate_Code();
        $dt = new \DateTime();
        $dt= $dt->format("Y");
        $userName = $this->request->filiere.$dt;
        $mdp = str_shuffle(substr($cmpt,0,8));
        var_dump($mdp);
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