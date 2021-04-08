<?php


namespace Contoller;


//use Contoller\Http\Request;
use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsers;
use Model\Demand_Acount;
use Model\Demande;
use Service\Mailer\AccountCreatedMailer;
use Service\Mailer\DemandMailer;
use Validator\DemandeValidator;
use View\View;

//use View\View;


class ParrainageController extends Controller
{
    use RedirectUsers;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }

    public function demande()
    {
        $user = $this->user();
        $title = "Faire une Demande";
        $this->load_views('pages.demande_parrainage', compact("title", "user"), false);
    }

    public function generatDemand()
    {
        //echo "ok";
        $valide_par = new DemandeValidator();
        $valide_par = $valide_par->validateCustermer($this->request->inputs());
        if ($valide_par->fails()) {
            $erreurs = $valide_par->errors()->firstOfAll();
            Request::setErrors($erreurs);
            $title = "Faire une Demande";
            $scripts = [sprintf("<script src='%spublic/js/congrate_demand.js'></script>", rootUrl())];
            return new View("pages.demande_parrainage", compact("title",), false);

        }

        $title = "Faire une Demande";
        $dm = new Demande();
        $usr = $this->user();
        $dm = $dm->create($this->request->inputs());
        $cmpt_dmd = new Demand_Acount();
        $mailer = new DemandMailer($this->demand_cmpt_info($dm));
        $mailer->to($usr->email, $usr->nom . " " . $usr->prenom)->forward();
        $cmpt_dmd = $cmpt_dmd->create($this->demand_cmpt_info($dm));
        return new View("pages.demande_congrate", compact("title"), false);
    }

    private function demand_cmpt_info($dm)
    {
        $cmpt = new Demand_Acount();
        $cmpt = $cmpt->generate_Code();
        $dt = new \DateTime();
        $dt = $dt->format("Y");
        $userName = $this->request->filiere . $dt;
        $mdp = str_shuffle(substr($cmpt, 0, 8));
        var_dump($mdp);
        $id_dmd = $dm->id_demad;
        return $tb_info = [
            "identifiant" => $userName,
            "mdp_cmpt" => $mdp,
            "code_dmd" => $cmpt,
            "id_demande" => $id_dmd
        ];

    }

    public function tableau_de_bord()
    {
        $this->load_views('pages.dashbord_par');
    }
}