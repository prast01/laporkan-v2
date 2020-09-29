<?php
foreach ($status2 as $key) :
    if ($laporan->status_baru != $key->id_status_2) {
        $cek = 0;
        continue;
    } else {
        $cek = 1;
        break;
    }
endforeach;
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-<?= ($cek) ? "8" : "12"; ?>">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kasus</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" placeholder="Tanggal Pemeriksaan" disabled value="<?= $laporan->nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" disabled value="<?= $laporan->nik; ?>">
                                    </div>
                                    <div style="display: <?= ($laporan->kasus != "" || ($laporan->status_baru >= "1" && $laporan->status_baru <= "6")) ? "block" : "none"; ?>;" class="col-6">
                                        <div class="row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Kasus Ke</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kasus" placeholder="Kasus ke" disabled value="<?= $laporan->kasus; ?>">
                                            </div>
                                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($cek) : ?>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" method="post" action="<?php echo site_url('../kasus/add_riwayat/' . $laporan->id_laporan); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="form-label">Status Pasien</label>
                                            <input type="hidden" name="kasus_lama" value="<?= $laporan->kasus; ?>">
                                            <select name="status" class="form-control select2" id="status" style="width: 100%" required>
                                                <option selected disabled>Pilih</option>
                                                <?php
                                                foreach ($status as $key) :
                                                    if ($key->id_status_2 != $laporan->status_baru) :
                                                ?>
                                                        <option value="<?= $key->id_status_2; ?>"><?= $key->nama_status; ?></option>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="form-label">Kondisi Umum</label>
                                            <textarea class="form-control" name="keterangan"></textarea>
                                        </div>
                                        <div class="form-group" id="f_akhir" style="display: none;">
                                            <label for="inputEmail3" class="form-label">Faskes</label>
                                            <select name="faskes_akhir" id="faskes_akhir" class="form-control select2" style="width: 100%;">
                                            </select>
                                            <small>*Data akan berpindah ke RS yang di pilih</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Riwayat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Kondisi Umum</th>
                                        <th>Faskes Terakhir</th>
                                        <th>Update Terakhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($riwayat as $key) : ?>
                                        <tr>
                                            <td><?= $key->nama_status; ?></td>
                                            <td><?= $key->kondisi_umum; ?></td>
                                            <td><?= $key->lokasi_rs; ?></td>
                                            <td><?= $key->updated_at; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

        $('#status').change(function() {
            var id = $(this).val();
            if (id == 1 || id == 5 || id == 7 || id == 11 || id == 13 || id == 16 || id == 6 || id == 12 || id == 17) {
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

    });
</script>