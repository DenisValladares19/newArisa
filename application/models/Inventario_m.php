<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2019
 * Time: 12:34 AM
 */

class Inventario_m extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }


    public function mostrarCompras(){
        $borrado=array(
            'compras.borradoLogico'=>1,
        );
        $this->db->select("compras.idCompras,compras.fecha,compras.subtotal,proveedor.nombre,inventario.nombreInv");
        $this->db->from("compras");
        $this->db->join("proveedor","inventario.nombre proveedor.idProveedor=compras.idProveedor");
        $this->db->join("inventario","inventario.idCompra = compras.idCompras");
        $this->db->where($borrado);
        $this->db->order_by("compras.fecha", "desc");
        $this->db->limit("10");
        $query = $this->db->get();
        return $query->result();
    }


    public function mostrarProductos($id = null){
        $borrado=array(
            'borradoLogico'=>1,
        );
        $this->db->select("*");
        $this->db->from("inventario");
        $this->db->where($borrado);
        if($id!=null){
            $this->db->where("idInventario",$id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function mostrarProveedores(){
        $borrado=array(
            'borradoLogico'=>1,
        );
        $this->db->select("idProveedor,nombre");
        $this->db->from("proveedor");
        $this->db->where($borrado);
        $query = $this->db->get();
        return $query->result();
    }


    public function mostrarProdcuto(){
        $borrado=array(
            'borradoLogico'=>1,
        );
        $this->db->select("idInventario,nombreInv");
        $this->db->from("inventario");
        $this->db->where($borrado);
        $query = $this->db->get();
        return $query->result();
    }


    //Metodo para Agregar Registro
    public function agregarCompras($data){
        $this->db->insert("compras",$data);
        return $this->db->insert_id();
    }

    public function agregarDetalle($data){
        $this->db->insert("detalleinvcompra",$data);
        return $this->db->insert_id();
    }

//Obteniendo datos de la tabla detalle a la Hora de Insertar
    public function mostrarExt($idCompra){
       $compra=array(
            'd.idCompra'=>$idCompra,
        );
        $this->db->select("d.idDetalleInvCompra, d.cantidad, i.nombreInv");
        $this->db->from("detalleinvcompra d");
        $this->db->join("inventario i","d.idInventario = i.idInventario");
        $this->db->where($compra);
        $query = $this->db->get();
        return $query->result();
    }

//Obteniendo datos de la tabla detalle a la Hora de Editar
    public function mostrarEx($id){
        $idDetalle=array(
            'idDetalleInvCompra'=>$id,
        );
        $this->db->select("*");
        $this->db->from("detalleinvcompra");
        $this->db->where($idDetalle);
        $query = $this->db->get();
        return $query->result();
    }

    //Metodo para Modificar Info. Registro Ex.
    public function modificarEx($data,$where)
    {
        $this->db->update("detalleinvcompra",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Ocultar el Registro Ex.
    public function eliminarEx($where)
    {
        $this->db->delete("detalleinvcompra",$where);
        return $this->db->affected_rows();
    }



    //Mostrar Productos Nuevos
    public function mostrarNew($idCompra){
        $compra=array(
            'idCompra'=>$idCompra,
        );
        $this->db->select("*");
        $this->db->from("inventario");
        $this->db->where($compra);
        $query = $this->db->get();
        return $query->result();
    }

    //Mostrar Productos Nuevos Editar
    public function mostrarNuevo($id){
        $inv=array(
            'idInventario'=>$id,
        );
        $this->db->select("*");
        $this->db->from("inventario");
        $this->db->where($inv);
        $query = $this->db->get();
        return $query->result();
    }

    public function agregarNuevo($data){
        $this->db->insert("inventario",$data);
        return $this->db->insert_id();
    }

    //Metodo para Modificar Info. Registro New.
    public function modifiicarNuevo($data,$where)
    {
        $this->db->update("inventario",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Ocultar el Registro New.
    public function eliminarNew($where)
    {
        $this->db->delete("inventario",$where);
        return $this->db->affected_rows();
    }
}