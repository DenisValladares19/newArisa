<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 13/1/2020
 * Time: 08:28
 */

include (APPPATH.'controllers/New_Padre.php');
class Historial extends New_Padre
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Historial_M');
        $this->load->model('Orden_M');
        $this->load->model('Estado2_M');

    }


    public function index(){

        $data["title"] = "Historial";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("historial/historial_view");
        $this->load->view("layout/footer");

    }

    public function addHistory()
    {


        $idOrden = $_POST['txtId'];
        $estadoA = $_POST['txtIdEst'];
        $estadoN = $_POST['estadoE'];

        $estadoNameA = $this->Estado2_M->getOneStatus($estadoA);

        $nameStatus = $estadoNameA->nombre;

        $res = $this->Orden_M->getStatus($idOrden);

        $estado = $res->nombreE;


        if ($estadoA != $estadoN) {

            //date_default_timezone_set('America/El_Salvador');
            $fecha = date('m/d/Y g:ia');
            $user = $this->session->userdata('nombre');

            $data = array("idH" => 0,
                "descripcion" => 'El usuario: '.$user.' ha realizado una modificación de estado de la orden, de '.$nameStatus.'  a '.$estado,
                "fecha" => $fecha,
                "idOrden" => $idOrden

            );

            $res = $this->Historial_M->saveHistory($data);

        }
    }

    public function showHistory(){
        $result = $this->Historial_M->getHistorial();
        echo json_encode($result);
    }

    public function verHistorial(){
        $id = $_POST["idOrden"];
        $res = $this->Historial_M->verHistorial($id);
        echo json_encode($res);
    }

}