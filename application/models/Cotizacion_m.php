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
    
    public function getAllCotizacion($id = null){
        $query = "SELECT d.idDetalle, d.idCotizacion, d.idDescripcion, c.fecha, c.descripcion, cl.nombre AS clNombre, cl.apellido AS clApellido, e.nombre AS estado, de.subtotal, de.iva, de.vTotal FROM detallecotizacion d JOIN cotizacion c ON d.idCotizacion = c.idCotizacion JOIN cliente cl ON c.idCliente=cl.idCliente JOIN estado1 e ON c.idEstado1=e.idEstado1 JOIN descripcion de ON de.idDescripcion=d.idDescripcion WHERE c.borradoLogico=1 GROUP BY d.idCotizacion, d.idDescripcion, c.fecha, c.descripcion, cl.nombre, cl.apellido, e.nombre, de.subtotal, de.iva, de.vTotal HAVING COUNT(*)>0 ORDER BY d.idDetalle DESC";
        $this->db->select("d.idDetalle, d.idCotizacion, d.idDescripcion, c.fecha, c.descripcion, c.idCliente, c.idTipoImpresion, c.idEstado1, cl.nombre AS clNombre, cl.apellido AS clApellido, e.nombre AS estado, de.subtotal, de.iva, de.vTotal, t.nombre AS tipo");
        $this->db->from("detallecotizacion d");
        $this->db->join("cotizacion c","d.idCotizacion = c.idCotizacion");
        $this->db->join("cliente cl","c.idCliente=cl.idCliente ");
        $this->db->join("estado1 e","c.idEstado1=e.idEstado1");
        $this->db->join("descripcion de","de.idDescripcion=d.idDescripcion");
        $this->db->join("tipoimpresion t","c.idTipoImpresion = t.idTipoImpresion");
        $this->db->where("c.borradoLogico = 1");
        if($id!=null){
            $this->db->where("c.idCotizacion",$id);
        }
        $this->db->group_by("d.idCotizacion, d.idDescripcion, c.fecha, c.descripcion, cl.nombre, cl.apellido, e.nombre, de.subtotal, de.iva, de.vTotal");
        $this->db->having("COUNT(*)>0");
        $this->db->order_by("d.idDetalle","DESC");
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

    public function getDescripcionEdit($id){
        $this->db->select("*");
        $this->db->from("detallecotizacion");
        $this->db->where("idDetalle",$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateDescDetalle($data,$where){
        $this->db->update("detallecotizacion",$data,$where);
        return $this->db->affected_rows();
    }

    public function deleteDescDetalle($id){
        $this->db->where("idDetalle",$id);
        $this->db->delete("detallecotizacion");
        return $this->db->affected_rows();
    }

    public function deleteCotizacion($data,$where){
        $this->db->update("cotizacion",$data,$where);
        return $this->db->affected_rows();
    }

    public function updateCotizacion($data, $where){
        $this->db->update("cotizacion",$data,$where);
        return $this->db->affected_rows();
    }
}
