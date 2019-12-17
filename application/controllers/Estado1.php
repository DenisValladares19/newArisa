<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 21:52
 */

class Estado1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Estado1_M");
    }

    public function showStatus(){
        $result = $this->Estado1_M->getStatus();
        echo json_encode($result);
    }

}