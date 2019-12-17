<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 22/11/2019
 * Time: 01:32 AM
 */

include (APPPATH."controllers/New_Padre.php");
class Lista_Orden extends New_Padre
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
    }

    public function index(){

        $data["title"] = "Orden de Trabajo";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("orden/listaOrden_view");
        $this->load->view("layout/footer");

    }
}