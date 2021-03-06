<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Validator\LogParValidator;
use View\View;

class LogParController extends Controller
{
    use RedirectUsersMiddleware;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->setRedirectToURL(current_route());
        $this->useAuth();
    }
    public function parrainage(){
//        $title="Acceder au Parrainage";
//        $this->load_views('pages.parrainage',compact("title"),false);

        if (!$this->request->hasSession('log_par')){
            $title="Acceder au Parrainage";
            $this->load_views('pages.parrainage',compact("title"),false);
        }else{
            return header("location:tabl");
        }
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
            $_SESSION['log_par']=true;
            $title="Tableau de Bord";
            $scripts= [
                sprintf("<script  src='%spublic/js/DashbordPar.js'></script>", rootUrl())
            ];
           // $this->load_views('parrainage.tableau_bord',compact("title","rq","scripts"),true);
            //$this->request->session('log_par',true);
           return header("location:tabl");

        }

    }
}