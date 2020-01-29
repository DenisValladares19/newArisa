<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 21/11/2019
 * Time: 08:42 PM
 */

include (APPPATH."controllers/Padre_Desing.php");
class Inventario extends Padre_Desing
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Inventario_m");
    }

    public function index(){

        $data["title"] = "Inventario";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("inventario/inventario_view");
        $this->load->view("layout/footer");

    }

    public function mostrarCompras(){
        $res = $this->Inventario_m->mostrarCompras();
        echo json_encode($res);
    }

    public function mostrarInv(){
        $res = $this->Inventario_m->mostrarProductos();
        echo json_encode($res);
    }

    public function mostrarProv(){
        $res = $this->Inventario_m->mostrarProveedores();
        echo json_encode($res);
    }

    public function mostrarProd(){
        $res = $this->Inventario_m->mostrarProdcuto();
        echo json_encode($res);
    }

    public function insertarCompras(){
            $data = array(
                'idCompras'=>0,
                'fecha'=>$_POST["fecha"],
                'subtotal'=>$_POST["subtotal"],
                'idProveedor'=>$_POST["selectProv"],
                'borradoLogico'=>1,
            );

            $res = $this->Inventario_m->agregarCompras($data);
            echo json_encode($res);
    }


    public function insertarDetalle(){
        $data = array(
            'idDetalleInvCompra'=>0,
            'idCompra'=>$_POST["idCompra"],
            'idInventario'=>$_POST["selectProd"],
            'cantidad'=>$_POST["cantidad"],
            'borradoLogico'=>1,
        );

        $res = $this->Inventario_m->agregarDetalle($data);
        echo json_encode($res);
    }





}