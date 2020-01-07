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
        $this->db->select("compras.idCompras,compras.fecha,compras.cantidad,compras.subtotal,proveedor.nombreInv,inventario.nombre");
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
        $this->db->select("idProveedor,nombreInv");
        $this->db->from("proveedor");
        $this->db->where($borrado);
        $query = $this->db->get();
        return $query->result();
    }

}