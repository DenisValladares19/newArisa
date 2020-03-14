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
        $this->db->select('o.*,c.codigo,m.idMuestra, m.url, e.nombre as nombreE');
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

        $this->db->select('o.*,c.codigo,m.idMuestra, m.url, e.nombre as nombreE');
        $this->db->from('orden o');
        $this->db->join("cotizacion c","o.idCotizacion = c.idCotizacion");
        $this->db->join("muestra m","o.idMuestra = m.idMuestra");
        $this->db->join("estado2 e","o.idEstado2 = e.idEstado2");
        $this->db->where('o.borradoLogico!=',0);
        $this->db->where('o.idOrden=',$id);
        $query = $this->db->get('orden');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }

    }

    public function getStatus($id){


        $this->db->select('o.*,c.codigo,m.idMuestra, m.url, e.nombre as nombreE');
        $this->db->from('orden o');
        $this->db->join("cotizacion c","o.idCotizacion = c.idCotizacion");
        $this->db->join("muestra m","o.idMuestra = m.idMuestra");
        $this->db->join("estado2 e","o.idEstado2 = e.idEstado2");
        $this->db->where('o.borradoLogico!=',0);
        $this->db->where('o.idOrden=',$id);
        $query = $this->db->get('orden');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function captureImage($id){
        $this->db->select("url");
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

    public function mostrarCliente(){
        $borrado=array(
            'borradoLogico'=>1,
        );
        $this->db->select("idCliente,nombre,apellido,empresa");
        $this->db->from("cliente");
        $this->db->where($borrado);
        $query = $this->db->get();
        return $query->result();
    }

    public function mostrarCotiz($id){
        $borrado=array(
            'borradoLogico'=>1,
            "idEstado1"=>1
        );
        $this->db->select("idCotizacion,codigo");
        $this->db->from("cotizacion");
        $this->db->where($borrado);
        if($id!=null){
            $this->db->where("idCliente",$id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function mostrarMuestra($id){
        $borrado=array(
            'borradoLogico'=>1,
            'idEstado1'=>1,
        );
        $this->db->select("idMuestra,url");
        $this->db->from("muestra");
        $this->db->where($borrado);
        if($id!=null){
            $this->db->where("idCotizacion",$id);
        }
        $query = $this->db->get();
        return $query->result();
    }


    public function MostrarUtilizados($id){
            $compra=array(
                'd.idOrden'=>$id,
            );
            $this->db->select("d.idDetalleMaterial, d.idInventario, d.cantidad, i.nombreInv");
            $this->db->from("detallematerial d");
            $this->db->join("inventario i","d.idInventario = i.idInventario");
            $this->db->where($compra);
            $query = $this->db->get();
            return $query->result();
    }

    //Obteniendo datos de la tabla detalle a la Hora de Editar
    public function mostrarUt($id){
        $idDetalle=array(
            'idDetalleMaterial'=>$id,
        );
        $this->db->select("*");
        $this->db->from("detallematerial");
        $this->db->where($idDetalle);
        $query = $this->db->get();
        return $query->result();
    }


    public function insertarUtilizado($data){
        $this->db->insert("detallematerial",$data);
        return $this->db->insert_id();
    }

    //Metodo para Modificar Info. Registro Utilizado.
    public function modifiicarUtilizados($data,$where)
    {
        $this->db->update("detallematerial",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Ocultar el Registro Utilizado.
    public function eliminarUtilizado($where)
    {
        $this->db->delete("detallematerial",$where);
        return $this->db->affected_rows();
    }




    public function MostrarDesp($id){
        $compra=array(
            'd.idOrden'=>$id,
        );
        $this->db->select("d.idDesperdicio,d.comentario, d.cantidad, i.nombreInv");
        $this->db->from("desperdicio d");
        $this->db->join("inventario i","d.idInventario = i.idInventario");
        $this->db->where($compra);
        $query = $this->db->get();
        return $query->result();
    }

    //Obteniendo datos de la tabla detalle a la Hora de Editar
    public function mostrarDespe($id){
        $idDetalle=array(
            'idDesperdicio'=>$id,
        );
        $this->db->select("*");
        $this->db->from("desperdicio");
        $this->db->where($idDetalle);
        $query = $this->db->get();
        return $query->result();
    }


    public function insertarDesp($data){
        $this->db->insert("desperdicio",$data);
        return $this->db->insert_id();
    }

    //Metodo para Modificar Info. Registro Utilizado.
    public function modifiicarDesp($data,$where)
    {
        $this->db->update("desperdicio",$data,$where);
        return $this->db->affected_rows();
    }

    //Metodo para Ocultar el Registro Utilizado.
    public function eliminarDesp($where)
    {
        $this->db->delete("desperdicio",$where);
        return $this->db->affected_rows();
    }

    public function disminuirStock($id, $cant){
        $query = "UPDATE inventario SET stock=(SELECT (stock-$cant)) WHERE idInventario=$id";
        $this->db->query($query);
        return $this->db->affected_rows();
    }

    public function print($id){
        //$query = "SELECT o.*, c.codigo, cl.nombre AS nomCliente, cl.apellido AS apeCliente  FROM orden o JOIN cotizacion c ON o.idCotizacion = c.idCotizacion JOIN cliente cl ON c.idCliente = cl.idCliente WHERE o.borradoLogico !=0 AND O.idOrden=$id";
        
        $this->db->select("o.*, c.codigo, cl.nombre AS nomCliente, cl.apellido AS apeCliente");
        $this->db->from("orden o");
        $this->db->join("cotizacion c", "o.idCotizacion = c.idCotizacion");
        $this->db->join("cliente cl", "c.idCliente = cl.idCliente");
        $this->db->where("o.borradoLogico !=0 AND O.idOrden=$id");
        $query = $this->db->get();
        return $query->result();
    }

    public function printDetalle($id){
        $this->db->select("*");
        $this->db->from("detalleCotizacion");
        $this->db->where(" idCotizacion=$id ");
        $query = $this->db->get();
        return $query->result();
    }

    public function cambiarEstadoCot($data,$where){
        $this->db->update("cotizacion",$data,$where);
        return $this->db->affected_rows();
    }

    public function verficarEstado($id){
        $this->db->select("*");
        $this->db->from("detalleMaterial");
        $this->db->where("idOrden",$id);
        $query = $this->db->get();
        return $query->result();
    }
}