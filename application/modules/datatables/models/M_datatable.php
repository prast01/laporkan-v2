<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_datatable extends CI_Model {
 
    // ODP
    private function _get_odp_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'covid', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ",$nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan');
 
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '1']);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                $this->db->where(['kode' => $data->kode_kecamatan]);
            } else {
                $this->db->where(['created_by' => $id_user]);
            }
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            $this->db->order_by('covid', 'asc');
        }
    }
 
    function get_data_odp()
    {
        $this->_get_odp_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_odp()
    {
        $this->_get_odp_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_odp()
    {
        $this->_get_odp_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // OTG
    private function _get_otg_query()
    {
        $column_order = array(null, 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ",$nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_otg');
 
        $this->db->join("tb_user", "tb_otg.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_otg.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_otg.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                $this->db->where(['kode' => $data->kode_kecamatan]);
            } else {
                $this->db->where(['created_by' => $id_user]);
            }
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            $this->db->order_by('covid', 'asc');
        }
    }
 
    function get_data_otg()
    {
        $this->_get_otg_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_otg()
    {
        $this->_get_otg_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_otg()
    {
        $this->_get_otg_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // PDP
    private function _get_pdp_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'rawat', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama', 'nama_user', 'rawat', 'rs'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ",$nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan');
 
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                $this->db->where(['kode' => $data->kode_kecamatan]);
            } else {
                $this->db->where(['created_by' => $id_user]);
            }
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            // $this->db->order_by('covid', 'asc');
        }
    }
 
    function get_data_pdp()
    {
        $this->_get_pdp_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_pdp()
    {
        $this->_get_pdp_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_pdp()
    {
        $this->_get_pdp_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // PDP RS
    private function _get_pdp_rs_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama', 'nama_user', 'rawat', 'rs'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");

        $this->db->from('tb_laporan');
 
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            $this->db->where(['rawat' => $nama_user]);
            $this->db->where(['created_by !=' => $id_user]);
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            // $this->db->order_by('covid', 'asc');
        }
    }
 
    function get_data_pdp_rs()
    {
        $this->_get_pdp_rs_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_pdp_rs()
    {
        $this->_get_pdp_rs_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_pdp_rs()
    {
        $this->_get_pdp_rs_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // COVID
    private function _get_covid_query()
    {
        $column_order = array(null, 'kasus', 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'rawat', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama', 'nama_user', 'rawat', 'rs'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ",$nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan');
 
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                $this->db->where(['kode' => $data->kode_kecamatan]);
            } else {
                $this->db->where(['created_by' => $id_user]);
            }
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }
 
    function get_data_covid()
    {
        $this->_get_covid_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_covid()
    {
        $this->_get_covid_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_covid()
    {
        $this->_get_covid_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // COVID RS
    private function _get_covid_rs_query()
    {
        $column_order = array(null, 'kasus', 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user'); //field yang ada di table user
        $column_search = array('nama_kecamatan','nama_kelurahan','nama', 'nama_user', 'rawat', 'rs'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan');
 
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            $this->db->where(['rawat' => $nama_user]);
            $this->db->where(['created_by !=' => $id_user]);
        }

        $i = 0;
     
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else
        {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }
 
    function get_data_covid_rs()
    {
        $this->_get_covid_rs_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_covid_rs()
    {
        $this->_get_covid_rs_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_covid_rs()
    {
        $this->_get_covid_rs_query();
        $row = $this->db->count_all_results();

        return $row;
    }


}

/* End of file M_datatable.php */
