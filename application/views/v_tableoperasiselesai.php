<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Endoskopi - RSUKH</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
</head>

<body>
    <table id='data_operasi' summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="1">
        <caption>
            <h3>LAPORAN PASIEN ENDOSKOPI<br><?php echo date("d-m-Y", strtotime($tgl_awal)) . " S/D " . date("d-m-Y", strtotime($tgl_akhir)); ?></h3>
        </caption>
        <thead>
            <tr>
                <th style='text-align:center;'>No.</th>
                <th style='text-align:center;'>Nama Pasien</th>
                <th style='text-align:center;'>No. RM</th>
                <th style='text-align:center;'>Tgl. MRS</th>
                <th style='text-align:center;'>Tgl. Operasi</th>
                <th style='text-align:center;'>Jenis Kelamin</th>
                <th style='text-align:center;'>Kedatangan Awal Pasien</th>
                <th style='text-align:center;'>Jenis Operasi</th>
                <th style='text-align:center;'>Diagnosa Pra Op</th>
                <th style='text-align:center;'>Diagnosa Post Op</th>
                <th style='text-align:center;'>SARS COVID</th>
                <th style='text-align:center;'>Dokter Anestesi</th>
                <th style='text-align:center;'>Asisten Anestesi</th>
                <th style='text-align:center;'>Jenis Anestesi</th>
                <th style='text-align:center;'>Tindakan Anestesi</th>
                <th style='text-align:center;'>Operator</th>
                <th style='text-align:center;'>Asisten Operator</th>
                <th style='text-align:center;'>Tarif Tindakan</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $row = 2;
        foreach ($operasi_selesai as $v) {
            $jk = strtolower($v->jk) == 'p' ? "Perempuan" : "Laki-Laki";
            $diagnosapra = $v->diagnosapra != null ? join("; ", explode(";", substr($v->diagnosapra, 1))) : "";
            $diagnosapost = $v->diagtnosapost != null ? join("; ", explode(";", substr($v->diagtnosapost, 1))) : "";
            $asal_pasien = $v->instalasi . " / " . $v->unit;
            $data_detail_anestesi = $this->m_operasiselesai->getDetailTindakanAnestesi($v->notinanestesi);
            $get_dokter_anestesi = "";
            $get_asisten_anestesi = "";
            $get_jenis_anestesi = "";
            $get_tindakan_anestesi = "";
            foreach ($data_detail_anestesi as $vd) {
                $get_dokter_anestesi .= ";" . $vd->dokteranestesi;
                $get_asisten_anestesi .= "; " . $vd->asistenanestesi;
                $get_jenis_anestesi .= "; " . $vd->jenisanestesi;
                $get_tindakan_anestesi .= "; " . $vd->tindakananestesi;
            }
            $set_dokter_anestesi = implode("<br/>" . "- ", explode(";", $get_dokter_anestesi));
            $dokter_anestesi = substr($set_dokter_anestesi, 5);
            $set_asisten_anestesi = implode("<br/>" . "- ", explode(";", $get_asisten_anestesi));
            $asisten_anestesi = substr($set_asisten_anestesi, 5);
            $set_jenis_anestesi = implode("<br/>" . "- ", explode(";", $get_jenis_anestesi));
            $jenis_anestesi = substr($set_jenis_anestesi, 5);
            $set_tindakan_anestesi = implode("<br/>" . "- ", explode(";", $get_tindakan_anestesi));
            $tindakan_anestesi = substr($set_tindakan_anestesi, 5);
            $data_detail_operasi = $this->m_operasiselesai->getDetailTindakanOP($v->notinop);
            $get_operator = '';
            $get_asistenop = '';
            $get_tarif_tindakan = '';
            foreach ($data_detail_operasi as $vd) {
                $get_operator .= ";" . $vd->operator;
                $get_asistenop .= ";" . $vd->asistenop;
                $get_tarif_tindakan .= "; " . $vd->tindakan . " (Rp " . number_format($vd->subtotal, 2, ',', '.') . ")";
            }
            $set_operator = implode("<br/>" . "- ", array_unique(explode(";", $get_operator)));
            $operator = substr($set_operator, 5);
            $set_asistenop = implode("<br/>" . "- ", array_unique(explode(";", $get_asistenop)));
            $asistenop = substr($set_asistenop, 5);
            $set_tarif_tindakan = implode("<br/>" . "- ", explode(";", $get_tarif_tindakan));
            $tarif_tindakan = substr($set_tarif_tindakan, 5);
        ?>
            <tbody>
                <tr>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $no; ?></td>
                    <td style='vertical-align: middle;'><?php echo $v->pasien; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo "&nbsp;" . $v->norm; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $v->tglmrs; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $v->tglop; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $jk; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $asal_pasien; ?></td>
                    <td style='text-align:center; vertical-align: middle;'><?php echo $v->jenisop; ?></td>
                    <td style='vertical-align: middle;'><?php echo $diagnosapra; ?></td>
                    <td style='vertical-align: middle;'><?php echo $diagnosapost; ?></td>
                    <td style='vertical-align: middle;'><?php echo $v->sarscovid; ?></td>
                    <td style='vertical-align: middle;'><?php echo $dokter_anestesi; ?></td>
                    <td style='vertical-align: middle;'><?php echo $asisten_anestesi; ?></td>
                    <td style='vertical-align: middle;'><?php echo $jenis_anestesi; ?></td>
                    <td style='vertical-align: middle;'><?php echo $tindakan_anestesi; ?></td>
                    <td style='vertical-align: middle;'><?php echo $operator; ?></td>
                    <td style='vertical-align: middle;'><?php echo $asistenop; ?></td>
                    <td style='vertical-align: middle;'><?php echo $tarif_tindakan; ?></td>
                </tr>
            </tbody>
        <?php
            $no++;
            $row++;
        }
        ?>
    </table>
</body>

</html>

<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript">
    var file_name = "<?php echo 'pasien_endoskopi_' . date('Y-m-d', strtotime($tgl_awal)) . '_' . date('Y-m-d', strtotime($tgl_akhir)); ?>";
    $(document).ready(function() {
        tableToExcel('data_operasi', 'pasien_endoskopi');
        window.close();
    });
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
        var template = `<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
                        <head>
                           <!--[if gte mso 9]>
                              <xml>
                                 <x:ExcelWorkbook>
                                    <x:ExcelWorksheets>
                                       <x:ExcelWorksheet>
                                          <x:Name>{worksheet}</x:Name>
                                          <x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions>
                                       </x:ExcelWorksheet>
                                    </x:ExcelWorksheets>
                                 </x:ExcelWorkbook>
                              </xml>
                           <![endif]-->
                        </head>
                        <body>
                           <table border="1">{table}</table>
                        </body>
                     </html>`
        var base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }
        var format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        }
        return function(table, name) {
            if (!table.nodeType)
                table = document.getElementById(table)
            var ctx = {
                worksheet: name,
                table: table.innerHTML
            }
            var a = document.createElement('a');
            a.href = uri + base64(format(template, ctx));
            a.download = file_name;
            a.click();
        }
    })()
</script>