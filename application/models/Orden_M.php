<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 12:39
 */

class Orden_M extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getOrdenes(){
        $this->db->select('o.*,c.idCotizacion,m.idMuestra, m.url, e.nombre as nombreE');
        $this->db->from('orden o');
        $this->db->join("cotizacion c","o.idCotizacion = c.idCotizacion");
        $this->db->join("muestra m","o.idMuestra = m.idMuestra");
        $this->db->join("estado2 e","o.idEstado2 = e.idEstado2");
        $this->db->where('o.borradoLogico!=',0);

        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function saveOrden($data){
        $this->db->insert('orden', $data);
        return $this->db->insert_id();
    }

    public function editOrden(){
        $id = $this->input->get("idOrden");
        $this->db->where('idOrden',$id);
        $query = $this->db->get('orden');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function captureImage($id){
        $this->db->select("cArchivo");
        $this->db->where("idOrden",$id);
        $this->db->from("orden");
        $result = $this->db->get();
        return $result->row();
    }

    public function updateOrden($data,$id){

        $this->db->where('idOrden',$id);
        $this->db->update('orden',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }


    public function downloadFile($id){
        $this->db->select("cArchivo");
        $this->db->from("orden");
        $this->db->where("idOrden",$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function deleteOrden($id, $data){
        $this->db->where('idOrden',$id);
        $this->db->update('orden',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

}