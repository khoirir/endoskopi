<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i>Beranda</a></li>
                <li class="active">Tindakan Operasi</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->
    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">
                        <h6 class="panel-title">PASIEN</h6>
                    </div>
                    <form action="#" class="form-vertical">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active" data-popup="tooltip" title="Identitas Pasien"><a href="#tab-identitas-pasien" data-toggle="tab"><i class="fa fa-wheelchair"></i></a></li>
                                    <li data-popup="tooltip" title="Asal Pasien"><a href="#tab-asal-pasien" data-toggle="tab"><i class="fa fa-hospital-o"></i></a></li>
                                    <li data-popup="tooltip" title="Pemesanan Operasi"><a href="#tab-pemesanan-operasi" data-toggle="tab"><i class="fa fa-medkit"></i></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-identitas-pasien">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-wheelchair position-left" style="font-size:16px"></i>IDENTITAS PASIEN</legend> -->
                                            <div class="form-group">
                                                <label><b>Nama</b></label>
                                                <input id="nama" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pasien->namapasien; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>No. RM</b></label>
                                                <input id="norm" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pasien->norm; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tempat/Tgl. Lahir</b></label>
                                                <input id="tmptgllahir" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pasien->tmplahir . ' / ' . $pasien->tgllahir; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Umur</b></label>
                                                <input id="umur" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $umur; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Jenis Kelamin</b></label>
                                                <input id="jk" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pasien->jk == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN'; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Alamat</b></label>
                                                <textarea id="alamat" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"><?php echo $pasien->alamat; ?></textarea>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane" id="tab-asal-pasien">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>ASAL PASIEN</legend> -->
                                            <div class="form-group">
                                                <label><b>No. Daftar</b></label>
                                                <input id="nodaftar" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->nodaftar; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tgl. Daftar</b></label>
                                                <input id="tgldaftar" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->tgldaftar; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>No. Registrasi</b></label>
                                                <input id="noreg" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->noregistrasi; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tgl. Registrasi</b></label>
                                                <input id="tglreg" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->tglregistrasi; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Instalasi</b></label>
                                                <input id="instalasi" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->instalasi; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Unit</b></label>
                                                <input id="ruangpoli" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->unitasal; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Kelas</b></label>
                                                <input id="kelas" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo empty($asalpasien->kelas) ? "-" : $asalpasien->kelas; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Cara Bayar</b></label>
                                                <input id="carabayar" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->carabayar; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Penjamin</b></label>
                                                <input id="penjamin" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $asalpasien->penjamin; ?>">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane" id="tab-pemesanan-operasi">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-medkit position-left" style="font-size:16px"></i>PEMESANAN OPERASI</legend> -->
                                            <div class="form-group">
                                                <label><b>Jenis Operasi</b></label>
                                                <span class='<?php echo "label label-" . $pemesananop->warnajenisop; ?>' style='font-size:13px; padding-top:8px; width:100%; height:35px' id="jenisop"><?php echo $pemesananop->jenisop; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Keterangan</b></label>
                                                <textarea id="keterangan" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"><?php echo $pemesananop->keterangan; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>No. Registrasi Operasi</b></label>
                                                <input id="noregop" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->noregistrasiop; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tgl. Registrasi Operasi</b></label>
                                                <input id="tglregop" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->tglregistrasiop; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Dokter Pengirim</b></label>
                                                <input id="dokterpengirim" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->dokterpengirim; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Waktu Pemesanan Operasi</b></label>
                                                <input id="wktpesanop" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->tglpermintaanop; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Waktu Pelayanan Operasi</b></label>
                                                <input id="wktpelaksanaan" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo $pemesananop->tgljadwalop; ?>">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">
                        <h6 class="panel-title">KONFIRMASI SELESAI TINDAKAN</h6>
                    </div>
                    <form action="#" class="form-vertical">
                        <div class="modal-body">
                            <button type="button" style="width: 100%" class="btn btn-success btn-labeled" id="btn_selesai"><b><i class="glyphicon glyphicon-floppy-saved"></i></b><span>SELESAI TINDAKAN<span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">
                        <h6 class="panel-title">TINDAKAN PASIEN</h6>
                    </div>
                    <form role="form" class="form-horizontal">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active"><a href="#tab-diagnosa-pasien" data-toggle="tab"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i></i>DIAGNOSA PASIEN</a></li>
                                    <li><a href="#tab-tindakan-anestesi" data-toggle="tab"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/injection.svg">TINDAKAN ANESTESI</a></li>
                                    <li><a href="#tab-tindakan-operasi" data-toggle="tab"><i class="fa fa-heartbeat position-left" style="font-size:16px"></i>TINDAKAN OPERASI</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-diagnosa-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/icd.svg">DIAGNOSA ICD</legend>
                                                <div class="form-group">
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
                                            </fieldset>
                                            <br>
                                            <fieldset>
                                                <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PRA & POST OPERASI</legend>
                                                <input type="hidden" id="iddiagnosa">
                                                <div class="form-group">
                                                    <label><b>Sars Covid<span class="text-danger"> *</span></b></label>
                                                    <select data-placeholder='' class='select' id='selectsarscovid'>
                                                        <option value="-">-- Pilih Sars Covid --</option>
                                                        <option value="Reaktif">Reaktif</option>
                                                        <option value="Non Reaktif">Non Reaktif</option>
                                                        <option value="Swab Positive">Swab Positive</option>
                                                        <option value="Swab Negative Rapid Reaktif">Swab Negative Rapid Reaktif</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Diagnosa Pra<span class="text-danger"> *</span></b></label>
                                                    <select id="selectdokterdiagnosapra" class="select-search">
                                                        <option value="-">-- Pilih Dokter Diagnosa Pra --</option>
                                                        <?php foreach ($dokter->result() as $data_dokter) {
                                                            $namadokter = $data_dokter->namapetugasMedis;
                                                            if ($namadokter != '-') { ?>
                                                                <option value="<?php echo $data_dokter->namapetugasMedis; ?>"><?php echo $namadokter; ?></option>
                                                        <?php   }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa Pra Operasi<span class="text-danger"> *</span></b></label>
                                                    <div class="input-group">
                                                        <select id="diagnosapra" multiple="multiple" class="select" onchange="removeOpt(this,'pra')"></select>
                                                        <span class="input-group-btn">
                                                            <input type="hidden" class="form-control" id="hidden_pilih_icd_pra">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="jenisicd_pra">JENIS ICD <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a onclick="tampilDataDiagnosa('JENIS ICD','pra')">JENIS ICD</a></li>
                                                                <li><a onclick="tampilDataDiagnosa('ICD 10','pra')">ICD 10</a></li>
                                                                <li><a onclick="tampilDataDiagnosa('ICD 9','pra')">ICD 9</a></li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="hidden_icd_pra" class="form-group">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Diagnosa Post</b></label>
                                                    <select id="selectdokterdiagnosapost" class="select-search">
                                                        <option value="-">-- Pilih Dokter Diagnosa Post --</option>
                                                        <?php foreach ($dokter->result() as $data_dokter) {
                                                            $namadokter = $data_dokter->namapetugasMedis;
                                                            if ($namadokter != '-') { ?>
                                                                <option value="<?php echo $data_dokter->namapetugasMedis; ?>">
                                                                    <?php echo $namadokter; ?></option>
                                                        <?php   }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa Post Operasi</b></label>
                                                    <div class="input-group">
                                                        <select id="diagnosapost" multiple="multiple" class="select" onchange="removeOpt(this,'post')"></select>
                                                        <span class="input-group-btn">
                                                            <input type="hidden" class="form-control" id="hidden_pilih_icd_post">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="jenisicd_post">JENIS ICD <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a onclick="tampilDataDiagnosa('JENIS ICD','post')">JENIS ICD</a></li>
                                                                <li><a onclick="tampilDataDiagnosa('ICD 10','post')">ICD 10</a></li>
                                                                <li><a onclick="tampilDataDiagnosa('ICD 9','post')">ICD 9</a></li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="hidden_icd_post" class="form-group">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <div style="text-align: left;">
                                                <span class="text-danger"><b>* Wajib Diisi</b></span>
                                            </div>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_diagnosaprapost"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-tindakan-anestesi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/injection.svg">TINDAKAN ANESTESI</legend>
                                                <input type="hidden" id="notindakananestesi">
                                                <input type="hidden" id="tindakananestesihapus">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Tgl. Tindakan Anestesi<span class="text-danger"> *</span></b></label>
                                                            <input id="tglanestesi" type="date" class="form-control" style="color:black" required="required">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Jam Tindakan Anestesi<span class="text-danger"> *</span></b></label>
                                                            <input id="jamanestesi" type="time" class="form-control" style="color:black" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Jenis Anestesi</b></label>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <select id="selectanestesi" class="select-search">
                                                                <option value="-">-- Pilih Jenis Anestesi --</option>
                                                                <?php foreach ($jenisanestesi->result() as $data_jenisanestesi) { ?>
                                                                    <option value="<?php echo strtoupper($data_jenisanestesi->jenisAnestesi); ?>"><?php echo strtoupper($data_jenisanestesi->jenisAnestesi); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button id="btn_tambah_anestesi" class='btn btn-primary btn-labeled' type="button"><b><i class="icon-plus2"></i></b>TAMBAH</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                        <table class="table table-xs table-framed" id="tbl_tindakan_anestesi">
                                                            <thead>
                                                                <tr style="background:#eee;">
                                                                    <th style="text-align:center">JENIS</th>
                                                                    <th style="text-align:center">DOKTER ANESTESI</th>
                                                                    <th style="text-align:center">ASISTEN ANESTESI</th>
                                                                    <th style="text-align:center">TINDAKAN</th>
                                                                    <th style="text-align:center">AKSI</th>
                                                                    <th style="display:none">dataedit</th>
                                                                    <th style="display:none">id</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td style="text-align:center" colspan="7">TIDAK ADA DATA TINDAKAN ANESTESI</td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <div style="text-align: left;">
                                                <span class="text-danger"><b>* Wajib Diisi</b></span>
                                            </div>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_anestesi"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-tindakan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><i class="fa fa-heartbeat position-left" style="font-size:16px"></i>TINDAKAN OPERASI</legend>
                                                <input type="hidden" id="notindakanoperasi">
                                                <input type="hidden" id="tindakanhapus">
                                                <input type="hidden" id="hiddentgltindakanop">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Tgl. Tindakan Operasi<span class="text-danger"> *</span></b></label>
                                                            <input id="tgltindakanop" type="date" class="form-control" style="color:black" required="required">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Jam Tindakan Operasi<span class="text-danger"> *</span></b></label>
                                                            <input id="jamtindakanop" type="time" class="form-control" style="color:black" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label><b>Kelas Tindakan</b></label>
                                                            <select id="selectkelastindakan" class="select-search">
                                                                <option value="-">-- Pilih Kelas Tindakan --</option>
                                                                <?php foreach ($kelastindakanop->result() as $datakelastindakanop) { ?>
                                                                    <option value="<?php echo $datakelastindakanop->kdkelas; ?>"><?php echo $datakelastindakanop->kelas; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <label><b>Tindakan Operasi</b></label>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <select data-placeholder='' class='select-search' id='selecttindakan'>
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button id="btn_tambah" class='btn btn-primary btn-labeled' type="button"><b><i class="icon-plus2"></i></b>TAMBAH</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                        <table class="table table-xs table-framed" id="tbl_tindakan">
                                                            <thead>
                                                                <tr style="background:#eee;">
                                                                    <th style="text-align:center">DOKTER OPERATOR</th>
                                                                    <th style="text-align:center">ASISTEN OPERATOR</th>
                                                                    <th style="text-align:center">TINDAKAN</th>
                                                                    <th style="text-align:center;">KELAS</th>
                                                                    <th style="text-align:center;">JUMLAH</th>
                                                                    <th style="text-align:center">TARIF</th>
                                                                    <th style="text-align:center">SUBTOTAL</th>
                                                                    <th style="text-align:center">JOIN KAMAR OPERASI</th>
                                                                    <th style="text-align:center">AKSI</th>
                                                                    <th style="display:none">kodetarif</th>
                                                                    <th style="display:none">kodetindakan</th>
                                                                    <th style="display:none">jenistindakan</th>
                                                                    <th style="display:none">dataedit</th>
                                                                    <th style="display:none">idtindakan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="5"></th>
                                                                    <th style="text-align:center;">TOTAL</th>
                                                                    <th id='subtotal' style="text-align:right">0,00
                                                                    </th>
                                                                    <th colspan="2"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <div style="text-align: left;">
                                                <span class="text-danger"><b>* Wajib Diisi</b></span>
                                            </div>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_tindakan"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

            .tablekonten {
                overflow-y: auto;
                height: 250px;
            }

            .tablekonten thead tr:nth-child(1) th {
                background: #eee;
                position: sticky;
                top: 0;
                z-index: 10;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(() => {
                changeTextKonfirmasi();
                let norm = _('norm').value;
                let noregop = _('noregop').value;
                getDiagnosaPasien(norm, noregop);
                getTindakanAnestesi(noregop);
                getTindakanOperasi(noregop);
            });

            //TODO BEGIN DIAGNOSA
            function tampilDataDiagnosa(icd, jenis) {
                if (icd == "JENIS ICD") {
                    $('#tabel_icd_' + jenis).dataTable({
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
                    $('#tabel_icd_' + jenis).DataTable().clear().draw();
                    _("hidden_icd_" + jenis).innerHTML = "";
                } else {
                    _("hidden_icd_" + jenis)
                        .innerHTML = /*html*/ `<table id="tabel_icd_${jenis}" class="table datatable-responsive table-framed">
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
                    $('#tabel_icd_' + jenis).dataTable({
                        "bDestroy": true,
                        "processing": true,
                        "bInfo": false,
                        "serverSide": true,
                        "ordering": true,
                        "order": [
                            [1, 'ASC']
                        ],
                        "ajax": {
                            "url": "<?php echo base_url(); ?>tindakan/dataTableDiagnosa" + jenis,
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
                                    let html = /*html*/ `<button type='button' data-popup='tooltip' title='Pilih Diagnosa ICD' class="btn btn-primary btn-icon" onclick="pilihICD('${param}','${jenis}')"><i class="icon-checkmark4"></i></button>`;
                                    return html;
                                }
                            }
                        ]
                    });
                }
                _("jenisicd_" + jenis).innerHTML = `${icd} <span class="caret"></span>`;
            }

            function pilihICD(param, jenis) {
                if (_("hidden_pilih_icd_" + jenis).value.indexOf(param) == -1) {
                    _("hidden_pilih_icd_" + jenis).value += ";" + param;
                    if (_("hidden_pilih_icd_" + jenis).value != "") {
                        let dataopt = "";
                        let getdata = _("hidden_pilih_icd_" + jenis).value.substring(1).split(";");
                        getdata.forEach(d => {
                            dataopt += /*html*/ `<option value='${d}'>${d}</option>`;
                        });
                        $("select#diagnosa" + jenis).html(dataopt);
                        $('#diagnosa' + jenis).val(getdata).trigger('change');
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

            function removeOpt(el, jenis) {
                let jmldata = _("hidden_pilih_icd_" + jenis).value != "" ? _("hidden_pilih_icd_" + jenis).value.substring(1).split(";").length : 0;
                let jmlselect = $(el).val() == null ? 0 : $(el).val().length;
                if (jmldata > jmlselect) {
                    if ($(el).val() != null) {
                        let dataopt = "";
                        let dataselect = $(el).val();
                        dataselect.forEach(d => {
                            dataopt += /*html*/ `<option value='${d}' selected>${d}</option>`;
                        });
                        $("select#diagnosa" + jenis).html(dataopt);
                        let newdataselect = $(el).val().join(";");
                        _("hidden_pilih_icd_" + jenis).value = ";" + newdataselect;
                    } else {
                        $('#diagnosa' + jenis).empty();
                        _("hidden_pilih_icd_" + jenis).value = "";
                    }
                }
            }

            function getDiagnosaPasien(norm, noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getDiagnosaPasien'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: data => {
                        _("iddiagnosa").value = data["prapost"].iddiagnosa;
                        $("#selectsarscovid").val(data["prapost"].sarscovid == null ? "-" : data["prapost"].sarscovid).trigger("change");
                        $("#selectdokterdiagnosapra").val(data["prapost"].dokterdiagnosapra == null ? "-" : data["prapost"].dokterdiagnosapra).trigger("change");
                        _("hidden_pilih_icd_pra").value = data["prapost"].diagnosapra;
                        let option_diagnosapra = "";
                        if (data["prapost"].diagnosapra != null) {
                            let data_diagnosa = data["prapost"].diagnosapra.substring(1).split(";");
                            data_diagnosa.forEach(d => {
                                option_diagnosapra += /*html*/ `<option value='${d}'>${d}</option>`;
                            });
                        }
                        $("select#diagnosapra").html(option_diagnosapra);
                        $('#diagnosapra').val(data["prapost"].diagnosapra == null ? "" : data["prapost"].diagnosapra.substring(1).split(";")).trigger('change');

                        $("#selectdokterdiagnosapost").val(data["prapost"].dokterdiagnosapost == null ? "-" : data["prapost"].dokterdiagnosapost).trigger("change");
                        _("hidden_pilih_icd_post").value = data["prapost"].diagnosapost;
                        let option_diagnosapost = "";
                        if (data["prapost"].diagnosapost != null) {
                            let data_diagnosa = data["prapost"].diagnosapost.substring(1).split(";");
                            data_diagnosa.forEach(d => {
                                option_diagnosapost += /*html*/ `<option value='${d}'>${d}</option>`;
                            });
                        }
                        $("select#diagnosapost").html(option_diagnosapost);
                        $('#diagnosapost').val(data["prapost"].diagnosapost == null ? "" : data["prapost"].diagnosapost.substring(1).split(";")).trigger('change');
                        getDiagnosaICD(norm);
                    }
                });
            }

            function getDiagnosaICD(norm) {
                let table = _("tbl_diagnosa");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getDiagnosaICD'); ?>",
                    data: {
                        norm: norm
                    },
                    dataType: "JSON",
                    success: data => {
                        if (data.length != 0) {
                            let data_clean = [...new Set(data.map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
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

            _("btn_simpan_diagnosaprapost").addEventListener("click", () => {
                let noregop = _("noregop").value;
                let norm = _("norm").value;
                let iddiagnosa = _("iddiagnosa").value;
                let sarscovid = _("selectsarscovid").value;
                let dokterdiagnosapra = _("selectdokterdiagnosapra").value;
                let diagnosapra = $("#diagnosapra").val();
                let dokterdiagnosapost = _("selectdokterdiagnosapost").value;
                let diagnosapost = $("#diagnosapost").val();
                if (sarscovid == "-") {
                    swal({
                        title: "Sars Covid",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectsarscovid").focus()
                    });
                } else if (dokterdiagnosapra == "-") {
                    swal({
                        title: "Dokter Diagnosa Pra",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectdokterdiagnosapra").focus()
                    });
                } else if (diagnosapra == null) {
                    swal({
                        title: "Diagnosa Pra",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("diagnosapra").focus()
                    });
                } else if (dokterdiagnosapost != "-" && diagnosapost == null) {
                    swal({
                        title: "Diagnosa Post",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("diagnosapost").focus()
                    });
                } else if (dokterdiagnosapost == "-" && diagnosapost != null) {
                    swal({
                        title: "Dokter Diagnosa Post",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectdokterdiagnosapost").focus()
                    });
                } else {
                    swal({
                            title: "Diagnosa Pasien",
                            text: "Apakah Yakin Simpan?",
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
                                let arr_data = {
                                    iddiagnosa: iddiagnosa,
                                    sarscovid: sarscovid,
                                    dokterdiagnosapra: dokterdiagnosapra,
                                    diagnosapra: diagnosapra,
                                    dokterdiagnosapost: dokterdiagnosapost,
                                    diagnosapost: diagnosapost
                                };
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('tindakan/updateDiagnosaPrapost'); ?>",
                                    data: {
                                        arr_data: arr_data
                                    },
                                    dataType: "JSON",
                                    success: function(data) {
                                        console.log(data);
                                        swal({
                                            title: "Berhasil",
                                            text: "Data Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success"
                                        }, () => {
                                            getDiagnosaPasien(norm, noregop)
                                        });
                                    },
                                    error: function(data) {
                                        console.log(data);
                                        swal({
                                            title: "Gagal",
                                            text: "Data Tidak Disimpan!",
                                            confirmButtonColor: "#EF5350",
                                            type: "error"
                                        }, () => {
                                            getDiagnosaPasien(norm, noregop)
                                        });
                                    }
                                });
                            }
                        });
                }
            });
            //TODO END DIAGNOSA PASIEN


            //TODO BEGIN TINDAKAN ANESTESI
            function eventTableAnestesi(jenis, el) {
                const table = _("tbl_tindakan_anestesi");
                let row = $(el).closest('td').parent()[0].sectionRowIndex;
                let databaru = table.tBodies[0].rows[row].cells[6].innerText;
                switch (jenis) {
                    case "dokteranestesi":
                    case "asistenanestesi":
                    case "tindakananestesi":
                        if (databaru != '') {
                            table.tBodies[0].rows[row].cells[5].innerHTML = 'Y';
                        }
                        break;
                    case "hapustindakan":
                        swal({
                                title: "Hapus Tindakan Anestesi",
                                text: "Apakah Yakin Dihapus?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#EF5350",
                                confirmButtonText: "YA",
                                cancelButtonText: "TIDAK",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    if (databaru != '') {
                                        _("tindakananestesihapus").value = _("tindakananestesihapus").value + ";" + databaru;
                                    }
                                    table.deleteRow(row + 1);
                                    let row_count = table.tBodies[0].rows.length;
                                    if (row_count == 0) {
                                        let footer = table.createTFoot();
                                        let row = footer.insertRow(0);
                                        let cell = row.insertCell(0);
                                        cell.style.textAlign = "center";
                                        cell.innerHTML = "TIDAK ADA DATA TINDAKAN ANESTESI";
                                        cell.colSpan = '7';
                                    }
                                }
                            });
                        break;
                    default:
                        break;
                }

            }

            function getTindakanAnestesi(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getTindakanAnestesi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: data => {
                        _("notindakananestesi").value = data.notindakananestesi == null ? "" : data.notindakananestesi;
                        $('#tglanestesi').val(data.tgltindakananestesi == null ? "" : ubahFormatTanggal(data.tgltindakananestesi, 1));
                        $('#jamanestesi').val(data.tgltindakananestesi == null ? "" : ubahFormatTanggal(data.tgltindakananestesi, 0));
                        getDetailTindakanAnestesi(data.notindakananestesi);
                    },
                    error: response => {
                        console.log(response);
                    }
                });
            }

            function getDetailTindakanAnestesi(notindakananestesi) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('tindakan/getDetailTindakanAnestesi') ?>",
                    data: {
                        notindakananestesi: notindakananestesi
                    },
                    dataType: "JSON",
                    success: data => {
                        let table = _("tbl_tindakan_anestesi");
                        table.getElementsByTagName('tbody')[0].innerHTML = "";
                        let html = '';
                        data.forEach(d => {
                            html += /*html*/
                                `<tr>
                                    <td>${d.jenisanestesi}</td>
                                    <td>${setDokterAnestesi(d.dokter)}</td>
                                    <td>${setPerawatAnestesi(d.asisten)}</td>
                                    <td align="middle"><input type="text" class="form-control text-uppercase" value="${d.tindakan}" onkeyup="eventTableAnestesi('tindakananestesi',this)"/></td>
                                    <td style="text-align:center"><a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="eventTableAnestesi('hapustindakan',this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a></td>
                                    <td style="display:none">T</td>
                                    <td style="display:none">${d.iddetail}</td>
                                </tr>`;
                        });
                        table.getElementsByTagName('tbody')[0].innerHTML = html;
                        $('.select-2').select2({
                            width: "250px"
                        });
                        let row_count = table.tBodies[0].rows.length;
                        if (row_count > 0) {
                            table.deleteTFoot();
                        }
                        // else {
                        //     let footer = table.createTFoot();
                        //     let row = footer.insertRow(0);
                        //     let cell = row.insertCell(0);
                        //     cell.innerHTML = "&nbsp;";
                        //     cell.colSpan = '7';
                        // }
                    },
                    error: response => {
                        console.log(response);
                    }
                })
            }

            function setDokterAnestesi(op = "") {
                let dataOperator = "";
                $.ajax({
                    async: false,
                    url: "<?php echo base_url('tindakan/getDokterAnestesi'); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        data.forEach(o => {
                            let operator = o.namapetugasMedis;
                            if (operator != "-") {
                                let selected_op = op == operator ? "selected" : "";
                                dataOperator += `<option value="${operator}" ${selected_op}>${operator}</option>`;
                            }
                        });
                    }
                });
                return /*html*/ `<select style="width:100%;" class="select-search select-2" onchange="eventTableAnestesi('dokteranestesi', this)">
                    <option value="-">-- Pilih Dokter Anestesi --</option>
                    ${dataOperator}
                </select>`;
            }

            function setPerawatAnestesi(op = "") {
                let dataOperator = "";
                $.ajax({
                    async: false,
                    url: "<?php echo base_url('tindakan/getPerawatAnestesi'); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        data.forEach(o => {
                            let operator = o.perawat;
                            if (operator != "-") {
                                let selected_op = op == operator ? "selected" : "";
                                dataOperator += `<option value="${operator}" ${selected_op}>${operator}</option>`;
                            }
                        });
                    }
                });
                return /*html*/ `<select style="width:100%;" class="select-search select-2" onchange="eventTableAnestesi('asistenanestesi', this)">
                    <option value="-">-- Pilih Asisten Anestesi --</option>
                    ${dataOperator}
                </select>`;
            }

            _("btn_tambah_anestesi").addEventListener('click', () => {
                let jenisanest = _("selectanestesi").value;
                if (jenisanest != '-') {
                    const tabel = _('tbl_tindakan_anestesi').getElementsByTagName('tbody')[0];
                    if (tabel.rows.length == 0) {
                        _('tbl_tindakan_anestesi').deleteTFoot();
                    }
                    let tr = document.createElement('tr');
                    tr.innerHTML = /*html*/
                        `<td>${jenisanest}</td>
                        <td>${setDokterAnestesi()}</td>
                        <td>${setPerawatAnestesi()}</td>
                        <td align="middle"><input type="text" class="form-control text-uppercase" style='width:250px;'/></td>
                        <td style="text-align:center"><a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="eventTableAnestesi('hapustindakan',this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a></td>
                        <td style="display:none">T</td>
                        <td style="display:none"></td>`;
                    tabel.appendChild(tr);
                    $('.select-2').select2();
                    $("#selectanestesi").val("-").trigger('change');
                } else {
                    swal({
                        title: "Jenis Anestesi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectanestesi").focus()
                    });
                }
            });

            function getValueTableDetailTindakanAnestesi() {
                const tabel = _("tbl_tindakan_anestesi")
                let row_count = tabel.tBodies[0].rows.length;
                let row = [];
                for (let brs = 0; brs < row_count; brs++) {
                    row.push({
                        "iddetail": tabel.tBodies[0].rows[brs].cells[6].innerText,
                        "jenis": tabel.tBodies[0].rows[brs].cells[0].innerText,
                        "dokter": tabel.tBodies[0].rows[brs].cells[1].children[0].value,
                        "asisten": tabel.tBodies[0].rows[brs].cells[2].children[0].value,
                        "tindakan": tabel.tBodies[0].rows[brs].cells[3].children[0].value,
                        "dataedit": tabel.tBodies[0].rows[brs].cells[5].innerText
                    });
                }
                return row;
            }

            _("btn_simpan_anestesi").addEventListener("click", () => {
                let notindakananestesi = _("notindakananestesi").value;
                let tglanestesi = _("tglanestesi").value;
                let jamanestesi = _("jamanestesi").value;
                let datahapus = _("tindakananestesihapus").value;
                if (tglanestesi == "") {
                    swal({
                        title: "Tgl. Tindakan Anestesi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("tglanestesi").focus()
                    });
                } else if (jamanestesi == "") {
                    swal({
                        title: "Jam Tindakan Anestesi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("jamanestesi").focus()
                    });
                } else {
                    swal({
                            title: "Tindakan Anestesi",
                            text: "Apakah Yakin Simpan?",
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
                                let arr_data = {
                                    notindakananestesi: notindakananestesi,
                                    tgltindakananestesi: formatTanggal("tglanestesi", "jamanestesi"),
                                    datahapus: datahapus,
                                    datadetailtindakan: getValueTableDetailTindakanAnestesi(),
                                }
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('tindakan/insupTindakanAnestesi'); ?>",
                                    data: {
                                        arr_data: arr_data
                                    },
                                    dataType: "JSON",
                                    success: data => {
                                        console.log(data);
                                        swal({
                                            title: "Berhasil",
                                            text: "Data Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success"
                                        }, () => {
                                            getTindakanAnestesi(_("noregop").value);
                                            _("tindakananestesihapus").value = "";
                                        });
                                    },
                                    error: data => {
                                        console.log(data);
                                        swal({
                                            title: "Gagal",
                                            text: "Data Tidak Disimpan!",
                                            confirmButtonColor: "#EF5350",
                                            type: "error"
                                        }, () => {
                                            getTindakanAnestesi(_("noregop").value);
                                            _("tindakananestesihapus").value = "";
                                        });
                                    }
                                });
                            }
                        });
                }
            });
            //TODO END TINDAKAN ANESTESI


            //TODO BEGIN TINDAKAN OPERASI
            function eventTableTindakanOperasi(jenis, id) {
                const table = _("tbl_tindakan");
                let row = $(id).closest('td').parent()[0].sectionRowIndex;
                let iddetail = table.tBodies[0].rows[row].cells[13].innerText;
                switch (jenis) {
                    case "jmltindakan":
                        let jml = $(id).val();
                        let kode = table.tBodies[0].rows[row].cells[9].innerText;
                        let tarif = hapusRP(table.tBodies[0].rows[row].cells[5].innerText);
                        let subtotal = jml * tarif;
                        table.tBodies[0].rows[row].cells[6].innerHTML = tambahRP(subtotal);

                        if (iddetail != '') {
                            table.tBodies[0].rows[row].cells[12].innerHTML = 'Y';
                        }
                        _("subtotal").innerHTML = subTotal();
                        break;
                    case "dokterop":
                    case "asistenop":
                    case "joinok":
                        if (iddetail != '') {
                            table.tBodies[0].rows[row].cells[12].innerHTML = 'Y';
                        }
                        break;
                    case "hapustindakan":
                        swal({
                                title: "Hapus Tindakan",
                                text: "Apakah Yakin Dihapus?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#EF5350",
                                confirmButtonText: "YA",
                                cancelButtonText: "TIDAK",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    if (iddetail != '') {
                                        _("tindakanhapus").value = _("tindakanhapus").value + ";" + iddetail;
                                    }
                                    table.deleteRow(row + 1);
                                    _("subtotal").innerHTML = subTotal();
                                }
                            });
                        break;
                    default:
                        break;
                }
            }


            $("#selectkelastindakan").on('change', e => {
                let kdkelas = e.target.value;
                if (kdkelas != "-") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('tindakan/getListTindakanOP'); ?>",
                        data: {
                            kdkelas
                        },
                        dataType: "JSON",
                        success: data => {
                            _("selecttindakan").disabled = false;
                            $("#selecttindakan").val("").trigger('change');
                            let option_tindakan = "<option value='-'>-- Pilih Tindakan Operasi --</option>";
                            data.forEach(d => {
                                option_tindakan += `<option value='${d.kdtarif};${d.tindakan};${d.tarif};${d.kelas};${d.kdtindakan}'>${d.tindakan} - ${tambahRP(d.tarif)}</option>`;
                            });
                            $("select#selecttindakan").html(option_tindakan);
                        },
                        error: response => {
                            console.log(response);
                        }
                    });
                } else {
                    $("select#selecttindakan").html("<option value=''></option>");
                    $("#selecttindakan").val("").trigger('change');
                    _("selecttindakan").disabled = true;
                }
            });

            function getTindakanOperasi(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getTindakanOperasi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: data => {
                        _("notindakanoperasi").value = data.notindakanop == null ? "" : data.notindakanop;
                        _("hiddentgltindakanop").value = data.tgltindakanop;
                        $('#tgltindakanop').val(data.tgltindakanop == null ? "" : ubahFormatTanggal(data.tgltindakanop, 1));
                        $('#jamtindakanop').val(data.tgltindakanop == null ? "" : ubahFormatTanggal(data.tgltindakanop, 0));
                        getDetailTindakanOperasi(data.notindakanop);
                    },
                    error: response => {
                        console.log(response);
                    }
                });
            }

            function getDetailTindakanOperasi(notinop) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('tindakan/getDetailTindakanOperasi') ?>",
                    data: {
                        notinop: notinop
                    },
                    dataType: "JSON",
                    success: data => {
                        let table = _("tbl_tindakan");
                        table.getElementsByTagName('tbody')[0].innerHTML = "";
                        let html = '';
                        data.forEach(d => {
                            let checked = d.joinok == "true" ? "checked" : "";
                            html += /*html*/
                                `<tr>
                                    <td>${setDokterOperator(d.operator)}</td>
                                    <td>${setPerawatOP(d.asistenop)}</td>
                                    <td>${d.tindakan}</td>
                                    <td style="text-align:center">${d.kelas}</td>
                                    <td style="text-align:center"><input type='number' onpaste='return false' onwheel="blur()" onchange="eventTableTindakanOperasi('jmltindakan',this)" class='form-control' min='1' value='${d.jmltindakan}' step='1' style='text-align:center;' onkeydown='return false'></td>
                                    <td style="text-align:right">${tambahRP(d.tarif)}</td>
                                    <td style="text-align:right">${tambahRP(d.subtotal)}</td>
                                    <td style="text-align:center"><input type="checkbox" onchange="eventTableTindakanOperasi('joinok',this)" ${checked}></td>
                                    <td style="text-align:center"><a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="eventTableTindakanOperasi('hapustindakan',this);" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a></td>
                                    <td style="display:none">${d.kdtarif}</td>
                                    <td style="display:none">${d.kdtindakan}</td>
                                    <td style="display:none">${d.jenistindakan}</td>
                                    <td style="display:none">T</td>
                                    <td style="display:none">${d.iddetail}</td>
                                </tr>`;
                        });
                        table.getElementsByTagName('tbody')[0].innerHTML = html;
                        $('.select-2').select2({
                            width: "300px"
                        });
                        _("subtotal").innerHTML = subTotal();
                    },
                    error: response => {
                        console.log(response);
                    }
                });
            }

            // function setDokterOperator(op = "") {
            //     let dataOperator = "";
            //     let arr_op = op != "" ? op.split(";") : "";
            //     fetch("<?php echo base_url('tindakan/getDokterOperator'); ?>")
            //         .then(data => data.json())
            //         .then(data => data.forEach(o => {
            //             let operator = o.namapetugasMedis;
            //             if (operator != "-") {
            //                 let selected_op = arr_op.indexOf(operator) != -1 ? "selected" : "";
            //                 dataOperator += `<option value="${operator}" ${selected_op}>${operator}</option>`;
            //             }
            //         }))
            //         .catch(response => {
            //             console.log(response);
            //         });
            //     return /*html*/ `<select style="width:100%;" multiple="multiple" class="select select-2" data-placeholder="-- Pilih Operator --" onchange="eventTableTindakanOperasi('dokterop', this)">
            //                  ${dataOperator}
            //              </select>`;
            // }

            function setDokterOperator(op = "") {
                let dataOperator = "";
                let arr_op = op != "" ? op.split(";") : "";
                $.ajax({
                    async: false,
                    url: "<?php echo base_url('tindakan/getDokterOperator'); ?>",
                    dataType: "JSON",
                    success: data => {
                        data.forEach(o => {
                            let operator = o.namapetugasMedis;
                            if (operator != "-") {
                                let selected_op = arr_op.indexOf(operator) != -1 ? "selected" : "";
                                dataOperator += `<option value="${operator}" ${selected_op}>${operator}</option>`;
                            }
                        });
                    },
                    error: response => {
                        console.log(response);
                    }
                });
                return /*html*/ `<select style="width:100%;" multiple="multiple" class="select select-2" data-placeholder="-- Pilih Operator --" onchange="eventTableTindakanOperasi('dokterop', this)">
                    ${dataOperator}
                </select>`;
            }

            function setPerawatOP(op = "") {
                let dataOperator = "";
                let arr_op = op != "" ? op.split(";") : "";
                $.ajax({
                    async: false,
                    url: "<?php echo base_url('tindakan/getPerawatOP'); ?>",
                    dataType: "JSON",
                    success: data => {
                        data.forEach(o => {
                            let operator = o.namapetugasMedis;
                            if (operator != "-") {
                                let selected_op = arr_op.indexOf(operator) != -1 ? "selected" : "";
                                dataOperator += `<option value="${operator}" ${selected_op}>${operator}</option>`;
                            }
                        });
                    },
                    error: response => {
                        console.log(response);
                    }
                });
                return /*html*/ `<select style="width:100%;" multiple="multiple" class="select select-2" data-placeholder="-- Pilih Perawat --" onchange="eventTableTindakanOperasi('asistenop', this)">
                    ${dataOperator}
                </select>`;
            }

            function validasiTableTindakan(cell, input) {
                const table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                let row = "";
                for (let brs = 0; brs < row_count; brs++) {
                    let kolom = table.tBodies[0].rows[brs].cells[cell];
                    let data = typeof kolom.children[0] !== 'undefined' ? $(kolom.children[0]).val() : kolom.innerText;
                    if (data == input) {
                        row += brs;
                    }
                }
                return row;
            }

            _("btn_tambah").addEventListener('click', () => {
                let data = _("selecttindakan").value;
                if (data != "-") {
                    let data_array = data.split(';');
                    if (validasiTableTindakan(10, data_array[4]) == "") {
                        const table = _("tbl_tindakan");
                        const table_body = table.getElementsByTagName('tbody')[0];
                        let tr = document.createElement('tr');
                        tr.innerHTML = /*html*/
                            `<td>${setDokterOperator()}</td>
                            <td>${setPerawatOP()}</td>
                            <td>${data_array[1]}</td>
                            <td style="text-align:center">${data_array[3]}</td>
                            <td style="text-align:center"><input type="number" onpaste="return false" onwheel="blur()" onchange="eventTableTindakanOperasi('jmltindakan',this)" class="form-control" min="1" value="1" step="1" style="text-align:center;" onkeydown="return false"></td>
                            <td style="text-align:right">${tambahRP(data_array[2])}</td>
                            <td style="text-align:right">${tambahRP(data_array[2])}</td>
                            <td style="text-align:center"><input type="checkbox" onchange="eventTableTindakanOperasi('joinok',this)"></td>
                            <td style="text-align:center"><a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="eventTableTindakanOperasi('hapustindakan',this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a></td>
                            <td style="display:none">${data_array[0]}</td>
                            <td style="display:none">${data_array[4]}</td>
                            <td style="display:none">TAMBAHAN</td>
                            <td style="display:none">T</td>
                            <td style="display:none"></td>`;
                        table_body.appendChild(tr);
                        $('.select-2').select2({
                            width: "300px"
                        });
                        _("subtotal").innerHTML = subTotal();
                        $("#selecttindakan").val("-").trigger('change');
                    } else {
                        swal({
                            title: "Gagal",
                            text: `Tindakan ${data_array[1]} Sudah Diinput!`,
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                } else {
                    swal({
                        title: "Gagal",
                        text: "Pilih Tindakan Terlebih Dahulu!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                }
            });

            function subTotal() {
                const table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                let tempTotal = [];

                for (let brs = 0; brs < row_count; brs++) {
                    tempTotal.push(hapusRP(table.tBodies[0].rows[brs].cells[6].innerText));
                }
                let subtotal = 0;
                tempTotal.forEach(function(t) {
                    subtotal += t;
                });
                return tambahRP(subtotal);
            }

            function getTableValueTindakanOperasi() {
                const table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                let row = [];
                for (let brs = 0; brs < row_count; brs++) {
                    row.push({
                        "iddetail": table.tBodies[0].rows[brs].cells[13].innerText,
                        "operator": $(table.tBodies[0].rows[brs].cells[0].children[0]).val(),
                        "asistenop": $(table.tBodies[0].rows[brs].cells[1].children[0]).val(),
                        "tindakan": table.tBodies[0].rows[brs].cells[2].innerText,
                        "jmltindakan": table.tBodies[0].rows[brs].cells[4].children[0].value,
                        "tarif": hapusRP(table.tBodies[0].rows[brs].cells[5].innerText),
                        "subtotaltindakan": hapusRP(table.tBodies[0].rows[brs].cells[6].innerText),
                        "joinok": table.tBodies[0].rows[brs].cells[7].children[0].checked,
                        "kodetarif": table.tBodies[0].rows[brs].cells[9].innerText,
                        "kodetindakan": table.tBodies[0].rows[brs].cells[10].innerText,
                        "jenistindakan": table.tBodies[0].rows[brs].cells[11].innerText,
                        "dataedit": table.tBodies[0].rows[brs].cells[12].innerText
                    });
                }
                return row;
            }


            _("btn_simpan_tindakan").addEventListener("click", () => {
                let noregistrasiop = _("noregop").value;
                let notindakanop = _("notindakanoperasi").value;
                let tgltindakanop = _("tgltindakanop").value;
                let jamtindakanop = _("jamtindakanop").value;
                let totaltarifop = hapusRP(_("subtotal").innerText);
                let datahapus = _("tindakanhapus").value;
                const table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                if (tgltindakanop == "") {
                    swal({
                        title: "Tgl. Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("tgltindakanop").focus()
                    });
                } else if (jamtindakanop == "") {
                    swal({
                        title: "Jam Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("jamtindakanop").focus()
                    });
                } else if (row_count == 0) {
                    swal({
                        title: "Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    if (validasiTableTindakan(0, null) != "") {
                        swal({
                            title: "Dokter Operator",
                            text: "Tidak Boleh Kosong!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } else if (validasiTableTindakan(1, null) != "") {
                        swal({
                            title: "Asisten Operator",
                            text: "Tidak Boleh Kosong!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } else {
                        swal({
                                title: "Tindakan Operasi",
                                text: "Apakah Yakin Simpan?",
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
                                    let arr_data = {
                                        notindakanop: notindakanop,
                                        tgltindakanop: formatTanggal("tgltindakanop", "jamtindakanop"),
                                        totaltarifop: totaltarifop,
                                        datahapus: datahapus,
                                        datadetailtindakan: getTableValueTindakanOperasi()
                                    };
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url('tindakan/insupTindakanOperasi'); ?>",
                                        data: {
                                            arr_data: arr_data
                                        },
                                        dataType: "JSON",
                                        success: data => {
                                            console.log(data);
                                            swal({
                                                title: "Berhasil",
                                                text: "Data Disimpan",
                                                confirmButtonColor: "#66BB6A",
                                                type: "success"
                                            }, () => {
                                                getTindakanOperasi(noregistrasiop);
                                                _("tindakanhapus").value = "";
                                            });
                                        },
                                        error: data => {
                                            console.log(data);
                                            swal({
                                                title: "Gagal",
                                                text: "Data Tidak Disimpan!",
                                                confirmButtonColor: "#EF5350",
                                                type: "error"
                                            }, () => {
                                                getTindakanOperasi(noregistrasiop);
                                                _("tindakanhapus").value = "";
                                            });
                                        }
                                    });
                                }
                            });
                    }
                }
            });
            //TODO END TINDAKAN OPERASI

            //TODO BEGIN KONFIRMASI
            function changeTextKonfirmasi() {
                let get_url = (window.location.href).split("/")[5];
                $('#btn_selesai span').text(get_url == "edittindakan" ? "SELESAI EDIT TINDAKAN" : "SELESAI TINDAKAN");
            }

            _("btn_selesai").addEventListener("click", () => {
                let tindakan = _("hiddentgltindakanop").value;
                if (tindakan == "") {
                    swal({
                        title: "Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    let get_url = (window.location.href).split("/")[5];
                    let textKonfirmasi = get_url == "edittindakan" ? "Apakah Yakin Selesai Melakukan Edit Tindakan?" : "Apakah Yakin Selesai Melakukan Tindakan?";
                    swal({
                            title: "Selesai Tindakan",
                            text: textKonfirmasi,
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
                                let noregop = _("noregop").value;
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('tindakan/konfirmasiSelesaiTindakan'); ?>",
                                    data: {
                                        noregop: noregop
                                    },
                                    success: data => {
                                        console.log(data);
                                        swal({
                                            title: "Berhasil",
                                            text: "Data Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success",
                                        }, () => {
                                            document.location = get_url == "isitindakan" ? "<?php echo base_url('permintaansudah') ?>" : "<?php echo base_url('permintaanselesaitindakan') ?>";
                                        });
                                    },
                                    error: response => {
                                        console.log(response);
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
            //TODO END KONFIRMASI
        </script>