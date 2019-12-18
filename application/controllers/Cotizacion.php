<?php

/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:14
 */

include (APPPATH."controllers/Padre_Desing.php");
class Cotizacion extends Padre_Desing
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Cotizacion_m");
    }

    public function index(){
        $data["title"] = "Cotización";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $tipo['inventario'] = $this->Cotizacion_m->getAllInventario();
        $this->load->view("cotizacion/cotizacion_view",$tipo);
        $this->load->view("layout/footer");
    }
    
    public function getAllEstados(){
        $estados = $this->Cotizacion_m->getAllEstado();
        echo json_encode($estados);
    }
    
    public function getAllCliente(){
        $clientes = $this->Cotizacion_m->getAllCliente();
        echo json_encode($clientes);
    }
    
    public function getAllTipo(){
        $tipo = $this->Cotizacion_m->getAllTipoImpresion();
        echo json_encode($tipo);
    }
    
    public function  newMaterial(){
        $id = $this->input->post("id");
        $inv = $this->Cotizacion_m->getAllInventario($id);
        echo json_encode($inv);          
    }
 public function insertarCotizacion(){
        $idCliente = $_POST["cliente"];
        $fecha = $_POST["fecha"];
        $idTipo = $_POST["tipoImprecion"];
        $idEstado = $_POST["estado"];
        $desc = $_POST['descripcion'];
        $data = array(
            "idCotizacion"=>0,
            "idCliente"=>$idCliente,
            "idEstado1"=>$idEstado,
            "idTipoImpresion"=>$idTipo,
            "fecha"=>$fecha,
            "descripcion"=>$desc,
            "borradoLogico"=>1
        );
        $res = $this->Cotizacion_m->insertCotizacion($data);
        echo $res;
    }
  
    public function insertarDesc(){
        $form = $_POST["form"];
        
        $desc = $form[0]['value'];
        $cant = $form[1]['value'];
        $precio = $form[2]['value'];
        $total = $form[3]['value'];
        $idCotizacion = $_POST["idCotizacion"];
         //Insercion a la tabla descCotizacion 
        $data1 = array(
            "idDescripcion"=>0,
            "subtotal"=>$total,
            "iva"=>($total*0.13),
            "vTotal"=>(($total*0.13)+$total)
        );
        $idDesc = $this->Cotizacion_m->insertarDesc($data1);
        echo $idDesc;
          //Insercion a la tabla detalle 
        $data2 = array(
            "idDetalle"=>0,
            "idDescripcion"=>$idDesc,
            "idCotizacion"=>$idCotizacion,
            "descripcion"=>$desc,
            "cantidad"=>$cant,
            "precio"=>$precio,
            "total"=>$total
        );
        $this->Cotizacion_m->insertarDetalle($data2);
    }
    
    public function getAllCotizacion(){
        $res = $this->Cotizacion_m->getAllCotizacion();
        echo json_encode($res);
    }
    
    public function getDescripcion(){
        $idCotizacion = $_POST["idCotizacion"];
        $idDesc = $_POST["idDesc"];
        $res = $this->Cotizacion_m->getDescripcion($idCotizacion,$idDesc);
        echo json_encode($res);
    }

    public function insertarDescripcion(){
        $form = $_POST["form"];
        $desc = $form[0]['value'];
        $cant = $form[1]['value'];
        $precio = $form[2]['value'];
        $total = $form[3]['value'];
        $idCotizacion = $_POST["idCotizacion"];
        $idDesc = $_POST["idDesc"];

        $data2 = array(
            "idDetalle"=>0,
            "idDescripcion"=>$idDesc,
            "idCotizacion"=>$idCotizacion,
            "descripcion"=>$desc,
            "cantidad"=>$cant,
            "precio"=>$precio,
            "total"=>$total
        );
        $this->Cotizacion_m->insertarDetalle($data2);
    }
    
}
