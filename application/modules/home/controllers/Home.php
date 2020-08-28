<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
            
          } elseif($data['level'] == '1') {
            $data['kecamatan'] = $model->getKecamatan()->result();
            $this->template('dashboard2', $data);
          } elseif($data['level'] == '5') {
            redirect('../data','refresh');
          } elseif($data['level'] == '6') {
            redirect('../pp','refresh');
          }
        } else {
          redirect('../','refresh');
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
        redirect('../','refresh');
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
        redirect('../','refresh');
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
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        if ($hasil['kondisi'] == '1' || $hasil['kondisi'] == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }

    public function edit($id)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->edit($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($hasil['kondisi'] == '1' || $hasil['kondisi'] == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }

    public function hapus($id, $kondisi)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->delete($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($kondisi == '1' || $kondisi == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }

    public function positif($id, $kondisi)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->positif($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($kondisi == '1' || $kondisi == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }
    
    public function negatif($id, $kondisi)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->negatif($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($kondisi == '1' || $kondisi == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }

    public function meninggal($id, $kondisi)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->meninggal($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($kondisi == '1' || $kondisi == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }
    
    public function sembuh($id, $kondisi)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->sembuh($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        if ($kondisi == '1' || $kondisi == '4') {
          redirect('../odp','location');
        } else {
          redirect('../pasien','location');
        }
    }
    
    public function sendPDP($id)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->sendPDP($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        
        redirect('../odp','location');
    }

    public function gantiPassword()
    {
      $data['id_user'] = $this->session->userdata("id_user");
      $data['level'] = $this->session->userdata("level");
      if ($this->session->userdata('id_user') != '') {
          $this->template('password', $data);
      } else {
          redirect('../','refresh');
      }
    }

    public function changePass()
    {
      $model = $this->M_home;
      $id_user = $this->session->userdata('id_user');
      $hasil = json_decode($model->changePass($id_user), true);
      
      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
      }
		  redirect('../home','location');
    }

    
    public function updateData()
    {
      $model = $this->M_home;
      $hasil = json_decode($model->updateAll(), true);
      
      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
      }
		  // redirect('../home','location');
		  redirect('http://localhost/update-peta/','location');
    }

    public function rujuk($id)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->rujuk($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        redirect('../pasien','location');
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
          redirect('../','refresh');
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
      
      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
        redirect('../home/faskes_luar','location');
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
        redirect('../home/faskes_luar','location');
      }
    }
    public function edit_faskes($id)
    {
      $model = $this->M_home;
  
      $hasil = json_decode($model->edit_faskes($id), true);
      
      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
        redirect('../home/faskes_luar','location');
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
        redirect('../home/faskes_luar','location');
      }
    }
    public function del_faskes($id)
    {
      $model = $this->M_home;
  
      $hasil = json_decode($model->del_faskes($id), true);
      
      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
        redirect('../home/faskes_luar','location');
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
        redirect('../home/faskes_luar','location');
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
      $tracing = json_decode($_POST['tracing'], true);
      if (count($tracing) > 1) {
        foreach ($tracing as $key => $row) {
          echo $row['nama']."<br>";
        }
      } else {
        $row = $tracing[0];
        echo $row['nama']."<br>";
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
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../odp','location');
    }

    public function edit_otg($id)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->edit_otg($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        redirect('../odp','location');
    }

    public function hapus_otg($id)
    {
        $model = $this->M_home;
    
        $hasil = json_decode($model->delete_otg($id), true);
        
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        redirect('../odp','location');
    }

    public function add_swab()
    {
      $model = $this->M_home;
      $swab = json_decode($_POST['swab'], true);
      $remove_swab = json_decode($_POST['remove_swab'], true);
      $id_laporan = $_POST['id_laporan'];
      $covid = $_POST['covid'];

      if (count($remove_swab) > 0) {
        $model->remove_swab($id_laporan);
        if (count($swab) > 1) {
          foreach ($swab as $key => $row) {
            $tgl = $row['tgl_swab'];
            $hsl = $row['id_hasil_swab'];
            // $form_input = $row['is_form_input'];
            // if ($form_input) {
              $model->save_swab($id_laporan, $tgl, $hsl);
            // }
            // $model->changeStatus($id_laporan, $covid, $hsl);
          }
        } else {
          $row = $swab[0];
          $tgl = $row['tgl_swab'];
          $hsl = $row['id_hasil_swab'];
          $form_input = $row['is_form_input'];
          // if ($form_input) {
            $model->save_swab($id_laporan, $tgl, $hsl);
            // $model->changeStatus($id_laporan, $covid, $hsl);
          // }
        }
        
      } else {
        if (count($swab) > 1) {
          foreach ($swab as $key => $row) {
            $tgl = $row['tgl_swab'];
            $hsl = $row['id_hasil_swab'];
            $form_input = $row['is_form_input'];
            if ($form_input) {
              $model->save_swab($id_laporan, $tgl, $hsl);
              // $model->changeStatus($id_laporan, $covid, $hsl);
            }
          }
        } else {
          $row = $swab[0];
          $tgl = $row['tgl_swab'];
          $hsl = $row['id_hasil_swab'];
          $form_input = $row['is_form_input'];
          if ($form_input) {
            $model->save_swab($id_laporan, $tgl, $hsl);
            // $model->changeStatus($id_laporan, $covid, $hsl);
          }
        }
        
      }
      
    }

}

