<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 21/11/2019
 * Time: 20:45
 */

include (APPPATH."controllers/Padre_Vendedor.php");
class Muestra extends Padre_Vendedor
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Muestra_M");
        $this->load->helper("download");
    }

    public function index(){
        $data["title"] = "Muestra";
        $this->load->view("layout/header",$data);
        $this->load->view("layout/sidebar");
        $this->load->view("layout/navbar");
        $this->load->view("muestra/muestra_view");
        $this->load->view("layout/footer");

    }

    public function llenar(){
        $result = $this->Muestra_M->llenar();
        echo json_encode($result);
    }

    public function Agregar(){

        $config = array("upload_path"=> "./resources/files/uploads", "allowed_types"=>"doc|docx|pdf|png|jpg");
        $this->load->library("upload",$config);
        if ($this->upload->do_upload("muestra")){
            $datos= array("upload_data"=> $this->upload->data());
            $newDate = date("Y-m-d");
            $data = array("idMuestra"=>0,
                "idEstado1"=>2,
                "comentarios"=>$_POST["coment"],
                "fecha"=>$newDate,
                "idCotizacion"=>$_POST["cotizacion"],
                "borradoLogico"=>1,
                "idEstado2"=>1,
                "url"=> $datos["upload_data"]["file_name"]
            );
            $res = $this->Muestra_M->insertar($data);
            echo json_encode($res);
        }
        else{
            echo $this->upload->display_errors();
        }
    }



    public function updateSample(){
        $result = $this->Muestra_M->editSample();
        echo json_encode($result);
    }

    public function saveChanges(){
        $data = null;
        $id = $this->input->post('txtId');
        $config = array("upload_path"=> "./resources/files/uploads", "allowed_types"=>"pdf|docx|png|jpg");
        $this->load->library("upload",$config);

        if ($this->upload->do_upload("muestraE")){
            $registro = $this->Muestra_M->captureFile($id);
            unlink("./resources/files/uploads/".$registro->url);
            $datos= array("upload_data"=> $this->upload->data());
            $data = array(
                "idEstado1"=>$_POST["estadoE"],
                "idCotizacion"=>$_POST["cotizacionE"],
                "comentarios"=>$_POST["comentE"],
                "url"=> $datos["upload_data"]["file_name"]
            );
            $result = $this->Muestra_M->updateSample($data,$id);
            echo json_encode($result);
        }
        else{
            $data = array(
                "idEstado1"=>$_POST["estadoE"],
                "comentarios"=>$_POST["comentE"],


            );
            $result = $this->Muestra_M->updateSample($data,$id);
            echo json_encode($result);
        }

    }

    public function download(){

        $id = $this->input->get('idSample');

        $result = $this->Muestra_M->downloadSample($id);



        force_download('./resources/files/uploads/'.$result->url,null);
    }


    public function mostrarCotiz(){
        $res = $this->Muestra_M->mostrarCotizacion();
        echo json_encode($res);
    }

    public function mostrarEstado1(){
        $res = $this->Muestra_M->mostrarEstado1();
        echo json_encode($res);
    }


    public function eraseSample(){
        $id = $this->input->get('idMuestra');
        $registro = $this->Muestra_M->captureFile($id);
        unlink("./resources/files/uploads/".$registro->url);
        $data = array(
            "borradoLogico"=>0

        );
        $result = $this->Muestra_M->deleteSample($id, $data);
        echo json_encode($result);
    }


    public function  modificarEstado(){
        $set = array(
            "idEstado1"=>1
        );
        $where = array(
            'idMuestra'=>$_POST["idM"]
        );
        $res = $this->Muestra_M->modificarEstado($set,$where);

        if($res>=0)
        {
            echo 'si se modifico!';
            //header("Location: ".site_url("Muestra"));
        }else{
            echo 'no se modifico';
        }
    }

}