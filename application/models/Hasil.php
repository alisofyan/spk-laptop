<?php

class Hasil extends CI_Model{

    private function simpanProcessor($kd_alternatif)
    {
        $data = array(
            'kd_alternatif' => $kd_alternatif,
            'kd_kriteria' => 1,
            'nilai' => $this->input->post('processor', true)
        );

        return $this->db->insert('hasil', $data);
        
    }

    private function simpanVga($kd_alternatif)
    {
        $data = array(
            'kd_alternatif' => $kd_alternatif,
            'kd_kriteria' => 2,
            'nilai' => $this->input->post('vga', true)
        );

        return $this->db->insert('hasil', $data);
    }

    private function simpanRam($kd_alternatif)
    {
        $data = array(
            'kd_alternatif' => $kd_alternatif,
            'kd_kriteria' => 3,
            'nilai' => $this->input->post('ram', true)
        );

        return $this->db->insert('hasil', $data);
    }

    private function simpanBaterai($kd_alternatif)
    {
        $data = array(
            'kd_alternatif' => $kd_alternatif,
            'kd_kriteria' => 4,
            'nilai' => $this->input->post('baterai', true)
        );

        return $this->db->insert('hasil', $data);
    }

    private function simpanHarga($kd_alternatif)
    {
        $data = array(
            'kd_alternatif' => $kd_alternatif,
            'kd_kriteria' => 5,
            'nilai' => $this->input->post('harga', true)
        );

        return $this->db->insert('hasil', $data);
    }

    public function simpan($kd_alternatif)
    {
        // simpan harga
        $this->simpanHarga($kd_alternatif);

        // simpan vga
        $this->simpanVga($kd_alternatif);

        // simpan ram
        $this->simpanRam($kd_alternatif);

        // simpan processor
        $this->simpanProcessor($kd_alternatif);

        // simpan baterai
        $this->simpanBaterai($kd_alternatif);
    }

    public function getNilai()
    {
        $query = $this->db->query(
            'select u.kd_alternatif, u.nama, k.kd_kriteria, k.kriteria ,n.nilai from alternatif u, hasil n, kriteria k where u.kd_alternatif = n.kd_alternatif AND k.kd_kriteria = n.kd_kriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function delete($id)
    {
        $this->db->where('kd_alternatif', $id);
        return $this->db->delete('hasil');
    }
}