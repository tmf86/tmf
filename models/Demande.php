<?php


namespace Model;
use Model\User;

class Demande extends Model
{
    protected $table="demande";

    public function generateDemande(){

    }
    public function sendEmail(){

    }
    private function generate_Code(){
        $mac = $_SERVER["REMOTE_ADDR"];
        $dt = new \DateTime();
        $dt = $dt->format('s');
        $u_code = md5($mac.$dt,true);
    }

}