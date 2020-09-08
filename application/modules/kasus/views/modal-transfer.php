<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kasus</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nik" placeholder="NIK">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-success" id="btn_cari">Cari Data</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama" placeholder="Nama" disabled>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status Terakhir</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="status" placeholder="Status Terakhir" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" disabled>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="alamat_domisili" placeholder="Alamat Domisili" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('../kasus/add_riwayat_lama'); ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id_laporan" id="id_laporan">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="form-label">Status Pasien</label>
                                        <select name="status" id="status_form" class="form-control select2" style="width: 100%" disabled>
                                            <option selected disabled>Pilih</option>
                                            <?php
                                            foreach ($status as $key) :
                                            ?>
                                                <option value="<?= $key->id_status_2; ?>"><?= $key->nama_status; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="form-label">Kondisi Umum</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" disabled></textarea>
                                    </div>
                                    <div class="form-group" id="f_akhir" style="display: none;">
                                        <label for="inputEmail3" class="form-label">Faskes</label>
                                        <select name="faskes_akhir" id="faskes_akhir" class="form-control select2" style="width: 100%;">
                                        </select>
                                        <small>*Data akan berpindah ke RS yang di pilih</small>
                                    </div>
                                    <button type="submit" disabled id="btn_simpan" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
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

        $('#status_form').change(function() {
            var id = $(this).val();
            if (id == 1 || id == 5 || id == 7 || id == 11 || id == 13 || id == 16) {
                $("#f_akhir").show();
            } else {
                $("#f_akhir").hide();
            }
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

        $('#btn_cari').click(function() {
            let nik = $("#nik").val();
            $.ajax({
                url: "<?= site_url("../kasus/get_nik_2"); ?>",
                type: "GET",
                data: {
                    'nik': nik
                },
                success: function(data) {
                    data = JSON.parse(data);
                    cek = data.cek;
                    if (cek == "1") {
                        pasien = data.data;
                        alert(data.msg);
                        enabled(1);
                        $("#id_laporan").val(pasien.id_laporan);
                        $("#nama").val(pasien.nama);
                        $("#status").val(pasien.status);
                        $("#kecamatan").val(pasien.kecamatan);
                        $("#kelurahan").val(pasien.kelurahan);
                        $("#alamat_domisili").val(pasien.alamat_domisili);
                    } else {
                        alert(data.msg);
                        enabled(0)
                        $("#id_laporan").val("");
                        $("#nama").val("");
                        $("#status").val("");
                        $("#kecamatan").val("");
                        $("#kelurahan").val("");
                        $("#alamat_domisili").val("");
                    }
                }
            })
        })
    });

    function enabled(id) {
        if (id) {
            $('#status_form').prop("disabled", false);
            $('#keterangan').prop("disabled", false);
            $('#btn_simpan').prop("disabled", false);
        } else {
            $('#status_form').prop("disabled", true);
            $('#keterangan').prop("disabled", true);
            $('#btn_simpan').prop("disabled", true);
        }
    }
</script>