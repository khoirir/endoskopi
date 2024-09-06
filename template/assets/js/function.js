function hpskotakab(kota) {
    var kab = kota;
    var kab_l = kab.length;
    var temp = new Array();
    temp = kota.split(" ");
    var value = "";
    if (temp[0].toUpperCase() === "KOTA" || temp[0].toUpperCase() === "KABUPATEN") {
        var value_l = kab_l - temp[0].length
        value = kab.substring(temp[0].length + 1);
    } else {
        value = kab;
    }
    return value;
}

function jklengkap(jk) {
    var jlvalue = ""
    if (jk.toUpperCase() === "L")
        jkvalue = "LAKI-LAKI"
    else if (jk.toUpperCase() === "P") {
        jkvalue = "PEREMPUAN"
    }
    return jkvalue;
}

function getDate(format) {
    let getDate = new Date();
    let dd = String(getDate.getDate()).padStart(2, '0');
    let mm = String(getDate.getMonth() + 1).padStart(2, '0');
    let yy = getDate.getFullYear().toString();
    let HH = String(getDate.getHours()).padStart(2, '0');
    let MM = String(getDate.getMinutes()).padStart(2, '0');
    let SS = String(getDate.getSeconds()).padStart(2, '0');
    let today = "";
    // yy.substr(-2)+mm+dd;
    if (format == "dd-mm-yyyy HH:MM:SS") {
        today = dd + "-" + mm + "-" + yy + " " + HH + ":" + MM + ":" + SS;
    } else if (format == "yyyy-mm-dd HH:MM:SS") {
        today = yy + "-" + mm + "-" + dd + " " + HH + ":" + MM + ":" + SS;
    } else if (format == "yyyy-mm-dd") {
        today = yy + "-" + mm + "-" + dd;
    } else if (format == "dd-mm-yyyy") {
        today = dd + "-" + mm + "-" + yy;
    } else if (format == "yymmdd") {
        today = yy.substr(-2) + mm + dd;
    } else if (format == "HH:MM") {
        today = HH + ":" + MM;
    } else if (format == "yymmddHHMMSS") {
        today = yy.substr(-2) + mm + dd + HH + MM + SS;
    } else if (format == "ddmmyyHHMMSS") {
        today = dd + mm + yy.substr(-2) + HH + MM + SS;
    }
    return today;

}

