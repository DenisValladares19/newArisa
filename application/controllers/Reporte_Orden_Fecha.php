<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 20/1/2020
 * Time: 22:03
 */

class Reporte_Orden_Fecha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $data["fechaPP"] = $_POST['fecha'];
        $this->load->view("reportes/Reporte_Orden_Fecha",$data);
    }

}