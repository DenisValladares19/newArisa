<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 12:39
 */

class Usuario_M extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers(){
        $borrado=array(
            'u.borradoLogico'=>1,
        );
        $this->db->select("u.idUser,u.nombre,u.correo,u.image,r.nombre AS nombreRol");
        $this->db->from("usuario u");
        $this->db->join("rol r","r.idRol=u.idRol");
        $this->db->where($borrado);
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function saveUser($data){
        $this->db->insert('usuario', $data);
        return $this->db->insert_id();
    }

    public function editUser(){
        $id = $this->input->get("idUser");
        $this->db->where('idUser',$id);
        $query = $this->db->get('usuario');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function captureImage($id){
        $this->db->select("image");
        $this->db->where("idUser",$id);
        $this->db->from("usuario");
        $result = $this->db->get();
        return $result->row();
    }

    public function updateUser($data,$id){

        $this->db->where('idUser',$id);
        $this->db->update('usuario',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }

    public function deleteUser($id, $data){
        $this->db->where('idUser',$id);
        $this->db->update('usuario',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    public function validarUsuario($user){
        $this->db->select("*");
        $this->db->where("nombre",$user);
        $this->db->from("usuario");
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

}