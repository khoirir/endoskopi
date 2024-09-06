<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i>Beranda</a></li>
                <li class="active">Permintaan Operasi</li>
                <li class="active">Selesai Tindakan</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-custom">
                <h6 class="panel-title">DATA PEMESANAN JADWAL OPERASI SELESAI TINDAKAN</h6>
            </div>
            <div class="modal-body">
                <table id="tampil_data" class="table datatable-basic table-framed">
                    <thead>
                        <tr style="background:#eee;">
                            <th style="text-align: center;"><b style="font-size: 20px">&#9839;</b></th>
                            <th style="text-align: center;">NO.</th>
                            <th style="text-align: center;">NO. REGISTRASI OPERASI</th>
                            <th style="text-align: center;">NO. RM</th>
                            <th style="text-align: center;">NAMA PASIEN</th>
                            <th style="text-align: center;">ASAL PASIEN</th>
                            <th style="text-align: center;">UNIT</th>
                            <th style="text-align: center;">JENIS OPERASI</th>
                            <th style="text-align: center;">WAKTU PELAKSANAAN</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="heading-elements">
                    <div class="heading-text">
                        <form action="cetakkwitansi/cetak" method="POST" onsubmit="return submitCetak()" target="_blank">
                            <input type="hidden" id="hidden_noregop" name="hidden_noregop" class="form-control">
                            <button type="submit" class="btn btn-labeled btn-info"><b><i class="icon-printer2"></i></b>CETAK KWITANSI</button>
                        </form>
                    </div>
                    <!-- <form action="excel/cetak" method="POST" >
                        <button type="submit" class="btn btn-labeled btn-info"><b><i class="icon-printer2"></i></b>CETAK EXCEL</button>
                    </form> -->
                </div>
                <br />
            </div>
        </div>

        <div id="modal_full" class="modal fade">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">DETAIL PEMESANAN JADWAL OPERASI</h5>
                    </div>
                    <form role="form" class="form-horizontal" id="form_detail">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li><a href="#tab-identitas-pasien" data-toggle="tab"><i class="fa fa-wheelchair position-left"></i>IDENTITAS PASIEN</a></li>
                                    <li><a href="#tab-asal-pasien" data-toggle="tab"><i class="fa fa-hospital-o position-left"></i>ASAL PASIEN</a></li>
                                    <li class="active"><a href="#tab-pemesanan-operasi" data-toggle="tab"><i class="fa fa-medkit position-left"></i></i>PEMESANAN OPERASI</a></li>
                                    <li><a href="#tab-diagnosa-pasien" data-toggle="tab"><i class="fa fa-stethoscope position-left"></i></i>DIAGNOSA PASIEN</a></li>
                                    <li><a href="#tab-tindakan-anestesi" data-toggle="tab"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/anestesi2.png">TINDAKAN ANESTESI</a></li>
                                    <li><a href="#tab-tindakan-operasi" data-toggle="tab"><i class="fa fa-heartbeat position-left" style="font-size:16px"></i> TINDAKAN OPERASI</a></li>
                                    <li><a href="#tab-hasil-operasi" data-toggle="tab"><i class="icon-upload7 position-left"></i>UPLOAD HASIL OPERASI</a></li>
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
                                                    <input id="noregop" name="noregistrasiop" type="text" class="form-control" style="color:black" readonly="readonly">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Registrasi Operasi</b></label>
                                                    <input id="tglregop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Pengirim</b></label>
                                                    <input id="dokterpengirim" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label><b>Dokter Operator</b></label>
                                                    <input id="dokterop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Permintaan Tindakan</b></label>
                                                    <textarea id="tindakan" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                </div> -->
                                                <div class="form-group">
                                                    <label><b>Waktu Pemesanan Operasi</b></label>
                                                    <input id="wktpemesanan" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Waktu Pelaksanaan Operasi</b></label>
                                                    <input id="wktpelaksanaanop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-diagnosa-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PRA & POST OPERASI</legend>
                                                <div class="form-group">
                                                    <label><b>Sars Covid</b></label>
                                                    <input id="sarscovid" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Diagnosa Pra Operasi</b></label>
                                                            <textarea id="diagnosapre" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Diagnosa Post Operasi</b></label>
                                                            <textarea id="diagnosapost" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Dokter Diagnosa Pra</b></label>
                                                            <input id="dokterdiagnosapra" type="text" class="form-control" style="color:black" disabled="disabled">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Dokter Diagnosa Post</b></label>
                                                            <input id="dokterdiagnosapost" type="text" class="form-control" style="color:black" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/icd2.png">DIAGNOSA ICD</legend>
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
                                    <div class="tab-pane" id="tab-tindakan-anestesi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Waktu Tindakan Anestesi</b></label>
                                                    <input id="wakttindakananestesi" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tindakan Anestesi</b></label>
                                                    <div class="table-responsive pre-scrollable tableFixHead">
                                                        <table class="table table-xs table-framed" id="tbl_tindakan_anestesi">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center">JENIS ANESTESI</th>
                                                                    <th style="text-align:center">DOKTER ANESTESI</th>
                                                                    <th style="text-align:center">ASISTEN ANESTESI</th>
                                                                    <th style="text-align:center">TIDNAKAN ANESTESI</th>
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
                                    <div class="tab-pane" id="tab-tindakan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Waktu Tindakan Operasi</b></label>
                                                    <input id="wakttindakanop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tindakan Operasi</b></label>
                                                    <div class="table-responsive">
                                                        <table class="table table-xs table-framed" id="tbl_tindakan">
                                                            <thead>
                                                                <tr style="background:#eee;">
                                                                    <th style="text-align:center">DOKTER OPERATOR</th>
                                                                    <th style="text-align:center">ASISTEN</th>
                                                                    <th style="text-align:center">TINDAKAN</th>
                                                                    <th style="text-align:center;">KELAS</th>
                                                                    <th style="text-align:center;">JUMLAH</th>
                                                                    <th style="text-align:center">TARIF</th>
                                                                    <th style="text-align:center">SUBTOTAL</th>
                                                                    <th style="text-align:center">JOIN KAMAR OPERASI</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="5"></th>
                                                                    <th style="text-align:center;">TOTAL</th>
                                                                    <th id='subtotal' style="text-align:right">Rp. 0,00</th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5"></th>
                                                                    <th style="text-align:center;">STATUS PEMBAYARAN</th>
                                                                    <th id='statuspembayaran' style="text-align:right">-</th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5"></th>
                                                                    <th style="text-align:center;">TGL. PEMBAYARAN</th>
                                                                    <th id='tglpembayaran' style="text-align:right">-</th>
                                                                    <th></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-hasil-operasi">
                                        <div class="modal-body">
                                            <div class="tabbable">
                                                <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                                                    <li class="active"><a href="#subtab-upload-hasil-operasi" data-toggle="tab"><i class="icon-upload7 position-left"></i>UPLOAD HASIL</a></li>
                                                    <li><a href="#subtab-hasil-operasi" data-toggle="tab"><i class="icon-clipboard3 position-left"></i>HASIL OPERASI</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="subtab-upload-hasil-operasi">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="file" name="file_upload[]" id="file_upload" class="file-input" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true" accept=".jpg, .jpeg, .png, .pdf">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <hr>
                                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_hasil"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="subtab-hasil-operasi">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="table-responsive">
                                                                    <table class="table table-xs table-framed" id="tbl_hasiloperasi">
                                                                        <thead>
                                                                            <tr style="background:#eee;">
                                                                                <th class="col-lg-4" style="text-align:center">HASIL OPERASI</th>
                                                                                <th class="col-lg-2" style="text-align:center">AKSI</th>
                                                                                <th style="display:none">iduser</th>
                                                                                <th style="display:none">tgluser</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer" id="div_hasil">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            //TODO BEGIN DATA TABLE
            var tabel;
            $(document).ready(function() {
                tabel = $('#tampil_data').dataTable({
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "bInfo": false,
                    "order": [
                        [8, 'ASC']
                    ],
                    "ajax": {
                        "url": "<?php echo base_url('permintaanselesaitindakan/permintaanList') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "lengthMenu": [
                        [10, 50, 100],
                        [10, 50, 100]
                    ],
                    "columnDefs": [{
                            "render": function(data, type, row) {
                                let checked_data = "";
                                let data_check = _('hidden_noregop').value.substring(1).split(",");
                                for (let i = 0; i < data_check.length; i++) {
                                    if (data_check[i] == row.noregop) {
                                        checked_data = "checked";
                                    }
                                }
                                var html = /*html*/ `<input type="checkbox" value="${row.noregop}" onclick="inputNoregop(this)" ${checked_data}>`;
                                return html;
                            },
                            "targets": [0],
                            "orderable": false,
                            "width": "1%",
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            "targets": [1],
                            "orderable": false,
                            "width": "3%",
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                var noregistrasi = row.noregop
                                var html = /*html*/ `<a data-toggle='modal' data-target='#modal_full' onclick="getDetail('${noregistrasi}');\">${noregistrasi}</a>`;
                                return html;
                            },
                            "targets": [2],
                            "orderable": false,
                            "className": "text-center"
                        },
                        {
                            "data": "norm",
                            "targets": [3],
                            "orderable": false,
                            "className": "text-center"
                        },
                        {
                            "data": "pasien",
                            "targets": [4],
                            "orderable": false
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.instalasi.toUpperCase()
                                return html;
                            },
                            "targets": [5],
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.unit.toUpperCase()
                                return html;
                            },
                            "targets": [6]
                        },
                        {
                            "render": function(data, type, row) {
                                var html = /*html*/ `<span class='label label-${row.warnajenisop}' style='width:100px'>${row.jenisop}</span>`
                                return html;
                            },
                            "targets": [7],
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                return formatTanggalData(row.tglkonfirmasiop);
                            },
                            "targets": [8],
                            "className": "text-center"
                        },
                        {
                            "render": function(data, type, row) {
                                let noregistrasi = row.noregop;
                                let pasien = row.pasien.replace(/['"]+/g, '');
                                let html = /*html*/ `<button data-popup='tooltip' title='Edit Tindakan' type='button' onclick="editTindakan('${noregistrasi}')" class='btn btn-primary btn-icon'><i class='glyphicon glyphicon-pencil'></i></button>&nbsp;&nbsp;<button data-popup='tooltip' title='Selesai Operasi' type='button' onclick="konfirmasiSelesai('${noregistrasi}','${pasien}')" class='btn btn-success btn-icon'><i class='icon-checkmark4'></i></button>`;
                                return html;
                            },
                            "targets": [9],
                            "orderable": false,
                            "width": "8%",
                            "className": "text-center"
                        }

                    ],
                });
            });
            //TODO END DATA TABLE


            //TODO BEGIN DETAIL PASIEN
            function getDetail(noregop) {
                clearFormDetail();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getDetailPemesananOperasi'); ?>",
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
                        $("#wktpelaksanaanop").val(data.tgljadwalop);

                        getDetailPasien(data.norm);
                        getDetailAsalPasien(data.noregistrasi);
                        getDiagnosaPasien(data.norm, data.noregistrasiop);
                        getDiagnosaICD(data.norm);
                        getTindakanAnestesi(data.noregistrasiop);
                        getTindakanOperasi(data.noregistrasiop);
                        getHasilOperasi(data.noregistrasiop);
                    }
                });
            }

            function getDetailPasien(norm) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getDetailPasien'); ?>",
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
                    url: "<?php echo base_url('permintaanselesaitindakan/getDetailAsalPasien'); ?>",
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

            function getDiagnosaPasien(norm, noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getDiagnosaPasien'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: function(data) {
                        _("sarscovid").value = data["prapost"].sarscovid;
                        if (data["prapost"].diagnosapra != null) {
                            let list_diagnosapra = data["prapost"].diagnosapra.split(';').join("\n-  ");
                            $('#diagnosapre').val(list_diagnosapra.substring(1).toUpperCase());
                        }
                        _("dokterdiagnosapra").value = data["prapost"].dokterdiagnosapra;
                        if (data["prapost"].diagnosapost != null) {
                            let list_diagnosapost = data["prapost"].diagnosapost.split(';').join("\n-  ");
                            $('#diagnosapost').val(list_diagnosapost.substring(1).toUpperCase());
                        }
                        _("dokterdiagnosapost").value = data["prapost"].dokterdiagnosapost;
                    }
                });
            }

            function getDiagnosaICD(norm) {
                let table = _("tbl_diagnosa");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getDiagnosaICD'); ?>",
                    data: {
                        norm: norm
                    },
                    dataType: "JSON",
                    success: data => {
                        if (data["icd"].length != 0) {
                            let data_clean = [...new Set(data["icd"].map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
                            let html = '';
                            data_clean.forEach(d => {
                                let tgldiagnosa = d.tgldiagnosa == null | d.tgldiagnosa == '0000-00-00 00:00:00' ? formatTanggalData(d.tgldaftar) : formatTanggalData(d.tgldiagnosa);
                                html += /*html*/
                                    `<tr>
                                        <td>${tgldiagnosa}</td>
                                        <td style="text-align:center">${d.kdicd10}</td>
                                        <td>${d.icd10}</td>
                                        <td>${d.deskripsi}</td>
                                        <td>${d.jenisdiagnosa}</td>
                                        <td>${d.dokter}</td>
                                    </tr>`;
                            });
                            table.getElementsByTagName('tbody')[0].innerHTML = html;
                        } else {
                            table.getElementsByTagName('tbody')[0].innerHTML = /*html*/ `<tr><td colspan="6" style="text-align:center">TIDAK ADA DATA DIAGNOSA ICD</td></tr>`;
                        }
                    }
                });
            }

            function getTindakanAnestesi(noregop) {
                let table = _("tbl_tindakan_anestesi");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getTindakanAnestesi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: data => {
                        if (data.length != 0) {
                            let html = "";
                            data.forEach(d => {
                                _("wakttindakananestesi").value = d.tgltindakananestesi;
                                html += /*html*/
                                    `<tr>
                                        <td style="text-align:center">${d.jenisanestesi}</td>
                                        <td>${d.dokteranestesi}</td>
                                        <td>${d.asistenanestesi}</td>
                                        <td>${d.tindakananestesi}</td>
                                    </tr>`;
                            });
                            table.getElementsByTagName('tbody')[0].innerHTML = html;
                        } else {
                            table.getElementsByTagName('tbody')[0].innerHTML = /*html*/ `<tr><td colspan="4" style="text-align:center">TIDAK ADA TINDAKAN ANESTESI</td></tr>`;
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }

            function getTindakanOperasi(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getTindakanOperasi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: function(data) {
                        _("wakttindakanop").value = data.tgltindakanop;
                        getDetailTindakanOperasi(data.notindakanop);
                        _("subtotal").innerHTML = tambahRP(data.totaltariftindakan);
                        _("statuspembayaran").innerHTML = data.statuspembayaran.toUpperCase();
                        _("tglpembayaran").innerHTML = data.tglpembayaran == null ? "-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" : data.tglpembayaran;
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }

            function getDetailTindakanOperasi(notinop) {
                let table = _("tbl_tindakan");
                table.getElementsByTagName('tbody')[0].innerHTML = "";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getDetailTindakanOperasi'); ?>",
                    dataType: "JSON",
                    data: {
                        notinop: notinop
                    },
                    success: data => {
                        let html = "";
                        data.forEach(d => {
                            let operator = d.operator.split(";").join("<br/>" + "- ").substring(5);
                            let asisten = d.asisten.split(";").join("<br/>" + "- ").substring(5);
                            let joinok = d.joinok == "true" ? /*html*/ `<span class="text-success-600"><i class="glyphicon glyphicon-ok"></i></span>` : /*html*/ `<span class="text-danger-600"><i class="glyphicon glyphicon-remove"></i></span>`;
                            html += /*html*/
                                `<tr>
                                    <td>${operator}</td>
                                    <td>${asisten}</td>
                                    <td>${d.tindakan}</td>
                                    <td style="text-align:center">${d.kelas}</td>
                                    <td style="text-align:center">${d.jmltindakan}</td>
                                    <td style="text-align:right">${tambahRP(d.tarif)}</td>
                                    <td style="text-align:right">${tambahRP(d.subtotal)}</td>
                                    <td style="text-align:center">${joinok}</td>
                                </tr>`;
                        });
                        table.getElementsByTagName('tbody')[0].innerHTML = html;
                    }
                });
            }

            function getHasilOperasi(noregop) {
                let table = _("tbl_hasiloperasi");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                _("div_hasil").innerHTML = "";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getHasilOperasi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: data => {
                        if (data.length != 0) {
                            let html = "";
                            let i = 0;
                            data.forEach(d => {
                                html += /*html*/
                                    `<tr>
                                        <td style="text-align:center">Hasil Operasi ${i+1}</td>
                                        <td style="text-align:center"><button data-popup='tooltip' title='Lihat Hasil' onclick="tampilHasil('${d.hasilop}',this);" type='button' class='btn btn-info btn-icon'><i class='icon-file-eye'></i></button>&nbsp;&nbsp;<button type='button' data-popup='tooltip' title='Hapus Hasil' onclick="hapusHasilOperasi('${d.id}','${d.hasilop}','${d.iduser}','${d.tgluser}');" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></button></td>
                                        <td style="display:none">${d.iduser}</td>
                                        <td style="display:none">${d.tgluser}</td>
                                    </tr>`;
                                i++;
                            });
                            table.getElementsByTagName('tbody')[0].innerHTML = html;
                        } else {
                            table.getElementsByTagName('tbody')[0].innerHTML = /*html*/ `<tr><td colspan="4" style="text-align:center">TIDAK ADA HASIL OPERASI</td></tr>`;
                        }
                    }
                });
            }

            _("btn_simpan_hasil").addEventListener("click", () => {
                let file = $("#file_upload").val();
                let form = $("#form_detail")[0];
                let data = new FormData(form);
                if (file == "") {
                    swal({
                        title: "Gagal",
                        text: "Pilih Hasil yang Akan Diupload!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    swal({
                            title: "Simpan Hasil Operasi",
                            text: "Apakah Yakin Simpan Hasil Operasi?",
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
                                    url: "<?php echo base_url('permintaanselesaitindakan/insertHasilOperasi') ?>",
                                    data: data,
                                    cache: false,
                                    processData: false,
                                    contentType: false,
                                    dataType: "JSON",
                                    success: function(data) {
                                        console.log(data);
                                        if (data["upload"] == ">") {
                                            swal({
                                                title: "Gagal Disimpan",
                                                text: "Ukuran File > 2MB",
                                                confirmButtonColor: "#EF5350",
                                                type: "error"
                                            });
                                        } else {
                                            swal({
                                                title: "Berhasil",
                                                text: "Data Disimpan",
                                                confirmButtonColor: "#66BB6A",
                                                type: "success",
                                            }, () => {
                                                $("#file_upload").val("").trigger('change');
                                                getHasilOperasi(_("noregop").value);
                                            });
                                        }
                                    },
                                    error: function(data) {
                                        console.log(data);
                                        swal({
                                            title: "Gagal Disimpan",
                                            text: "",
                                            confirmButtonColor: "#EF5350",
                                            type: "error"
                                        });
                                    }
                                });
                            }

                        });
                }
            });

            function tampilHasil(file, id) {
                var header = _("tbl_hasiloperasi");
                var btns = header.getElementsByClassName("btn-success");
                let this_btn_class = id.className.split(" ")[1];
                $(btns).attr('class', 'btn btn-info btn-icon');
                if (this_btn_class == "btn-info") {
                    $(id).attr('class', 'btn btn-success btn-icon');
                    _("div_hasil").innerHTML = /*html*/ `<iframe id='framehasil' src='<?php echo base_url(); ?>template/file_upload/${file}' width='100%' height='600px'></iframe>`;
                } else if (this_btn_class == "btn-success") {
                    $(id).attr('class', 'btn btn-info btn-icon');
                    _("div_hasil").innerHTML = "";
                }
            }

            function hapusHasilOperasi(id, file, iduser, tgluser) {
                swal({
                        title: "Hapus Hasil Operasi",
                        text: "Apakah Yakin Hapus Hasil Operasi?",
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
                                url: "<?php echo base_url('permintaanselesaitindakan/hapusHasilOperasi'); ?>",
                                data: {
                                    id: id,
                                    file: file,
                                    iduser: iduser,
                                    tgluser: tgluser
                                },
                                dataType: "JSON",
                                success: function(data) {
                                    console.log(data);
                                    swal({
                                        title: "Berhasil",
                                        text: "Data Dihapus",
                                        confirmButtonColor: "#66BB6A",
                                        type: "success",
                                    }, () => {
                                        getHasilOperasi(_("noregop").value);
                                    });
                                },
                                error: function(data) {
                                    console.log(data);
                                    swal({
                                        title: "Gagal",
                                        text: "Data Tidak Dihapus",
                                        confirmButtonColor: "#EF5350",
                                        type: "error"
                                    });
                                }
                            });
                        }
                    });
            }
            //TODO END DETAIL PASIEN


            //TODO BEGIN EDIT TINDAKAN
            function editTindakan(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('permintaanselesaitindakan/getStatusBayar'); ?>",
                    dataType: "JSON",
                    data: {
                        noregop: noregop
                    },
                    success: function(data) {
                        if (data.statuspembayaran.toUpperCase() == 'LUNAS') {
                            swal({
                                title: "Tidak Bisa Edit,",
                                text: "STATUS PEMBAYARAN sudah LUNAS,\nTanggal " + data.tglpembayaran,
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        } else {
                            document.location = "<?php echo base_url(); ?>tindakan/edittindakan/" + noregop;
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
            //TODO END EDIT TINDAKAN


            //TODO BEGIN KONFIRMASI SELESAI OP
            function konfirmasiSelesai(noregop, pasien) {
                swal({
                        title: "Selesai Operasi",
                        text: "Apakah Yakin Pasien " + pasien + "\nSelesai Operasi?",
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
                                url: "<?php echo base_url('permintaanselesaitindakan/konfirmasiSelesai'); ?>",
                                data: {
                                    noregop: noregop
                                },
                                dataType: "JSON",
                                success: function(data) {
                                    console.log(data);
                                    swal({
                                        title: "Berhasil",
                                        text: "Data Disimpan",
                                        confirmButtonColor: "#66BB6A",
                                        type: "success",
                                    }, () => {
                                        $('#tampil_data').DataTable().ajax.reload(null, false);
                                        setCount();
                                    });
                                },
                                error: function(data) {
                                    console.log(data);
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
            }
            //TODO END KONFIRMASI SELESAI OP

            //TODO BEGIN CETAK KWITANSI
            function inputNoregop(el) {
                let data = _('hidden_noregop').value;
                if (el.checked) {
                    data += ',' + $(el).val();
                } else {
                    data = data.replace(',' + $(el).val(), "");
                }
                _('hidden_noregop').value = data;
            }

            function submitCetak() {
                let noregop = _('hidden_noregop').value;
                if (noregop == "") {
                    swal({
                        title: "Gagal",
                        text: "Pilih Pasien Terlebih Dahulu!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                    return false;
                }
            }
            //TODO END CETAK KWITANSI



            function clearFormDetail() {
                _("norm").value = "";
                _("nama").value = "";
                _("tmptgllahir").value = "";
                _("umur").value = "";
                _("jk").value = "";
                _("alamat").value = "";
                _("nodaftar").value = "";
                _("tgldaftar").value = "";
                _("noreg").value = "";
                _("tglreg").value = "";
                _("ruangpoli").value = "";
                _("kelas").value = "";
                _("penjamin").value = "";
                _("carabayar").value = "";
                _("noregop").value = "";
                _("jenisop").innerHTML = "";
                _("jenisop").className = "label label-default";
                _("dokterpengirim").value = "";
                _("tglregop").value = "";
                _("wktpemesanan").value = "";
                _("keterangan").value = "";
                _("wktpelaksanaanop").value = "";
                _("sarscovid").value = "";
                _("diagnosapre").value = "";
                _("dokterdiagnosapra").value = "";
                _("diagnosapost").value = "";
                _("dokterdiagnosapost").value = "";
                _("wakttindakananestesi").value = "";
                _("wakttindakanop").value = "";
                _("subtotal").innerHTML = "Rp 0,00";
                _("statuspembayaran").innerHTML = "BELUM LUNAS";
                _("tglpembayaran").innerHTML = "";
            }
        </script>