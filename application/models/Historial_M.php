<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 13/1/2020
 * Time: 08:26
 */

class Historial_M extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function saveHistory($data){
        $this->db->insert('historial', $data);
        return $this->db->insert_id();
    }


    public function getHistorial(){
        $this->db->select("CONCAT(descripcion, ' en fecha ', fecha, ', a las ', hora) as data_historial");
        $this->db->from('historial');

        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function verHistorial($id){
        $this->db->select("*");
        $this->db->from("historial");
        $this->db->where("idOrden",$id);
        $query = $this->db->get();
        return $query->result();
    }


}