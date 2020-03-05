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
        $this->load->view("cotizacion/cotizacion_view");
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
    
    public function insertarCotizacion(){
        $idCliente = $_POST["cliente"];
        $fecha = $_POST["fecha"];
        $desc = $_POST['descripcion'];
        $data = array(
            "idCotizacion"=>0,
            "idCliente"=>$idCliente,
            "idEstado1"=>2,
            "fecha"=>$fecha,
            "descripcion"=>$desc,
            "borradoLogico"=>1
        );
        $res = $this->Cotizacion_m->insertCotizacion($data);
        $this->Cotizacion_m->generarCodigo($res);
        echo $res;
    }
  
    public function insertarDesc(){
        $form = $_POST["form"];  
        $desc = $form[0]['value'];
        $cant = $form[1]['value'];
        $total = $form[2]['value'];
        $precio = $total/$cant;
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
            "total"=>$total,
            "borradoLogico"=>1
        );
        $this->Cotizacion_m->insertarDetalle($data2);
    }
    
    public function getAllCotizacion(){
        $res = $this->Cotizacion_m->getAllCotizacion();
        echo json_encode($res);
    }
    //Obteniendo datos de la tabla detalle  
    public function getDescripcion(){
        $idCotizacion = $_POST["idCotizacion"];
        $idDesc = $_POST["idDesc"];
        $res = $this->Cotizacion_m->getDescripcion($idCotizacion,$idDesc);
        //Obteniendo datos de la tabla detalle  
        $res2 = $this->Cotizacion_m->getTablaDescripcion($idDesc);

        $data = array(
            "desc"=>$res,
            "desc2"=>$res2
        );
        echo json_encode($data);
    }

    public function insertarDescripcion(){
        $form = $_POST["form"];
        $desc = $form[0]['value'];
        $cant = $form[1]['value'];
        $total = $form[2]['value'];
        $precio = $total/$cant;
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
        $res = $this->Cotizacion_m->insertarDetalle($data2);
        $this->Cotizacion_m->updateDescripcion($idDesc);
        echo $res;
    }

    public function getDescripcionEdit(){
        $id = $_POST["id"];
        $res = $this->Cotizacion_m->getDescripcionEdit($id);
        echo json_encode($res);
    }

    public function updateDescripcion(){
        $form = $_POST["data"];
        $desc = $form[0]['value'];
        $cant = $form[1]['value'];
        $total = $form[2]['value'];
        $idDetalle = $form[3]['value'];
        $idDesc = $_POST["idDesc"];
        $precio = $total/$cant;

        $data = array(
            "descripcion"=>$desc,
            "cantidad"=>$cant,
            "precio"=>$precio,
            "total"=>$total
        );
        $where = array(
            "idDetalle"=>$idDetalle
        );

        $res = $this->Cotizacion_m->updateDescDetalle($data,$where);
        $this->Cotizacion_m->updateDescripcion($idDesc);
        echo $res;
    }

    public function deleteDescDetalle(){
        $id = $_POST["id"];
        $idDesc = $_POST["idDesc"];
        $this->Cotizacion_m->deleteDescDetalle($id);
        $this->Cotizacion_m->updateDescripcion($idDesc);
    }

    public function deleteCotizacion(){
        $id = $_POST["id"];
        $data = array(
            "borradoLogico"=>2
        );
        $where = array(
            "idCotizacion"=>$id
        );
        $res = $this->Cotizacion_m->deleteCotizacion($data,$where);
        echo $res;
    }

    public function  getCotizacion(){
        $id = $_POST["idCotizacion"];
        $res = $this->Cotizacion_m->getAllCotizacion($id);
        echo json_encode($res);
    }

    public function updateCotizacion(){
        $form = $_POST["form"];
        $idCliente = $form[0]["value"];
        $fecha = $form[1]["value"];
        $idEstado = $form[2]["value"];
        $desc = $form[3]["value"];
        $idCotizacion = $_POST["idCotizacion"];
        $data = array(
            "idCliente"=>$idCliente,
            "idEstado1"=>$idEstado,
            "fecha"=>$fecha,
            "descripcion"=>$desc
        );

        $where = array(
            "idCotizacion"=>$idCotizacion
        );
        $res = $this->Cotizacion_m->updateCotizacion($data,$where);
        echo $res;
    }

    public function reporte(){
        $idCotizacion = $this->input->get("c");
        $idDesc = $this->input->get("d");
        $res = $this->Cotizacion_m->getAllCotizacion($idCotizacion);
        $res2 = $this->Cotizacion_m->getDescripcion($idCotizacion,$idDesc);
        //Obteniendo datos de la tabla detalle  
        $res3 = $this->Cotizacion_m->getTablaDescripcion($idDesc);

        $data = array(
            "desc"=>$res2, 
            "desc2"=>$res3,
            "cot"=>$res
        );
        $this->load->view("cotizacion/reporte",$data);
    }

    public function  updateEstado(){
        $id = $_POST["idCotizacion"];

        $data = array(
            "idEstado1"=>1
        );
        $where = array(
            "idCotizacion"=>$id
        );
        $res = $this->Cotizacion_m->updateEstado($data,$where);
        echo $res;
    }

    public function getUltimoId(){
        $res = $this->Cotizacion_m->getUltimoId();
        echo json_encode($res);
    }
}
