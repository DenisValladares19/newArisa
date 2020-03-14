<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 6/1/2020
 * Time: 18:39
 */

include (APPPATH."controllers/Padre_Desing.php");
date_default_timezone_set('America/El_Salvador');
class Orden extends Padre_Desing
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Orden_M');
        $this->load->helper("download");
    }

    public function index(){

        $data["title"] = "Orden de Trabajo";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("orden/orden_view");
        $this->load->view("layout/footer");

    }

    public function showOrdenes(){
        $result = $this->Orden_M->getOrdenes();
        echo json_encode($result);
    }

    public function addOrden(){

            $fechaA = date('Y-m-d');
            $data = array("idOrden"=>0,
                "idCotizacion"=>$_POST["idCotiz"],
                "comentarios"=>$_POST["desc"],
                "idMuestra"=>$_POST["idMuestra"],
                "idEstado2"=>$_POST["estado"],
                "fecha"=>$fechaA,
                "borradoLogico"=>1,

            );



        $res = $this->Orden_M->saveOrden($data);
    }

    public function updateOrden(){
        $result = $this->Orden_M->editOrden();
        echo json_encode($result);
    }

    public function saveChanges(){
        $data = null;
        $id = $this->input->post('txtId');

            if($_POST["estadoE"]==3){
                $data = array("idEstado1"=>3);
                $where = array("idCotizacion"=>$_POST["idC"]);
                $res = $this->Orden_M->cambiarEstadoCot($data,$where);
            }

            $data = array(
                "idCotizacion"=>$_POST["idC"],
                "nombre"=>$_POST["ordenE"],
                "comentarios"=>$_POST["descE"],
                "idMuestra"=>$_POST["idM"],
                "idEstado2"=>$_POST["estadoE"],
                "borradoLogico"=>1,

            );
            $result = $this->Orden_M->updateOrden($data,$id);
            echo json_encode($result);


    }

    public function eraseOrden(){
        $id = $this->input->get('idOrden');
       /* $registro = $this->Orden_M->captureImage($id);
        unlink("./resources/files/uploads/".$registro->cArchivo);
       */
        $data = array(
            "borradoLogico"=>0

        );
        $result = $this->Orden_M->deleteOrden($id, $data);
        echo json_encode($result);
    }

    public function download(){

        $id = $this->input->get('idOrden');

        $result = $this->Orden_M->downloadFile($id);



        force_download('./resources/files/uploads/'.$result->cArchivo,null);
    }



    public function mostrarCliente(){
        $res = $this->Orden_M->mostrarCliente();
        echo json_encode($res);
    }


    public function mostrarCotiz(){
        $id=$_POST["idCliente"];
        $res = $this->Orden_M->mostrarCotiz($id);
        echo json_encode($res);
    }

    public function mostrarMuestra(){
        $id=$_POST["idCotiz"];
        $res = $this->Orden_M->mostrarMuestra($id);
        echo json_encode($res);
    }


    public function MostrarUtilizados(){
        $id=$_POST["idOrden"];
        $res = $this->Orden_M->MostrarUtilizados($id);
        echo json_encode($res);
    }

    //Obteniendo datos de la tabla Utilizados a la Hora de Editar
    public function mostrarUt(){
        $id = $_POST["id"];
        $res = $this->Orden_M->mostrarUt($id);
        echo json_encode($res);
    }



    public function insertarUtilizado(){
        $form = $_POST["datosEx"];
        $data = array(
            'idDetalleMaterial'=>0,
            'idOrden'=>$_POST["idOrden"],
            'idInventario'=>$form[0]['value'],
            'cantidad'=>$form[1]['value'],
        );

        $res = $this->Orden_M->insertarUtilizado($data);
        echo json_encode($res);
    }

    public function modifiicarUtilizados(){
        $data = array(
            'idInventario'=>$_POST["selectProdE"],
            'cantidad'=>$_POST["cantidadE"],
        );
        $where=array(
            'idDetalleMaterial'=>$_POST["txtIdExit"],
        );

        $res = $this->Orden_M->modifiicarUtilizados($data,$where);
        echo json_encode($res);
    }

    public function eliminarUtilizado(){
        $where=array(
            'idDetalleMaterial'=>$_POST["id"],
        );

        $res = $this->Orden_M->eliminarUtilizado($where);
        echo json_encode($res);
    }





    public function MostrarDesp(){
        $id=$_POST["idOrden"];
        $res = $this->Orden_M->MostrarDesp($id);
        echo json_encode($res);
    }

    //Obteniendo datos de la tabla Desperdicio a la Hora de Editar
    public function mostrarDespe(){
        $id = $_POST["id"];
        $res = $this->Orden_M->mostrarDespe($id);
        echo json_encode($res);
    }



    public function insertarDesp(){
        $form = $_POST["datosDesp"];
        $data = array(
            'idDesperdicio'=>0,
            'idOrden'=>$_POST["idOrden"],
            'idInventario'=>$form[0]['value'],
            'cantidad'=>$form[1]['value'],
            'comentario'=>$form[2]['value'],
        );

        $res = $this->Orden_M->insertarDesp($data);
        echo json_encode($res);
    }

    public function modifiicarDesp(){
        $data = array(
            'idInventario'=>$_POST["selectProdDE"],
            'cantidad'=>$_POST["cantidadDE"],
            'comentario'=>$_POST["comentarioDE"],
        );
        $where=array(
            'idDesperdicio'=>$_POST["txtIdExit"],
        );

        $res = $this->Orden_M->modifiicarDesp($data,$where);
        echo json_encode($res);
    }

    public function eliminarDesp(){
        $where=array(
            'idDesperdicio'=>$_POST["id"],
        );

        $res = $this->Orden_M->eliminarDesp($where);
        echo json_encode($res);
    }

    public function disminuirStock(){
        $idInv = $_POST["idInventario"];
        $cant = $_POST["cantidad"];
        $this->Orden_M->disminuirStock($idInv,$cant);
    }

    public function print(){
        $idOrden = $_GET["o"];
        $idCotizacion = $_GET["d"];

        $orden = $this->Orden_M->print($idOrden);
        $detalle = $this->Orden_M->printDetalle($idCotizacion);

        $data = array(
            "orden"=> $orden,
            "detalle"=>$detalle
        );

        $this->load->view("orden/reporte",$data);
    }

    public function verficarEstado(){
        $idOrden = $_POST["idOrden"];
        $res = $this->Orden_M->verficarEstado($idOrden);
        echo json_encode($res);
    }

}