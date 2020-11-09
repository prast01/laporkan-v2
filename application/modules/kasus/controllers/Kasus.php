<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasus');
    }

    public function index()
    {
        $model = $this->M_kasus;

        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['rs'] = $model->get_sumber();

        if ($this->session->userdata('id_user') != '') {
            $this->template('dashboard', $data);
        } else {
            redirect('../', 'refresh');
        }
    }

    public function epid($step, $id_laporan)
    {
        $model = $this->M_kasus;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['laporan'] = $model->get_data($id_laporan);
        $data['pe'] = $model->get_pe($id_laporan);
        $data['kel'] = $model->get_kelurahan_by_id($data['laporan']->id_kelurahan);
        $data['kec'] = $model->get_kecamatan_by_id($data['laporan']->id_kecamatan);
        $data['status'] = $model->get_status_by_id($data['laporan']->status_baru);
        $data['hubungan'] = $model->get_hubungan();
        $data['jenis_kontak'] = $model->get_jenis_kontak();
        $data['step'] = $step;

        if ($this->session->userdata('id_user') != '') {
            if ($step == 'step-1') {
                $this->template('step-1', $data);
            } elseif ($step == 'step-2') {
                $this->template('step-2', $data);
            } elseif ($step == 'step-3') {
                $this->template('step-3', $data);
            } elseif ($step == 'step-4') {
                $this->template('step-4', $data);
            } elseif ($step == 'step-5') {
                $this->template('step-5', $data);
            } elseif ($step == 'step-6') {
                $this->template('step-6', $data);
            }
        } else {
            redirect('../', 'refresh');
        }
    }

    public function cetak_pe($id_laporan)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id_laporan);
        $data['pe'] = $model->get_pe($id_laporan);
        $data['kel'] = $model->get_kelurahan_by_id($data['laporan']->id_kelurahan);
        $data['kec'] = $model->get_kecamatan_by_id($data['laporan']->id_kecamatan);
        $data['status'] = $model->get_status_by_id($data['laporan']->status_baru);
        $data['hubungan'] = $model->get_hubungan();
        $data['jenis_kontak'] = $model->get_jenis_kontak();
        $this->load->view('cetak_pe', $data);
    }
    // modal
    public function modal_tambah()
    {
        $model = $this->M_kasus;
        $data['gejala'] = $model->get_gejala();
        $data['kecamatan'] = $model->get_kecamatan();
        $data['status'] = $model->get_status("1");
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-tambah', $data);
    }

    public function modal_tambah_lama()
    {
        $model = $this->M_kasus;
        $data['status'] = $model->get_status("1");
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-tambah-lama', $data);
    }

    public function modal_transfer()
    {
        $model = $this->M_kasus;
        $data['status'] = $model->get_status("3");
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-transfer', $data);
    }

    public function modal_ubah($id)
    {
        $model = $this->M_kasus;
        $data['gejala'] = $model->get_gejala();
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['penyakit'] = $model->get_penyakit_by($data['laporan']->kdiag);
        $data['job'] = $model->get_job_by($data['laporan']->id_pekerjaan);
        $data['job_place'] = $model->get_job_place_by($data['laporan']->tempat_kerja);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-ubah', $data);
    }

    public function modal_detail($id)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['penyakit'] = $model->get_penyakit_by($data['laporan']->kdiag);
        $data['job'] = $model->get_job_by($data['laporan']->id_pekerjaan);
        $data['job_place'] = $model->get_job_place_by($data['laporan']->tempat_kerja);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-detail', $data);
    }

    public function modal_riwayat($id)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['status'] = $model->get_status_riwayat($data['laporan']->status_baru);
        $data['status2'] = $model->get_status("1");
        $data['riwayat'] = $model->get_riwayat($id);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-riwayat', $data);
    }

    public function modal_tracing($id)
    {
        $model = $this->M_kasus;
        $data['kecamatan'] = $model->get_kecamatan();
        $data['laporan'] = $model->get_data($id);
        $data['kel'] = $model->get_kelurahan_by_id($data['laporan']->id_kelurahan);
        $data['kec'] = $model->get_kecamatan_by_id($data['laporan']->id_kecamatan);
        $data['hubungan'] = $model->get_hubungan();
        $data['jenis_kontak'] = $model->get_jenis_kontak();
        $this->load->view('modal-tracing', $data);
    }

    // ambil data
    public function get_faskes()
    {
        $model = $this->M_kasus;
        $data = $model->get_faskes();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            $hsl[$no]['nama_hospital'] = $key->nama_hospital;
            // $hsl[$no]['diag'] = $key->diag;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function get_nik()
    {
        $nik = $_GET['nik'];
        $model = $this->M_kasus;
        $pasien = $model->get_pasien_by($nik);
        $status = $model->get_status('2');

        $cek = $pasien->num_rows();
        if ($cek > 0) {
            $data2 = $pasien->row();
            $st = $model->get_status_by_id($data2->status_baru);
            foreach ($status as $key) :
                if ($data2->status_baru != $key->id_status_2) {
                    $cek2 = 1;
                    continue;
                } else {
                    $cek2 = 0;
                    break;
                }
            endforeach;

            if ($cek2) {
                $data['data']['id_laporan'] = $data2->id_laporan;
                $data['data']['nama'] = $data2->nama;
                $data['data']['status'] = $st;
                $data['data']['kecamatan'] = $model->get_kecamatan_by_id($data2->id_kecamatan);
                $data['data']['kelurahan'] = $model->get_kelurahan_by_id($data2->id_kelurahan);
                $data['data']['alamat_domisili'] = $data2->alamat_domisili;
                $data['data']['kasus'] = $data2->kasus;
                $data['cek'] = "1";
                $data['msg'] = "NIK : " . $nik . " ditemukan !";
            } else {
                $data['cek'] = "0";
                $data['msg'] = "NIK : " . $nik . " status " . strtoupper($st);
            }
        } else {
            $data['cek'] = "0";
            $data['msg'] = "NIK : " . $nik . " tidak ditemukan !";
        }


        echo json_encode($data);
    }

    public function get_nik_2()
    {
        $nik = $_GET['nik'];
        $model = $this->M_kasus;
        $pasien = $model->get_pasien_by($nik);
        $status = $model->get_status();

        $cek = $pasien->num_rows();
        if ($cek > 0) {
            $data2 = $pasien->row();
            $st = $model->get_status_by_id($data2->status_baru);
            foreach ($status as $key) :
                if ($data2->status_baru != $key->id_status_2) {
                    $cek2 = 0;
                    continue;
                } else {
                    $cek2 = 1;
                    break;
                }
            endforeach;

            if ($cek2) {
                $data['data']['id_laporan'] = $data2->id_laporan;
                $data['data']['nama'] = $data2->nama;
                $data['data']['status'] = $st;
                $data['data']['kecamatan'] = $model->get_kecamatan_by_id($data2->id_kecamatan);
                $data['data']['kelurahan'] = $model->get_kelurahan_by_id($data2->id_kelurahan);
                $data['data']['alamat_domisili'] = $data2->alamat_domisili;
                $data['data']['faskes_akhir'] = $data2->faskes_akhir;
                $data['data']['kasus'] = $data2->kasus;
                $data['data']['penyakit'] = $data2->penyakit . " (" . $data2->kdiag . ")";
                $data['cek'] = "1";
                $data['msg'] = "NIK : " . $nik . " ditemukan !";
            } else {
                $data['cek'] = "0";
                $data['msg'] = "NIK : " . $nik . " status " . strtoupper($st);
            }
        } else {
            $data['cek'] = "0";
            $data['msg'] = "NIK : " . $nik . " tidak ditemukan !";
        }


        echo json_encode($data);
    }

    public function get_job()
    {
        $model = $this->M_kasus;
        $data = $model->get_job();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            $hsl[$no]['id_pekerjaan'] = $key->id_pekerjaan;
            $hsl[$no]['pekerjaan'] = $key->pekerjaan;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function get_job_place()
    {
        $model = $this->M_kasus;
        $data = $model->get_job_place();
        $hsl = array();

        if ($data->num_rows() >= 1) {
            $no = 1;
            $hsl[0]['tempat_kerja'] = $_GET['search'];
            foreach ($data->result() as $key) {
                $hsl[$no]['tempat_kerja'] = $key->tempat_kerja;

                $no++;
            }
        } else {
            $hsl[0]['tempat_kerja'] = $_GET['search'];
        }

        echo json_encode($hsl);
    }

    public function get_data_pasien()
    {
        $model = $this->M_kasus;
        $data = $model->get_data_pasien();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            if ($key->status_baru >= 1 && $key->status_baru <= 6) {
                $tipe = 1;
            } elseif ($key->status_baru >= 7 && $key->status_baru <= 12) {
                $tipe = 2;
            } elseif ($key->status_baru >= 13 && $key->status_baru <= 17) {
                $tipe = 3;
            } elseif ($key->status_baru >= 18 && $key->status_baru <= 19) {
                $tipe = 4;
            }


            if ($key->jekel == '1') {
                $jekel = "L";
            } else {
                $jekel = "P";
            }

            $hsl[$no]['id'] = $key->id_laporan;
            $hsl[$no]['nik'] = $key->nik;
            $hsl[$no]['nama'] = $key->nama;
            $hsl[$no]['status'] = $key->nama_status;
            $hsl[$no]['tipe'] = $tipe;
            $hsl[$no]['id_kecamatan'] = $key->id_kecamatan;
            $hsl[$no]['nama_kecamatan'] = $key->nama_kecamatan;
            $hsl[$no]['id_kelurahan'] = $key->id_kelurahan;
            $hsl[$no]['nama_kelurahan'] = $key->nama_kelurahan;
            $hsl[$no]['no_telp'] = $key->no_telp;
            $hsl[$no]['alamat_domisili'] = $key->alamat_domisili;
            $hsl[$no]['umur'] = $key->umur;
            $hsl[$no]['id_jekel'] = $key->jekel;
            $hsl[$no]['jekel'] = $jekel;
            $hsl[$no]['wn'] = $key->wn;
            $hsl[$no]['is_form_input'] = true;

            $no++;
        }

        echo json_encode($hsl);
    }

    // CRUD
    public function add()
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->save(), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function add2()
    {
        $post = $this->input->post();
        if (strlen($post['nik']) < "16") {
            $msg = array('res' => 0, 'msg' => 'NIK Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        // $data = array(
        //     'id_kecamatan' => $post['id_kecamatan'],
        //     'tgl_periksa' => $post['tgl_periksa'],
        //     'nik' => $post['nik'],
        //     'nama' => $post['nama'],
        //     'alamat_domisili' => $post['alamat_domisili'],
        //     'rt' => $post['rt'],
        //     'rw' => $post['rw'],
        //     'created_at' => $post['created_at'],
        //     'wn' => $post['wn'],
        //     'keterangan' => $post['keterangan'],
        //     'created_by' => $post['created_by'],
        //     'jekel' => $post['jekel'],
        //     'umur' => $post['umur'],
        //     'no_telp' => $post['no_telp'],
        //     'id_kelurahan' => $post['id_kelurahan'],
        //     'kasus' => $post['kasus'],
        //     'nakes' => $post['nakes'],
        //     'kdiag' => $post['kdiag'],
        //     'penyakit' => $post['penyakit'],
        //     "faskes_akhir" => $post['faskes_akhir'],
        //     "id_pekerjaan" => $post['id_pekerjaan'],
        //     "pekerjaan" => $post['pekerjaan'],
        //     "tempat_kerja" => $post['tempat_kerja'],
        //     "updated_at" => $post['updated_at'],
        //     "data_id" => $post['data_id'],
        //     'status_baru' => $post['status_baru']
        // );

        $cek = $this->db->insert('tb_laporan_baru', $post);
        $this->_add_riwayat($post['nik']);

        if ($cek) {
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Dibuat', 'data' => $post);
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Dibuat');
        }

        echo json_encode($msg);
    }

    private function _add_riwayat($nik)
    {
        $d = $this->db->get_where("tb_laporan_baru", ['nik' => $nik])->row();

        $data = array(
            "id_laporan" => $d->id_laporan,
            "id_status" => $d->status_baru,
            "kondisi_umum" => $d->keterangan,
            "lokasi_rs" => $d->faskes_akhir,
            "updated_at" => date("Y-m-d H:i:s")
        );
        $this->db->insert('tb_riwayat', $data);
    }

    public function edit($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->edit($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
        // echo $hasil['r'];
    }

    public function delete($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->delete($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
        // echo $hasil['r'];
    }

    public function add_riwayat($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->add_riwayat($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
        // echo $hasil['r'];
    }

    public function add_riwayat_lama()
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->add_riwayat_lama(), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function add_transfer()
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->add_transfer(), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function selesai_isolasi($kode, $id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->selesai_isolasi($kode, $id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function meninggal($kode, $id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->meninggal($kode, $id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function positif($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->positif($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function add_tracing()
    {
        $model = $this->M_kasus;
        $id_laporan = $_POST['id_laporan'];
        $tracing = json_decode($_POST['tracing'], true);
        $remove_tracing = json_decode($_POST['remove_tracing'], true);

        // remove tracing
        if (count($remove_tracing) > 0) {
            foreach ($$remove_tracing as $key => $value) {
                if ($value['tipe'] == '4' && $value['id'] != null) {
                    $model->delete_kontak($value['id']);
                }
            }
        }

        // add tracing
        if (count($tracing) > 0) {
            foreach ($tracing as $key => $value) {
                if ($value['id'] == null) {
                    $cek = $model->get_pasien_by($value['nik']);
                    if ($cek->num_rows() > 0) {
                        $dt = $cek->row();
                        $data = array(
                            'id_laporan' => $id_laporan,
                            'kontak' => $dt->id_laporan,
                            'status' => $dt->status_baru,
                            'id_hubungan' => $value['id_hubungan'],
                            'id_jenis_kontak' => $value['id_jenis_kontak'],
                        );

                        $model->save_kontak($data);
                    } else {
                        if ($value['nama_hubungan'] == 'Tenaga Medis') {
                            $nakes = "NAKES";
                        } else {
                            $nakes = 0;
                        }

                        $data = array(
                            'status_baru' => 18,
                            'faskes_akhir' => $this->session->userdata('nama_user'),
                            'kdiag' => 'BLM',
                            'penyakit' => 'BELUM DIISI',
                            'id_pekerjaan' => null,
                            'pekerjaan' => null,
                            'tempat_kerja' => null,
                            'id_kecamatan' => $value['id_kecamatan'],
                            'tgl_periksa' => date("Y-m-d"),
                            'wn' => $value['wn'],
                            'nik' => $value['nik'],
                            'nama' => $value['nama'],
                            'rt' => $value['rt'],
                            'rw' => $value['rw'],
                            'alamat_domisili' => $value['alamat_domisili'],
                            'validasi' => 0,
                            'created_at' => date("Y-m-d"),
                            'created_by' => $this->session->userdata('id_user'),
                            'jekel' => $value['id_jekel'],
                            'umur' => $value['umur'],
                            'no_telp' => $value['no_telp'],
                            'id_kelurahan' => $value['id_kelurahan'],
                            'nakes' => $nakes
                        );

                        $data2 = array(
                            'id_laporan' => $id_laporan,
                            'nik' => $value['nik'],
                            'id_hubungan' => $value['id_hubungan'],
                            'id_jenis_kontak' => $value['id_jenis_kontak'],
                        );
                        $model->save_pasien($data, $data2);
                    }
                } else {
                    $cek_kontak = $model->get_kontak_by_id($id_laporan, $value['id']);

                    if ($cek_kontak == 0) {
                        $dt = $model->get_pasien_by($value['nik'])->row();
                        $data = array(
                            'id_laporan' => $id_laporan,
                            'kontak' => $dt->id_laporan,
                            'status' => $dt->status_baru,
                            'id_hubungan' => $value['id_hubungan'],
                            'id_jenis_kontak' => $value['id_jenis_kontak'],
                        );

                        $model->save_kontak($data);
                    }
                }
            }
        }

        $model->get_total_kontak($id_laporan);
    }

    public function delete_tracing($id_laporan, $kontak)
    {
        $this->db->delete("tb_kontak", ["kontak" => $kontak, "id_laporan" => $id_laporan]);
    }

    public function data_tracing($id)
    {
        $model = $this->M_kasus;
        $data = $model->get_kontak($id);
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            // if ($key->status != '4') {
            $dt = $model->get_data($key->kontak);
            $hsl['data'][$no]['id'] = $dt->id_laporan;
            // } else {
            //     $dt = $model->get_tracing_otg($key->kontak);
            //     $hsl['data'][$no]['id'] = $dt->id_otg;
            // }

            if ($key->status >= 1 && $key->status <= 6) {
                $tipe = 1;
            } elseif ($key->status >= 7 && $key->status <= 12) {
                $tipe = 2;
            } elseif ($key->status >= 13 && $key->status <= 17) {
                $tipe = 3;
            } elseif ($key->status >= 18 && $key->status <= 19) {
                $tipe = 4;
            }

            if ($dt->jekel == '1') {
                $jekel = "L";
            } else {
                $jekel = "P";
            }


            $hsl['data'][$no]['nama'] = $dt->nama;
            $hsl['data'][$no]['status'] = $model->get_status_by_id($key->status);
            $hsl['data'][$no]['tipe'] = $tipe;
            $hsl['data'][$no]['nama_kecamatan'] = $model->get_kecamatan_by_id($dt->id_kecamatan);
            $hsl['data'][$no]['nama_kelurahan'] = $model->get_kelurahan_by_id($dt->id_kelurahan);
            $hsl['data'][$no]['no_telp'] = $dt->no_telp;
            $hsl['data'][$no]['alamat_domisili'] = $dt->alamat_domisili;
            $hsl['data'][$no]['umur'] = $dt->umur;
            $hsl['data'][$no]['jekel'] = $jekel;
            $hsl['data'][$no]['id_jekel'] = $dt->jekel;
            $hsl['data'][$no]['id_hubungan'] = $key->id_hubungan;
            $hsl['data'][$no]['id_jenis_kontak'] = $key->id_jenis_kontak;
            $hsl['data'][$no]['nik'] = $dt->nik;
            $hsl['data'][$no]['wn'] = $dt->wn;
            $hsl['data'][$no]['id_kecamatan'] = $dt->id_kecamatan;
            $hsl['data'][$no]['id_kelurahan'] = $dt->id_kelurahan;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function add_step($step, $id_laporan)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->save_step($step, $id_laporan), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect("../kasus/epid/" . $step . "/" . $id_laporan, 'refresh');
    }
}

/* End of file Kasus.php */
