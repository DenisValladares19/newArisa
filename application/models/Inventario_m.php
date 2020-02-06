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
       /* $compra=array(
            'idCompra'=>$idCompra,
        );
        $this->db->select("d.cantidad,i.nombreInv");
        $this->db->from("detalleinvcompra d");
        $this->db->join("inventario i","d.idInventario = i.idInventario");
        $this->db->where($compra);
        $query = $this->db->get();
        return $query->result();
        */

        $compra=array(
            'idCompra'=>$idCompra,
        );
        $this->db->select("*");
        $this->db->from("detalleinvcompra");
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

}