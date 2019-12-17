<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 28/11/2019
 * Time: 21:51
 */

class Estado1_M extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStatus(){
        $query = $this->db->get('estado1');

        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }


}