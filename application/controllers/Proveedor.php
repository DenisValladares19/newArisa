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
        $datos["proveedor"] = $this->Proveedor_m->getProveedores();
        $this->load->view("proveedor/proveedor_view",$datos);
        $this->load->view("layout/footer");


    }

    public function insertar(){
        $data = array(
            'idProveedor'=>0,
            'nombreInv'=>$this->input->post("txtNombre"),
            'empresa'=>$this->input->post("txtEmpresa"),
            'direccion'=>$this->input->post("txtDireccion"),
            'correo'=>$this->input->post("txtCorreo"),
            'telefono'=>$this->input->post("txtTelefono"),
            'celular'=>$this->input->post("txtCelular"),
            'nit'=>$this->input->post("txtNit"),
            'dui'=>$this->input->post("txtDui"),
            'registroFiscal'=>$this->input->post("txtRegistro"),
            'borradoLogico'=>1,
        );

        $res = $this->Proveedor_m->agregar($data);
        header("Location: ".site_url("Proveedor"));

        if($res>0)
        {
        }
    }

    public function getProveedor(){
        $idProveedor = $this->input->post("id");
        $res = $this->Proveedor_m->getProveedores($idProveedor);
        echo json_encode($res);
    }

    public function modificar(){
        $data = array(
            'nombreInv'=>$this->input->post("txtNombre"),
            'empresa'=>$this->input->post("txtEmpresa"),
            'direccion'=>$this->input->post("txtDireccion"),
            'correo'=>$this->input->post("txtCorreo"),
            'telefono'=>$this->input->post("txtTelefono"),
            'celular'=>$this->input->post("txtCelular"),
            'nit'=>$this->input->post("txtNit"),
            'dui'=>$this->input->post("txtDui"),
            'registroFiscal'=>$this->input->post("txtRegistro"),
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
}