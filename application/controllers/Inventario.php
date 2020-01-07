<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 21/11/2019
 * Time: 08:42 PM
 */

include (APPPATH."controllers/New_Padre.php");
class Inventario extends New_Padre
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
        $compras["compras"] = $this->Inventario_m->mostrarCompras();
        $compras["inventario"] = $this->Inventario_m->mostrarProductos();
        $compras["proveedor"] = $this->Inventario_m->mostrarProveedores();
        $this->load->view("inventario/inventario_view",$compras);
        $this->load->view("layout/footer");

    }
}