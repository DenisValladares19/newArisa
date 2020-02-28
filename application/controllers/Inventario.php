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
        $id=$_POST["idProveedor"];
        $res = $this->Inventario_m->mostrarProdcuto($id);
        echo json_encode($res);
    }

    public function mostrarProdEdit(){
        $id=$_POST["idProveedor"];
        $res = $this->Inventario_m->mostrarProdcuto($id);
        echo json_encode($res);
    }

    public function insertarCompras(){
            $data = array(
                'idCompras'=>0,
                'fecha'=>$_POST["fecha"],
                'subtotal'=>$_POST["subtotal"],
                'borradoLogico'=>1,
            );

            $res = $this->Inventario_m->agregarCompras($data);
            echo json_encode($res);
    }


//Este metodo verifica si existen productos de X Proveedor
    public function validarProdExi(){
        $id=$_POST["idProveedor"];
        $res = $this->Inventario_m->validarProdExi($id);
        echo json_encode($res);
    }



    public function insertarDetalle(){
        $form = $_POST["datosEx"];

        $cantidad=$form[1]['value'];
        $idCompra=$_POST["idCompra"];
        $idInv=$form[0]['value'];


        $dataV = array(
            'idCompra'=>$_POST["idCompra"],
            'idInventario'=>$form[0]['value']
        );

        $data = array(
            'idDetalleInvCompra'=>0,
            'idCompra'=>$_POST["idCompra"],
            'idInventario'=>$form[0]['value'],
            'cantidad'=>$form[1]['value']
        );



        $resV = $this->Inventario_m->validarDetalle($dataV);

        if($resV==true)
            {
            $res = $this->Inventario_m->agregarDetalle2($cantidad,$idInv,$idCompra);
            echo json_encode($res);
            }
        else
            {
            $res = $this->Inventario_m->agregarDetalle($data);
            echo json_encode($res);
            }

    }



    //Obteniendo datos de la tabla detalle a la Hora de Insertar
    public function mostrarExt(){
        $idCompra = $_POST["idCompra"];
        $res = $this->Inventario_m->mostrarExt($idCompra);

        echo json_encode($res);
    }

    //Obteniendo datos de la tabla detalle a la Hora de Editar
    public function mostrarEx(){
        $id = $_POST["id"];
        $res = $this->Inventario_m->mostrarEx($id);
        echo json_encode($res);
    }


    public function modifiicarDetalle(){
        $data = array(
            'idInventario'=>$_POST["selectProdE"],
            'cantidad'=>$_POST["cantidadE"],
        );
        $where=array(
            'idDetalleInvCompra'=>$_POST["txtIdExit"],
        );

        $res = $this->Inventario_m->modificarEx($data,$where);
        echo json_encode($res);
    }

    public function eliminarEx(){
        $where=array(
            'idDetalleInvCompra'=>$_POST["id"],
        );

        $res = $this->Inventario_m->eliminarEx($where);
        echo json_encode($res);
    }





    //Obteniendo datos de la tabla Inventario a la Hora de Insertar
    public function mostrarNew(){
        $idProveedor = $_POST["idProveedor"];
        $res = $this->Inventario_m->mostrarNew($idProveedor);

        echo json_encode($res);
    }

    //Obteniendo datos de la tabla Inventario a la Hora de Editar
    public function mostrarNuevo(){
        $id = $_POST["id"];
        $res = $this->Inventario_m->mostrarNuevo($id);
        echo json_encode($res);
    }

    public function insertarNuevo(){
        $form = $_POST["datosNew"];
        $data = array(
            'nombreInv'=>$form[0]['value'],
            'precio'=>$form[1]['value'],
            'stock'=>$form[2]['value'],
            'descripcion'=>$form[3]['value'],
            'idProveedor'=>$_POST["idProveedor"],
            'borradoLogico'=>1,
        );

        $res = $this->Inventario_m->agregarNuevo($data);
        echo json_encode($res);
    }

    public function modifiicarNuevo(){
        $data = array(
            'nombreInv'=>$_POST["nombreNuevoE"],
            'precio'=>$_POST["precioNuevoE"],
            'stock'=>$_POST["cantNuevoE"],
            'descripcion'=>$_POST["descNuevoE"],
            'borradoLogico'=>1,
        );
        $where=array(
            'idInventario'=>$_POST["txtIdNew"],
        );

        $res = $this->Inventario_m->modifiicarNuevo($data,$where);
        echo json_encode($res);
    }

    public function eliminarNew(){
        $where=array(
            'idInventario'=>$_POST["id"],
        );

        $res = $this->Inventario_m->eliminarNew($where);
        echo json_encode($res);
    }






    //Metodos para Aumentar Inventario


    //Metodo que trae todos los Productos seleccionados
    public function mostrarProdCompra(){
        $idCompra=$_POST["idCompra"];
        $res = $this->Inventario_m->mostrarProdCompra($idCompra);
        echo json_encode($res);
    }


    //nuevo metodo de actualizar inventario 
    public function actualizarStock(){
        $idCompra = $_POST["idCompra"];
        $idInventario = $_POST["idInventario"];
       // echo var_dump($_POST);
        $this->Inventario_m->actualizarStock($idCompra,$idInventario);
    }



}