function hitungUmur(tgllahir) {
    var today = new Date();
    var date = new Date(tgllahir.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    var birthDate = new Date(date);
    var y = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var d = today.getDate() - birthDate.getDate();
    if (d < 0) {
        d = 30 - Math.abs(d);
        m -= 1;
    }
    if (m < 0) {
        m = 12 - Math.abs(m);
        y -= 1;
    }
    return y + "TH " + m + "BL " + d + "HR";
}

function tambahRP(rp) {
    var f_rp = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(rp);
    var r_simbol = f_rp.substring(0, f_rp.length - 2);
    return r_simbol;
}

function hapusRP(rp) {
    // var h_rp=rp.substring(3,rp.length);
    var h_titik = rp.replace(/\./g, '');
    var h_koma = h_titik.replace(',', '');
    var h = h_koma / 100;
    return h;
}

function _(id) {
    return document.getElementById(id);
}
function css(id) {
    return document.getElementById(id).style;
}
function _nm(name) {
    return document.getElementsByName(name);
}

function ubahFormatTanggal(tglpelaksanaan, tgl) {
    var date = new Date(tglpelaksanaan.substring(0, 11).replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    var dy = date.getFullYear();
    var dm = ("0" + (date.getMonth() + 1)).slice(-2);
    var dd = ("0" + date.getDate()).slice(-2);
    if (tgl === 1) {
        return dy + "-" + dm + "-" + dd;
    } else {
        return tglpelaksanaan.substring(11, 16);
    }
}

function formatTanggal(idtgl, idjam) {
    let tgl = new Date($('#' + idtgl).val().replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    let dd = String(tgl.getDate()).padStart(2, '0');
    let mm = String(tgl.getMonth() + 1).padStart(2, '0');
    let yy = tgl.getFullYear().toString();

    return yy + '-' + mm + '-' + dd + " " + _(idjam).value + ':00';
}

function formatSatuTanggal(idtgl) {
    let tgl = new Date($('#' + idtgl).val().replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    let dd = String(tgl.getDate()).padStart(2, '0');
    let mm = String(tgl.getMonth() + 1).padStart(2, '0');
    let yy = tgl.getFullYear().toString();
    let jam = $('#' + idtgl).val().substring(11, 19)

    return yy + '-' + mm + '-' + dd + " " + jam;
}

function formatTanggalData(get_tgl) {
    let tgl = new Date(get_tgl.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    let dd = String(tgl.getDate()).padStart(2, '0');
    let mm = String(tgl.getMonth() + 1).padStart(2, '0');
    let yy = tgl.getFullYear().toString();
    let jam = get_tgl.substring(11, 19)

    return dd + '-' + mm + '-' + yy + " " + jam;
}

function formatTanggalLahir(get_tgl) {
    let tgl = new Date(get_tgl.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    let dd = String(tgl.getDate()).padStart(2, '0');
    let mm = String(tgl.getMonth() + 1).padStart(2, '0');
    let yy = tgl.getFullYear().toString();
    let jam = get_tgl.substring(11, 19)

    return dd + '-' + mm + '-' + yy;
}

function radioGetValue(radioname) {
    let instalasi = "";
    let radIns = document.getElementsByName(radioname);
    let radioLength = radIns.length;
    for (let i = 0; i < radioLength; i++) {
        if (radIns[i].checked) {
            instalasi = radIns[i].value;
        }
    }
    return instalasi;
}

// function getBetweenString(text,first,second){
//     var result="";
//     var test = text;
//     var firstvariable = first; //first input;
//     var secondvariable = second; //second input;
//     var regExString = new RegExp("(?:"+firstvariable+")((.[\\s\\S]*))(?:"+secondvariable+")", "ig");
//     var testRE = regExString.exec(test);

//     if (testRE && testRE.length > 1)
//     {  
//       result = testRE[1]; //return second result.
//     }

//     return result;
// }

// $("#btnGuru").click(function () {
//     tableToExcel('tampil_data', 'W3C Example Table');
// });


// var tableToExcel = (function () {
//     var uri = 'data:application/vnd.ms-excel;base64,'
//         ,template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
//         ,base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
//         ,format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
//         return function (table, name) {
//             if (!table.nodeType) table = document.getElementById(table)
//             var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
//             window.location.href = uri + base64(format(template, ctx))
//         }
// })();


// function formatRupiah(angka, prefix){
//     var number_string = angka.toString(),
//         split           = number_string.split(','),
//         sisa            = split[0].length % 3,
//         rupiah          = split[0].substr(0, sisa),
//         ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

//         // tambahkan titik jika yang di input sudah menjadi angka ribuan
//     if(ribuan){
//         separator = sisa ? '.' : '';
//         rupiah += separator + ribuan.join('.');
//     }

//     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
//     return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
// }



// $(function() {
//         $('input[type=file]').change(function (){
//             var regex = new RegExp("(.*?)\.(jpg|jpeg|png|pdf)$");
//             var f = this.files[0];
//             $.each(this.files, function (index, file) {
//                 fileName = file.name;
//                 fileName =fileName.toLowerCase();
//                 if(!(regex.test(fileName))) {
//                     swal({
//                         title: "Gagal",
//                         text: "Format File Tidak Sesuai,\nUpload File PDF/JPG/JPEG/PNG",
//                         confirmButtonColor: "#EF5350",
//                         type: "error"
//                     });
//                 }
//             });
//         });
//     });