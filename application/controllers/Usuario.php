<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:51
 */


defined("BASEPATH");
include (APPPATH."controllers/New_Padre.php");
class Usuario extends New_Padre
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Usuario_M");
    }

    public function index(){
        $data["title"] = "Usuario";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("usuario/usuario_view");
        $this->load->view("layout/footer");

    }

    public function validarUsuario(){
        $usuario=&$_POST["usuario"];
        $r = $this->Usuario_M->validarUsuario($usuario);
        echo json_encode($r);
    }

    public function showUsers(){
        $result = $this->Usuario_M->getUsers();
        echo json_encode($result);
    }

    public function addUser(){
        $newPass = sha1($_POST["pass"]);
        $config = array("upload_path"=> "./resources/images/uploads", "allowed_types"=>"png|jpg");
        $this->load->library("upload",$config);
        if ($this->upload->do_upload("imagen")){
            $datos= array("upload_data"=> $this->upload->data());
            $data = array("idUser"=>0,
                "nombre"=>$_POST["nombre"],
                "correo"=>$_POST["email"],
                "pass"=>$newPass,
                "idRol"=>$_POST["rol"],
                "borradoLogico"=>1,
                "image"=> $datos["upload_data"]["file_name"]


            );
        }
        else{
            echo $this->upload->display_errors();
        }


        $res = $this->Usuario_M->saveUser($data);
    }

    public function updateUser(){
        $result = $this->Usuario_M->editUser();
        echo json_encode($result);
    }

    public function saveChanges(){
        $data = null;
        $id = $this->input->post('txtId');
        $config = array("upload_path"=> "./resources/images/uploads", "allowed_types"=>"png|jpg");
        $this->load->library("upload",$config);

        if ($this->upload->do_upload("imagenE")){
            $registro = $this->Usuario_M->captureImage($id);
            unlink("./resources/images/uploads/".$registro->image);
            $datos= array("upload_data"=> $this->upload->data());
            $newPass = sha1($_POST["passE"]);
            $data = array(
                "nombre"=>$_POST["nombreE"],
                "correo"=>$_POST["emailE"],
                "pass"=>$newPass,
                "idRol"=>$_POST["rolE"],
                "image"=> $datos["upload_data"]["file_name"]
            );
            $result = $this->Usuario_M->updateUser($data,$id);
            echo json_encode($result);
        }
        else{
            $data = array(
                "nombre"=>$_POST["nombreE"],
                "correo"=>$_POST["emailE"],
                "pass"=>$_POST["passE"],
                "idRol"=>$_POST["rolE"],

            );
            $result = $this->Usuario_M->updateUser($data,$id);
            echo json_encode($result);
        }

    }

    public function eraseUser(){
        $id = $this->input->get('idUser');
        $registro = $this->Usuario_M->captureImage($id);
        unlink("./resources/images/uploads/".$registro->image);
        $data = array(
            "borradoLogico"=>0

        );
        $result = $this->Usuario_M->deleteUser($id, $data);
        echo json_encode($result);
    }

}