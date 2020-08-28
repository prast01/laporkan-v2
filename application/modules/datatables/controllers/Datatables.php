<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends MY_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_datatable');
    }

    function data_odp()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_odp();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            Aksi <span class="sr-only">Toggle Dropdown</span>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                <a class="dropdown-item text-success" href="#" onclick="negatif(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="modal7(\''.$field->id_laporan.'\')"><span class="fa fa-plus"></span> PDP</a>
                            </div>
                        </button>';
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="modal7(\''.$field->id_laporan.'\')"><span class="fa fa-plus"></span> PDP</a>
                                </div>
                            </button>';
                } else {
                    if ($field->covid == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="negatif(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\''.$field->id_laporan.'\')"><span class="fa fa-plus"></span> PDP</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\''.$field->id_laporan.'\')"><span class="fa fa-plus"></span> PDP</a>
                                    </div>
                                </button>';
                    }
                    
                }
            }
            
            if ($field->covid == '0') {
                $status = "MASA PANTAU";
            } else {
                $status = "SELESAI PANTAU";
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_odp(),
            "recordsFiltered" => $this->M_datatable->count_filtered_odp(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_otg()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_otg();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            Aksi <span class="sr-only">Toggle Dropdown</span>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#" onclick="modal12(\''.$field->id_otg.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                <a class="dropdown-item text-success" href="#" onclick="negatif_otg(\''.$field->id_otg.'\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_otg.'\')"><span class="fa fa-flask"></span> Swab</a>
                            </div>
                        </button>';
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal12(\''.$field->id_otg.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_otg.'\')"><span class="fa fa-flask"></span> Swab</a>
                                </div>
                            </button>';
                } else {
                    if ($field->covid == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-success" href="#" onclick="negatif2(\''.$field->id_otg.'\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_otg.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_otg.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\''.$field->id_otg.'\')"><span class="fa fa-plus"></span> PDP</a>
                                    </div>
                                </button>';
                    }
                    
                }
            }
            
            if ($field->rdt == '1') {
                $status = "REAKTIF";
            } elseif ($field->rdt == '2') {
                $status = "NON REAKTIF";
            } else {
                $status = "TIDAK RDT";
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_otg(),
            "recordsFiltered" => $this->M_datatable->count_filtered_otg(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_pdp()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_pdp();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                if ($field->st == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } elseif($field->st == '2') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } else {
                    $html = '';
                }
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } elseif($field->st == '2') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }
            
            if ($field->rawat != 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "RANAP JEPARA <br>di ".$field->rawat;
            } elseif ($field->rujuk == "1" && $field->st == "0") {
                $status = "RANAP LUAR JEPARA <br>di ".$field->rs;
            } elseif ($field->rawat == 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "PENGAWASAN FASYANKES";
            } elseif ($field->st == "1") {
                $status = "PULANG/SEHAT";
            } elseif($field->st == "2") {
                $status = "MENINGGAL";
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_pdp(),
            "recordsFiltered" => $this->M_datatable->count_filtered_pdp(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
    function data_covid()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_covid();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                if ($field->st == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                </div>
                            </button>';
                } else {
                    $html = '';
                }
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }
            if ($field->st == "1") {
                $status = "SEMBUH";
            } elseif($field->st == "2") {
                $status = "MENINGGAL";
            } else {
                if ($field->rujuk == '0') {
                    if ($field->rawat == 'RAWAT JALAN') {
                        $status = "PERAWATAN DALAM DAERAH <br>- ISOLASI MANDIRI";
                    } else {
                        $status = "PERAWATAN DALAM DAERAH <br>di ".$field->rawat;
                    }
                } else {
                    $status = "PERAWATAN LUAR DAERAH <br>di ".$field->rs;
                }
                
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_covid(),
            "recordsFiltered" => $this->M_datatable->count_filtered_covid(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    function data_pdp_rs()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_pdp_rs();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                if ($field->st == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } elseif($field->st == '2') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } else {
                    $html = '';
                }
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } elseif($field->st == '2') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\''.$field->id_laporan.'\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }
            
            if ($field->rawat != 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "RANAP JEPARA <br>di ".$field->rawat;
            } elseif ($field->rujuk == "1" && $field->st == "0") {
                $status = "RANAP LUAR JEPARA <br>di ".$field->rs;
            } elseif ($field->rawat == 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "PENGAWASAN FASYANKES";
            } elseif ($field->st == "1") {
                $status = "PULANG/SEHAT";
            } elseif($field->st == "2") {
                $status = "MENINGGAL";
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_pdp_rs(),
            "recordsFiltered" => $this->M_datatable->count_filtered_pdp_rs(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
    function data_covid_rs()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_covid_rs();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                if ($field->st == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                </div>
                            </button>';
                } else {
                    $html = '';
                }
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\''.$field->id_laporan.'\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\''.$field->id_laporan.'\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\''.$field->id_laporan.'\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\''.$field->id_laporan.'\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\''.$field->id_laporan.'\')"><span class="fa fa-search"></span> Tracing</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\''.$field->id_laporan.'\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }
            if ($field->st == "1") {
                $status = "SEMBUH";
            } elseif($field->st == "2") {
                $status = "MENINGGAL";
            } else {
                if ($field->rujuk == '0') {
                    if ($field->rawat == 'RAWAT JALAN') {
                        $status = "PERAWATAN DALAM DAERAH <br>- ISOLASI MANDIRI";
                    } else {
                        $status = "PERAWATAN DALAM DAERAH <br>di ".$field->rawat;
                    }
                } else {
                    $status = "PERAWATAN LUAR DAERAH <br>di ".$field->rs;
                }
                
            }
            
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $html;
 
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_covid_rs(),
            "recordsFiltered" => $this->M_datatable->count_filtered_covid_rs(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}

/* End of file Datatable.php */