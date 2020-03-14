<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/1/2020
 * Time: 19:58
 */

include (APPPATH."controllers/Padre_Desing.php");
class Reporte extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
    }

    public function index(){
        $data["title"] = "Reporte - Órdenes";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("reportes/Reporte_View");
        $this->load->view("layout/footer");
    }
}