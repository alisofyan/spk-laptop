<?php

class Alternatif extends CI_Model{

    public function simpan()
    {
        $data = array(
            'nama' => $this->input->post('merek', true)
        );

        return $this->db->insert('alternatif', $data);
    }

    public function getAll()
    {
        $laptop = array();
        $data = $this->db->get('alternatif');
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $laptop[] = $row;
            }
        }
        return $laptop;
    }

    public function getLastID(){
        $this->db->select('kd_alternatif');
        $this->db->order_by('kd_alternatif', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('alternatif');
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('kd_alternatif', $id);
        return $this->db->delete('alternatif');
    }
}