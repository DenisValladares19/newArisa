<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 27/11/2019
 * Time: 21:28
 */

class Rol_M extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRoles(){
        $this->db->select('*');
        $this->db->from('rol');
        $this->db->where('borradoLogico!=',0);
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function saveRol($data){
        $this->db->insert('rol', $data);
        return $this->db->insert_id();
    }

    public function editRol(){
        $id = $this->input->get("idRol");
        $this->db->where('idRol',$id);
        $query = $this->db->get('rol');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function updateRol($data,$id){

        $this->db->where('idRol',$id);
        $this->db->update('rol',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }

    public function deleteRol($id, $data){
        $this->db->where('idRol',$id);
        $this->db->update('rol',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

}