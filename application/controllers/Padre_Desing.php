<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 12/12/2019
 * Time: 16:55
 */

class Padre_Desing extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->driver("cache", array("adapter" => "apc", "backup" => "file"));
        $rol = $this->session->userdata('rol');

        if ($this->session) {
            $logged = $this->session->has_userdata("logged_in");
            if ($logged == false) {
                header("Location:" . site_url("Login"));
            }

        } else {
            header("Location:" . site_url("Login"));
        }

        if ($rol == 'Diseñador' ) {
            //header("Location:" . site_url("Dashboard"));
        }
    }
}