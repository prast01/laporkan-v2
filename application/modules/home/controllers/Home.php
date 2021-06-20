<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_home");
  }

  public function index()
  {
    $model = $this->M_home;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");
    $nama = $this->session->userdata("nama_user");
    if ($this->session->userdata('id_user') != '') {
      if ($data['level'] == '2' || $data['level'] == '3') {
        $data['laporan_odp'] = $model->getLaporan("1")->result();
        $data['laporan_pdp'] = $model->getLaporan("2")->result();
        $data['laporan_cvd'] = $model->getCovid()->result();

        $data['laporan_odp_2'] = $model->getLaporanPusk("1")->result();
        $data['laporan_pdp_2'] = $model->getLaporanPusk("2")->result();
        $data['laporan_cvd_2'] = $model->getCovidPusk()->result();

        $data['laporan_odp_3'] = $model->getLaporanRs("1")->result();
        $data['laporan_pdp_3'] = $model->getLaporanRs("2")->result();
        $data['laporan_cvd_3'] = $model->getCovidRs()->result();

        $api = $model->getApi();
        $data['tgl_update'] = $api['tgl_update'];
        $data['odp'] = $api['odp'];
        $data['pdp'] = $api['pdp'];
        $data['covid'] = $api['covid'];
        $this->template('dashboard', $data);
      } elseif ($data['level'] == '4') {
        $faskes = $model->getFaskes($nama);
        $data['nama_faskes'] = $faskes['nama_faskes'];
        $api = $model->getApi2($faskes['id_faskes']);
        $data['tgl_update'] = $api['tgl_update'];
        $data['odp'] = $api['odp'];
        $data['pdp'] = $api['pdp'];
        $data['covid'] = $api['covid'];
        $this->template('tes2', $data);

        // echo $faskes['id_faskes'];

      } elseif ($data['level'] == '1') {
        $data['kecamatan'] = $model->getKecamatan()->result();
        $this->template('dashboard2', $data);
      } elseif ($data['level'] == '5') {
        redirect('../data', 'refresh');
      } elseif ($data['level'] == '6') {
        redirect('../pp', 'refresh');
      }
    } else {
      redirect('../', 'refresh');
    }
  }

  public function tes()
  {
    $model = $this->M_home;
    // $model->updateKel();
  }

  public function faskes()
  {
    $model = $this->M_home;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");
    $data['faskes'] = $model->getPelapor()->result();
    if ($this->session->userdata('id_user') != '') {
      $this->template('dashboard3', $data);
    } else {
      redirect('../', 'refresh');
    }
  }

  public function tempat_tidur()
  {
    $model = $this->M_home;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");
    $data['faskes'] = $model->getPelapor2()->result();
    if ($this->session->userdata('id_user') != '') {
      $this->template('dashboard4', $data);
    } else {
      redirect('../', 'refresh');
    }
  }

  public function modal($id)
  {
    $model = $this->M_home;
    $data['level'] = $this->session->userdata("level");
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['kondisi'] = $id;
    $data['rs'] = $model->getPelapor2()->result();
    $data['created_by'] = $this->session->userdata('id_user');
    $this->load->view('modal-add', $data);
  }

  public function modal2($id)
  {
    $model = $this->M_home;
    $data['level'] = $this->session->userdata("level");
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $data['rs'] = $model->getPelapor2()->result();
    if ($data['laporan']->penyakit != '') {
      $data['penyakit'] = $model->get_penyakit($data['laporan']->penyakit);
    }
    $this->load->view('modal-edit', $data);
  }

  public function modal3($id)
  {
    $model = $this->M_home;

    $data['laporan'] = $model->getLaporanBy($id);
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $data['rs'] = $model->getPelapor2()->result();
    $this->load->view('modal-valid', $data);
  }

  public function modal4($id)
  {
    $model = $this->M_home;

    $data['kecamatan'] = $model->getKecamatanBy($id);
    $data['laporan_odp'] = $model->getLaporan2("1", $id)->result();
    $data['laporan_pdp'] = $model->getLaporan2("2", $id)->result();
    $this->load->view('modal-view', $data);
  }

  public function modal5($id)
  {
    $model = $this->M_home;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['kondisi'] = $id;
    $data['laporan_odp'] = $model->getLaporan3($id, $data['id_user'])->result();
    $data['laporan_pdp'] = $model->getLaporan3($id, $data['id_user'])->result();
    $this->load->view('modal-view2', $data);
  }

  public function modal6($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $data['rs'] = $model->getFaskesLuarByKota($data['laporan']->kota);
    $data['kota'] = $model->getKota();
    $this->load->view('modal-rujuk', $data);
  }

  public function modal7($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $data['rs'] = $model->getPelapor2()->result();
    $this->load->view('modal-pdp', $data);
  }

  public function add()
  {
    $model = $this->M_home;

    $hasil = json_decode($model->save(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }

    if ($hasil['kondisi'] == '1' || $hasil['kondisi'] == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function edit($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->edit($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($hasil['kondisi'] == '1' || $hasil['kondisi'] == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function hapus($id, $kondisi)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->delete($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($kondisi == '1' || $kondisi == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function positif($id, $kondisi)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->positif($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($kondisi == '1' || $kondisi == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function negatif($id, $kondisi)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->negatif($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($kondisi == '1' || $kondisi == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function meninggal($id, $kondisi)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->meninggal($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($kondisi == '1' || $kondisi == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function sembuh($id, $kondisi)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->sembuh($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    if ($kondisi == '1' || $kondisi == '4') {
      redirect('../odp', 'location');
    } else {
      redirect('../pasien', 'location');
    }
  }

  public function sendPDP($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->sendPDP($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }

    redirect('../odp', 'location');
  }

  public function gantiPassword()
  {
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");
    if ($this->session->userdata('id_user') != '') {
      $this->template('password', $data);
    } else {
      redirect('../', 'refresh');
    }
  }

  public function changePass()
  {
    $model = $this->M_home;
    $id_user = $this->session->userdata('id_user');
    $hasil = json_decode($model->changePass($id_user), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../dashboard', 'location');
  }


  public function updateData()
  {
    $model = $this->M_home;
    $hasil = json_decode($model->updateAll(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    // redirect('../home','location');
    // redirect('http://localhost/update-peta/','location');
    redirect('http://dinkes.mi-kes.net/update-peta/', 'location');
  }

  public function updateData2()
  {
    $model = $this->M_home;
    $hasil = json_decode($model->updateAll2(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    // redirect('../home','location');
    // redirect('http://localhost/update-peta/','location');
    redirect('http://dinkes.mi-kes.net/update-peta', 'location');
  }

  public function updateDataCrowl()
  {
    $model = $this->M_home;
    $data['data'] = json_decode($model->updateAll3(), true);
    $this->load->view('crowl', $data);
    // print_r($data);
  }

  public function rujuk($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->rujuk($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../pasien', 'location');
  }

  public function faskes_luar()
  {
    $model = $this->M_home;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");
    $data['faskes_luar'] = $model->getFaskesLuar();
    if ($this->session->userdata('id_user') != '') {
      $this->template('faskes_luar', $data);
    } else {
      redirect('../', 'refresh');
    }
  }
  public function modal8()
  {
    $model = $this->M_home;
    $this->load->view('modal-faskes-add');
  }
  public function modal9($id)
  {
    $model = $this->M_home;
    $data['faskes'] = $model->getFaskesLuarById($id);
    $this->load->view('modal-faskes-edit', $data);
  }

  public function add_faskes()
  {
    $model = $this->M_home;

    $hasil = json_decode($model->add_faskes(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    }
  }
  public function edit_faskes($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->edit_faskes($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    }
  }
  public function del_faskes($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->del_faskes($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
      redirect('../home/faskes_luar', 'location');
    }
  }

  public function modal10($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['hubungan'] = $model->get_hubungan();
    $data['jenis_kontak'] = $model->get_jenis_kontak();
    $this->load->view('modal-tracing', $data);
  }

  public function tracing()
  {
    $model = $this->M_home;
    $id_laporan = $_POST['id_laporan'];
    $tracing = json_decode($_POST['tracing'], true);
    $remove_tracing = json_decode($_POST['remove_tracing'], true);

    if (count($remove_tracing) > 0) {
      $model->removeTracing($id_laporan);
      foreach ($remove_tracing as $key => $row) {
        if ($row['tipe'] == '4') {
          $model->delete_otg($row['id']);
        }
      }
    }

    if (count($tracing) > 1) {
      foreach ($tracing as $key => $row) {
        $data = array(
          "id_laporan" => $id_laporan,
          "id" => $row['id'],
          "nik" => $row['nik'],
          "nama" => $row['nama'],
          "umur" => $row['umur'],
          "jekel" => $row['id_jekel'],
          "wn" => $row['wn'],
          "no_telp" => $row['no_telp'],
          "id_kecamatan" => $row['id_kecamatan'],
          "id_kelurahan" => $row['id_kelurahan'],
          "alamat_domisili" => $row['alamat_domisili'],
          "tipe" => $row['tipe'],
          "id_hubungan" => $row['id_hubungan'],
          "id_jenis_kontak" => $row['id_jenis_kontak']
        );
        if ($row['id'] == null) {
          $dt = json_decode($model->save_otg_tracing($data), true);

          $data2 = array(
            "id_laporan" => $id_laporan,
            "id" => $dt['id'],
            "tipe" => $row['tipe'],
            "id_hubungan" => $row['id_hubungan'],
            "id_jenis_kontak" => $row['id_jenis_kontak']
          );
          $model->save_tracing($data2);
        } else {
          $model->save_tracing($data);
        }
      }
    } else {
      $row = $tracing[0];
      $data = array(
        "id_laporan" => $id_laporan,
        "id" => $row['id'],
        "nik" => $row['nik'],
        "nama" => $row['nama'],
        "umur" => $row['umur'],
        "jekel" => $row['id_jekel'],
        "wn" => $row['wn'],
        "no_telp" => $row['no_telp'],
        "id_kecamatan" => $row['id_kecamatan'],
        "id_kelurahan" => $row['id_kelurahan'],
        "alamat_domisili" => $row['alamat_domisili'],
        "tipe" => $row['tipe'],
        "id_hubungan" => $row['id_hubungan'],
        "id_jenis_kontak" => $row['id_jenis_kontak']
      );
      if ($row['id'] == null) {
        $dt = json_decode($model->save_otg_tracing($data), true);

        $data2 = array(
          "id_laporan" => $id_laporan,
          "id" => $dt['id'],
          "tipe" => $row['tipe'],
          "id_hubungan" => $row['id_hubungan'],
          "id_jenis_kontak" => $row['id_jenis_kontak']
        );

        if ($data2['id'] != '') {
          $model->save_tracing($data2);
        }

        echo $model->save_otg_tracing($data);
      } else {
        $model->save_tracing($data);
      }
    }
  }

  public function modal11()
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['created_by'] = $this->session->userdata('id_user');
    $this->load->view('modal-add-otg', $data);
  }

  public function modal12($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['otg'] = $model->getOtgBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['otg']->id_kecamatan);
    $this->load->view('modal-edit-otg', $data);
  }

  public function modal13($id)
  {
    $model = $this->M_home;
    $data['level'] = $this->session->userdata("level");
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $data['rs'] = $model->getPelapor2()->result();

    if ($data['laporan']->penyakit != '') {
      $data['penyakit'] = $model->get_penyakit($data['laporan']->penyakit);
    }
    $this->load->view('modal-detail', $data);
  }

  public function modal14($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['otg'] = $model->getOtgBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['otg']->id_kecamatan);
    $this->load->view('modal-detail-otg', $data);
  }

  public function modal15($id)
  {
    $model = $this->M_home;
    $data['level'] = $this->session->userdata("level");
    $data['laporan'] = $model->getLaporanBy($id);
    $data['id'] = $id;
    $this->load->view('modal-swab', $data);
  }

  public function add_otg()
  {
    $model = $this->M_home;

    $hasil = json_decode($model->save_otg(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }

    redirect('../odp', 'location');
  }

  public function edit_otg($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->edit_otg($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../odp', 'location');
  }

  public function hapus_otg($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->delete_otg($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../odp', 'location');
  }

  public function add_swab()
  {
    $model = $this->M_home;
    $hasil = json_decode($model->save_swab(), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../pasien', 'location');
  }

  public function modal_rdt($id)
  {
    $model = $this->M_home;
    $data['kecamatan'] = $model->getKecamatan()->result();
    $data['laporan'] = $model->getLaporanBy($id);
    $data['kelurahan'] = $model->getKelurahanBy($data['laporan']->id_kecamatan);
    $this->load->view('modal-rdt', $data);
  }

  public function add_rdt()
  {
    $model = $this->M_home;
    $rdt = json_decode($_POST['rdt'], true);
    $remove_rdt = json_decode($_POST['remove_rdt'], true);
    $id_laporan = $_POST['id_laporan'];
    $covid = $_POST['covid'];
    $lokasi = $_POST['lokasi'];

    if (count($remove_rdt) > 0) {
      $model->remove_rdt($id_laporan);
      if (count($rdt) > 1) {
        foreach ($rdt as $key => $row) {
          $tgl = $row['tgl_rdt'];
          $hsl = $row['id_hasil_rdt'];
          $lokasi = $row['lokasi_rdt'];
          // $form_input = $row['is_form_input'];
          // if ($form_input) {
          $model->save_rdt($id_laporan, $tgl, $hsl, $lokasi);
          // }
          // $model->changeStatus($id_laporan, $covid, $hsl);
        }
      } else {
        $row = $rdt[0];
        $tgl = $row['tgl_rdt'];
        $hsl = $row['id_hasil_rdt'];
        $lokasi = $row['lokasi_rdt'];
        $form_input = $row['is_form_input'];
        // if ($form_input) {
        $model->save_rdt($id_laporan, $tgl, $hsl, $lokasi);
        // $model->changeStatus($id_laporan, $covid, $hsl);
        // }
      }
    } else {
      if (count($rdt) > 1) {
        foreach ($rdt as $key => $row) {
          $tgl = $row['tgl_rdt'];
          $hsl = $row['id_hasil_rdt'];
          $lokasi = $row['lokasi_rdt'];
          $form_input = $row['is_form_input'];
          if ($form_input) {
            $model->save_rdt($id_laporan, $tgl, $hsl, $lokasi);
            // $model->changeStatus($id_laporan, $covid, $hsl);
          }
        }
      } else {
        $row = $rdt[0];
        $tgl = $row['tgl_rdt'];
        $hsl = $row['id_hasil_rdt'];
        $lokasi = $row['lokasi_rdt'];
        $form_input = $row['is_form_input'];
        if ($form_input) {
          $model->save_rdt($id_laporan, $tgl, $hsl, $lokasi);
          // $model->changeStatus($id_laporan, $covid, $hsl);
        }
      }
    }
  }

  public function modalKarantina()
  {
    $model = $this->M_home;
    $data['covid2'] = $model->getCovid2()->result();
    $data['karantina'] = $model->getKarantina()->result();
    $data['created_by'] = $this->session->userdata('id_user');
    $this->load->view('modal-add-karantina', $data);
  }

  public function add_pasienKarantina()
  {
    $model = $this->M_home;
    $id_laporan = $_POST['id_laporan'];
    $id_karantina = $_POST['id_karantina'];
    $hasil = $model->save_pasienKarantina($id_laporan, $id_karantina);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../rumah-isolasi');
  }

  public function modalKarantina2($id)
  {
    $model = $this->M_home;
    $data['pasien_karantina'] = $model->getPasienKarantinaBy($id);
    $data['karantina'] = $model->getKarantina()->result();
    $data['covid2'] = $model->getCovid2()->result();
    $data['covid3'] = $model->getCovid3($data['pasien_karantina']->id_laporan);
    $this->load->view('modal-edit-karantina', $data);
  }

  public function edit_karantina($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->edit_karantina($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../tempatKarantina', 'location');
  }

  public function hapus_karantina($id)
  {
    $model = $this->M_home;

    $hasil = json_decode($model->delete_karantina($id), true);

    if ($hasil['res']) {
      $this->session->set_flashdata('success', $hasil['msg']);
    } else {
      $this->session->set_flashdata('gagal', $hasil['msg']);
    }
    redirect('../rumah-isolasi', 'location');
  }

  public function modal_swab($id, $id_lap)
  {
    $model = $this->M_home;
    $data['swab'] = $model->getSwabBy($id);
    $data['laporan'] = $model->getLaporanBy($id_lap);
    $data['lab'] = $model->get_lab();
    $this->load->view('modal-swab2', $data);
  }

  public function modal_swab_selesai($id, $id_lap)
  {
    $model = $this->M_home;
    $data['swab'] = $model->getSwabBy($id);
    $data['laporan'] = $model->getLaporanBy($id_lap);
    $data['lab'] = $model->get_lab();
    $this->load->view('modal-swab3', $data);
  }

  public function modal_swab_edit($id, $id_lap)
  {
    $model = $this->M_home;
    $data['swab'] = $model->getSwabBy($id);
    $data['laporan'] = $model->getLaporanBy($id_lap);
    $data['lab'] = $model->get_lab();
    $this->load->view('modal-swab4', $data);
  }
}
