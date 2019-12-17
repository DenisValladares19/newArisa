<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 15:53
 */

defined("BASEPATH");
include (APPPATH."controllers/Padre.php");
class Dashboard extends Padre
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");

    }


    public function index(){
        $titulo="Dashboard";

        $this->load->view("layout/header");
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("dashboard/index_dashboard",$titulo);
        $this->load->view("layout/footer");

    }

}