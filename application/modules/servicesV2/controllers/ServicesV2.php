<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ServicesV2 extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_services');
    }

    public function get_data_cut_off()
    {
        $model = $this->M_services;

        $data = $model->get_cut_off();

        echo json_encode($data);
    }

    public function get_data_kecamatan()
    {
        $model = $this->M_services;
        $data = $model->get_kecamatan();

        echo json_encode($data);
    }

    public function get_data_kelurahan($kode)
    {
        $model = $this->M_services;
        $data = $model->get_kelurahan($kode);

        echo json_encode($data);
    }

    public function get_data_harian()
    {
        $model = $this->M_services;
        $awal = $model->get_first_date();
        $akhir = $model->get_last_date();
        // $tanggal1 = date('Y-m-d', strtotime('2019-03-01'));
        // $tanggal2 = date('Y-m-d', strtotime('2019-03-13'));

        $i = 0;
        while ($awal <= $akhir) {
            $d = $model->get_update_tgl($awal);
            $data[$i]['tanggal'] = $awal;
            $data[$i]['covid'] = $d->konfirmasi_dirawat_baru + $d->konfirmasi_isolasi_baru;
            $data[$i]['sembuh'] = $d->konfirmasi_sembuh_baru;
            $data[$i]['meninggal'] = $d->konfirmasi_meninggal_baru;
            $data[$i]['suspek'] = $d->suspek_dirawat_baru + $d->suspek_isolasi_baru;
            $data[$i]['probable'] = $d->probable_dirawat_baru + $d->probable_isolasi_baru;

            $data[$i]['covid_sum'] = $d->konfirmasi_dirawat + $d->konfirmasi_isolasi;
            $data[$i]['sembuh_sum'] = $d->konfirmasi_sembuh;
            $data[$i]['meninggal_sum'] = $d->konfirmasi_meninggal;
            $data[$i]['suspek_sum'] = $d->suspek_dirawat + $d->suspek_isolasi;
            $data[$i]['probable_sum'] = $d->probable_dirawat + $d->probable_isolasi;

            $awal = date('Y-m-d', strtotime('+1 days', strtotime($awal)));
            $i++;
        }

        echo json_encode($data);
    }

    public function get_data_harian_2()
    {
        $model = $this->M_services;
        $awal = $model->get_first_date();
        $akhir = $model->get_last_date();
        // $tanggal1 = date('Y-m-d', strtotime('2019-03-01'));
        // $tanggal2 = date('Y-m-d', strtotime('2019-03-13'));

        $i = 0;
        while ($awal <= $akhir) {
            $d = $model->get_update_tgl_2($awal);
            $data[$i]['tanggal'] = $awal;
            if ($d->num_rows() > 0) {
                $dt = $d->row();
                $data[$i]['covid'] = $dt->konfirmasi_total;
                $data[$i]['suspek'] = $dt->suspek_total;
                $data[$i]['probable'] = $dt->probable_total;
            } else {
                $data[$i]['covid'] = "0";
                $data[$i]['suspek'] = "0";
                $data[$i]['probable'] = "0";
            }


            $awal = date('Y-m-d', strtotime('+1 days', strtotime($awal)));
            $i++;
        }

        echo json_encode($data);
    }

    public function get_data_gender()
    {
        $model = $this->M_services;
        $data[0] = $model->get_gender('1');
        $data[1] = $model->get_gender('2');

        echo json_encode($data);
    }
}

/* End of file ServicesV2.php */
