<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 18:28
 */

class Muestra_M extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSamples(){
        $this->db->select('m.*,e.nombre');
        $this->db->from('muestra m');
        $this->db->join("estado1 e","m.idEstado1 = e.idEstado1");
        $this->db->where('m.borradoLogico!=',0);

        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function saveSample($data){
        $this->db->insert('muestra', $data);
        return $this->db->insert_id();
    }

    public function downloadSample($id){
        $this->db->select("url");
        $this->db->from("muestra");
        $this->db->where("idMuestra",$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editSample(){
        $id = $this->input->get("idMuestra");
        $this->db->where('idMuestra',$id);
        $query = $this->db->get('muestra');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function captureFile($id){
        $this->db->select("url");
        $this->db->where("idMuestra",$id);
        $this->db->from("muestra");
        $result = $this->db->get();
        return $result->row();
    }

    public function updateSample($data,$id){

        $this->db->where('idMuestra',$id);
        $this->db->update('muestra',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }

    public function deleteSample($id, $data){
        $this->db->where('idMuestra',$id);
        $this->db->update('muestra',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

}