<?php


namespace Model;


class Demand_Acount extends Model
{
    protected $table="compte_demande";
    protected $primaryKeyStr = "id_cmpt_dmd";
    public function generate_Code(){
        $mac = $_SERVER["REMOTE_ADDR"];
        $dt = new \DateTime();
        $dt = $dt->format('s');
        $u_code = md5($mac.$dt,true);
    }
}