<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2019
 * Time: 07:44 PM
 */

class Proveedor_m extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }

    public function getProveedores($id = null){
        $borrado=array(
            'borradoLogico'=>1,
        );
        $this->db->select("*");
        $this->db->from("proveedor");
        $this->db->where($borrado);
        if($id!=null){
            $this->db->where("idProveedor",$id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function agregar($data){
        $this->db->insert("proveedor",$data);
        return $this->db->insert_id();
    }

    public function modificar($where,$data)
    {
        $this->db->update("proveedor",$data,$where);
        return $this->db->affected_rows();
    }

    public function eliminar($set,$where)
    {
        $this->db->update("proveedor",$set,$where);
        return $this->db->affected_rows();
    }
}