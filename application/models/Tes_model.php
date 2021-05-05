<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->database();
    }

    function datatables_tes($id_tes){
        $this->_get_datatables_tes($id_tes);
        if($_POST['length'] -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_tes($id_tes){
        $column_order = array(null, 'nama', 'nilai_listening', 'nilai_structure', 'nilai_reading', null, 'sertifikat', null, null, null, null,); //set column field database for datatable orderable
        $column_search = array('nama', 'sertifikat'); //set column field database for datatable searchable 
        $order = array('nama' => 'asc'); // default order 

        $this->db->from("peserta_toefl");
        $this->db->where("id_tes", $id_tes);

        $i = 0;

        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 

        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered_tes($id_tes){
        $this->_get_datatables_tes($id_tes);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_tes($id_tes){
        $this->db->from("peserta_toefl");
        $this->db->where("id_tes", $id_tes);

        return $this->db->count_all_results();
    }
}

/* End of file Tes_model.php */
