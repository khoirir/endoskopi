<?php
class M_operasiselesai extends CI_Model
{

    //TODO BEGIN FORM INDEX
    function getJenisOperasi()
    {
        $this->db->select("kdJenisOperasi AS kode,jenisOperasi AS jenisoperasi");
        $this->db->where("kdJenisOperasi != '3'");
        $this->db->order_by("jenisOperasi", "ASC");
        return $this->db->get("t_jenisop")->result();
    }

    function getDokter()
    {
        $this->db->select("kdPetugasMedis AS kode,namapetugasMedis AS dokter");
        $this->db->where_in("kdPetugasMedis", array("0022", "0007", "0024", "0019"));
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2")->result();
    }

    function dataOperasiSelesai($tglawal, $tglakhir, $jenisop, $operator)
    {
        $sql = $this->db->query("
            SELECT
                tro.noRegistrasiOP AS noregop,
                tro.noRM AS norm,
                tp.nmPasien AS pasien,
                tp.jenisKelamin AS jk,
                tro.instalasi AS instalasi,
                un.unit AS unit,
                DATE_FORMAT( tro.tglKonfirmasiJadwalOP, '%d-%m-%Y' ) AS tglop,
                tjo.jenisOperasi AS jenisop,
                (SELECT GROUP_CONCAT(CONCAT(';',SUBSTRING(operator,2)) SEPARATOR '') FROM t_detailtindakanendoskopi WHERE noTindakanOP=top.noTindakanOP AND statusHapus='0') AS dokterop,
                tjo.keterangan AS warnajenisop 
            FROM
                t_registrasiendoskopi tro
                INNER JOIN t_tindakanendoskopi top ON tro.noRegistrasiOP = top.noRegistrasiOP
                INNER JOIN t_jenisop tjo ON tro.jenisOperasi = tjo.kdJenisOperasi
                INNER JOIN t_registrasi trg ON tro.noDaftarPasien = trg.noDaftar
                INNER JOIN t_pasien tp ON tro.noRM = tp.noRekamedis
                INNER JOIN (SELECT trj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT( trj.tglMasukRawatJalan, '%d-%m-%Y' ) AS tglmrs,tun.unit AS unit FROM t_registrasirawatjalan trj INNER JOIN t_unit tun ON trj.kdUnit = tun.kdUnit UNION ALL SELECT tri.noDaftarRawatInap AS noregistrasi,DATE_FORMAT( tri.tglMasukRawatInap, '%d-%m-%Y' ) AS tglmrs,tri.rawatInap AS unit FROM t_registrasirawatinap tri 
                ) un ON tro.noRegistrasiPasien = un.noregistrasi 
            WHERE
                tro.statusOP = '5' 
                AND tro.jenisOperasi$jenisop 
                AND ( tro.tglKonfirmasiJadwalOP BETWEEN '$tglawal' AND '$tglakhir' ) 
                AND ( SELECT GROUP_CONCAT( CONCAT( ';', SUBSTRING(operator,2) ) SEPARATOR '' ) FROM t_detailtindakanendoskopi WHERE noTindakanOP = top.noTindakanOP AND statusHapus = '0' ) $operator 
            ORDER BY
                tro.tglKonfirmasiJadwalOP ASC
        ");
        return $sql;
    }
    //TODO END FORM INDEX

    function getDataOperasi($tglawal, $tglakhir, $jenisop, $operator)
    {
        $sql = $this->db->query("
        SELECT
            tp.nmPasien AS pasien,
            tro.noRM AS norm,
            un.tglmrs AS tglmrs,
            DATE_FORMAT( tro.tglKonfirmasiJadwalOP, '%d-%m-%Y' ) AS tglop,
            tp.jenisKelamin AS jk,
            tro.instalasi AS instalasi,
            un.unit AS unit,
            tjo.jenisOperasi AS jenisop,
            top.noTindakanOP AS notinop,
            tdo.diagnosaPra AS diagnosapra,
            tdo.diagnosaPost AS diagtnosapost,
            tdo.sarsCovid AS sarscovid,
            tan.noTindakanAnestesi AS notinanestesi
        FROM
            t_registrasiendoskopi tro
            INNER JOIN t_tindakanendoskopi top ON tro.noRegistrasiOP = top.noRegistrasiOP
            INNER JOIN t_jenisop tjo ON tro.jenisOperasi = tjo.kdJenisOperasi
            INNER JOIN t_diagnosapasienendoskopi tdo ON tro.noRegistrasiOP = tdo.noRegistrasiOP
            INNER JOIN t_tindakananestesiendoskopi tan ON tro.noRegistrasiOP = tan.noRegistrasiOP
            INNER JOIN t_registrasi trg ON tro.noDaftarPasien = trg.noDaftar
            INNER JOIN t_pasien tp ON tro.noRM = tp.noRekamedis
            INNER JOIN t_carabayar tcb ON trg.kdCaraBayar = tcb.kdCaraBayar
            INNER JOIN t_penjamin tpj ON trg.kdPenjamin = tpj.kdPenjamin
            LEFT JOIN t_tenagamedis2 tnm ON tro.dokterPengirim = tnm.namapetugasMedis
            INNER JOIN (SELECT trj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT( trj.tglMasukRawatJalan, '%d-%m-%Y' ) AS tglmrs,tun.unit AS unit FROM t_registrasirawatjalan trj INNER JOIN t_unit tun ON trj.kdUnit = tun.kdUnit UNION ALL SELECT tri.noDaftarRawatInap AS noregistrasi,DATE_FORMAT( tri.tglMasukRawatInap, '%d-%m-%Y' ) AS tglmrs,tri.rawatInap AS unit FROM t_registrasirawatinap tri) un ON tro.noRegistrasiPasien = un.noregistrasi
        WHERE
            tro.statusOP = '5' 
            AND tro.jenisOperasi$jenisop 
            AND ( tro.tglKonfirmasiJadwalOP BETWEEN '$tglawal' AND '$tglakhir' ) 
            AND ( SELECT GROUP_CONCAT( CONCAT( ';', SUBSTRING(operator,2) ) SEPARATOR '' ) FROM t_detailtindakanendoskopi WHERE noTindakanOP = top.noTindakanOP AND statusHapus = '0' ) $operator 
        ORDER BY
            tro.tglKonfirmasiJadwalOP ASC
        ");
        return $sql->result();
    }

    function getDetailTindakanOP($notinop)
    {
        $sql = $this->db->query("SELECT operator AS operator,asistenOperator AS asistenop,tindakan AS tindakan,subTotal AS subtotal,jenisTindakan AS jenistindakan FROM t_detailtindakanendoskopi WHERE statusHapus=? AND noTindakanOP=?", array('0', $notinop));
        return $sql->result();
    }

    function getDetailTindakanAnestesi($notindakananestesi)
    {
        $sql = $this->db->query("SELECT jenisAnestesi AS jenisanestesi,dokterAnestesi AS dokteranestesi,asistenAnestesi AS asistenanestesi,tindakanAnestesi AS tindakananestesi FROM t_detailtindakananestesiendoskopi WHERE statusHapus=? AND noTindakanAnestesi=?", array('0', $notindakananestesi));
        return $sql->result();
    }
}
