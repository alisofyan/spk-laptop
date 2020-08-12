<?php

class Kriteria extends CI_Model{

    public function getAll()
    {
        $data = $this->db->get('kriteria');
        return $data->result_array();
    }

    public function getBobot()
    {
        $this->db->select('bobot');
        $data = $this->db->get('kriteria');

        return $data->result_array();
    }

    public function getSifat()
    {
        $this->db->select('sifat');
        $data = $this->db->get('kriteria');

        return $data->result_array();
    }

    public function getBobotKriteria()
    {
        $query = $this->db->query('select kriteria, bobot from kriteria');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $bobot[] = $row;
            }
            return $bobot;
        }
    }
}