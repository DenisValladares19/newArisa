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

    public function showSamples(){
        $result = $this->Muestra_M->getSamples();
        echo json_encode($result);
    }

    public function addSample(){

        $config = array("upload_path"=> "./resources/files/uploads", "allowed_types"=>"docx|pdf|png|jpg");
        $this->load->library("upload",$config);
        if ($this->upload->do_upload("muestra")){
            $datos= array("upload_data"=> $this->upload->data());
            $newDate = date("Y-m-d",strtotime($_POST['fecha']));
            $data = array("idMuestra"=>0,
                "idEstado1"=>$_POST["estado"],
                "comentarios"=>$_POST["coment"],
                "fecha"=>$newDate,
                "borradoLogico"=>1,
                "url"=> $datos["upload_data"]["file_name"]


            );
        }
        else{
            echo $this->upload->display_errors();
        }


        $res = $this->Muestra_M->saveSample($data);
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

}