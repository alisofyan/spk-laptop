<?php

class SubKriteria extends CI_Model{

    private function simpanProcessor()
    {
        $data = array(
            'sub_kriteria' => 'Core i'.$this->input->post('processor', true),
            'value' => $this->input->post('processor', true),
            'kd_kriteria' => 1
        );

        return $this->db->insert('subkriteria', $data);
        
    }

    private function simpanVga()
    {
        $data = array(
            'sub_kriteria' => $this->input->post('vga', true).' GB',
            'value' => $this->input->post('vga', true),
            'kd_kriteria' => 2
        );

        return $this->db->insert('subkriteria', $data);
    }

    private function simpanRam()
    {
        $data = array(
            'sub_kriteria' => $this->input->post('ram', true).' GB',
            'value' => $this->input->post('ram', true),
            'kd_kriteria' => 3
        );

        return $this->db->insert('subkriteria', $data);
    }

    private function simpanBaterai()
    {
        $data = array(
            'sub_kriteria' => $this->input->post('baterai', true).' mAh',
            'value' => $this->input->post('baterai', true),
            'kd_kriteria' => 4
        );

        return $this->db->insert('subkriteria', $data);
    }

    private function simpanHarga()
    {
        $data = array(
            'sub_kriteria' => $this->input->post('harga', true),
            'value' => $this->input->post('harga', true),
            'kd_kriteria' => 5
        );

        return $this->db->insert('subkriteria', $data);
    }

    public function simpan()
    {
        // simpan harga
        $this->simpanHarga();

        // simpan vga
        $this->simpanVga();

        // simpan ram
        $this->simpanRam();

        // simpan processor
        $this->simpanProcessor();

        // simpan baterai
        $this->simpanBaterai();
    }

    public function delete($id)
    {
        $this->db->where('kd_sub_kriteria', $id);
        return $this->db->delete('subkriteria');
    }
}