<?php

/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:14
 */

include (APPPATH."controllers/Padre_Desing.php");
class Cotizacion extends Padre_Desing
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Cotizacion_m");
    }

    public function index(){
        $data["title"] = "Cotización";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $tipo['inventario'] = $this->Cotizacion_m->getAllInventario();
        $this->load->view("cotizacion/cotizacion_view",$tipo);
        $this->load->view("layout/footer");
    }
    
    public function getAllEstados(){
        $estados = $this->Cotizacion_m->getAllEstado();
        echo json_encode($estados);
    }
    
    public function getAllCliente(){
        $clientes = $this->Cotizacion_m->getAllCliente();
        echo json_encode($clientes);
    }
    
    public function getAllTipo(){
        $tipo = $this->Cotizacion_m->getAllTipoImpresion();
        echo json_encode($tipo);
    }

    public function getAllCotizacion(){
        $tipo = $this->Cotizacion_m->getAllCotizaciones();
        echo json_encode($tipo);
    }
    
    public function  newMaterial(){
        $id = $this->input->post("id");
        $band = false;
        if(isset($_SESSION["material"])){
           $material2 = $_SESSION["material"];
           foreach ($material2 as $m){
               if(!$this->$id == $m->idMaterial){
                  $band = true;
               }else{
                   $m->cantidad += 1;
                   $_SESSION["material"] = $material2;
               }
           }
            
           if (band) {
                $inv = $this->Cotizacion_m->getAllInventario($id);
                foreach ($inv as $ma) {
                    $material = array(
                        "idMaterial" => $ma->idInventario,
                        "nombre" => $ma->nombre,
                        "desc" => $ma->descripcion,
                        "precio" => $ma->precio,
                        "stock" => $ma->stock,
                        "cantidad" => 1
                    );
                    $material2.array_push($material);
                }
                $_SESSION["material"] = $material2;
            }
            
            echo json_encode($_SESSION["material"]);
        }       
    }
}