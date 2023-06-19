<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripmen_models extends CI_Model 
{

    public function get_data($table)
    {
      return $this->db->get($table);
    }


    public function get_data_single($where,$table)
    {
        return $this->db->get_where($table,$where); 
    }

    public function get_single_row($table)
    {
        $this->db->select("*");
            $this->db->from($table);
            $query = $this->db->get();
            return $result=$query->row();
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($data, $table,$id,$where)
    {   
        $this->db->where($id , $where);
        $this->db->update($table, $data);
    }

    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function Checkimg($where,$table)
    {
        $query = $this->db->get_where($table,$where);
        return $query->row();
    }

    public function deleteimg($where,$table)
    {
        return $this->db->delete($table,$where);
    }
}
?>