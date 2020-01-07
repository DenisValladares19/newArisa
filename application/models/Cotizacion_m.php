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

    public function getAllCotizaciones($id= null){
        $this->db->select("*");
        $this->db->from("cotizacion");


        $query = $this->db->get();
        return $query->result();
    }




}
