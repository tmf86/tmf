<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Demande;
use Model\User;
use Wikimedia\Timestamp\ConvertibleTimestamp;

class DashbordParController extends Controller
{
     use RedirectUsersMiddleware;
     public function __construct(Request $request)
     {
         parent::__construct($request);
         $this->setRedirectToURL(current_route());
         $this->useAuth();
     }
    public function index()
    {
        $title = "Tableau de Bord";
        $scripts = [
            sprintf("<script  src='%spublic/js/DashbordPar.js'></script>", rootUrl())
        ];
        $current_usr = $this->user();
        $dm = new Demande();
        $dm = $dm->select("demande")->whereEqual("id_membre", $current_usr->mat_membre)->run();
        //var_dump($dm);
//        var_dump($this->request->hasSession('log_par'));
//        var_dump($_SESSION['log_par']);
                if (!$this->request->hasSession('log_par')){
                    $title="Acceder au Parrainage";
                    $this->load_views('pages.parrainage',compact("title"),false);
        }else{
                    /*var_dump($current_usr->mat_menbre);
                    var_dump($dm->id_membre);*/
                    if ($current_usr->mat_menbre != $dm->id_membre){
                        echo "Seul le demandeur peut se connecter avec ce compte";
                    }else{
                        $this->load_views("parrainage.tableau_bord", compact("title", "scripts"), true);
                    }
                }
//else{
//
//            }
//           /* if ($current_usr->filiere===$dm->filiere){
//
//            }*/
//
//        }
    }
    public function sign_out(){
             $this->request->sessionUnset('log_par');
             var_dump($_POST['deconnecter']);
             //header("location:parrainage");
        echo "ok";
    }

    public function calculeDate(){
        $current_usr = $this->user();
        $dm = new Demande();
        try {
            $dm = $dm->select("demande")->whereEqual("id_membre", $current_usr->mat_membre)->run();
        } catch (\Exception $e) {
        }
        $timetemp = new ConvertibleTimestamp();
        $timetemp->setTimestamp($dm->date);

        $date_actuel = time();
        $date_restante = $this->dateDiff($date_actuel,$timetemp->getTimestamp());
        return $date_restante;
       // var_dump($date_restante);

    }
    private  function dateDiff($date1, $date2)
    {
        $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
        $infos = [];
        $tmp = $diff;
        $infos['second'] = $tmp % 60;
        $tmp = floor(($tmp - $infos['second']) / 60);
        $infos['minute'] = $tmp % 60;
        $tmp = floor(($tmp - $infos['minute']) / 60);
        $infos['hour'] = $tmp % 24;
        $tmp = floor(($tmp - $infos['hour']) / 24);
        $infos['day'] = $tmp;
        return $infos;
    }
    public function initParrainage()
    {
        $current_usr = $this->user();
        $dm = new Demande();
        $dm = $dm->select("demande")->whereEqual("id_membre", $current_usr->mat_membre)->run();
        //var_dump($dm);
        $mb = new User();
        $mb_par = $mb
            ->select("membre")
            ->whereEqual("filiere", $this->recupFilere($dm->filiere, '2'))
            ->andEqual("validation", "vrai")->andEqual("status","parrain")
            ->run(true);
        $mb_fil = $mb
            ->select("membre")
            ->whereEqual("filiere", $this->recupFilere($dm->filiere, '1'))
            ->andEqual("validation", "vrai")->andEqual("status","filleul")
            ->run(true);
        //($mb_par);
        // echo "<br>";
        //var_dump($mb_fil);
        //var_dump(count($mb_fil));
        //var_dump(count($mb_par));
        //echo "<br>";
        $tb_info = $this->equlibrateMenber(count($mb_par), count($mb_fil));
        $decompte =  $this->calculeDate();
        //debug($this->calculeDate());
        //var_dump($decompte);
        $info_parrainage = ["parrain" => $mb_par, "filleul" => $mb_fil, $tb_info, $dm,$decompte];
        //debug($info_parrainage);
        echo json_encode($info_parrainage);

    }

    private function recupFilere($champ, $annee)
    {
        $dt = new \DateTime();
        $dt = $dt->format("Y");
        return $champ . $annee . 'A';
    }

    private function test_val($first, $second)
    {
        if ($first > $second) {
            return "oneMax";
        }

        if ($first < $second) {
            return "secondMax";
        }
    }

    /**
     * @Fonction qui genere un tableau de nombre aleatoire d'une manière très
     * simmple sans prendre en compte de valeur a complèter !
     * @throws \Exception
     */
    private function random_s($nberToRandom)
    {
        //$nberToRandom =$nberToRandom - 1;
        $i = 0;
        $random_i[$i] = random_int(0, $nberToRandom -1);
        while ($i < $nberToRandom) {
            $ver = false;
            $val = random_int(0, $nberToRandom-1);
            for ($j = 0; $j < $i; $j++) {
                if ($random_i[$j] === $val) {
                    $ver = true;
                }
            }
            if (!$ver) {
                $random_i[$i] = $val;
                $i++;
            }
        }
        return $random_i;
    }

    private function equlibrateMenber($nombre_p, $nombre_f)
    {
        $tab_info = [];
        if ($this->test_val($nombre_p, $nombre_f) === "oneMax") {
            $add = ($nombre_p - $nombre_f) + $nombre_f;
            $max = $nombre_p;
            $pos_f = $this->random_c($nombre_f, $add);
            //debug($this->random_c($nombre_f, $add));
            $pos_p = $this->random_s($nombre_p);

        } elseif ($this->test_val($nombre_p, $nombre_f) === "secondMax") {
            $add = ($nombre_f - $nombre_p) + $nombre_p;
            $max = $nombre_f;
            $pos_p = $this->random_c($nombre_p, $add);
            $pos_f = $this->random_s($nombre_f);;
        } else {
            $pos_p = $this->random_s($nombre_p);
            $pos_f = $this->random_s($nombre_f);
            $max = $nombre_f;
        }
        $tab_info = ["tab_aleatoire_p" => $pos_p, "tab_aleatoire_f" => $pos_f, "nbr_tentative" => $max];
        return $tab_info;
    }

    /**
     * @throws \Exception
     */
    private function random_c($nberToRandom, $next)
    {
       // $nberToRandom = $nberToRandom - 1;
        $random_i = $this->random_s($nberToRandom);
        //debug($random_i);
        $k = $i = count($random_i);
        $random_i[$i] = random_int(0, $nberToRandom -1);
        while ($i < $next) {
            $ver = false;
            $val = random_int(0, $nberToRandom-1);
            for ($j = $k; $j < $i; $j++) {
                if ($random_i[$j] === $val) {
                    $ver = true;
                }
            }
            if (!$ver) {
                $random_i[$i] = $val;
                $i++;
            }
        }
        //debug($random_i);
        return $random_i;
    }
}