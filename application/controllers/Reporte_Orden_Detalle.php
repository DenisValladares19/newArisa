<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 5/2/2020
 * Time: 20:31
 */

include (APPPATH."controllers/Padre_Desing.php");
class Reporte_Orden_Detalle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $data["id"] = $_POST['Orden'];
        $this->load->view("reportes/Reporte_Orden",$data);
    }

}