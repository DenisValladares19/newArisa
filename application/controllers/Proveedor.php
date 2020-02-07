<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 21/11/2019
 * Time: 11:47 PM
 */

include (APPPATH."controllers/Padre_Desing.php");
class Proveedor  extends Padre_Desing
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Proveedor_m");
    }

    public function index(){

        $data["title"] = "Proveedor";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("proveedor/proveedor_view");
        $this->load->view("layout/footer");
    }


    public function mostrar(){
        $res = $this->Proveedor_m->getProveedores();
        echo json_encode($res);
    }

    public function mostrarEliminados(){
        $res = $this->Proveedor_m->restProveedores();
        echo json_encode($res);
    }

    public function insertar(){
        $data = array(
            'idProveedor'=>0,
            'nombre'=>$_POST["txtNombre"],
            'empresa'=>$_POST["txtEmpresa"],
            'direccion'=>$_POST["txtDireccion"],
            'correo'=>$_POST["txtCorreo"],
            'telefono'=>$_POST["txtTelefono"],
            'celular'=>$_POST["txtCelular"],
            'nit'=>$_POST["txtNit"],
            'registroFiscal'=>$_POST["txtRegistro"],
            'borradoLogico'=>1,
        );

        $res = $this->Proveedor_m->agregar($data);


        if($res>0)
        {
            header("Location: ".site_url("Proveedor"));
        }
    }


    public function getProveedor(){
        $idProveedor = $this->input->post("id");
        $res = $this->Proveedor_m->getProveedores($idProveedor);
        echo json_encode($res);
    }

    public function modificar(){
        $data = array(
            'nombre'=>$this->input->post("txtNombreE"),
            'empresa'=>$this->input->post("txtEmpresaE"),
            'direccion'=>$this->input->post("txtDireccionE"),
            'correo'=>$this->input->post("txtCorreoE"),
            'telefono'=>$this->input->post("txtTelefonoE"),
            'celular'=>$this->input->post("txtCelularE"),
            'nit'=>$this->input->post("txtNitE"),
            'registroFiscal'=>$this->input->post("txtRegistroE"),
        );

        $id=array(
            'idProveedor'=>$this->input->post("txtIdProveedor"),
        );

        $res= $this->Proveedor_m->modificar($id,$data);

        if($res>=0)
        {
            header("Location: ".site_url("Proveedor"));
        }
    }

    public function eliminar(){
        $id = $this->input->post("id");

        $where=array(
            'idProveedor'=>$id,
        );

        $set=array(
            'borradoLogico'=>0,
        );

        $res= $this->Proveedor_m->eliminar($set,$where);

        if($res>=0)
        {
            header("Location: ".site_url("Proveedor"));
        }

    }

    public function restaurar(){
        $id = $this->input->post("id");

        $where=array(
            'idProveedor'=>$id,
        );

        $set=array(
            'borradoLogico'=>1,
        );

        $res= $this->Proveedor_m->restaurar($set,$where);

        if($res>=0)
        {
            header("Location: ".site_url("Proveedor"));
        }

    }
}