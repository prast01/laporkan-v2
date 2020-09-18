<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Data Penyedikan Epidemiologi Covid-19</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('gagal')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Eror!</h5>
                            <?php echo $this->session->flashdata('gagal'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                PASIEN : <b><?= $laporan->nama; ?> - <?= $kec; ?>, <?= $kel; ?></b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-1/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-bullhorn"></i> &nbsp;Informasi Klinis</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-2/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-heartbeat"></i> &nbsp;Kondisi Penyerta</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-3/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-stethoscope"></i> &nbsp;Diagnosis</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-4/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-plane"></i> &nbsp;Faktor Riwayat Perjalanan</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-5/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-handshake"></i> &nbsp;Faktor Kontak/Paparan</a>
                                        <a class="nav-link active" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-6/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-address-card"></i> &nbsp;Daftar Kontak Erat Kasus</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Status</th>
                                                            <th>Kecamatan</th>
                                                            <th>Kelurahan</th>
                                                            <th>Alamat</th>
                                                            <th>Nomer Telepon</th>
                                                            <th>Umur</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Hubungan</th>
                                                            <th>Jenis Kontak</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$hub = str_replace('"', "&quot;", json_encode($hubungan));
$jk = str_replace('"', "&quot;", json_encode($jenis_kontak));
?>
<input type="hidden" id="list-relationship-type" value="<?php echo $hub; ?>">
<input type="hidden" id="list-contact-type" value="<?php echo $jk; ?>">

<script>
    var row_num = 1;
    var dataTracing = [];
    var removeDataTracing = [];
    var dataSearch = null;
    var dataOTG = null;
    var cekOTG = null;
    var relationshipType = '';
    var contactType = '';
    $(document).ready(function() {
        relationshipType = JSON.parse($('#list-relationship-type').val());
        contactType = JSON.parse($('#list-contact-type').val());

        function drawTableTracing() {
            let html = '';
            dataTracing.forEach(item => {
                html += '<tr>';
                html += '<td>' + item.nama;
                html += '<input type="hidden" name="id[]" value="' + item.id_laporan + '">';
                html += '<input type="hidden" name="status[]" value="' + item.tipe + '">';
                html += '</td>';
                html += '<td>' + item.status + '</td>';
                html += '<td>' + item.nama_kecamatan + '</td>';
                html += '<td>' + item.nama_kelurahan + '</td>';
                html += '<td>' + item.alamat_domisili + '</td>';
                html += '<td>' + item.no_telp + '</td>';
                html += '<td>' + item.umur + '</td>';
                html += '<td>' + item.jekel + '</td>';
                html += '<td>' + addSelectRelationship(item.row_num, item.id_hubungan) + '</td>';
                html += '<td>' + addSelectContactType(item.row_num, item.id_jenis_kontak) + '</td>';
                html += '</tr>';
            });
            $('#body-list').html(html);
            $('.relationship-type').on('change', changeSelectRelationship);
            $('.contact-type').on('change', changeSelectContact);
        }

        function addSelectRelationship(row_num, relationship_type_id) {
            relationshipType.forEach(item => {
                if (item.id_hubungan == relationship_type_id)
                    result = item.nama_hubungan;
            });

            return result;
        }

        function addSelectContactType(row_num, contact_type_id) {
            contactType.forEach(item => {
                if (item.id_jenis_kontak == contact_type_id)
                    result = item.jenis_kontak;
            });

            return result;
        }

        function changeSelectRelationship() {
            let id = $(this).data('num');
            let value = $(this).val();
            dataTracing.forEach(item => {
                if (item.row_num == id) {
                    item.id_hubungan = value;
                    return false;
                }
            })
        }

        function changeSelectContact() {
            let id = $(this).data('num');
            let value = $(this).val();
            dataTracing.forEach(item => {
                if (item.row_num == id) {
                    item.id_jenis_kontak = value;
                    return false;
                }
            })
        }

        function personContact() {
            $.get("<?php echo base_url("kasus/data_tracing/") . $laporan->id_laporan; ?>", function(data) {
                var data = JSON.parse(data);
                if (data.data.length > 0) {
                    data.data.forEach(item => {
                        item.row_num = row_num;
                        item.is_form_input = false;
                        dataTracing.push(item);
                        row_num++;
                    });
                    drawTableTracing();
                }

                console.log(data.data.length);
            })
        }
        personContact();
    });
</script>