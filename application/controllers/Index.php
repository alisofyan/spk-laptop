<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
//  Controller for Main
*/

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alternatif');
        $this->load->model('SubKriteria');
        $this->load->model('Hasil');
        $this->load->model('SAW');
        $this->load->model('Kriteria');
        $this->load->library('session');
    }

    public function index(){
        $data['laptop'] = $this->Alternatif->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan()
    {
        $simpan_alternatif = $this->Alternatif->simpan();

        if ($simpan_alternatif) {
            $simpan_sub_kriteria = $this->SubKriteria->simpan();
            $kd_alternatif = $this->Alternatif->getLastID()->kd_alternatif;
            $simpan_hasil = $this->Hasil->simpan($kd_alternatif);
            if ($simpan_hasil) {
                $this->session->set_flashdata('success', 'Data Berhasil di Simpan.');
                redirect('index');
            } else {
                $this->session->set_flashdata('danger', 'Data Gagal di Simpan.');
            redirect('index');
            } 
        } else {
            $this->session->set_flashdata('danger', 'Data Gagal di Simpan.');
            redirect('index');
        }
    }

    public function hitung()
    {
        $laptop = $this->Alternatif->getAll();

        if ($laptop == null) {
            redirect('index');
        }

        /**
         * hapus table saw
         */
        $this->SAW->deleteTable();

        /**
         * get kriteria
         */
        $kriteria = $this->Kriteria->getAll();

        /**
         * membuat table saw
         */
        $this->SAW->createTable($kriteria);

        /**
         * get value dari sub kriteria
         */
        $dataSaw = $this->initialTableSaw($laptop);

        /**
         * get sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();

        /**
         * get nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */
        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->Kriteria->getBobotKriteria();
        $table3 = $this->getCountByBobot($bobot);
        

        /**
         * Add kolom total dan rangking
         */
        $this->SAW->addColumnTotalRangking();
        

         /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $data['hasil'] = $this->getDataRangking();
        $this->load->view('templates/header', $data);
        $this->load->view('home/hasil', $data);
        $this->load->view('templates/footer', $data);        

    }

    public function hapusSaw()
    {
        $this->SAW->deleteTable();
        redirect('index');
    }

    public function hapusItem($id)
    {
        $this->Hasil->delete($id);
        $this->Alternatif->delete($id);
        redirect('index');
    }

    public function tambahHitung()
    {
        $simpan_alternatif = $this->Alternatif->simpan();
        if ($simpan_alternatif) {
            $simpan_sub_kriteria = $this->SubKriteria->simpan();
            $kd_alternatif = $this->Alternatif->getLastID()->kd_alternatif;
            $simpan_hasil = $this->Hasil->simpan($kd_alternatif);
        }

        $laptop = $this->Alternatif->getAll();

        if ($laptop == null) {
            redirect('index');
        }

        /**
         * hapus table saw
         */
        $this->SAW->deleteTable();

        /**
         * get kriteria
         */
        $kriteria = $this->Kriteria->getAll();

        /**
         * membuat table saw
         */
        $this->SAW->createTable($kriteria);

        /**
         * get value dari sub kriteria
         */
        $dataSaw = $this->initialTableSaw($laptop);

        /**
         * get sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();

        /**
         * get nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */
        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->Kriteria->getBobotKriteria();
        $table3 = $this->getCountByBobot($bobot);
        

        /**
         * Add kolom total dan rangking
         */
        $this->SAW->addColumnTotalRangking();
        

         /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $data['hasil'] = $this->getDataRangking();
        $this->load->view('templates/header', $data);
        $this->load->view('home/hasil', $data);
        $this->load->view('templates/footer', $data);

    }

    private function initialTableSaw($laptop)
    {
        $nilai = $this->Hasil->getNilai();

        $dataInput = array();
        $no = 0;
        foreach ($laptop as $item => $itemLaptop) {
            foreach ($nilai as $index => $itemNilai) {
                if ($itemLaptop->kd_alternatif == $itemNilai->kd_alternatif) {
                    $dataInput[$no]['laptop'] = $itemLaptop->nama;
                    $dataInput[$no][$itemNilai->kriteria] = $itemNilai->nilai;
                }
            }
            $no++;
        }

        foreach ($dataInput as $data => $item) {
            $this->SAW->insert($item);
        }
        return $this->SAW->getAll();
    }

    private function getDataSifat()
    {
        $sawData = $this->SAW->getAll();
        $dataSifat = array();
        foreach ($sawData as $item => $value) {
            foreach ($value as $data => $x) {
                if ($data == 'laptop') {
                    continue;
                }
                $dataSifat[$data] = $this->SAW->getStatus($data);
            }
        }
        return $dataSifat;
    }

    private function getVlueMinMax($dataSifat)
    {
        $sawData = $this->SAW->getAll();
        $dataValueMinMax = array();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'laptop') {
                    continue;
                }
                foreach ($dataSifat as $item => $itemX) {
                    if ($x == $item) {
                        if ($x == $item && $itemX->sifat == 'B') {
                            if (!isset($dataValueMinMax['max' . $x])) {
                                $dataValueMinMax['kriteria'.$x] = $x;
                                $dataValueMinMax['max' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Benefit';
                            } elseif ($z > $dataValueMinMax['max' . $x]) {
                                $dataValueMinMax['max' . $x] = $z;
                            }
                        } else {
                            if (!isset($dataValueMinMax['min' . $x])) {
                                $dataValueMinMax['kriteria'.$x] = $x;
                                $dataValueMinMax['min' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Cost';
                            } elseif ($z < $dataValueMinMax['min' . $x]) {
                                $dataValueMinMax['min' . $x] = $z;
                            }
                        }
                    }
                }
            }
        }
        return $dataValueMinMax;
    }

    private function getCountBySifat($dataSifat, $dataValueMinMax)
    {
        $sawData = $this->SAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'laptop') {
                    continue;
                }
                foreach ($dataSifat as $item => $sifat) {
                    if ($x == $item) {
                        if($sifat->sifat == 'B'){

                            $newData = $z / $dataValueMinMax['max'.$x];
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(

                                'laptop' => $value->laptop
                            );

                            $this->SAW->update($dataUpdate, $where);
                        }else{
                            $newData = $dataValueMinMax['min'.$x] / $z ;
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(

                                'laptop' => $value->laptop
                            );

                            $this->SAW->update($dataUpdate, $where);
                        }
                    }
                }
            }
        }

        return $this->SAW->getAll();
    }

    private function getCountByBobot($bobot)
    {
        $sawData = $this->SAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'laptop') {
                    continue;
                }
                foreach ($bobot as $item => $itemKriteria) {

                    if ($x == $itemKriteria->kriteria) {

                        $sawData[$point]->$x =  $z * $itemKriteria->bobot ;
                        $newData = $z * $itemKriteria->bobot;
                        $dataUpdate = array(
                            $x => $newData
                        );
                        $where = array(
                            'laptop' => $value->laptop
                        );

                        $this->SAW->update($dataUpdate, $where);

                    }
                }
            }
        }

        return $this->SAW->getAll();
    }

    private function countTotal()
    {
        $sawData = $this->SAW->getAll();

        foreach ($sawData as $item => $value) {
            $total = 0;
            foreach ($value as $item => $itemData) {
                if($item == 'laptop'){
                    continue;
                }elseif($item == 'Total'){
                    $dataUpdate = array(
                        'Total'=> $total
                    );

                    $where = array(
                        'laptop' => $value->laptop
                    );

                    $this->SAW->update($dataUpdate, $where);
                }else{
                    $total = $total + $itemData;
                }
            }
        }
    }

    private function getDataRangking()
    {
        $sawData = $this->SAW->getSortTotalByDesc();
        $no = 1;
        foreach ($sawData as $item => $value) {
            $dataUpdate = array(
                'Rangking' => $no
            );
            $where = array(
                'laptop' => $value->laptop
            );

            $this->SAW->update($dataUpdate, $where);
            $no++;
        }
        return $this->SAW->getAll();
    }

    public function getSortTotalByDesc()
    {
        $this->db->order_by('Total', 'DESC');
        $query = $this->db->get('saw');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $dataSaw[] = $row;
            }
            return $dataSaw;
        }
    }
}