<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 20/1/2020
 * Time: 21:59
 */

class Reporte_Orden_Cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $data["id"] = $_POST['Cliente'];
        $this->load->view("reportes/Reporte_Orden_Cliente",$data);
    }

}