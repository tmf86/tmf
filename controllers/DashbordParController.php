<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Demande;
use Model\User;

class DashbordParController extends Controller
{
   /* use RedirectUsersMiddleware;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }*/
    public function index(){
        $title = "Tableau de Bord";
        $scripts= [
            sprintf("<script  src='%spublic/js/DashbordPar.js'></script>", rootUrl())
        ];
        $this->load_views("parrainage.tableau_bord",compact("title","scripts"),true);
    }
    public  function initParrainage(){
        $current_usr = $this->user();
        $dm = new Demande();
        $dm = $dm->select("demande")->whereEqual("id_membre",$current_usr->mat_membre)->run();
        //var_dump($dm);
        $mb = new User();
        $mb_par = $mb
            ->select("membre")
            ->whereEqual("filiere",$this->recupFilere($dm->filiere,'2'))
            ->andEqual("validation","vrai")->run(true);
        $mb_fil= $mb
            ->select("membre")
            ->whereEqual("filiere",$this->recupFilere($dm->filiere,'1'))
            ->andEqual("validation","vrai")->run(true);
       // var_dump($mb_par);
       // echo "<br>";
       //var_dump($mb_fil);
       // var_dump(count($mb_par));
        //echo "<br>";
        $tb_info=$this->equlibrateMenber(count($mb_par),count($mb_fil));
        $info_parrainage = ["parrain"=>$mb_par,"filleul"=>$mb_fil,$tb_info,$dm];
        echo json_encode($info_parrainage);
    }
    private function recupFilere($champ,$annee){
       $dt = new \DateTime();
       $dt = $dt->format("Y");
       return $champ.$annee.'A';
    }

    private function test_val($first,$second){
        if($first>$second){
            return "oneMax";
        }
        elseif($first<$second){
            return "secondMax";
        }
    }
    /**
     * @Fonction qui genere un tableau de nombre aleatoire d'une manière très
     * simmple sans prendre en compte de valeur a complèter !
     */
    private function random_s($nberToRandom){
        $i=1;
        $random_i[$i]=random_int(1,$nberToRandom);
        while($i<=$nberToRandom){
            $ver=false;
            $val=random_int(1,$nberToRandom);
            for($j=1;$j<$i;$j++){
                if($random_i[$j]===$val){
                    $ver=true;
                }
            }
            if(!$ver){
                $random_i[$i]=$val;
                $i++;
            }
        }
        return $random_i;
    }
    private function equlibrateMenber($nombre_p,$nombre_f){
        $tab_info =[];
        if($this->test_val($nombre_p,$nombre_f)==="oneMax"){
            $add=($nombre_p-$nombre_f)+$nombre_f;
            $max=$nombre_p;
            $pos_f=$this->random_c($nombre_f,$add);
            $pos_p=$this->random_s($nombre_p);

        }
        elseif($this->test_val($nombre_p,$nombre_f)==="secondMax"){
            $add=($nombre_f-$nombre_p)+$nombre_p;
            $max=$nombre_f;
            $pos_p=$this->random_c($nombre_p,$add);
            $pos_f=$this->random_s($nombre_f);;
        }
        else{
            $pos_p=$this->random_s($nombre_p);
            $pos_f=$this->random_s($nombre_f);
            $max=$nombre_f;
        }
        $tab_info = ["tab_aletoire_p"=>$pos_p,"tab_aletoire_f"=>$pos_f,"nbr_tentative"=>$max];
        return $tab_info;
    }
    private function random_c($nberToRandom,$next){
        $random_i=$this->random_s($nberToRandom);
        $k=$i=count($random_i)+1;
        $random_i[$i]=random_int(1,$nberToRandom);
        while($i<=$next){
            $ver=false;
            $val=random_int(1,$nberToRandom);
            for($j=$k;$j<$i;$j++){
                if($random_i[$j]===$val){
                    $ver=true;
                }
            }
            if(!$ver){
                $random_i[$i]=$val;
                $i++;
            }
        }
        return $random_i;
    }
}