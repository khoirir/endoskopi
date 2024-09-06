<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i>Beranda</a></li>
                <li class="active">Permintaan Operasi</li>
                <li class="active">Sudah Dikonfirmasi</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-custom">
                <h6 class="panel-title">DATA PEMESANAN JADWAL OPERASI SUDAH KONFIRMASI</h6>
            </div>
            <div class="modal-body">
                <table id="tampil_data" class="table datatable-basic table-framed">
                    <thead>
                        <tr style="background:#eee;">
                            <th style="text-align: center;">NO.</th>
                            <th style="text-align: center;">NO. REGISTRASI OPERASI</th>
                            <th style="text-align: center;">NO. RM</th>
                            <th style="text-align: center;">NAMA PASIEN</th>
                            <th style="text-align: center;">ASAL PASIEN</th>
                            <th style="text-align: center;">UNIT</th>
                            <th style="text-align: center;">JENIS OPERASI</th>
                            <th style="text-align: center;">WAKTU PERMINTAAN</th>
                            <th style="text-align: center;">WAKTU PELAKSANAAN</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="modal_full" class="modal fade">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">DETAIL PEMESANAN JADWAL OPERASI</h5>
                    </div>
                    <form role="form" class="form-horizontal">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li><a href="#tab-identitas-pasien" data-toggle="tab"><i class="fa fa-wheelchair position-left"></i>IDENTITAS PASIEN</a></li>
                                    <li><a href="#tab-asal-pasien" data-toggle="tab"><i class="fa fa-hospital-o position-left"></i>ASAL PASIEN</a></li>
                                    <li class="active"><a href="#tab-pemesanan-operasi" data-toggle="tab"><i class="fa fa-medkit position-left"></i></i>PEMESANAN OPERASI</a></li>
                                    <li><a href="#tab-diagnosa-pasien" data-toggle="tab"><i class="fa fa-stethoscope position-left"></i></i>DIAGNOSA PASIEN</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab-identitas-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>No. RM</b></label>
                                                    <input id="norm" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Nama</b></label>
                                                    <input id="nama" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tempat/Tgl. Lahir</b></label>
                                                    <input id="tmptgllahir" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Umur</b></label>
                                                    <input id="umur" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Jenis Kelamin</b></label>
                                                    <input id="jk" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Alamat</b></label>
                                                    <textarea id="alamat" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-asal-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>No. Daftar</b></label>
                                                    <input id="nodaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Daftar</b></label>
                                                    <input id="tgldaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>No. Registrasi</b></label>
                                                    <input id="noreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Registrasi</b></label>
                                                    <input id="tglreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Ruang/Poli</b></label>
                                                    <input id="ruangpoli" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Kelas</b></label>
                                                    <input id="kelas" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Cara Bayar</b></label>
                                                    <input id="carabayar" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Penjamin</b></label>
                                                    <input id="penjamin" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane active" id="tab-pemesanan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Jenis Operasi</b></label>
                                                    <span class='label label-danger' style='font-size:13px; padding-top:8px; width:100%; height:35px' id="jenisop"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Keterangan</b></label>
                                                    <input id="keterangan" type="text" class="form-control" disabled="disabled" style="color:black">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>No. Registrasi Operasi</b></label>
                                                    <input id="noregop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Registrasi Operasi</b></label>
                                                    <input id="tglregop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Pengirim</b></label>
                                                    <input id="dokterpengirim" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Permintaan Tindakan</b></label>
                                                    <textarea id="tindakan" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Waktu Pemesanan Operasi</b></label>
                                                    <input id="wktpemesanan" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Tgl. Pelayanan Operasi<span class="text-danger"> *</span></b></label>
                                                            <input id="tglpelaksanaanop" type="date" class="form-control" style="color:black" required="required">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Jam Pelayanan Operasi<span class="text-danger"> *</span></b></label>
                                                            <input id="jampelaksanaanop" type="time" class="form-control" style="color:black" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <div style="text-align: left;">
                                                <span class="text-danger"><b>* Wajib Diisi</b></span>
                                            </div>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                            <button type="button" class="btn btn-danger btn-labeled" id="btn_batal"><b><i class="glyphicon glyphicon-floppy-remove"></i></b>BATAL OPERASI</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-diagnosa-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Sars Covid</b></label>
                                                    <input id="sarscovid" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa Pra Operasi</b></label>
                                                    <textarea id="diagnosapre" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Diagnosa</b></label>
                                                    <input id="dokterdiagnosapra" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa ICD</b></label>
                                                    <div class="table-responsive pre-scrollable tableFixHead">
                                                        <table class="table table-xs table-framed" id="tbl_diagnosa">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center">TGL. DIAGNOSA</th>
                                                                    <th style="text-align:center">KODE</th>
                                                                    <th style="text-align:center">DIAGNOSA</th>
                                                                    <th style="text-align:center">DESKRIPSI</th>
                                                                    <th style="text-align:center">JENIS DIAGNOSA</th>
                                                                    <th style="text-align:center">DOKTER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /basic responsive configuration -->

        <style type="text/css">
            .tableFixHead {
                overflow-y: auto;
                height: 300px;
            }

            .tableFixHead thead th {
                position: sticky;
                top: 0;
            }

            .tableFixHead th {
                background: #eee;
            }
        </style>

        <script type="text/javascript">
            var tabel;
            $(document).ready(function() {
                tabel = $('#tampil_data').dataTable({
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "bInfo": false,
                    "ordering": true,
                    "order": [
                        [8, 'ASC']
                    ],
                    "ajax": {
                        "url": "<?php echo base_url('permintaansudah/permintaanList') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "lengthMenu": [
                        [10, 50, 100],
                        [10, 50, 100]
                    ],
                    "columnDefs": [{
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            "targets": [0],
                            "orderable": false,
                            "width": "3%",
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                var noregistrasi = row.noregop
                                var html = /*html*/ `<a data-toggle='modal' data-target='#modal_full' onclick="getDetail('${noregistrasi}');">${noregistrasi}</a>`
                                return html;
                            },
                            "targets": [1],
                            "orderable": false,
                            "className": "text-center"
                        },
                        {
                            "data": "norm",
                            "targets": [2],
                            "orderable": false,
                            "className": "text-center"
                        },
                        {
                            "data": "pasien",
                            "targets": [3],
                            "orderable": false
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.instalasi.toUpperCase()
                                return html;
                            },
                            "targets": [4]
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.unit.toUpperCase()
                                return html;
                            },
                            "targets": [5],
                        },
                        {
                            "render": function(data, type, row) {
                                var html = /*html*/ `<span class='label label-${row.warnajenisop}' style='width:100px'>${row.jenisop}</span>`;
                                return html;
                            },
                            "targets": [6],
                            "orderable": true,
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                return formatTanggalData(row.tglpermintaanop);
                            },
                            "targets": [7]
                        },
                        {
                            "render": function(data, type, row) {
                                return formatTanggalData(row.tglkonfirmasiop);
                            },
                            "targets": [8]
                        },
                        {
                            "render": function(data, type, row) {
                                var noregistrasi = row.noregop;
                                var norm = row.norm;
                                var waktupelaksanaan = row.tgljadwalop;
                                let labeltindakan = row.tgltindakan;
                                let html = /*html*/ `<a data-popup='tooltip' title='Isi Tindakan' type='button' onclick="inputTindakan('${noregistrasi}','${waktupelaksanaan}')" class='btn btn-${labeltindakan} btn-icon'><i class='glyphicon glyphicon-pencil'></i></a>`;
                                return html;
                            },
                            "targets": [9],
                            "orderable": false,
                            "width": "5%",
                            "className": "text-center"
                        }
                    ]
                });
            });



            // window.setInterval(function() {
            //     $('#tampil_data').DataTable().ajax.reload(null, false);
            // }, 60000);


            function getDetailPasien(norm) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDetailPasien'); ?>",
                    dataType: "JSON",
                    data: {
                        norm: norm
                    },
                    success: function(data) {
                        $('#norm').val(data.norm);
                        $('#nama').val(data.namapasien);
                        $('#tmptgllahir').val(hpskotakab(data.tmplahir).toUpperCase() + " / " + data.tgllahir);
                        $('#umur').val(hitungUmur(data.tgllahir));
                        $('#jk').val(jklengkap(data.jk));
                        let alamat = data.alamat + ", " + data.kelurahan + ", " + data.kecamatan + ", " + data.kabupaten + ", " + data.provinsi;
                        $('#alamat').val(alamat.toUpperCase());
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function getDetailAsalPasien(noregistrasi) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDetailAsalPasien'); ?>",
                    dataType: "JSON",
                    data: {
                        noregistrasi: noregistrasi
                    },
                    success: function(data) {
                        _("nodaftar").value = data.nodaftar;
                        _("tgldaftar").value = data.tgldaftar;
                        $('#noreg').val(data.noregistrasi);
                        $('#tglreg').val(data.tglregistrasi);
                        $('#ruangpoli').val(data.unitasal.toUpperCase());
                        $('#kelas').val(data.kelas == "" ? "-" : data.kelas);
                        $('#penjamin').val(data.penjamin.toUpperCase());
                        $('#carabayar').val(data.carabayar.toUpperCase());
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function getDetail(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDetailPemesananOperasi'); ?>",
                    dataType: "JSON",
                    data: {
                        noregop: noregop
                    },
                    success: function(data) {
                        _('noregop').value = data.noregistrasiop;
                        _("jenisop").innerHTML = data.jenisop;
                        _("jenisop").className = "label label-" + data.warnajenisop;
                        $('#dokterpengirim').val(data.dokterpengirim);
                        $('#tglregop').val(data.tglregistrasiop);
                        $('#wktpemesanan').val(data.tglpermintaanop);
                        _('keterangan').value = data.keterangan == "" ? "-" : data.keterangan;
                        $('#tglpelaksanaanop').val(data.tgljadwalop == null ? "" : ubahFormatTanggal(data.tgljadwalop, 1));
                        $('#jampelaksanaanop').val(data.tgljadwalop == null ? "" : ubahFormatTanggal(data.tgljadwalop, 0));

                        getDetailPasien(data.norm);
                        getDetailAsalPasien(data.noregistrasi);
                        getDetailTindakan(data.noregistrasiop);
                        getDiagnosaPrapost(data.noregistrasiop);
                        getDiagnosaPasien(data.norm);
                    }
                });
            }

            function getDetailTindakan(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDetailTindakanPasien'); ?>",
                    dataType: "JSON",
                    data: {
                        noregop: noregop
                    },
                    success: function(data) {
                        var list_tindakan = '';
                        for (var i = 0; i < data.length; i++) {
                            list_tindakan += '\n-  ' + data[i].tindakan;
                        }
                        _('tindakan').value = list_tindakan.substring(1) == "-  null" ? "-" : list_tindakan.substring(1);
                    }
                });
            }

            function getDiagnosaPrapost(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDiagnosaPrapost'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: function(data) {
                        _("sarscovid").value = data.sarscovid.toUpperCase();
                        if (data.diagnosapra != null) {
                            let list_diagnosapra = data.diagnosapra.split(';').join("\n-  ");
                            $('#diagnosapre').val(list_diagnosapra.substring(1).toUpperCase());
                        }
                        _("dokterdiagnosapra").value = data.dokterdiagnosapra;
                    }
                });
            }

            function getDiagnosaPasien(norm) {
                let table = _("tbl_diagnosa");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaansudah/getDiagnosaPasien'); ?>",
                    data: {
                        norm: norm
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.length != 0) {
                            let row_count = table.tBodies[0].rows.length;
                            let data_clean = [...new Set(data.map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
                            for (let i = 0; i < data_clean.length; i++) {
                                let row_insert = table.tBodies[0].insertRow(row_count);
                                let TGL_DIAGNOSA = row_insert.insertCell(0);
                                let KODE = row_insert.insertCell(1);
                                KODE.style.textAlign = "center";
                                let DIAGNOSA = row_insert.insertCell(2);
                                let DESKRIPSI = row_insert.insertCell(3);
                                let JENIS_DIAGNOSA = row_insert.insertCell(4);
                                let DOKTER = row_insert.insertCell(5);

                                TGL_DIAGNOSA.innerHTML = data_clean[i].tgldiagnosa == null | data_clean[i].tgldiagnosa == '0000-00-00 00:00:00' ? formatTanggalData(data_clean[i].tgldaftar) : formatTanggalData(data_clean[i].tgldiagnosa);
                                KODE.innerHTML = data_clean[i].kdicd10;
                                DIAGNOSA.innerHTML = data_clean[i].icd10;
                                DESKRIPSI.innerHTML = data_clean[i].deskripsi;
                                JENIS_DIAGNOSA.innerHTML = data_clean[i].jenisdiagnosa;
                                DOKTER.innerHTML = data_clean[i].dokter;
                            }
                        } else {
                            table.getElementsByTagName('tbody')[0].innerHTML = /*html*/ `<tr><td colspan="6" style="text-align:center">TIDAK ADA DATA DIAGNOSA ICD</td></tr>`;
                        }
                    }
                });
            }

            _("btn_simpan").addEventListener("click", () => {
                var noregop = $('#noregop').val();
                var tglpelaksanaanop = _('tglpelaksanaanop').value;
                var jampelaksanaanop = _("jampelaksanaanop").value;
                if (tglpelaksanaanop == '' && jampelaksanaanop == '') {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Tanggal dan Jam Pelaksanaan Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('tglpelaksanaanop').focus()
                    });
                } else if (tglpelaksanaanop == '' && jampelaksanaanop != '') {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Tanggal Pelaksanaan Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('tglpelaksanaanop').focus()
                    });
                } else if (tglpelaksanaanop != '' && jampelaksanaanop == '') {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Jam Pelaksanaan Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('jampelaksanaanop').focus()
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('permintaansudah/updateTanggalKonfirmasiOP/konfirm'); ?>",
                        data: {
                            noregop: noregop,
                            tglpelaksanaanop: tglpelaksanaanop,
                            jampelaksanaanop: jampelaksanaanop
                        },
                        success: function() {
                            swal({
                                title: "Berhasil",
                                text: "Data Disimpan",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            }, () => {
                                $('#tglpelaksanaanop').val("");
                                $('#jampelaksanaanop').val("");
                                $('#modal_full').modal('hide');
                                $('#tampil_data').DataTable().ajax.reload();
                                setCount();
                            });
                        },
                        error: function(err) {
                            console.log(err);
                            swal({
                                title: "Gagal",
                                text: "Data Tidak Disimpan!",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        }
                    });
                }
            });

            _("btn_batal").addEventListener("click", () => {
                var noregop = $('#noregop').val();
                swal({
                        title: "Batal Operasi",
                        text: "Apakah Yakin Batal Operasi?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#EF5350",
                        confirmButtonText: "YA",
                        cancelButtonText: "TIDAK",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('permintaansudah/updateTanggalKonfirmasiOP/batal'); ?>",
                                data: {
                                    noregop: noregop
                                },
                                success: function() {
                                    swal({
                                        title: "Berhasil Dibatalkan",
                                        text: "Data Disimpan",
                                        confirmButtonColor: "#66BB6A",
                                        type: "success"
                                    }, () => {
                                        $('#modal_full').modal('hide');
                                        $('#tampil_data').DataTable().ajax.reload();
                                        setCount();
                                    });
                                },
                                error: function(err) {
                                    console.log(err);
                                    swal({
                                        title: "Gagal",
                                        text: "Data Tidak Disimpan!",
                                        confirmButtonColor: "#EF5350",
                                        type: "error"
                                    });
                                }
                            });
                        }
                    });
            });

            function inputTindakan(noregop, waktupelaksanaan) {
                if (waktupelaksanaan === 'null') {
                    swal({
                        title: "Gagal",
                        text: "Waktu Pelaksanaan Operasi Belum Diisi!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    document.location = "<?php echo base_url(); ?>tindakan/isitindakan/" + noregop;
                }
                return false;
            }
        </script>