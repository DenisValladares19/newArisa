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
        $this->db->order_by("inventario.nombreInv","ASC");
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
    //insercion a la tabla cotizacion primer paso para cotizacion
    public function insertCotizacion($data){
        $this->db->insert("cotizacion",$data);
        return $this->db->insert_id();
    }
    //insercion a tabla descripcion de la cotizacion 
    public function insertarDesc($data){
        $this->db->insert("descripcion",$data);
        return $this->db->insert_id();
    }
    //insercion a tablas detalle entre tablas descripcion y cotizacion 
    public function insertarDetalle($data){
        $this->db->insert("detallecotizacion",$data);
        return $this->db->insert_id();
    }
    //Obtener datos de la tabla detalle 
    public function getDescripcion($idCotizacion, $idDesc){
        $this->db->select("idDetalle, descripcion, cantidad, precio, total");
        $this->db->from("detallecotizacion");
        $this->db->where("idCotizacion",$idCotizacion);
        $this->db->where("idDescripcion",$idDesc);
        $this->db->order_by("idDetalle","ASC");
        $query = $this->db->get();
        return $query->result();
    }
    //Funcion que actualiza los datos de la tabla descripcion dependiento de los datos de la tabla detalle
    public function updateDescripcion($id){
        $query = "UPDATE descripcion SET subtotal=(SELECT SUM(total) FROM detallecotizacion WHERE idDescripcion=$id), iva=((SELECT SUM(total) FROM detallecotizacion WHERE idDescripcion=$id)*0.13), vTotal=((SELECT SUM(total) FROM detallecotizacion WHERE idDescripcion=$id)+((SELECT SUM(total) FROM detallecotizacion WHERE idDescripcion=$id)*0.13)) WHERE idDescripcion=$id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }

    //Obtener datos de la tabla descripcion  
    public function getTablaDescripcion($idDesc){
        $this->db->select("*");
        $this->db->from("descripcion");
        $this->db->where("idDescripcion",$idDesc);
        $query = $this->db->get();
        return $query->result();
    }
}
