<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Account;
use Model\Demand_Acount;
use Model\Demande;
use Model\Notification;
use Model\NotificationGlobal;
use Model\Suggestion;
use Model\User;
use Validator\ProfileUpdateValidator;
use View\View;

class ProfileController extends Controller
{
    use RedirectUsersMiddleware;

    /**
     * @var bool|\Model\Account|\Model\User
     */
    private $user;

    /**
     * ProfileController constructor.
     * @param Request $request
     * @throws \Exception
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->useAuth();
        $this->user = $this->user();
        $this->setRedirectToURL(current_route());
    }

    /**
     * @return View
     */
    public function index()
    {
        $title = 'Profile';
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        $user = $this->user;
        $userNumbersOfsubjects = count($user->user()->subjects());
        return $this->load_views('dashbord.profile', compact('title', 'user', 'scripts', 'userNumbersOfsubjects'));
    }
    public function suggestion()
    {
        $title = 'Suggestion';
        $user = $this->user;
        $userNumbersOfsubjects = count($user->user()->subjects());
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        return $this->load_views('dashbord.suggestion', compact('title', 'user', 'scripts', 'userNumbersOfsubjects'));
    }
    public function suggestion_send(){
        $d= new \DateTime('now');
        $d = $d->format('Y:m:d:h:m:s');
      $content =[ "content_suggest"=>htmlspecialchars($_POST['content']),"date_suggest"=>$d,"id_membre"=>$_POST['id_mb']];
       $suggest = new Suggestion();
       $s= $suggest->create($content);
       if ($s){
           echo "ok";
       }else{
           echo "erreur";
       }

    }
    public function validation()
    {
        $title = 'Validation';
        $user = $this->user;
        $userNumbersOfsubjects = count($user->user()->subjects());
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        return $this->load_views('dashbord.validation', compact('title', 'user', 'scripts', 'userNumbersOfsubjects'));
    }
    public function notifications()
    {
        $title = 'Notications';
        $user = $this->user;
        $userNumbersOfsubjects = count($user->user()->subjects());
        $scripts =
            [
                sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
                sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
            ];
        return $this->load_views('dashbord.notif_list', compact('title', 'user', 'scripts', 'userNumbersOfsubjects'));
    }
    public function AllNotifications()
    {
      $notif_perso= new Notification();
      $notif_global = new NotificationGlobal();
      $notif_perso = $notif_perso->select("notification")->whereEqual("destinataire",$this->user->mat_membre)->run(true);
      $notif_global = $notif_global->select("notification_global")->run(true);
      $tab_notif = ["perso"=>$notif_perso,"global"=>$notif_global];
      echo json_encode($tab_notif);
    }
    public function validation_send(){
//        var_dump($_POST);
//        die();
        $demande = new Demand_Acount();
        $usr = new User();
        $demande = $demande->select("compte_demande")->whereEqual("code_dmd",$_POST["content_vld"])->run();
        $tab = ["validation"=>"vrai"];
        //var_dump($demande);
        if ($demande){
           $usr1= $usr->update($tab,$this->user->mat_membre);
         //  var_dump($usr1);
           if ($usr1){
               echo "maj_ok";
           }else{
               echo "maj_done";
           }
        }else{
            echo "erreur";
        }
    }

    /**
     * @param ProfileUpdateValidator $profileUpdateValidator
     * @return bool|View
     * @throws \Exception
     */
    public function profileUpdate(ProfileUpdateValidator $profileUpdateValidator)
    {
        if (Request::isAjax()) {
            $profileUpdateValidator->makeValidate();
            $password = $this->request->password;
            $accountUpdated = false;
            if (!empty($password)) {
                $accountUpdated = $this->doUpdate('updateUserAcountInfo');
            }
            $userInfoUpdated = $this->doUpdate('updateUserPersonaLInfo');
            ($userInfoUpdated || $accountUpdated) ? Request::ajax(['success' => true], 200) : Request::ajax(['success' => false], 200);

        }
        return Request::abort(404);
    }

    /**
     * @return false|int
     * @throws \Exception
     */
    private function updateUserPersonaLInfo()
    {
        $user = new User();
        $path = sprintf('storage/users/%s/', $this->user->identifiant);
        $fileName = $this->user->identifiant;
        $image = (!$this->request->file('user-pic')->asError()) ?
            $this->request->file('user-pic')->save($path, $fileName, true) : '';
        $fields = ['contact', 'email', 'about', 'username'];
        $last_update = '';
        foreach ($fields as $field) {
            if ($this->request->{$field} != '' || $image != '') {
                $last_update = date('Y-m-d H:i:s');
            }
        }
        return $user->update([
            'image' => $image,
            'contact' => $this->request->contact,
            'email' => $this->request->email,
            'username' => $this->request->username,
            'about_me' => $this->request->about,
            'last_update' => $last_update
        ], (int)$this->user->mat_membre);
    }

    /**
     * @return false|int
     */
    private function updateUserAcountInfo()
    {
        $account = new Account();
        return $account->update([
            'mot_pass' => password_hash($this->request->password, PASSWORD_BCRYPT, ['cost' => 12]),
            'last_update' => date('Y-m-d H:i:s')
        ], (int)$this->user->id_compte);
    }

    /**
     * @param string $todo
     * @return false
     */
    private function doUpdate(string $todo)
    {
        if (method_exists($this, $todo)) {
            return $this->$todo();
        }
        return false;
    }

}