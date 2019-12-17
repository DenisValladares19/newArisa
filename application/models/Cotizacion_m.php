<?php


class Cotizacion_m extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllEstado(){
        $this->db->select("*");
        $this->db->from("estado1");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllCliente(){
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->order_by("cliente.nombre","ASC");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllTipoImpresion(){
        $this->db->select("*");
        $this->db->from("tipoimpresion");
        $this->db->order_by("tipoimpresion.nombre","ASC");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllInventario($id= null){
        $this->db->select("*");
        $this->db->from("inventario");
        if($id!=null){
            $this->db->where("idInventario",$id);
        }
        $this->db->order_by("inventario.nombre","ASC");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllCotizacion(){
        $this->db->select("c.idCotizacion, c.fecha, c.descripcion, cl.idCliente, cl.nombre, cl.apellido, cl.empresa, e.idEstado1, e.nombre as estado, t.nombre AS imprecion");
        $this->db->from("cotizacion c");
        $this->db->join("cliente cl","c.idCliente= cl.idCliente");
        $this->db->join("estado1 e","c.idEstado1=e.idEstado1");
        $this->db->join("tipoimpresion t","c.idTipoImpresion = t.idTipoImpresion");
        $this->db->where("c.borradoLogico",1);
        $this->db->order_by("c.idCotizacion","DESC");
        $query = $this->db->get();
        return $query->result();        
    }
    
    public function insertCotizacion($data){
        $this->db->insert("cotizacion",$data);
        return $this->db->insert_id();
    }
}
