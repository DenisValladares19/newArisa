<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 20/1/2020
 * Time: 19:39
 */

class Reporte_Orden extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->view("reportes/Reporte_Orden");
    }

}