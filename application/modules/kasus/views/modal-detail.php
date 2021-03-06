<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        
                    </div> -->
                    <div class="card-body">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" disabled value="<?= $laporan->tgl_periksa; ?>">
                                    </div>
                                    <div style="display: <?= ($laporan->kasus == "") ? "none" : "block"; ?>;" class="col-6">
                                        <div class="row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Kasus Ke</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kasus" disabled placeholder="Kasus ke" value="<?= $laporan->kasus; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="nik" placeholder="NIK" disabled value="<?= $laporan->nik; ?>">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" disabled value="<?= $laporan->nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="umur" placeholder="Umur" disabled maxlength="2" value="<?= $laporan->umur; ?>">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        <select name="jekel" class="form-control select2" style="width: 100%" disabled>
                                            <option <?= ($laporan->jekel == "") ? "selected" : ""; ?> disabled value="">Pilih</option>
                                            <option <?= ($laporan->jekel == "1") ? "selected" : ""; ?> value="1">Laki-laki</option>
                                            <option <?= ($laporan->jekel == "2") ? "selected" : ""; ?> value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" disabled data-inputmask="'mask': ['9999-9999-9999']" data-mask value="<?= $laporan->no_telp; ?>">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
                                    <div class="col-sm-4">
                                        <select name="wn" class="form-control select2" style="width: 100%" disabled>
                                            <option <?= ($laporan->wn == "") ? "selected" : ""; ?> disabled>Pilih</option>
                                            <option <?= ($laporan->wn == "1") ? "selected" : ""; ?> value="1">WNI</option>
                                            <option <?= ($laporan->wn == "2") ? "selected" : ""; ?> value="2">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-4">
                                        <select name="id_kecamatan" id="id_kec" class="form-control select2" style="width: 100%" disabled>
                                            <option disabled>Pilih</option>
                                            <?php
                                            foreach ($kecamatan as $key) {
                                            ?>
                                                <option <?= ($key->id_kecamatan == $laporan->id_kecamatan) ? "selected" : ""; ?> value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-4">
                                        <select name="id_kelurahan" id="id_kel" class="form-control select2" style="width: 100%" disabled>
                                            <option disabled>Pilih</option>
                                            <?php
                                            foreach ($kelurahan as $key) {
                                            ?>
                                                <option <?= ($key->id_kelurahan == $laporan->id_kelurahan) ? "selected" : ""; ?> value="<?php echo $key->id_kelurahan; ?>"><?php echo $key->nama_kelurahan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_domisili" disabled><?= $laporan->alamat_domisili; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kondisi Umum</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="keterangan" disabled><?= $laporan->keterangan; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Penyakit Penyerta</label>
                                    <div class="col-sm-4">
                                        <select name="penyakit" id="penyakit" class="form-control select2" style="width: 100%" disabled>
                                            <option selected value="<?= $penyakit->kdiag; ?>"><?= $penyakit->diag; ?></option>
                                        </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apakah Nakes?</label>
                                    <div class="col-sm-4">
                                        <select name="nakes" class="form-control select2" style="width: 100%" disabled>
                                            <option <?= ($laporan->nakes == "") ? "selected" : ""; ?> value="">Pilih</option>
                                            <option <?= ($laporan->nakes == "NAKES") ? "selected" : ""; ?> value="NAKES">NAKES</option>
                                            <option <?= ($laporan->nakes == "0") ? "selected" : ""; ?> value="0">BUKAN NAKES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-4">
                                        <select name="job" id="job" class="form-control select2" style="width: 100%" disabled>
                                            <?php if ($laporan->id_pekerjaan != "") : ?>
                                                <option value="<?= $job->id_pekerjaan; ?>"><?= $job->pekerjaan; ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat Kerja</label>
                                    <div class="col-sm-4">
                                        <select name="job_place" id="job_place" class="form-control select2" style="width: 100%" disabled>
                                            <?php if ($laporan->tempat_kerja != "") : ?>
                                                <option value="<?= $job_place->tempat_kerja; ?>"><?= $job_place->tempat_kerja; ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-2 hidden-xs"></div>
                                    <div class="col-md-2 col-xs-10">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    // $(function () {
    //     $('.select2').select2();
    // });
    $(document).ready(function() {
        $('[data-mask]').inputmask();
        $('.select2').select2();

        $('#id_kec').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url("../services/getKelurahan"); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '<option selected disabled>Pilih</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kelurahan + '">' + data[i].nama_kelurahan + '</option>';
                    }
                    $('#id_kel').html(html);

                }
            });
        });

        $('#status').change(function() {
            var id = $(this).val();
            if (id == 1 || id == 7 || id == 13) {
                $("#f_akhir").show();
            } else {
                $("#f_akhir").hide();
            }
            if (id == 1 || id == 2) {
                $("#kas").show();
            } else {
                $("#kas").hide();
            }
            console.log(id);
        });

        $('#faskes_akhir').select2({
            ajax: {
                url: "<?php echo base_url('kasus/get_faskes') ?>",
                dataType: 'json',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_hospital,
                                id: item.nama_hospital
                            }
                        })
                    }
                },
                cache: true
            },
            placeholder: 'Masukkan Nama Faskes',
            minimumInputLength: 3,
            escapeMarkup: function(markup) {
                return markup;
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                return data.text;
            }
        });

        $('#penyakit').select2({
            ajax: {
                url: "<?php echo base_url('services/get_penyakit') ?>",
                dataType: 'json',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.diag + ' (<b>' + item.kdiag + '</b>)',
                                id: item.kdiag
                            }
                        })
                    }
                },
                cache: true
            },
            placeholder: 'Masukkan Nama atau Kode ICD10',
            minimumInputLength: 3,
            escapeMarkup: function(markup) {
                return markup;
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                return data.text;
            }
        });

    });
</script>