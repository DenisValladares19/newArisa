<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 6/1/2020
 * Time: 18:39
 */

include (APPPATH."controllers/Padre_Desing.php");
class Orden extends Padre_Desing
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Orden_M');
        $this->load->helper("download");
    }

    public function index(){

        $data["title"] = "Orden de Trabajo";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("orden/orden_view");
        $this->load->view("layout/footer");

    }

    public function showOrdenes(){
        $result = $this->Orden_M->getOrdenes();
        echo json_encode($result);
    }

    public function addOrden(){

        $config = array("upload_path"=> "./resources/files/uploads", "allowed_types"=>"pdf|docx");
        $this->load->library("upload",$config);
        if ($this->upload->do_upload("archivo")){
            $datos= array("upload_data"=> $this->upload->data());
            $data = array("idOrden"=>0,
                "idCotizacion"=>$_POST["cot"],
                "nombre"=>$_POST["orden"],
                "comentarios"=>$_POST["desc"],
                "tamaño"=>$_POST["tamaño"],
                "idMuestra"=>$_POST["muestra"],
                "idEstado2"=>$_POST["estado"],
                "borradoLogico"=>1,
                "cArchivo"=> $datos["upload_data"]["file_name"]


            );
        }
        else{
            echo $this->upload->display_errors();
        }


        $res = $this->Orden_M->saveOrden($data);
    }

    public function updateOrden(){
        $result = $this->Orden_M->editOrden();
        echo json_encode($result);
    }

    public function saveChanges(){
        $data = null;
        $id = $this->input->post('txtId');
        $config = array("upload_path"=> "./resources/files/uploads", "allowed_types"=>"pdf|docx");
        $this->load->library("upload",$config);

        if ($this->upload->do_upload("archivoE")){
            $registro = $this->Orden_M->captureImage($id);
            unlink("./resources/files/uploads/".$registro->cArchivo);
            $datos= array("upload_data"=> $this->upload->data());
            $data = array(
                "idCotizacion"=>$_POST["cotE"],
                "nombre"=>$_POST["ordenE"],
                "comentarios"=>$_POST["descE"],
                "tamaño"=>$_POST["tamañoE"],
                "idMuestra"=>$_POST["muestraE"],
                "idEstado2"=>$_POST["estadoE"],
                "borradoLogico"=>1,
                "cArchivo"=> $datos["upload_data"]["file_name"]
            );
            $result = $this->Orden_M->updateOrden($data,$id);
            echo json_encode($result);
        }
        else{
            $data = array(
                "idCotizacion"=>$_POST["cotE"],
                "nombre"=>$_POST["ordenE"],
                "comentarios"=>$_POST["descE"],
                "tamaño"=>$_POST["tamañoE"],
                "idMuestra"=>$_POST["muestraE"],
                "idEstado2"=>$_POST["estadoE"],
                "borradoLogico"=>1,


            );
            $result = $this->Orden_M->updateOrden($data,$id);
            echo json_encode($result);
        }

    }

    public function eraseOrden(){
        $id = $this->input->get('idOrden');
        $registro = $this->Orden_M->captureImage($id);
        unlink("./resources/files/uploads/".$registro->cArchivo);
        $data = array(
            "borradoLogico"=>0

        );
        $result = $this->Orden_M->deleteOrden($id, $data);
        echo json_encode($result);
    }

    public function download(){

        $id = $this->input->get('idOrden');

        $result = $this->Orden_M->downloadFile($id);



        force_download('./resources/files/uploads/'.$result->cArchivo,null);
    }

}