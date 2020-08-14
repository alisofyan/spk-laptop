<?php

class SAW extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function createTable($field)
    {
        $fields = array(
            'laptop VARCHAR(100) not null'
        );

        foreach($field as $item => $value) {
            $fields[] = $value['kriteria'].' DECIMAL(13,2) not null ';
        }

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('saw');
    }

    public function deleteTable()
    {
        $this->dbforge->drop_table('saw', TRUE);
    }

    public function insert($data)
    {
        return $this->db->insert('saw', $data);
    }

    public function getAll()
    {
        $query = $this->db->get('saw');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $saw[] = $row;
            }
            return $saw;
        }
    }

    public function getStatus($key)
    {
        $this->db->select('sifat');
        $this->db->where('kriteria',$key);
        $query = $this->db->get('kriteria');
        return $query->row();
    }

    public function update($data, $where)
    {
        $this->db->update('saw',$data,$where);
    }

    public function addColumnTotalRangking()
    {
        $fields = array(
            'Total  DECIMAL(13,2)',
            'Rangking  INT'
        );
        $this->dbforge->add_column('saw', $fields);
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

    public function getSortRangking()
    {
        $this->db->order_by('Rangking', 'ASC');
        $query = $this->db->get('saw');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $dataSaw[] = $row;
            }
            return $dataSaw;
        }
    }
}