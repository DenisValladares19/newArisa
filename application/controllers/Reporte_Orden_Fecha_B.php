<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 20/1/2020
 * Time: 22:30
 */

class Reporte_Orden_Fecha_B extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $data["fechaFP"] = $_POST['fechaI'];
        $data["fechaIP"] = $_POST['fechaF'];
        $this->load->view("reportes/Reporte_Orden_Fecha_B",$data);
    }

}