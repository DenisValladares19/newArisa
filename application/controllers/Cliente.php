<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:41
 */

class Cliente extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Cliente_M");
    }

    public function index(){
        $data["title"] = "Cliente";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("cliente/cliente_view");
        $this->load->view("layout/footer");

    }

    public function showClients(){
        $result = $this->Cliente_M->getClients();
        echo json_encode($result);
    }

    public function addClient(){
        $data = array("idCliente"=>0,
            "nombre"=>$_POST["nombre"],
            "apellido"=>$_POST["apellido"],
            "empresa"=>$_POST["empresa"],
            "telefono"=>$_POST["telefono"],
            "celular"=>$_POST["telefonoC"],
            "correo"=>$_POST["email"],
            "direccion"=>$_POST["direccion"],
            "registroFiscal"=>$_POST["registroF"],
            "nit"=>$_POST["nit"],
            "borradoLogico"=>1

        );

        $res = $this->Cliente_M->saveClient($data);
    }

    public function updateClient(){
        $result = $this->Cliente_M->editClient();
        echo json_encode($result);
    }

    public function saveChanges(){
        $id = $_POST["idCliente"];
        $data = array(
            "nombre"=>$_POST["nombreE"],
            "apellido"=>$_POST["apellidoE"],
            "empresa"=>$_POST["empresaE"],
            "telefono"=>$_POST["telefonoE"],
            "celular"=>$_POST["telefonoCE"],
            "correo"=>$_POST["emailE"],
            "direccion"=>$_POST["direccionE"],
            "registroFiscal"=>$_POST["registroFE"],
            "nit"=>$_POST["nitE"]

        );
        $result = $this->Cliente_M->updateClient($data,$id);
        echo json_encode($result);
    }

    public function eraseClient(){
        $id = $this->input->get('idCliente');
        $data = array(
            "borradoLogico"=>0,

        );
        $result = $this->Cliente_M->deleteClient($id, $data);
        echo json_encode($result);
    }



    public function mostrarEliminados(){
        $res = $this->Cliente_M->restClientes();
        echo json_encode($res);
    }

    public function restaurar(){
        $id = $this->input->post("id");

        $where=array(
            'idCliente'=>$id,
        );

        $set=array(
            'borradoLogico'=>1,
        );

        $res= $this->Cliente_M->restaurar($set,$where);

        if($res>=0)
        {
            header("Location: ".site_url("Cliente"));
        }

    }


}