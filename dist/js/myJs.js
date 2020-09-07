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

function kasus_lama() {
  $("#modalku").modal();
  $(".modal-title").html("Tambah Kasus Lama");
  var origin = window.location.origin + "/laporkan-v2/kasus/modal_tambah_lama";
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function ubah_kasus(id) {
  $("#modalku").modal();
  $(".modal-title").html("Ubah Kasus");
  var origin = window.location.origin + "/laporkan-v2/kasus/modal_ubah/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function detail_kasus(id) {
  $("#modalku").modal();
  $(".modal-title").html("Detail Kasus");
  var origin = window.location.origin + "/laporkan-v2/kasus/modal_detail/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function riwayat_kasus(id) {
  $("#modalku").modal();
  $(".modal-title").html("Riwayat Kasus");
  var origin =
    window.location.origin + "/laporkan-v2/kasus/modal_riwayat/" + id;
  $.ajax({
    type: "POST",
    url: origin,
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function selesai_isolasi(id, kode) {
  var url =
    window.location.origin + "/laporkan-v2/kasus/selesai_isolasi/" + kode + "/";
  var cek = confirm("Yakin Pasien selesai isolasi?");
  if (cek) {
    window.location = url + id;
  }
}

function pasien_die(id, kode) {
  var url =
    window.location.origin + "/laporkan-v2/kasus/meninggal/" + kode + "/";
  var cek = confirm("Yakin Pasien Meninggal?");
  if (cek) {
    window.location = url + id;
  }
}

function kasus_positif(id, kode) {
  var url = window.location.origin + "/laporkan-v2/kasus/positif/";
  var cek = confirm("Yakin Pasien Terkonfirmasi Positif?");
  if (cek) {
    window.location = url + id;
  }
}

var url_grafik = window.location.origin + "/laporkan-v2/servicesV2/";
get_chart_harian();
// console.log(url_grafik);
function get_chart_harian() {
  let chart_harian_covid_sum = echarts.init(
    document.getElementById("chart-harian-covid-sum")
  );
  $.ajax({
    type: "post",
    url: url_grafik + "get_data_harian_2",
    cache: false,
    async: true,
    dataType: "JSON",
    success: function (data, textStatus, jqXHR) {
      let dt = [];

      $.each(data, function (index, val) {
        dt.push({ tanggal: val.tanggal, covid: val.covid });
      });

      console.log(dt);

      optionAll = {
        tooltip: {
          trigger: "axis",
        },
        title: {
          text: "Pertumbuhan Kasus TERKONFIRMASI di Jawa Tengah",
          x: "center",
          subtext: "Data diambil pada " + new Date(),
        },
        /* legend: {
              data:['SUSPEK proses', 'SUSPEK selesai'],
              align: 'left'
          }, */
        xAxis: {
          type: "category",
          boundaryGap: false,
          axisLabel: {
            formatter: function (value) {
              return value.split("-").reverse().join("-").substring(0, 5);
            },
          },
        },
        yAxis: {
          name: "Jumlah kasus",
          type: "value",
        },
        dataset: {
          source: dt,
        },
        dataZoom: [
          {
            type: "inside",
            start: 0,
            end: 100,
          },
          {
            start: 0,
            end: 100,
            handleIcon:
              "M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z",
            handleSize: "80%",
            handleStyle: {
              color: "#fff",
              shadowBlur: 3,
              shadowColor: "rgba(0, 0, 0, 0.6)",
              shadowOffsetX: 2,
              shadowOffsetY: 2,
            },
          },
        ],
        series: [
          {
            name: "TERKONFIRMASI",
            type: "line",
            symbol: "none",
            itemStyle: {
              color: "#F92925",
            },
            encode: { x: "tanggal", y: "covid" },
          },
        ],
      };

      chart_harian_covid_sum.setOption(optionAll);
    },
  });

  $(window).on("resize", function () {
    setTimeout(function () {
      chart_harian_covid_sum.resize();
    }, 200);
  });
}
