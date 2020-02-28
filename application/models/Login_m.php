<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 3/11/2019
 * Time: 12:42
 */

class Login_m extends CI_Model
{
    private $table="usuario";
    public function __construct()
    {

        parent:: __construct();
    }

    public function getLogin($user, $pass){
        $newPass = sha1($pass);
        $this->db->select("Count(u.idUser) as login, u.idUser, u.nombre as username,u.image, r.nombre");
        $this->db->from("usuario u");
        $this->db->where('u.borradoLogico=',1);
        $this->db->join("rol r", "u.idRol = r.idRol ");
        $this->db->where("u.nombre",$user);
        $this->db->where("u.pass", $newPass);
        $this->db->group_by(array("u.idUser"));
        $query = $this->db->get();
        return $query->row();

    }

    public function array_session($objquery){

        $datasession = array(

            "idUser"=>$objquery->idUser,
            "nombre"=>$objquery->username,
            "rol"=>$objquery->nombre,
            "image"=>$objquery->image,
            "logged_in"=>TRUE

        );

        return $datasession;

    }

    public function login($user, $pass){
        $datos = new stdClass();
        $datos->estado= FALSE;
        $objquery = $this->getLogin($user, $pass);
        if ($objquery!=null){
            if ($objquery->login==1){
                $datos->estado= TRUE;
                $datos->mensaje = "Login Correcto";
            }
        }
        else{
            $datos->estado= FALSE;
            $datos->mensaje = "Login Incorrecto";
        }

        if ($datos->estado==TRUE){
            $arraysession = $this->array_session($objquery);
            $this->session->set_userdata($arraysession);
        }

        return $datos;

    }





}