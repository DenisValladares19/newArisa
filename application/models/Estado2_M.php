<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 21:51
 */

class Estado2_M extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllStatus(){
        $where=array(
            'idEstado2>'=>0,
            'idEstado2<'=>3,
        );

        $this->db->select('idEstado2, nombre');
        $this->db->from('estado2');
        $this->db->where($where);

        $query = $this->db->get();


        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }


    public function getStatus(){

        $this->db->select('idEstado2, nombre');
        $this->db->from('estado2');
        $this->db->where('idEstado2=',1);

        $query = $this->db->get();


        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function getStatus1(){

        $where=array(
            'idEstado2>'=>1,
            'idEstado2<'=>4,
        );


        $this->db->select('idEstado2, nombre');
        $this->db->from('estado2');
        $this->db->where($where);


        $query = $this->db->get();


        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function getStatus2(){

        $this->db->select('idEstado2, nombre');
        $this->db->from('estado2');
        $this->db->where('idEstado2>',2);


        $query = $this->db->get();


        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function getStatus3(){

        $this->db->select('idEstado2, nombre');
        $this->db->from('estado2');
        $this->db->where('idEstado2>',3);


        $query = $this->db->get();


        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }


    public function getOneStatus($id){

        $this->db->where('idEstado2',$id);
        $query = $this->db->get('estado2');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }


}