<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_datatable extends CI_Model
{

    // ODP
    private function _get_odp_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'covid', 'nama_user', 'nakes'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nik', 'nakes', 'nama_user'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('covid', 'asc');
        }
    }

    function get_data_odp()
    {
        $this->_get_odp_query();
        if ($_POST['length'] != -1)
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
        $column_order = array(null, 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user', 'nakes'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nik', 'nakes'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi !=' => '2']);
        $this->db->where(['kondisi' => '3']);
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('tgl_periksa', 'asc');
        }
    }

    function get_data_otg()
    {
        $this->_get_otg_query();
        if ($_POST['length'] != -1)
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


    //Karantina
    private function _get_karantina_query()
    {
        $column_order = array(null, 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'karantina'); //field yang ada di table user
        $column_search = array('nama_kecamatan', 'nama_kelurahan', 'nama', 'karantina'); //field yang diizin untuk pencarian 

        $this->db->from('v_data_karantina');
        $this->db->where(['st' => '0']);
        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('id_pasien_karantina', 'desc');
        }
    }

    function get_data_karantina()
    {
        $this->_get_karantina_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_karantina()
    {
        $this->_get_karantina_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_karantina()
    {
        $this->_get_karantina_query();
        $row = $this->db->count_all_results();

        return $row;
    }


    // PDP
    private function _get_pdp_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user', 'nakes', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nama_user', 'rawat', 'rs', 'nik', 'nakes', 'penyakit'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            // $this->db->order_by('covid', 'asc');
        }
    }

    function get_data_pdp()
    {
        $this->_get_pdp_query();
        if ($_POST['length'] != -1)
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
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user', 'nakes', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nama_user', 'rawat', 'rs', 'nik', 'nakes', 'penyakit'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            // $this->db->order_by('covid', 'asc');
        }
    }

    function get_data_pdp_rs()
    {
        $this->_get_pdp_rs_query();
        if ($_POST['length'] != -1)
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
        $column_order = array(null, 'kasus', 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nakes', 'nama_user', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nama_user', 'rawat', 'rs', 'nik', 'nakes', 'penyakit'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_covid()
    {
        $this->_get_covid_query();
        if ($_POST['length'] != -1)
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
        $column_order = array(null, 'kasus', 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'nama_user', 'nakes', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nama_user', 'rawat', 'rs', 'nik', 'nakes', 'penyakit'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_baru');

        $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_covid_rs()
    {
        $this->_get_covid_rs_query();
        if ($_POST['length'] != -1)
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

    // COVID JATENG
    private function _get_covid_jateng_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'st', 'rs', 'nakes'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'nama_user', 'rawat', 'rs', 'nik', 'nakes'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('tb_laporan_copy');

        $this->db->join("tb_user", "tb_laporan_copy.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan_copy.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan_copy.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->where(['validasi' => '0']);
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
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_covid_jateng()
    {
        $this->_get_covid_jateng_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_covid_jateng()
    {
        $this->_get_covid_jateng_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_covid_jateng()
    {
        $this->_get_covid_jateng_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    public function get_isman($id)
    {
        $data = $this->db->get_where("v_data_karantina", ["id_laporan" => $id]);

        return $data;
    }

    // SWAB
    private function _get_swab_query()
    {
        $column_order = array(null, 'nama', 'umur', 'jekel', 'swab_ke', 'id_lab', 'hasil_swab', 'nama_user', 'tgl_swab', 'tgl_kirim_faskes', 'tgl_kirim_dkk', 'tgl_selesai_dkk'); //field yang ada di table user
        $column_search = array('nama', 'nama_user'); //field yang diizin untuk pencarian 

        $id_user = $this->session->userdata("id_user");

        $this->db->from('v_swab');

        // $this->db->join("tb_user", "tb_swab.created_by = tb_user.id_user");
        // $this->db->join("tb_laporan_baru", "tb_swab.id_laporan = tb_laporan_baru.id_laporan");
        // $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        // $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        // $this->db->where(['tb_swab.created_by' => $id_user]);
        if ($id_user != '2') {
            $this->db->where(['created_by' => $id_user]);
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tgl_kirim_faskes', 'asc');
        }
    }

    function get_data_swab()
    {
        $this->_get_swab_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_swab()
    {
        $this->_get_swab_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_swab()
    {
        $this->_get_swab_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    public function get_lab($id)
    {
        $data = $this->db->get_where("tb_lab", ["id_lab" => $id])->row();

        return $data;
    }

    public function get_penyakit($kdiag)
    {
        $data = $this->db->get_where("tb_penyakit", ["kdiag" => $kdiag])->row();

        return $data;
    }

    // terkonfirmasi
    private function _get_terkonfirmasi_query()
    {
        $column_order = array('kasus', 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'nama_status', 'nakes', 'faskes_akhir', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'faskes_akhir', 'rs', 'nik', 'nakes', 'penyakit', 'nama_status'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('view_data_laporan');

        // $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        // $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        // $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        // $this->db->join("tb_status_2", "tb_laporan_baru.status_baru = tb_status_2.id_status_2");
        // $this->db->join("tb_penyakit", "tb_laporan_baru.penyakit = tb_penyakit.kdiag");
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                if ($_POST['filterByRS'] != '') {
                    $this->db->where(['created_by' => $_POST['filterByRS']]);
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                } else {
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                }
            } else {
                // $this->db->where(['created_by' => $id_user]);
                $this->db->where(['faskes_akhir' => $nama_user]);
            }
        } else {
            if ($_POST['filterByRS'] != '') {
                $this->db->where(['created_by' => $_POST['filterByRS']]);
            }
        }


        if ($_POST['filterByStatus'] != '') {
            $this->db->where(['status_baru' => $_POST['filterByStatus']]);
        } else {
            $this->db->where(['status_baru >=' => '1']);
            $this->db->where(['status_baru <=' => '6']);
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }


        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_terkonfirmasi()
    {
        $this->_get_terkonfirmasi_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_terkonfirmasi()
    {
        $this->_get_terkonfirmasi_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_terkonfirmasi()
    {
        $this->_get_terkonfirmasi_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // probable
    private function _get_probable_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'nama_status', 'nakes', 'faskes_akhir', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'faskes_akhir', 'rs', 'nik', 'nakes', 'penyakit', 'nama_status'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('view_data_laporan');

        // $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        // $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        // $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        // $this->db->join("tb_status_2", "tb_laporan_baru.status_baru = tb_status_2.id_status_2");
        // $this->db->join("tb_penyakit", "tb_laporan_baru.penyakit = tb_penyakit.kdiag");
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                if ($_POST['filterByRS'] != '') {
                    $this->db->where(['created_by' => $_POST['filterByRS']]);
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                } else {
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                }
            } else {
                // $this->db->where(['created_by' => $id_user]);
                $this->db->where(['faskes_akhir' => $nama_user]);
            }
        } else {
            if ($_POST['filterByRS'] != '') {
                $this->db->where(['created_by' => $_POST['filterByRS']]);
            }
        }

        if ($_POST['filterByStatus'] != '') {
            $this->db->where(['status_baru' => $_POST['filterByStatus']]);
        } else {
            $this->db->where(['status_baru >=' => '7']);
            $this->db->where(['status_baru <=' => '12']);
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_probable()
    {
        $this->_get_probable_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_probable()
    {
        $this->_get_probable_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_probable()
    {
        $this->_get_probable_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // suspek
    private function _get_suspek_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'nama_status', 'nakes', 'faskes_akhir', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'faskes_akhir', 'rs', 'nik', 'nakes', 'penyakit', 'nama_status'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('view_data_laporan');

        // $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        // $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        // $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        // $this->db->join("tb_status_2", "tb_laporan_baru.status_baru = tb_status_2.id_status_2");
        // $this->db->join("tb_penyakit", "tb_laporan_baru.penyakit = tb_penyakit.kdiag");
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                if ($_POST['filterByRS'] != '') {
                    $this->db->where(['created_by' => $_POST['filterByRS']]);
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                } else {
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                }
            } else {
                // $this->db->where(['created_by' => $id_user]);
                $this->db->where(['faskes_akhir' => $nama_user]);
            }
        } else {
            if ($_POST['filterByRS'] != '') {
                $this->db->where(['created_by' => $_POST['filterByRS']]);
            }
        }

        if ($_POST['filterByStatus'] != '') {
            $this->db->where(['status_baru' => $_POST['filterByStatus']]);
        } else {
            $this->db->where(['status_baru >=' => '13']);
            $this->db->where(['status_baru <=' => '17']);
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_suspek()
    {
        $this->_get_suspek_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_suspek()
    {
        $this->_get_suspek_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_suspek()
    {
        $this->_get_suspek_query();
        $row = $this->db->count_all_results();

        return $row;
    }

    // kontak
    private function _get_kontak_query()
    {
        $column_order = array(null, 'tgl_periksa', 'nama', 'umur', 'nama_kecamatan', 'nama_kelurahan', 'alamat_domisili', 'no_telp', 'nama_status', 'nakes', 'faskes_akhir', 'penyakit'); //field yang ada di table user
        $column_search = array('nama_kelurahan', 'nama', 'faskes_akhir', 'rs', 'nik', 'nakes', 'penyakit', 'nama_status'); //field yang diizin untuk pencarian 

        $level = $this->session->userdata("level");
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ", $nama_user);
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->from('view_data_laporan');

        // $this->db->join("tb_user", "tb_laporan_baru.created_by = tb_user.id_user");
        // $this->db->join("tb_kecamatan", "tb_laporan_baru.id_kecamatan = tb_kecamatan.id_kecamatan");
        // $this->db->join("tb_kelurahan", "tb_laporan_baru.id_kelurahan = tb_kelurahan.id_kelurahan");
        // $this->db->join("tb_status_2", "tb_laporan_baru.status_baru = tb_status_2.id_status_2");
        // $this->db->join("tb_penyakit", "tb_laporan_baru.penyakit = tb_penyakit.kdiag");
        if ($level != '2') {
            if ($nm[0] == "PKM") {
                if ($_POST['filterByRS'] != '') {
                    $this->db->where(['created_by' => $_POST['filterByRS']]);
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                } else {
                    $this->db->where(['kode' => $data->kode_kecamatan]);
                }
            } else {
                // $this->db->where(['created_by' => $id_user]);
                $this->db->where(['faskes_akhir' => $nama_user]);
            }
        } else {
            if ($_POST['filterByRS'] != '') {
                $this->db->where(['created_by' => $_POST['filterByRS']]);
            }
        }

        if ($_POST['filterByStatus'] != '') {
            $this->db->where(['status_baru' => $_POST['filterByStatus']]);
        } else {
            $this->db->where(['status_baru >=' => '18']);
            $this->db->where(['status_baru <=' => '19']);
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            // $order = $order;
            $this->db->order_by('kasus', 'desc');
        }
    }

    function get_data_kontak()
    {
        $this->_get_kontak_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_kontak()
    {
        $this->_get_kontak_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_kontak()
    {
        $this->_get_kontak_query();
        $row = $this->db->count_all_results();

        return $row;
    }
}

/* End of file M_datatable.php */
