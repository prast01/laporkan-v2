<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datatables extends MY_Controller
{

    function __construct()
    {
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
                                <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                <a class="dropdown-item text-success" href="#" onclick="negatif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
								<a class="dropdown-item text-primary" href="#" onclick="modalRDT(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> RDT</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                            </div>
                        </button>';
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
                                </div>
                            </button>';
                } else {
                    if ($field->covid == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="negatif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Selesai Pantau</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
										<a class="dropdown-item text-primary" href="#" onclick="modalRDT(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> RDT</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
										<a class="dropdown-item text-primary" href="#" onclick="modalRDT(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> RDT</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    }
                }
            }

            $html = '';

            if ($field->covid == '0') {
                $status = "MASA PANTAU";
            } else {
                $status = "SELESAI PANTAU";
            }

            if ($field->nakes == '1') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
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
            $row[] = $nakes;
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
                                <a class="dropdown-item" href="#" onclick="modal12(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                            </div>
                        </button>';
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal12(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } else {
                    if ($field->covid == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="modal7(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> PDP</a>
                                    </div>
                                </button>';
                    }
                }
            }

            $html = '';

            if ($field->rdt == '1') {
                $status = "REAKTIF";
            } elseif ($field->rdt == '2') {
                $status = "NON REAKTIF";
            } else {
                $status = "TIDAK RDT";
            }

            if ($field->nakes == '1') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
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
            $row[] = $field->keterangan;
            // $row[] = $status;
            $row[] = $field->nama_user;
            $row[] = $nakes;
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } elseif ($field->st == '2') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } elseif ($field->st == '2') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }

            $html = '';

            if ($field->rawat != 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "RANAP JEPARA <br>di " . $field->rawat;
            } elseif ($field->rujuk == "1" && $field->st == "0") {
                $status = "RANAP LUAR JEPARA <br>di " . $field->rs;
            } elseif ($field->rawat == 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "PENGAWASAN FASYANKES";
            } elseif ($field->st == "1") {
                $status = "PULANG/SEHAT";
            } elseif ($field->st == "2") {
                $status = "MENINGGAL";
            }

            if ($field->nakes == '1') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            if ($field->penyakit != '') {
                $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
                $p = $penyakit->diag;
            } else {
                $p = '';
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
            $row[] = $nakes;
            $row[] = $p;
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                </div>
                            </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                </div>
                            </button>';
                }
            } else {
                if ($field->validasi == '0') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    </div>
                                </button>';
                    }
                }
            }

            $html = '';

            if ($field->st == "1") {
                $status = "SEMBUH";
            } elseif ($field->st == "2") {
                $status = "MENINGGAL";
            } else {
                if ($field->rujuk == '0') {
                    if ($field->rawat == 'RAWAT JALAN') {
                        $isman = $this->M_datatable->get_isman($field->id_laporan);
                        $status = "PERAWATAN DALAM DAERAH <br>- ISOLASI MANDIRI";
                        if ($isman->num_rows() > 0) {
                            $is = $isman->row();
                            $status .= "<br>- " . $is->karantina;
                        }
                    } else {
                        $status = "PERAWATAN DALAM DAERAH <br>di " . $field->rawat;
                    }
                } else {
                    $status = "PERAWATAN LUAR DAERAH <br>di " . $field->rs;
                }
            }

            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            if ($field->penyakit != '') {
                $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
                $p = $penyakit->diag;
            } else {
                $p = '';
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
            $row[] = $nakes;
            $row[] = $field->nama_user;
            $row[] = $p;
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                </div>
                            </button>';
                } elseif ($field->st == '2') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Pulang/Sehat</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Meninggal</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } elseif ($field->st == '2') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#" onclick="positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif COVID-19</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }

            $html = '';

            if ($field->rawat != 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "RANAP JEPARA <br>di " . $field->rawat;
            } elseif ($field->rujuk == "1" && $field->st == "0") {
                $status = "RANAP LUAR JEPARA <br>di " . $field->rs;
            } elseif ($field->rawat == 'RAWAT JALAN' && $field->rujuk == "0" && $field->st == "0") {
                $status = "PENGAWASAN FASYANKES";
            } elseif ($field->st == "1") {
                $status = "PULANG/SEHAT";
            } elseif ($field->st == "2") {
                $status = "MENINGGAL";
            }

            if ($field->nakes == '1') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            if ($field->penyakit != '') {
                $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
                $p = $penyakit->diag;
            } else {
                $p = '';
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
            $row[] = $nakes;
            $row[] = $p;
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
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
                                    <a class="dropdown-item" href="#" onclick="modal2(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal15(\'' . $field->id_laporan . '\')"><span class="fa fa-flask"></span> Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                </div>
                            </button>';
                } else {
                    if ($field->st == '0') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="#" onclick="modal6(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Rujuk Pasien</a>
                                        <a class="dropdown-item" href="#" onclick="modal13(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="modal10(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Tracing</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="sembuh(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Sembuh</a>
                                        <a class="dropdown-item text-warning" href="#" onclick="meninggal(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-plus"></span> Meninggal</a>
                                    </div>
                                </button>';
                    } else {
                        $html = '';
                    }
                }
            }

            $html = '';

            if ($field->st == "1") {
                $status = "SEMBUH";
            } elseif ($field->st == "2") {
                $status = "MENINGGAL";
            } else {
                if ($field->rujuk == '0') {
                    if ($field->rawat == 'RAWAT JALAN') {
                        $status = "PERAWATAN DALAM DAERAH <br>- ISOLASI MANDIRI";
                    } else {
                        $status = "PERAWATAN DALAM DAERAH <br>di " . $field->rawat;
                    }
                } else {
                    $status = "PERAWATAN LUAR DAERAH <br>di " . $field->rs;
                }
            }

            if ($field->nakes == '1') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            if ($field->penyakit != '') {
                $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
                $p = $penyakit->diag;
            } else {
                $p = '';
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
            $row[] = $nakes;
            $row[] = $p;
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

    function data_karantina()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_karantina();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {

            $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        Aksi <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#" onclick="modalKarantina2(\'' . $field->id_pasien_karantina . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                            <a class="dropdown-item text-success" href="#" onclick="keluar(\'' . $field->id_pasien_karantina . '\')"><span class="fa fa-edit"></span> Keluar Karantina</a>
                        </div>
                    </button>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->karantina;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_karantina(),
            "recordsFiltered" => $this->M_datatable->count_filtered_karantina(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_covid_jateng()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_covid_jateng();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            // <a class="dropdown-item text-success" href="#" onclick="ambil(\''.$field->id_laporan.'\')"><span class="fa fa-check"></span> Ambil Data</a>
            $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        Aksi <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item text-danger" href="#" onclick="hapus(\'' . $field->id_laporan . '\')"><span class="fa fa-trash"></span> Hapus Data</a>
                        </div>
                    </button>';
            if ($field->st == "1") {
                $status = "SEMBUH";
            } elseif ($field->st == "2") {
                $status = "MENINGGAL";
            } else {
                if ($field->rujuk == '0') {
                    if ($field->rawat == 'RAWAT JALAN') {
                        $status = "ISOLASI MANDIRI";
                    } else {
                        $status = "PERAWATAN DALAM DAERAH <br>di " . $field->rawat;
                    }
                } else {
                    $status = "PERAWATAN LUAR DAERAH";
                }
            }

            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nik;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $status;
            $row[] = $field->rs;
            $row[] = $nakes;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_covid_jateng(),
            "recordsFiltered" => $this->M_datatable->count_filtered_covid_jateng(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_swab()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_swab();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata('level') == '2') {
                if ($field->tgl_kirim_dkk != '' && $field->tgl_selesai_dkk == '') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item text-danger" href="#" onclick="hapusSwab(\'' . $field->id_swab . '\')"><span class="fa fa-trash"></span> Hapus Swab</a>
                                    <a class="dropdown-item text-success" href="#" onclick="modalSwabSelesai(\'' . $field->id_swab . '\', \'' . $field->id_laporan . '\')"><span class="fa fa-check-circle"></span> Selesai</a>
                                </div>
                            </button>';
                } elseif ($field->tgl_kirim_dkk == '' && $field->tgl_selesai_dkk == '') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item text-danger" href="#" onclick="hapusSwab(\'' . $field->id_swab . '\')"><span class="fa fa-trash"></span> Hapus Swab</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="modalSwab(\'' . $field->id_swab . '\', \'' . $field->id_laporan . '\')"><span class="fa fa-paper-plane"></span> Kirim Swab</a>
                                </div>
                            </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item text-danger" href="#" onclick="hapusSwab(\'' . $field->id_swab . '\')"><span class="fa fa-trash"></span> Hapus Swab</a>
                                    <a class="dropdown-item text-warning" href="#" onclick="modalSwabEdit(\'' . $field->id_swab . '\', \'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah</a>
                                </div>
                            </button>';
                }
            } else {
                if ($field->tgl_kirim_dkk == '') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item text-danger" href="#" onclick="hapusSwab(\'' . $field->id_swab . '\')"><span class="fa fa-trash"></span> Hapus Swab</a>
                                </div>
                            </button>';
                } else {
                    $html = '';
                }
            }


            if ($field->jekel == '1') {
                $jekel = "L";
            } else {
                $jekel = "P";
            }

            if ($field->id_lab != '') {
                $dlab = $this->M_datatable->get_lab($field->id_lab);
                $lab = $dlab->nama_lab;
            } else {
                $lab = "";
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $jekel;
            $row[] = $field->swab_ke;
            $row[] = $lab;
            $row[] = $field->hasil_swab;
            $row[] = $field->nama_user;
            $row[] = $field->tgl_swab;
            $row[] = $field->tgl_kirim_faskes;
            $row[] = $field->tgl_kirim_dkk;
            $row[] = $field->tgl_selesai_dkk;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_swab(),
            "recordsFiltered" => $this->M_datatable->count_filtered_swab(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_terkonfirmasi()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_terkonfirmasi();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata("level") == "2") {
                if ($field->status_baru == '3' || $field->status_baru == '4') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#" onclick="epid(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Entri PE</a>
                                            <a class="dropdown-item text-info" href="#" onclick="tracing(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> Tracing</a>
                                        </div>
                                    </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#" onclick="epid(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Entri PE</a>
                                                            <a class="dropdown-item text-info" href="#" onclick="tracing(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> Tracing</a>
                                                            <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                                            <a class="dropdown-item text-danger" href="#" onclick="pasien_die(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-check"></span> Meninggal</a>
                                                        </div>
                                                    </button>';
                }
            } else {
                if ($field->status_baru == '3' || $field->status_baru == '4') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#" onclick="epid(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Entri PE</a>
                                            <a class="dropdown-item text-info" href="#" onclick="tracing(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> Tracing</a>
                                        </div>
                                    </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#" onclick="epid(\'' . $field->id_laporan . '\')"><span class="fa fa-search"></span> Entri PE</a>
                                            <a class="dropdown-item text-info" href="#" onclick="tracing(\'' . $field->id_laporan . '\')"><span class="fa fa-plus"></span> Tracing</a>
                                            <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                            <a class="dropdown-item text-danger" href="#" onclick="pasien_die(\'' . $field->id_laporan . '\', \'1\')"><span class="fa fa-check"></span> Meninggal</a>
                                        </div>
                                    </button>';
                }
            }

            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            // if ($field->penyakit != '') {
            //     $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
            //     $p = $penyakit->diag;
            // } else {
            //     $p = '';
            // }

            $no++;
            $row = array();
            // $row[] = $no;
            $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $field->nama_status;
            $row[] = $nakes;
            $row[] = $field->faskes_akhir;
            $row[] = $field->penyakit;
            $row[] = $field->kontak;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_terkonfirmasi(),
            "recordsFiltered" => $this->M_datatable->count_filtered_terkonfirmasi(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_probable()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_probable();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata("level") == "2") {
                if ($field->status_baru == '9' || $field->status_baru == '10') {
                    if ($field->status_baru == '10') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Aksi <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                                <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#" onclick="kasus_positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif</a>
                                            </div>
                                        </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Aksi <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                                <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            </div>
                                        </button>';
                    }
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Aksi <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                    <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                    <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                    <a class="dropdown-item text-danger" href="#" onclick="pasien_die(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Meninggal</a>
                                </div>
                            </button>';
                }
            } else {
                if ($field->status_baru == '9' || $field->status_baru == '10') {
                    if ($field->status_baru == '10') {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Aksi <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#" onclick="kasus_positif(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-plus"></span> Positif</a>
                                            </div>
                                        </button>';
                    } else {
                        $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Aksi <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            </div>
                                        </button>';
                    }
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                        <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="pasien_die(\'' . $field->id_laporan . '\', \'2\')"><span class="fa fa-check"></span> Meninggal</a>
                                    </div>
                                </button>';
                }
            }

            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            // if ($field->penyakit != '') {
            //     $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
            //     $p = $penyakit->diag;
            // } else {
            //     $p = '';
            // }

            $no++;
            $row = array();
            $row[] = $no;
            // $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $field->nama_status;
            $row[] = $nakes;
            $row[] = $field->faskes_akhir;
            $row[] = $field->penyakit;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_probable(),
            "recordsFiltered" => $this->M_datatable->count_filtered_probable(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_suspek()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_suspek();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata("level") == "2") {
                if ($field->status_baru == '15') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                        </div>
                                    </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                        <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                    </div>
                                </button>';
                }
            } else {
                if ($field->status_baru == '15') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                        </div>
                                    </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'3\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                        </div>
                                    </button>';
                }
            }


            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            // if ($field->penyakit != '') {
            //     $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
            //     $p = $penyakit->diag;
            // } else {
            //     $p = '';
            // }

            $no++;
            $row = array();
            $row[] = $no;
            // $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $field->nama_status;
            $row[] = $nakes;
            $row[] = $field->faskes_akhir;
            $row[] = $field->penyakit;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_suspek(),
            "recordsFiltered" => $this->M_datatable->count_filtered_suspek(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function data_kontak()
    {
        header("Access-Control-Allow-Origin: *");
        $list = $this->M_datatable->get_data_kontak();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($this->session->userdata("level") == "2") {
                if ($field->status_baru == '19') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                                        </div>
                                                    </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'4\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                        </div>
                                    </button>';
                }
            } else {
                if ($field->status_baru == '19') {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Aksi <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                        <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                    </div>
                                </button>';
                } else {
                    $html = '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Aksi <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="ubah_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-edit"></span> Ubah Data</a>
                                            <a class="dropdown-item" href="#" onclick="detail_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-eye"></span> Detail Data</a>
                                            <a class="dropdown-item text-primary" href="#" onclick="riwayat_kasus(\'' . $field->id_laporan . '\')"><span class="fa fa-arrow-right"></span> Riwayat Pasien</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-success" href="#" onclick="selesai_isolasi(\'' . $field->id_laporan . '\', \'4\')"><span class="fa fa-check"></span> Selesai Isolasi</a>
                                        </div>
                                    </button>';
                }
            }


            if ($field->nakes == 'NAKES') {
                $nakes = 'NAKES';
            } else {
                $nakes = '-';
            }

            // if ($field->penyakit != '') {
            //     $penyakit = $this->M_datatable->get_penyakit($field->kdiag);
            //     $p = $penyakit->diag;
            // } else {
            //     $p = '';
            // }

            $no++;
            $row = array();
            $row[] = $no;
            // $row[] = $field->kasus;
            $row[] = $field->tgl_periksa;
            $row[] = $field->nama;
            $row[] = $field->umur;
            $row[] = $field->nama_kecamatan;
            $row[] = $field->nama_kelurahan;
            $row[] = $field->alamat_domisili;
            $row[] = $field->no_telp;
            $row[] = $field->nama_status;
            $row[] = $nakes;
            $row[] = $field->faskes_akhir;
            $row[] = $field->penyakit;
            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_datatable->count_kontak(),
            "recordsFiltered" => $this->M_datatable->count_filtered_kontak(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}

/* End of file Datatable.php */