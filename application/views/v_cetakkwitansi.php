<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            width: 11cm;
            height: 8cm;

            margin: 0;
        }

        .tabelbiodata tr {
            width: 50%;
        }

        .paper {
            width: 100%;
        }

        .kwitansi {
            font-size: 7pt;
            font-family: Bookman Old Style;
            width: 50%;
            min-width: 350px;
            height: 400px;
            float: left;
            border-collapse: collapse;
        }

        .title {
            width: 100%;
            text-align: center;

        }

        .biodata {
            width: 100%;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Endoskopi - RSUKH</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
</head>

<body>
    <div class="paper">
        <?php
        $no = 0;
        foreach ($pasien as $p) { ?>
            <div class="kwitansi">
                <div class="title">
                    <table style="width: 100%;">
                        <tr>
                            <td><img style="width: 30px" src="<?php echo base_url('/template/assets/images/logo_pemprov1.png') ?>" style="float:left;" /></td>
                            <td>
                                <p>KWITANSI PEMERIKSAAN KAMAR OPERASI<br>RUMAH SAKIT KARSA HUSADA BATU<br>JL. A. YANI 10 – 13 BATU<br />Telp. (0341) 596898 – 591076 Fax. (0341) 596901</p>
                            </td>
                            <td><img style="width: 43px" src="<?php echo base_url('/template/assets/images/logorskh2.png') ?>" style="float:right;" /></td>
                        </tr>
                    </table>
                </div>
                <hr style="margin-top: -5px;border: 1px solid black;">
                <div class="biodata">
                    <table class="tabelbiodata">
                        <tr>
                            <td>No./Tgl. Registrasi</td>
                            <td>: <?php echo $p->noregistrasiop . ' / ' . $p->tglregistrasiop; ?></td>
                        </tr>
                        <tr>
                            <td>No. RM</td>
                            <td>: <?php echo $p->norm; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>: <?php echo $p->namapasien . ' (' . $p->jk . ')'; ?></td>
                        </tr>
                        <tr>
                            <td>Tgl. Lahir</td>
                            <td>: <?php echo $p->tgllahir; ?></td>
                        </tr>
                        <tr>
                            <td>Asal Pasien</td>
                            <td>: <?php echo strtoupper($p->unitasal); ?></td>
                        </tr>
                        <tr>
                            <td>Dokter Pengirim</td>
                            <td>: <?php echo $p->dokterpengirim; ?></td>
                        </tr>
                        <tr>
                            <td>Cara Bayar</td>
                            <td>: <?php echo strtoupper($p->carabayar); ?></td>
                        </tr>
                        <tr>
                            <td>Penjamin</td>
                            <td>: <?php echo strtoupper($p->penjamin); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="tindakan">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black;border-collapse: collapse;">NO.</th>
                                <th style="border: 1px solid black;border-collapse: collapse;">OPERATOR</th>
                                <th style="border: 1px solid black;border-collapse: collapse;">TINDAKAN</th>
                                <th style="border: 1px solid black;border-collapse: collapse;">JML</th>
                                <th style="border: 1px solid black;border-collapse: collapse;">TARIF</th>
                                <th style="border: 1px solid black;border-collapse: collapse;">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $this->db->select("tindakan,jmlTindakan AS jml,operator,FORMAT(tarif,2,'de_DE') AS tarif,FORMAT(subTotal,2,'de_DE') AS subtotal");
                            $this->db->where('noTindakanOP', $p->notinop);
                            $this->db->where('statusHapus', '0');
                            $tindakan = $this->db->get('t_detailtindakanendoskopi')->result();
                            foreach ($tindakan as $v) {
                                $get_operator = $v->operator;
                                $arrdokter = implode("<br/>" . "- ", explode(";", $get_operator));
                                $operator_value = substr($arrdokter, 5);

                            ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no . '.'; ?></td>
                                    <td><?php echo $operator_value; ?></td>
                                    <td><?php echo strtoupper($v->tindakan); ?></td>
                                    <td style="text-align: center"><?php echo $v->jml; ?></td>
                                    <td style="text-align: right"><?php echo $v->tarif; ?></td>
                                    <td style="text-align: right"><?php echo $v->subtotal; ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right">&nbsp;</th>
                                <th style="text-align: center;">TOTAL</th>
                                <th style="text-align: right;"><?php echo $p->total; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <hr>
                <h6 style="margin-top: -5px;"><i><?php date_default_timezone_set('Asia/Jakarta');
                                                    echo '&nbsp;&nbsp;&nbsp;' . strtoupper($nama) . ', ' . date("d-m-Y H:i:s"); ?></i></h6>
                <hr style="margin-top: -13px">
            </div>
        <?php

        } ?>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>