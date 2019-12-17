<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 16:22
 */

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Login_m");
    }

    public function index(){

        $logged = $this->session->has_userdata("logged_in");
        if ($logged){
            header("Location:".site_url("dashboard"));
        }else{
            $this->load->view("login/login_view");
        }


    }



    public function login(){
        $username = $_POST["user"];
        $password = $_POST["pass"];

        $res = $this->Login_m->login($username, $password);
        if ($res->estado){

            header("Location:".site_url("dashboard"));

        }
        else{
            header("Location:".site_url("login"));

        }

    }

    public function logOut(){
        $this->session->sess_destroy();
        session_write_close();
        header("Location:".site_url("login"));
    }

}