<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 21:52
 */

class Estado2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Estado2_M");
    }

    public function showAllStatus(){
        $result = $this->Estado2_M->getAllStatus();
        echo json_encode($result);
    }

    public function showStatus(){
        $result = $this->Estado2_M->getStatus();
        echo json_encode($result);
    }

    public function showStatus1(){
        $result = $this->Estado2_M->getStatus1();
        echo json_encode($result);
    }

    public function showStatus2(){
        $result = $this->Estado2_M->getStatus2();
        echo json_encode($result);
    }

    public function showStatus3(){
        $result = $this->Estado2_M->getStatus3();
        echo json_encode($result);
    }

}