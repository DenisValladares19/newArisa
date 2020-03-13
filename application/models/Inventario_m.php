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
        $this->db->select("compras.idCompras,compras.fecha,compras.subtotal,proveedor.nombre");
        $this->db->from("compras");
        $this->db->join("proveedor","proveedor.idProveedor=compras.idProveedor");
        $this->db->where($borrado);
        $this->db->order_by("compras.idCompras", "DESC");
        $this->db->limit("10");
        $query = $this->db->get();
        return $query->result();
    }


    public function mostrarProductos($id = null){
        $borrado=array(
            'i.borradoLogico'=>1,
        );
        $this->db->select("i.idInventario,i.nombreInv,i.precio,i.stock,i.descripcion,p.nombre");
        $this->db->from("inventario i");
        $this->db->join("proveedor p","i.idProveedor=p  .idProveedor");
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


    //Este metodo verifica si existen productos de X Proveedor
    public function validarProdExi($id){
        $this->db->select("*");
        $this->db->where("idProveedor",$id);
        $this->db->from("inventario");
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    //Este metodo verifica si existe producto en detalle
    public function validarDetalle($dataV){
        $this->db->select("*");
        $this->db->where($dataV);
        $this->db->from("detalleinvcompra");
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    public function mostrarProdcuto($id){
    $borrado=array(
        'borradoLogico'=>1,
        'idProveedor'=>$id,
    );
    $this->db->select("idInventario,nombreInv");
    $this->db->from("inventario");
    $this->db->where($borrado);
    $query = $this->db->get();
    return $query->result();
    }

    public function mostrarProds(){
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

    public function agregarDetalle2($cantidad,$idInv,$idCompra){
        $query = "update detalleinvcompra d set cantidad=(select (d.cantidad+$cantidad) where d.idCompra=$idCompra and d.idInventario=$idInv) WHERE d.idCompra=$idCompra and d.idInventario=$idInv";
        $this->db->query($query);
        return $this->db->insert_id();
    }

//Obteniendo datos de la tabla detalle a la Hora de Insertar
    public function mostrarExt($idCompra){
       $compra=array(
            'd.idCompra'=>$idCompra,
        );
        $where=array(
            'd.rol'=>1,
        );
        $this->db->select("d.idDetalleInvCompra, d.cantidad,d.newPrecio, i.nombreInv");
        $this->db->from("detalleinvcompra d");
        $this->db->join("inventario i","d.idInventario = i.idInventario");
        $this->db->where($compra);
        $this->db->where($where);
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
            $this->db->select("*");
            $this->db->from("inventario");
            $this->db->where("idCompra",$idCompra);
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

    //Metodo para Modificar Info. Registro New. y Inv
    public function modifiicarNuevo($data,$where)
    {
        $this->db->update("inventario",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Ocultar el Registro New.
    public function eliminarNew($where,$whereDetalle)
    {
        $this->db->delete("detalleinvcompra",$whereDetalle);
        $this->db->delete("inventario",$where);
        return $this->db->affected_rows();
    }




    //Metodos para Aumentar Inventario


    //Metodo que trae todos los Productos seleccionados
    public function mostrarProdCompra($idCompra){
        $this->db->select("*");
        $this->db->from("detalleinvcompra");
        if($idCompra!=null){
            $this->db->where("idCompra",$idCompra);
        }
        $query = $this->db->get();
        return $query->result();
    }

    //Sacar Existencia
    public function existencia($id){
        $this->db->select("stock");
        $this->db->from("inventario");
        if($id!=null){
            $this->db->where("idInventario",$id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    //Metodo para guardar Existencia
    public function guardarExistencia($data,$where)
    {
        $this->db->update("detalleinvcompra",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Aumentar Stock
    public function aumentarStock($data,$where)
    {
        $this->db->update("inventario",$data,$where);
        return $this->db->affected_rows();
    }

    // metodo actualizar stock 
    public function actualizarStock($idCompra, $idInventario){
        $query = "UPDATE detalleinvcompra SET cantAnterior=(SELECT stock FROM inventario WHERE idInventario=$idInventario) WHERE idCompra=$idCompra";
        $query2 = "UPDATE inventario SET stock=(SELECT (d.cantidad + d.cantAnterior) FROM detalleinvcompra d WHERE d.idInventario= inventario.idInventario AND d.idCompra=$idCompra) WHERE idInventario=$idInventario";
        $query3="update detalleinvcompra d set newPrecio=(select precio from inventario where idInventario=$idInventario) where idCompra=$idCompra and newPrecio=0";
        $query4 = "UPDATE inventario SET precio=(SELECT newPrecio FROM detalleinvcompra d WHERE d.idInventario= inventario.idInventario AND d.idCompra=$idCompra) WHERE idInventario=$idInventario";

        $this->db->query($query);
        $this->db->query($query2);
        $this->db->query($query3);
        $this->db->query($query4);
        return $this->db->affected_rows();
    }


    //Eliminar la Compra
    public function eliminarCompra($where)
    {
        $this->db->delete("compras",$where);
        return $this->db->affected_rows();
    }

    //Eliminar Inv
    public function eliminarInv($data,$where)
    {
        $this->db->update("inventario",$data,$where);
        return $this->db->affected_rows();
    }
}

