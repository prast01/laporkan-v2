$(function () {
  var url = window.location.origin + "/laporkan-v2/datatables/";
  $(".datatable-odp").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_odp",
      type: "POST",
    },
    order: [
      [1, "desc"],
      [7, "asc"],
    ],
  });
  $(".datatable-pdp").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_pdp",
      type: "POST",
    },
    order: [[1, "desc"]],
  });
  $(".datatable-covid").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_covid",
      type: "POST",
    },
    order: [[1, "desc"]],
  });
  $(".datatable-pdp-rs").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_pdp_rs",
      type: "POST",
    },
    order: [[8, "asc"]],
  });
  $(".datatable-covid-rs").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_covid_rs",
      type: "POST",
    },
    order: [[9, "asc"]],
  });
  $(".datatable-otg").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_otg",
      type: "POST",
    },
    order: [[1, "desc"]],
  });
  $(".datatable-karantina").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_karantina",
      type: "POST",
    },
    order: [[1, "desc"]],
  });
  $(".datatable-covid-jateng").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_covid_jateng",
      type: "POST",
    },
    order: [[1, "desc"]],
  });
  $(".datatable-swab").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_swab",
      type: "POST",
    },
    order: [[9, "asc"]],
  });

  // terkonfirmasi
  var dt_confirmed = $(".datatable-terkonfirmasi").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_terkonfirmasi",
      type: "POST",
      data: function (d) {
        d.filterByRS = $("#filterByHospitalConfirmed").val();
        d.filterByStatus = $("#filterByStatusConfirmed").val();
      },
    },
    order: [[0, "desc"]],
  });

  $("#filterByHospitalConfirmed").change(function () {
    dt_confirmed.ajax.reload();
  });

  $("#filterByStatusConfirmed").change(function () {
    dt_confirmed.ajax.reload();
  });

  // probable
  var dt_propable = $(".datatable-probable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_probable",
      type: "POST",
      data: function (d) {
        d.filterByRS = $("#filterByHospitalProbable").val();
        d.filterByStatus = $("#filterByStatusProbable").val();
      },
    },
    order: [[1, "desc"]],
  });

  $("#filterByHospitalProbable").change(function () {
    dt_propable.ajax.reload();
  });

  $("#filterByStatusProbable").change(function () {
    dt_propable.ajax.reload();
  });

  // suspek
  var dt_suspek = $(".datatable-suspek").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_suspek",
      type: "POST",
      data: function (d) {
        d.filterByRS = $("#filterByHospitalSuspek").val();
        d.filterByStatus = $("#filterByStatusSuspek").val();
      },
    },
    order: [[1, "desc"]],
  });

  $("#filterByHospitalSuspek").change(function () {
    dt_suspek.ajax.reload();
  });

  $("#filterByStatusSuspek").change(function () {
    dt_suspek.ajax.reload();
  });

  // kontak
  var dt_kontak = $(".datatable-kontak").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: url + "data_kontak",
      type: "POST",
      data: function (d) {
        d.filterByRS = $("#filterByHospitalKontak").val();
        d.filterByStatus = $("#filterByStatusKontak").val();
      },
    },
    order: [[1, "desc"]],
  });

  $("#filterByHospitalKontak").change(function () {
    dt_kontak.ajax.reload();
  });

  $("#filterByStatusKontak").change(function () {
    dt_kontak.ajax.reload();
  });

  $(".datatable").DataTable();
  //Initialize Select2 Elements
  $(".select2").select2();

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;

  // var pusher = new Pusher("b1813ff66e7edbd37ba0", {
  //   cluster: "ap1",
  //   forceTLS: true,
  // });

  // var channel = pusher.subscribe("my-channel");
  // channel.bind("my-event", function (data) {
  //   if (data.message === "success") {
  //   }
  // });
});
function modal(id) {
  $("#modalku").modal();
  $(".modal-title").html("Tambah Data");
  var origin = window.location.origin + "/laporkan-v2/home/modal/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal2(id) {
  $("#modalku").modal();
  $(".modal-title").html("Ubah Data");
  var origin = window.location.origin + "/laporkan-v2/home/modal2/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal3(id) {
  $("#modalku").modal();
  $(".modal-title").html("Validasi Data");
  var origin = window.location.origin + "/laporkan-v2/home/modal3/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal4(id) {
  $("#modalku").modal();
  $(".modal-title").html("Data Laporan ODP dan PDP");
  var origin = window.location.origin + "/laporkan-v2/home/modal4/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal5(id) {
  $("#modalku").modal();
  $(".modal-title").html("Data Laporan ODP dan PDP");
  var origin = window.location.origin + "/laporkan-v2/home/modal5/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal6(id) {
  $("#modalku").modal();
  $(".modal-title").html("Merujuk Pasien");
  var origin = window.location.origin + "/laporkan-v2/home/modal6/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal7(id) {
  $("#modalku").modal();
  $(".modal-title").html("ODP ke PDP");
  var origin = window.location.origin + "/laporkan-v2/home/modal7/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal8() {
  $("#modalku").modal();
  $(".modal-title").html("Tambah Faskes Luar");
  var origin = window.location.origin + "/laporkan-v2/home/modal8";
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modal9(id) {
  $("#modalku").modal();
  $(".modal-title").html("Ubah Data");
  var origin = window.location.origin + "/laporkan-v2/home/modal9/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal10(id) {
  $("#modalku").modal();
  $(".modal-title").html("Tracing Riwayat Kontak Pasien");
  var origin = window.location.origin + "/laporkan-v2/home/modal10/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal11() {
  $("#modalku").modal();
  $(".modal-title").html("Tambah OTG");
  var origin = window.location.origin + "/laporkan-v2/home/modal11";
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal12(id) {
  $("#modalku").modal();
  $(".modal-title").html("Ubah OTG");
  var origin = window.location.origin + "/laporkan-v2/home/modal12/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal13(id) {
  $("#modalku").modal();
  $(".modal-title").html("Detail Data");
  var origin = window.location.origin + "/laporkan-v2/home/modal13/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal14(id) {
  $("#modalku").modal();
  $(".modal-title").html("Detail OTG");
  var origin = window.location.origin + "/laporkan-v2/home/modal14/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modal15(id) {
  $("#modalku").modal();
  $(".modal-title").html("SWAB");
  var origin = window.location.origin + "/laporkan-v2/home/modal15/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function positif(id, kondisi) {
  var url = window.location.origin + "/laporkan-v2/home/positif/";
  // if (kondisi == '2') {
  var cek = confirm("Yakin Pasien Positif COVID-19?");
  if (cek) {
    window.location = url + id + "/" + kondisi;
  }
  // }
}
function negatif(id, kondisi) {
  var url = window.location.origin + "/laporkan-v2/home/negatif/";
  if (kondisi == "1") {
    var cek = confirm("Yakin Sudah Selesai Pantau?");
    if (cek) {
      window.location = url + id + "/" + kondisi;
    }
  }
}
function sembuh(id, kondisi) {
  var url = window.location.origin + "/laporkan-v2/home/sembuh/";
  if (kondisi == "2") {
    var cek = confirm("Yakin Pasien Pulang/Sehat?");
    if (cek) {
      window.location = url + id + "/" + kondisi;
    }
  } else if (kondisi == "3") {
    var cek = confirm("Yakin Pasien Sembuh?");
    if (cek) {
      window.location = url + id + "/" + kondisi;
    }
  }
}
function meninggal(id, kondisi) {
  var url = window.location.origin + "/laporkan-v2/home/meninggal/";
  if (kondisi == "2") {
    var cek = confirm("Yakin Pasien Meninggal?");
    if (cek) {
      window.location = url + id + "/" + kondisi;
    }
  } else if (kondisi == "3") {
    var cek = confirm("Yakin Pasien Meninggal?");
    if (cek) {
      window.location = url + id + "/" + kondisi;
    }
  }
}
function modalRDT(id) {
  $("#modalku").modal();
  $(".modal-title").html("Data Laporan RDT");
  var origin = window.location.origin + "/laporkan-v2/home/modal_rdt/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modalKarantina() {
  $("#modalku").modal();
  $(".modal-title").html("Tambah Pasien Karantina");
  var origin = window.location.origin + "/laporkan-v2/home/modalKarantina";
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
function modalKarantina2(id) {
  $("#modalku").modal();
  $(".modal-title").html("Ubah Data");
  var origin =
    window.location.origin + "/laporkan-v2/home/modalKarantina2/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function ambil(id) {
  var url = window.location.origin + "/laporkan-v2/pasien/ambil/";
  var cek = confirm("Yakin Ambil Data Pasien?");
  if (cek) {
    window.location = url + id;
  }
}

function hapus(id) {
  var url = window.location.origin + "/laporkan-v2/pasien/hapus/";
  var cek = confirm("Yakin Hapus Data Pasien?");
  if (cek) {
    window.location = url + id;
  }
}

function keluar(id) {
  var url = window.location.origin + "/laporkan-v2/tempatKarantina/keluar/";
  var cek = confirm("Yakin Pasien Keluar Tempat Karantina?");
  if (cek) {
    window.location = url + id;
  }
}

function hapusSwab(id) {
  var url = window.location.origin + "/laporkan-v2/swab/hapus/";
  var cek = confirm("Yakin Sudah Hapus Data?");
  if (cek) {
    window.location = url + id;
  }
}

function modalSwab(id, id_lap) {
  $("#modalku").modal();
  $(".modal-title").html("FORM SWAB");
  var origin =
    window.location.origin +
    "/laporkan-v2/home/modal_swab/" +
    id +
    "/" +
    id_lap;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modalSwabSelesai(id, id_lap) {
  $("#modalku").modal();
  $(".modal-title").html("FORM SWAB");
  var origin =
    window.location.origin +
    "/laporkan-v2/home/modal_swab_selesai/" +
    id +
    "/" +
    id_lap;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function modalSwabEdit(id, id_lap) {
  $("#modalku").modal();
  $(".modal-title").html("FORM SWAB");
  var origin =
    window.location.origin +
    "/laporkan-v2/home/modal_swab_edit/" +
    id +
    "/" +
    id_lap;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function tambah_kasus() {
  $("#modalku").modal();
  $(".modal-title").html("Tambah Kasus");
  var origin = window.location.origin + "/laporkan-v2/kasus/modal_tambah";
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}
