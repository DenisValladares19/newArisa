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

    public function cotizacion(){
        $data["title"] = "Reporte - Cotización";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("reportes/Reporte_cotizacion_view");
        $this->load->view("layout/footer");
    }

    public function cotizacionCliente(){
        $idCliente = $this->input->get("c");
        $data = array("idCliente"=>$idCliente);
        $this->load->view("reportes/Reporte_cotizacion_cliente",$data);
    }

    public function cotizacionRangoFecha(){
        $inicial = $this->input->get("i");
        $final = $this->input->get("f");
        $data = array("inicial"=>$inicial,
            "final"=>$final
        );
        $this->load->view("reportes/Reporte_cotizacion_rango",$data);
    }

    public function cotizacionFecha(){
        $fecha = $this->input->get("f");
        $data = array("fecha"=>$fecha);
        $this->load->view("reportes/Reporte_cotizacion_fecha",$data);
    }
}