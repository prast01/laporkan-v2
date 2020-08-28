
$(function () {
    var url = window.location.origin+'/laporkan/datatables/';
    $('.datatable-odp').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_odp",
                "type": "POST"
            },
            "order" : [[1, "desc"], [7, "asc"]]
        }
    );
    $('.datatable-pdp').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_pdp",
                "type": "POST"
            },
            "order" : [[1, "desc"]]
        }
    );
    $('.datatable-covid').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_covid",
                "type": "POST"
            },
            "order" : [[1, "desc"]]
        }
    );
    $('.datatable-pdp-rs').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_pdp_rs",
                "type": "POST"
            },
            "order" : [[8, "asc"]]
        }
    );
    $('.datatable-covid-rs').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_covid_rs",
                "type": "POST"
            },
            "order" : [[9, "asc"]]
        }
    );
    $('.datatable-otg').DataTable(
        {
            "processing": true,
            "serverSide" : true,
            "ajax": {
                "url": url+"data_otg",
                "type": "POST"
            },
            "order" : [[1, "desc"]]
        }
    );
    //Initialize Select2 Elements
    $('.select2').select2();
    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b1813ff66e7edbd37ba0', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        if(data.message === 'success'){

        }
    });

});
function modal(id) {
    $("#modalku").modal();
    $('.modal-title').html('Tambah Data');
    var origin = window.location.origin+'/laporkan/home/modal/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal2(id) {
    $("#modalku").modal();
    $('.modal-title').html('Ubah Data');
    var origin = window.location.origin+'/laporkan/home/modal2/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal3(id) {
    $("#modalku").modal();
    $('.modal-title').html('Validasi Data');
    var origin = window.location.origin+'/laporkan/home/modal3/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal4(id) {
    $("#modalku").modal();
    $('.modal-title').html('Data Laporan ODP dan PDP');
    var origin = window.location.origin+'/laporkan/home/modal4/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal5(id) {
    $("#modalku").modal();
    $('.modal-title').html('Data Laporan ODP dan PDP');
    var origin = window.location.origin+'/laporkan/home/modal5/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal6(id) {
    $("#modalku").modal();
    $('.modal-title').html('Merujuk Pasien');
    var origin = window.location.origin+'/laporkan/home/modal6/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal7(id) {
    $("#modalku").modal();
    $('.modal-title').html('ODP ke PDP');
    var origin = window.location.origin+'/laporkan/home/modal7/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal8() {
    $("#modalku").modal();
    $('.modal-title').html('Tambah Faskes Luar');
    var origin = window.location.origin+'/laporkan/home/modal8';
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}
function modal9(id) {
    $("#modalku").modal();
    $('.modal-title').html('Ubah Data');
    var origin = window.location.origin+'/laporkan/home/modal9/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal10(id) {
    $("#modalku").modal();
    $('.modal-title').html('Tracing Riwayat Kontak Pasien');
    var origin = window.location.origin+'/laporkan/home/modal10/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal11() {
    $("#modalku").modal();
    $('.modal-title').html('Tambah OTG');
    var origin = window.location.origin+'/laporkan/home/modal11';
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal12(id) {
    $("#modalku").modal();
    $('.modal-title').html('Ubah OTG');
    var origin = window.location.origin+'/laporkan/home/modal12/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal13(id) {
    $("#modalku").modal();
    $('.modal-title').html('Detail Data');
    var origin = window.location.origin+'/laporkan/home/modal13/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal14(id) {
    $("#modalku").modal();
    $('.modal-title').html('Detail OTG');
    var origin = window.location.origin+'/laporkan/home/modal14/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function modal15(id) {
    $("#modalku").modal();
    $('.modal-title').html('SWAB');
    var origin = window.location.origin+'/laporkan/home/modal15/'+id;
    $.ajax({ 
        type: 'POST', 
        url: origin,
        success: function (data) {
            $(".modal-body").html(data);
        }
    });
}

function positif(id, kondisi) {
    var url = window.location.origin+'/laporkan/home/positif/';
    if (kondisi == '2') {
        var cek = confirm('Yakin Pasien Positif COVID-19?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    }
}
function negatif(id, kondisi) {
    var url = window.location.origin+'/laporkan/home/negatif/';
    if (kondisi == '1') {
        var cek = confirm('Yakin Sudah Selesai Pantau?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    }
}
function sembuh(id, kondisi) {
    var url = window.location.origin+'/laporkan/home/sembuh/';
    if (kondisi == '2') {
        var cek = confirm('Yakin Pasien Pulang/Sehat?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    } else if (kondisi == '3') {
        var cek = confirm('Yakin Pasien Sembuh?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    }
}
function meninggal(id, kondisi) {
    var url = window.location.origin+'/laporkan/home/meninggal/';
    if (kondisi == '2') {
        var cek = confirm('Yakin Pasien Meninggal?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    } else if (kondisi == '3') {
        var cek = confirm('Yakin Pasien Meninggal?');
        if (cek) {
            window.location = url+id+"/"+kondisi;
        }
    }
}