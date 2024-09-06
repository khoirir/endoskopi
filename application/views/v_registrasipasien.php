<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
                <li class="active">Registrasi Pasien</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->
    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-custom">
                <h6 class="panel-title">REGISTRASI PASIEN</h6>
            </div>

            <form role="form" class="form-horizontal" id="form_registrasi">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <div class="col-lg-12">
                                    <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>INSTALASI</legend>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP09" onchange="eventRadio('instalasi', this)">
                                            <span id="igd" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>IGD</b></span>
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP03" onchange="eventRadio('instalasi', this)">
                                            <span id="ranap" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>RAWAT INAP</b></span>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP01" onchange="eventRadio('instalasi', this)">
                                            <span id="rajal" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>RAWAT JALAN</b></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br /><br /><br />
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-wheelchair position-left" style="font-size:16px"></i>PASIEN</legend>
                                    <div class="form-group">
                                        <label><b>No. RM<span class="text-danger"> *</span></b></label>
                                        <div class="input-group">
                                            <input id="norm" type="text" class="form-control" style="color:black" maxlength="8" onkeyup="caripasien(this,event)" disabled="disabled">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-labeled" onclick="getPasien()" disabled="disabled" id="btn_cari"><b><i class="icon-search4"></i></b>CARI</button>
                                            </span>
                                        </div>
                                        <input id="get_norm" type="hidden" class="form-control" style="color:black" maxlength="8">
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
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>ASAL PASIEN</legend>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>No. Daftar</b></label>
                                                <input id="nodaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Daftar</b></label>
                                                <input id="tgldaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>No. Registrasi</b></label>
                                                <input id="noreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Registrasi</b></label>
                                                <input id="tglreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                        </div>
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
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br /><br /><br />
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PASIEN</legend>
                                    <div class="form-group">
                                        <label><b>Sars Covid<span class="text-danger"> *</span></b></label>
                                        <select data-placeholder='' class='select' id='selectsars'>
                                            <option value="-">-- Pilih Sars Covid--</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                            <option value="Swab Positive">Swab Positive</option>
                                            <option value="Swab Negative Rapid Reaktif">Swab Negative Rapid Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Dokter Diagnosa<span class="text-danger"> *</span></b></label>
                                        <select id="selectdokterdiagnosapra" class="select-search" disabled='disabled'>
                                            <?php foreach ($dokter->result() as $data_dokter) {
                                                $namadokter = $data_dokter->namapetugasMedis;
                                                if ($namadokter == '-') {
                                                    $namadokter = '-- Pilih Dokter Diagnosa --';
                                                }
                                            ?>
                                                <option value="<?php echo $data_dokter->namapetugasMedis; ?>"><?php echo $namadokter; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Diagnosa Pra Operasi</b><span class="text-danger"> *</span></label>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="hidden_pilih_icd">
                                            <select id="diagnosapre" multiple="multiple" class="select" onchange="removeOpt(this)" disabled></select>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="jenisicd" disabled>JENIS ICD <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a onclick="tampilDataDiagnosa('JENIS ICD')">JENIS ICD</a></li>
                                                    <li><a onclick="tampilDataDiagnosa('ICD 10')">ICD 10</a></li>
                                                    <li><a onclick="tampilDataDiagnosa('ICD 9')">ICD 9</a></li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="hidden_icd" class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Diagnosa ICD</b></label>
                                        <br />
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
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-medkit position-left" style="font-size:16px"></i>PEMESANAN OPERASI</legend>
                                    <div class="form-group">
                                        <label><b>Jenis Operasi<span class="text-danger"> *</span></b></label>
                                        <select id="selectjenisop" class="select" disabled='disabled'>
                                            <option value="-">-- Pilih Jenis Operasi --</option>
                                            <?php foreach ($jenisoperasi->result() as $jop) { ?>
                                                <option value="<?php echo $jop->kdjenisoperasi; ?>"><?php echo $jop->jenisoperasi; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Registrasi Operasi<span class="text-danger"> *</span></b></label>
                                                <input id="tglregop" type="date" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Jam Registrasi Operasi<span class="text-danger"> *</span></b></label>
                                                <input id="jamregop" type="time" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Pemesanan Operasi<span class="text-danger"> *</span></b></label>
                                                <input id="tglpesan" type="date" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Jam Pemesanan Operasi</b><span class="text-danger"> *</span></label>
                                                <input id="jampesan" type="time" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Dokter Pengirim<span class="text-danger"> *</span></b></label>
                                        <select id="selectdokter" class="select-search" disabled='disabled'>
                                            <?php
                                            foreach ($dokter->result() as $data_dokter) {
                                                $namadokter = $data_dokter->namapetugasMedis;
                                                if ($namadokter == '-') {
                                                    $namadokter = '-- Pilih Dokter Pengirim --';
                                                }
                                            ?>
                                                <option value="<?php echo $data_dokter->namapetugasMedis; ?>"><?php echo $namadokter; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Keterangan</b></label>
                                        <textarea id="keterangan" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="modal-footer">
                    <hr>
                    <div style="text-align: left;">
                        <span class="text-danger"><b>* Wajib Diisi</b></span>
                    </div>
                    <button type="button" class="btn btn-success btn-labeled" id="btn_simpan" disabled><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                    <button type="button" class="btn btn-danger btn-labeled" id="btn_batal" disabled><b><i class="glyphicon glyphicon-floppy-remove"></i></b>BATAL</button>
                </div>
            </form>
        </div>

        <style type="text/css">
            .tableFixHead {
                overflow-y: auto;
                height: 300px;
            }

            .tableFixHead thead tr:nth-child(1) th {
                background: #eee;
                position: sticky;
                top: 0;
                z-index: 10;
            }
        </style>

        <script type="text/javascript">
            window.onload = () => resetForm();

            $(document).ready(() => tampilDataDiagnosa("JENIS ICD"));

            function eventRadio(jenis, el) {
                if (jenis == "instalasi") {
                    _("btn_cari").disabled = false;
                    _('norm').disabled = false;
                    _('norm').value = '';
                    _('norm').focus();
                    _('btn_batal').disabled = false;
                    if ($(el).val() == 'DP09') {
                        _("igd").className = "label label-info";
                        _("ranap").className = "label label-default";
                        _("rajal").className = "label label-default";
                    } else if ($(el).val() == 'DP03') {
                        _("igd").className = "label label-default";
                        _("ranap").className = "label label-info";
                        _("rajal").className = "label label-default";
                    } else if ($(el).val() == 'DP01') {
                        _("igd").className = "label label-default";
                        _("ranap").className = "label label-default";
                        _("rajal").className = "label label-info";
                    }
                    clearForm();
                }
            }


            function tampilDataDiagnosa(icd) {
                if (icd == "JENIS ICD") {
                    $('#tabel_icd').dataTable({
                        "bDestroy": true,
                        "bLengthChange": false,
                        "bPaginate": false,
                        "bInfo": false,
                        "ordering": true,
                        "searching": false,
                        "order": [
                            [0, 'ASC']
                        ],
                        "deferRender": true,
                        "columnDefs": [{
                                "targets": [0],
                                "width": "10%",
                                "orderable": false,
                            },
                            {
                                "targets": [1],
                                "width": "40%",
                                "orderable": false
                            },
                            {
                                "targets": [2],
                                "orderable": false,
                                "width": "40%",
                            },
                            {
                                "targets": [3],
                                "width": "10%",
                                "orderable": false
                            }
                        ],
                    });
                    $('#tabel_icd').DataTable().clear().draw();
                    _("hidden_icd").innerHTML = "";
                } else {
                    _("hidden_icd").innerHTML = /*html*/ `<table id="tabel_icd" class="table datatable-responsive table-framed">
                                                            <thead style="background: #eee; height: 60px;">
                                                                <tr>
                                                                    <th style="text-align:center">KODE</th>
                                                                    <th style="text-align:center">DIAGNOSA</th>
                                                                    <th style="text-align:center">DESKRIPSI</th>
                                                                    <th style="text-align:center">AKSI</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>`;
                    $('#tabel_icd').dataTable({
                        "bDestroy": true,
                        "processing": true,
                        "bInfo": false,
                        "serverSide": true,
                        "ordering": true,
                        "order": [
                            [1, 'ASC']
                        ],
                        "ajax": {
                            "url": "<?php echo base_url('registrasipasien/dataTableDiagnosa') ?>",
                            "type": "POST",
                            "data": {
                                icd: icd
                            }
                        },
                        "deferRender": true,
                        "bLengthChange": false,
                        "lengthMenu": [
                            [5, 10, 25],
                            [5, 10, 25]
                        ],
                        "columnDefs": [{
                                "targets": [0],
                                "orderable": false,
                                "className": "text-center",
                                "data": "kdicd",
                                "width": "10%",
                            },
                            {
                                "targets": [1],
                                "orderable": false,
                                "data": "icd",
                                "width": "40%",
                            },
                            {
                                "targets": [2],
                                "orderable": false,
                                "data": "keterangan",
                                "width": "40%",
                            },
                            {
                                "targets": [3],
                                "orderable": false,
                                "className": "text-center",
                                "width": "10%",
                                "render": function(data, type, row) {
                                    let kdicd = row.kdicd;
                                    let icd = row.icd.replace(/'/g, "\\'");
                                    let param = kdicd + "  ( " + icd + " )";
                                    let html = /*html*/ `<button type='button' data-popup='tooltip' title='Pilih Diagnosa ICD' class="btn btn-primary btn-icon" onclick="pilihICD('${param}')"><i class="icon-checkmark4"></i></button>`;
                                    return html;
                                }
                            }
                        ]
                    });
                }
                _("jenisicd").innerHTML = `${icd} <span class="caret"></span>`;
            }


            function pilihICD(param) {
                if (_("hidden_pilih_icd").value.indexOf(param) == -1) {
                    _("hidden_pilih_icd").value += ";" + param;
                    if (_("hidden_pilih_icd").value != "") {
                        let dataopt = "";
                        let getdata = _("hidden_pilih_icd").value.substring(1).split(";");
                        getdata.forEach(d => {
                            dataopt += /*html*/ `<option value='${d}'>${d}</option>`;
                        });

                        $("select#diagnosapre").html(dataopt);
                        $('#diagnosapre').val(getdata).trigger('change');
                    }
                } else {
                    swal({
                        title: "Gagal",
                        text: param + " Sudah Dipilih",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                }
            }

            function removeOpt(el) {
                let jmldata = _("hidden_pilih_icd").value != "" ? _("hidden_pilih_icd").value.substring(1).split(";").length : 0;
                let jmlselect = $(el).val() == null ? 0 : $(el).val().length;
                if (jmldata > jmlselect) {
                    if ($(el).val() != null) {
                        let dataopt = "";
                        let dataselect = $(el).val();
                        dataselect.forEach(d => {
                            dataopt += /*html*/ `<option value='${d}' selected>${d}</option>`;
                        });
                        $("select#diagnosapre").html(dataopt);
                        let newdataselect = $(el).val().join(";");
                        _("hidden_pilih_icd").value = ";" + newdataselect;
                    } else {
                        $('#diagnosapre').empty();
                        _("hidden_pilih_icd").value = "";
                    }
                }
            }

            function clearForm() {
                _('get_norm').value = "";
                _('nama').value = "";
                _("nodaftar").value = "";
                _("tgldaftar").value = "";
                _('tmptgllahir').value = "";
                _('umur').value = "";
                _('jk').value = "";
                _('alamat').value = "";
                _('noreg').value = "";
                _('tglreg').value = "";
                _('ruangpoli').value = "";
                _('kelas').value = "";
                _('penjamin').value = "";
                _('carabayar').value = "";
                _('tglregop').value = "";
                _('jamregop').value = "";
                _('tglpesan').value = "";
                _('jampesan').value = "";
                $('#diagnosapre').val("").trigger('change');
                _('tglregop').disabled = true;
                _('jamregop').disabled = true;
                _('tglpesan').disabled = true;
                _('jampesan').disabled = true;
                $('#selectjenisop').val("-").trigger('change');
                _('selectjenisop').disabled = true;
                $('#selectsars').val("-").trigger('change');
                _('selectsars').disabled = true;
                _("jenisicd").innerHTML = `JENIS ICD <span class="caret"></span>`;
                _("jenisicd").disabled = true;
                _("hidden_pilih_icd").value = "";
                $('#tabel_icd').DataTable().clear().draw();
                _("hidden_icd").innerHTML = "";
                $('#selectdokter').val("-").trigger('change');
                _('selectdokter').disabled = true;
                $('#selectdokterdiagnosapra').val("-").trigger('change');
                _('selectdokterdiagnosapra').disabled = true;
                _('diagnosapre').disabled = true;
                _('keterangan').value = "";
                _('keterangan').disabled = true;
                let bodyRef = _('tbl_diagnosa').getElementsByTagName('tbody')[0];
                bodyRef.innerHTML = '';
            }

            function resetForm() {
                _("form_registrasi").reset();
                _("btn_cari").disabled = true;
                _("norm").disabled = true;
                _("igd").className = "label label-default";
                _("ranap").className = "label label-default";
                _("rajal").className = "label label-default";
                _('tglregop').disabled = true;
                _('jamregop').disabled = true;
                _('tglpesan').disabled = true;
                _('jampesan').disabled = true;
                $('#selectjenisop').val("-").trigger('change');
                _('selectjenisop').disabled = true;
                $('#selectsars').val("-").trigger('change');
                _('selectsars').disabled = true;
                _("jenisicd").innerHTML = `JENIS ICD <span class="caret"></span>`;
                _("jenisicd").disabled = true;
                _("hidden_pilih_icd").value = "";
                $('#tabel_icd').DataTable().clear().draw();
                _("hidden_icd").innerHTML = "";
                $('#selectdokter').val("-").trigger('change');
                _('selectdokter').disabled = true;
                $('#selectdokterdiagnosapra').val("-").trigger('change');
                _('selectdokterdiagnosapra').disabled = true;
                let bodyRef = _('tbl_diagnosa').getElementsByTagName('tbody')[0];
                bodyRef.innerHTML = '';
                $('#diagnosapre').val("").trigger('change');
                _('diagnosapre').disabled = true;
                _('keterangan').disabled = true;
                _('btn_simpan').disabled = true;
                _('btn_batal').disabled = true;
            }



            function caripasien(id, event) {
                let kode = event.which || event.keyCode;
                if (kode === 8 || kode === 46) {
                    clearForm();
                } else {
                    return $('#norm').val($('#norm').val().replace(/[^0-9]+/g, ''));
                }
            }

            function getPasien() {
                if (_("norm").value == "") {
                    swal({
                        title: "Gagal",
                        text: "No. RM Tidak Noleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("norm").focus()
                    });
                } else {
                    let instalasi = radioGetValue('radio-instalasi');
                    let get_norm = _("norm").value;
                    let norm0 = '00000000';
                    let getNorm0 = norm0.substring(0, (norm0.length - get_norm.length));
                    _("norm").value = getNorm0 + get_norm;
                    let norm = getNorm0 + get_norm;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('registrasipasien/getPasien'); ?>",
                        data: {
                            instalasi: instalasi,
                            norm: norm
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data['cek'] == null || data['cek'].statusop == '5' || data['cek'].statusop == '6') {
                                if (data['pasien'] != null) {
                                    _('tglregop').disabled = false;
                                    _('jamregop').disabled = false;
                                    _('tglpesan').disabled = false;
                                    _('jampesan').disabled = false;
                                    _('diagnosapre').disabled = false;
                                    _('jenisicd').disabled = false;
                                    _("selectsars").disabled = false;
                                    _("selectdokter").disabled = false;
                                    _("selectdokterdiagnosapra").disabled = false;
                                    _("selectjenisop").disabled = false;
                                    _('keterangan').disabled = false;
                                    _('btn_simpan').disabled = false;
                                    _('norm').value = data['pasien'].norm;
                                    _('get_norm').value = data['pasien'].norm;
                                    _('nama').value = data['pasien'].pasien;
                                    _('tmptgllahir').value = hpskotakab(data['pasien'].tempatlahir) + " / " + formatTanggalLahir(data['pasien'].tgllahir);
                                    _('umur').value = hitungUmur(data['pasien'].tgllahir);
                                    _('jk').value = jklengkap(data['pasien'].jk);
                                    _('alamat').value = data['pasien'].alamat.toUpperCase();
                                    _('nodaftar').value = data['pasien'].nodaftar;
                                    _('tgldaftar').value = data['pasien'].tgldaftar;
                                    _('noreg').value = data['pasien'].noregistrasi;
                                    _('tglreg').value = data['pasien'].tglregistrasi;
                                    _('ruangpoli').value = data['pasien'].unit.toUpperCase();
                                    _('kelas').value = data['pasien'].kelas;
                                    _('carabayar').value = data['pasien'].carabayar.toUpperCase();
                                    _('penjamin').value = data['pasien'].penjamin.toUpperCase();
                                    _('tglregop').value = ubahFormatTanggal(data['pasien'].tglsekarang, 1);
                                    _('jamregop').value = ubahFormatTanggal(data['pasien'].tglsekarang, 0);
                                    _('tglpesan').value = ubahFormatTanggal(data['pasien'].tglsekarang, 1);
                                    _('jampesan').value = ubahFormatTanggal(data['pasien'].tglsekarang, 0);
                                    getDiagnosaPasien(norm);
                                } else {
                                    if (instalasi == "DP09") {
                                        instalasi = "GAWAT DARURAT"
                                    } else if (instalasi == "DP03") {
                                        instalasi = "RAWAT INAP";
                                    } else if (instalasi == "DP01") {
                                        instalasi = "RAWAT JALAN";
                                    }
                                    swal({
                                        title: "Gagal",
                                        text: "No. RM " + _('norm').value + " Tidak Terdaftar\ndi INSTALASI " + instalasi + " !!!\nSilahkan Hubungi Pendaftaran.",
                                        confirmButtonColor: "#EF5350",
                                        type: "error",
                                        onClose: _('norm').focus()
                                    });
                                }
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "No. RM " + _('norm').value + " Sudah Registrasi Operasi\nPada Tanggal " + data['cek'].tglregistrasiop,
                                    confirmButtonColor: "#EF5350",
                                    type: "error"
                                });
                                clearForm();
                            }
                        },
                    });
                }
            }

            function getDiagnosaPasien(norm) {
                let table = _("tbl_diagnosa");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('registrasipasien/getDiagnosaPasien'); ?>",
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

            function setNoRegistrasiOperasi() {
                let today = getDate("yymmdd");
                let fulltoday = getDate("yymmddHHMMSS");
                let setNoRegistrasiOP = null;
                let instalasi = radioGetValue('radio-instalasi');
                $.ajax({
                    type: "post",
                    async: false,
                    url: "<?php echo base_url('registrasipasien/getLastNoRegistrasiOperasi'); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        if (data === null) {
                            setNoRegistrasiOP = "END" + fulltoday + "-1";
                        } else {
                            if (data.getdatesql === today) {
                                let arrId = data.noregop.split('-');
                                let angka = arrId[1];
                                setNoRegistrasiOP = "END" + fulltoday + '-' + (parseInt(angka) + 1);
                            } else {
                                setNoRegistrasiOP = "END" + fulltoday + "-1";
                            }
                        }
                    }
                });
                return setNoRegistrasiOP;
            }

            _("btn_simpan").addEventListener("click", () => {
                if (_("selectjenisop").value == "-") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Jenis Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('selectjenisop').focus()
                    });
                } else if (_('tglregop').value == "") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Tgl. Registrasi Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('tglregop').focus()
                    });
                } else if (_('jamregop').value == "") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Jam Registrasi Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('jamregop').focus()
                    });
                } else if (_('tglpesan').value == "") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Tgl. Pemesanan Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('tglpesan').focus()
                    });
                } else if (_('jampesan').value == "") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Jam Pemesanan Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('jampesan').focus()
                    });
                } else if (_("selectdokter").value == "-") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Dokter Pengirim\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('selectdokter').focus()
                    });
                } else if (_("selectsars").value == "-") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "SARS COVID\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('selectsars').focus()
                    });
                } else if (_("selectdokterdiagnosapra").value == "-") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Dokter Diagnosa\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('selectdokterdiagnosapra').focus()
                    });
                } else if (_("diagnosapre").value == "") {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Diagnosa Pra Operasi\nTidak Boleh Kosong",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('diagnosapre').focus()
                    });
                } else {
                    swal({
                            title: "Simpan Registrasi",
                            text: "Apakah Yakin Simpan Registrasi Pasien?",
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
                                let noregop = setNoRegistrasiOperasi();
                                let tglregop = formatTanggal('tglregop', 'jamregop');
                                let norm = _('norm').value;
                                let noreg = _('noreg').value;
                                let nodaftar = _('nodaftar').value;
                                let instalasi = radioGetValue('radio-instalasi');
                                if (instalasi == "DP09") {
                                    instalasi = "IGD";
                                } else if (instalasi == "DP03") {
                                    instalasi = "RAWAT INAP";
                                } else if (instalasi == "DP01") {
                                    instalasi = "RAWAT JALAN";
                                }
                                let dokterpengirim = _("selectdokter").value;
                                let dokterdiagnosapra = _("selectdokterdiagnosapra").value;
                                let jenisop = _("selectjenisop").value;
                                let tglpesan = formatTanggal('tglpesan', 'jampesan');
                                let sarscovid = _("selectsars").value;
                                let diagnosapre = $("#diagnosapre").val();
                                let keterangan = _('keterangan').value;
                                let today = getDate("yyyy-mm-dd HH:MM:SS");
                                let notinop = "T" + noregop;
                                let noanestesi = "A" + noregop;
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('registrasipasien/insertRegistrasi'); ?>",
                                    data: {
                                        noregop: noregop,
                                        tglregop: tglregop,
                                        norm: norm,
                                        noreg: noreg,
                                        nodaftar: nodaftar,
                                        instalasi: instalasi,
                                        dokterpengirim: dokterpengirim,
                                        jenisop: jenisop,
                                        tglpesan: tglpesan,
                                        keterangan: keterangan,
                                        sarscovid: sarscovid,
                                        diagnosapre: diagnosapre,
                                        today: today,
                                        notinop: notinop,
                                        noanestesi: noanestesi,
                                        dokterdiagnosapra: dokterdiagnosapra
                                    },
                                    dataType: "JSON",
                                    success: function(data) {
                                        swal({
                                            title: "Berhasil",
                                            text: "Data Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success"
                                        }, () => {
                                            resetForm();
                                            setCount();
                                        });
                                    },
                                    error: function(res) {
                                        console.log(res);
                                        swal({
                                            title: "Gagal",
                                            text: "Data Tidak Disimpan!",
                                            confirmButtonColor: "#EF5350",
                                            type: "error"
                                        });
                                    }
                                });
                            }
                        }
                    );
                }
            });

            _("btn_batal").addEventListener("click", () => {
                swal({
                        title: "Batal Registrasi",
                        text: "Apakah Yakin Batal Registrasi Pasien?",
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
                            swal({
                                title: "Registrasi Pasien",
                                text: "Dibatalkan",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            }, () => resetForm());
                        }
                    }
                );
            });
        </script>