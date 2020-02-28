<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 22:08
 */

class Cliente_M extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClients(){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('borradoLogico!=',0);
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function saveClient($data){
        $this->db->insert('cliente', $data);
        return $this->db->insert_id();
    }

    public function editClient(){
        $id = $this->input->get("idCliente");
        $this->db->where('idCliente',$id);
        $query = $this->db->get('cliente');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function updateClient($data,$id){

        $this->db->where('idCliente',$id);
        $this->db->update('cliente',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }

    public function deleteClient($id, $data){
        $this->db->where('idCliente',$id);
        $this->db->update('cliente',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    //Metodo para Restaurar Info.
    public function restClientes(){
        $borrado=array(
            'borradoLogico'=>0,
        );
        $this->db->select("*");
        $this->db->from("cliente");
        $this->db->where($borrado);
        $query = $this->db->get();
        return $query->result();
    }

    //Metodo para Mostrar el Registro que estaba Oculto
    public function restaurar($set,$where)
    {
        $this->db->update("cliente",$set,$where);
        return $this->db->affected_rows();
    }
}