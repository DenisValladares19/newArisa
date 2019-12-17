<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:50
 */

defined("BASEPATH");
include (APPPATH."controllers/New_Padre.php");
class Rol extends New_Padre
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Rol_M");
    }

    public function index(){
        $data["title"] = "Rol";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("rol/rol_view");
        $this->load->view("layout/footer");

    }

    public function showRoles(){
        $result = $this->Rol_M->getRoles();
        echo json_encode($result);
    }

    public function addRol(){
        $data = array("idRol"=>0,
            "nombre"=>$_POST["nombre"],
            "borradoLogico"=>1

        );

        $res = $this->Rol_M->saveRol($data);
    }

    public function updateRol(){
        $result = $this->Rol_M->editRol();
        echo json_encode($result);
    }

    public function saveChanges(){
        $id = $this->input->post('txtId');
        $data = array(
            "nombre"=>$_POST["nombreE"],

        );
        $result = $this->Rol_M->updateRol($data,$id);
        echo json_encode($result);
    }

    public function eraseRol(){
        $id = $this->input->get('idRol');
        $data = array(
            "borradoLogico"=>0,

        );
        $result = $this->Rol_M->deleteRol($id, $data);
        echo json_encode($result);
    }


}