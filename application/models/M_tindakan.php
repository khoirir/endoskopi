<?php
class M_tindakan extends CI_Model
{

    //TODO BEGIN PASIEN
    function getDetailPasien($norm)
    {
        $this->db->select("noRekamedis AS norm,nmPasien AS namapasien,tempatLahir AS tmplahir,DATE_FORMAT(tglLahir,'%d-%m-%Y') AS tgllahir,jenisKelamin AS jk,alamat AS alamat,kelurahan AS kelurahan, kecamatan AS kecamatan, kabupaten AS kabupaten,provinsi AS provinsi");
        return $this->db->get_where("t_pasien", array("noRekamedis" => $norm));
    }

    function getDetailAsalPasien($noregistrasi)
    {
        if (strtolower(substr($noregistrasi, 0, 2)) == 'ri') {
            $select = "trg.noDaftar AS nodaftar,DATE_FORMAT(trg.tglDaftar,'%d-%m-%Y %H:%i:%s') AS tgldaftar,trorn.noDaftarRawatInap AS noregistrasi,DATE_FORMAT(trorn.tglMasukRawatInap,'%d-%m-%Y %H:%i:%s') AS tglregistrasi,UPPER(trorn.rawatInap) AS unitasal,IF(trorn.kelas IS NULL,'',trorn.kelas) AS kelas,tcb.carabayar AS carabayar,tpj.penjamin AS penjamin";
            $this->db->select($select);
            $this->db->from('t_registrasirawatinap trorn');
            $this->db->join('t_registrasi trg', 'trorn.noDaftar = trg.noDaftar');
            $this->db->join('t_carabayar tcb', 'tcb.kdCaraBayar = trg.kdCaraBayar');
            $this->db->join('t_penjamin tpj', 'tpj.kdPenjamin = trg.kdPenjamin');
            $where = array('trorn.noDaftarRawatInap' => $noregistrasi);
            $this->db->where($where);
            $sql = $this->db->get();
        } else {
            $select = "trg.noDaftar AS nodaftar,DATE_FORMAT(trg.tglDaftar,'%d-%m-%Y %H:%i:%s') AS tgldaftar,trorj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT(trorj.tglMasukRawatJalan,'%d-%m-%Y %H:%i:%s') AS tglregistrasi,UPPER(tun.unit) AS unitasal,'' AS kelas,tcb.carabayar AS carabayar,tpj.penjamin AS penjamin";
            $this->db->select($select);
            $this->db->from('t_registrasirawatjalan trorj');
            $this->db->join('t_unit tun', 'trorj.kdUnit = tun.kdUnit');
            $this->db->join('t_registrasi trg', 'trorj.noDaftar = trg.noDaftar');
            $this->db->join('t_carabayar tcb', 'tcb.kdCaraBayar = trg.kdCaraBayar');
            $this->db->join('t_penjamin tpj', 'tpj.kdPenjamin = trg.kdPenjamin');
            $where = array('trorj.noRegistrasiRawatJalan' => $noregistrasi);
            $this->db->where($where);
            $sql = $this->db->get();
        }
        return $sql->row();
    }

    function getDetailPemesananOperasi($noregop)
    {
        $select = "tro.noRM AS norm,tro.noRegistrasiPasien AS noregistrasi,tjop.jenisOperasi AS jenisop,tjop.keterangan AS warnajenisop,tro.keterangan AS keterangan,tro.noRegistrasiOP AS noregistrasiop,DATE_FORMAT( tro.tglRegistrasiOP, '%d-%m-%Y %H:%i:%s') AS tglregistrasiop,tro.dokterPengirim AS dokterpengirim,DATE_FORMAT( tro.tglPermintaanOP, '%d-%m-%Y %H:%i:%s') AS tglpermintaanop,DATE_FORMAT(tro.tglKonfirmasiJadwalOP,'%d-%m-%Y %H:%i:%s') AS tgljadwalop,tro.instalasi AS instalasi";
        $this->db->select($select);
        $this->db->from('t_registrasiendoskopi tro');
        $this->db->join('t_jenisop tjop', 'tro.jenisOperasi = tjop.kdJenisOperasi');
        $where = array('tro.noRegistrasiOP' => $noregop);
        $this->db->where($where);
        $sql = $this->db->get();

        return $sql;
    }
    //TODO END PASIEN

    //TODO BEGIN DIAGNOSA
    function getDiagnosaPraPost($noregistrasiop)
    {
        $this->db->select('idDiagnosaOP AS iddiagnosa,diagnosaPra AS diagnosapra, diagnosaPost AS diagnosapost, dokterDiagnosaPra AS dokterdiagnosapra,dokterDiagnosaPost AS dokterdiagnosapost,sarsCovid AS sarscovid');
        return $this->db->get_where("t_diagnosapasienendoskopi", array('noRegistrasiOP' => $noregistrasiop));
    }

    function getDiagnosaPasien($norm)
    {
        return $this->db->query("SELECT tgldiagnosa,tgldaftar,kdicd10,icd10,deskripsi,jenisdiagnosa,dokter FROM vw_diagnosapasien WHERE norm=? ORDER BY jenisdiagnosa DESC, IF(tgldiagnosa IS NULL,tgldaftar,tgldiagnosa) ASC", array($norm));
    }

    function updateDiagnosaPrapost($diagnosapra, $diagnosapost, $tgldiagnosapost, $dokterdiagnosapra, $dokterdiagnosapost, $sarscovid, $iduser, $iddiagnosa)
    {
        $sql = $this->db->query("UPDATE t_diagnosapasienendoskopi SET diagnosaPra=?,diagnosaPost=?,tglDiagnosaPost=?,dokterDiagnosaPra=?,dokterDiagnosaPost=?,sarsCovid=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE idDiagnosaOP=?", array($diagnosapra, $diagnosapost, $tgldiagnosapost, $dokterdiagnosapra, $dokterdiagnosapost, $sarscovid, $iduser, $iddiagnosa));
        return $sql;
    }
    //TODO END DIAGNOSA

    //TODO BEGIN ANESTESI
    function getDokterAnestesi()
    {
        $this->db->where_in("kdPetugasMedis", array("0006", "0050", "0078"));
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getPerawatAnestesi()
    {
        $this->db->select("kdPetugasMedis AS kode,namapetugasMedis AS perawat");
        $this->db->where("LEFT(kdPetugasMedis,1)='P'");
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getJenisAnestesi()
    {
        return $this->db->get("t_jenisanestesi");
    }

    function getTindakanAnestesi($noregistrasiop)
    {
        $this->db->select("noTindakanAnestesi AS notindakananestesi,DATE_FORMAT(tglTindakan,'%d-%m-%Y %H:%i:%s') AS tgltindakananestesi");
        return $this->db->get_where("t_tindakananestesiendoskopi", array("noRegistrasiOP" => $noregistrasiop));
    }

    function getDetailTindakanAnestesi($notindakananestesi)
    {
        $this->db->select("idDetail AS iddetail,noTindakanAnestesi AS notindakananestesi,jenisAnestesi AS jenisanestesi,dokterAnestesi AS dokter,asistenAnestesi AS asisten,tindakanAnestesi AS tindakan");
        return $this->db->get_where("t_detailtindakananestesiendoskopi", array("noTindakanAnestesi" => $notindakananestesi, "statusHapus" => '0'));
    }

    function updateTindakanAnestesi($notindakananestesi, $tgltindakan, $iduser)
    {
        $sql = $this->db->query("UPDATE t_tindakananestesiendoskopi SET tglTindakan=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE noTindakanAnestesi=?", array($tgltindakan, $iduser, $notindakananestesi));
        return $sql;
    }

    function insertDetailTindakanAnestesi($noTindakanAnestesi, $jenisAnestesi, $dokterAnestesi, $asistenAnestesi, $tindakanAnestesi, $idUser)
    {
        $sql = $this->db->query("INSERT INTO t_detailtindakananestesiendoskopi (noTindakanAnestesi,jenisAnestesi,dokterAnestesi,asistenAnestesi,tindakanAnestesi,statusHapus,idUser,tglUser) VALUES (?,?,?,?,?,?,CONCAT(';',?),CONCAT(';',NOW()))", array($noTindakanAnestesi, $jenisAnestesi, $dokterAnestesi, $asistenAnestesi, $tindakanAnestesi, '0', $idUser));
        return $sql;
    }

    function updateDetailTindakanAnestesi($idDetail, $dokterAnestesi, $asistenAnestesi, $tindakanAnestesi, $idUser)
    {
        $sql = $this->db->query("UPDATE t_detailtindakananestesiendoskopi SET dokterAnestesi=?,asistenAnestesi=?,tindakanAnestesi=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE idDetail=?", array($dokterAnestesi, $asistenAnestesi, $tindakanAnestesi, $idUser, $idDetail));
        return $sql;
    }

    function deleteDetailTindakanAnestesi($idDetail, $idUser)
    {
        $sql = $this->db->query("UPDATE t_detailtindakananestesiendoskopi SET statusHapus=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE idDetail IN($idDetail)", array('1', $idUser));
        return $sql;
    }
    //TODO END ANESTESI

    //TODO BEGIN TINDAKAN OPERASI
    function getKelasTindakanOP()
    {
        return $this->db->query("SELECT kdkelas,kelas FROM vw_tindakanendoskopi GROUP BY kdkelas");
    }

    function getTindakanOP($kdkelas)
    {
        $this->db->where("kdkelas", $kdkelas);
        return $this->db->get("vw_tindakanendoskopi");
    }

    function getDokterOperator()
    {
        $this->db->where_in("kdPetugasMedis", array("0022", "0007", "0024", "0019"));
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getPerawatOP()
    {
        $this->db->where_in("kdPetugasMedis", array("P042", "P124"));
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getTindakanOperasi($noregistrasiop)
    {
        $this->db->select("noTindakanOP AS notindakanop,DATE_FORMAT(tglTindakan,'%d-%m-%Y %H:%i:%s') AS tgltindakanop,totalTarifTindakan AS totaltariftindakan,statusPembayaran AS statuspembayaran,DATE_FORMAT(tglPembayaran,'%d-%m-%Y %H:%i:%s') AS tglpembayaran");
        return $this->db->get_where("t_tindakanendoskopi", array("noRegistrasiOP" => $noregistrasiop));
    }

    function getDetailTindakanOperasi($notindakanop)
    {
        $select = "tdto.idDetailTindakan AS iddetail,tdto.noTindakanOP AS notindakanop,tdto.operator AS operator,tdto.asistenOperator AS asistenop,tdto.kdTindakan AS kdtindakan,tdto.tindakan AS tindakan,tdto.jmlTindakan AS jmltindakan,UPPER(tdto.jenisTindakan) AS jenistindakan,tk.kelas AS kelas,tdto.kdTarif AS kdtarif,tdto.tarif AS tarif,tdto.subTotal AS subtotal,tdto.joinOK AS joinok";
        $this->db->select($select);
        $this->db->from('t_detailtindakanendoskopi tdto');
        $this->db->join('t_tariftindakan2 tt', 'tdto.kdTarif = tt.kdTarif', 'left');
        $this->db->join('t_kelas tk', 'tk.kdKelas = tt.kdKelas', 'left');
        $where = array('tdto.noTindakanOP' => $notindakanop, 'tdto.statusHapus' => '0');
        $this->db->where($where);
        $this->db->order_by("tdto.idDetailTindakan", "ASC");
        return $this->db->get();
    }

    function updateTindakanOperasi($tgltindakan, $totaltarif, $iduser, $notindakanop)
    {
        $sql = $this->db->query("UPDATE t_tindakanendoskopi SET tglTindakan=?,totalTarifTindakan=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE noTindakanOP=?", array($tgltindakan, $totaltarif, $iduser, $notindakanop));
        return $sql;
    }

    function deleteDetailTindakanOperasi($idDetail, $idUser)
    {
        $sql = $this->db->query("UPDATE t_detailtindakanendoskopi SET statusHapus=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE idDetailTindakan IN($idDetail)", array('1', $idUser));
        return $sql;
    }

    function updateDetailTindakanOperasi($operator, $asistenop, $jmltindakan, $subtotal, $joinok, $iduser, $iddetail)
    {
        $sql = $this->db->query("UPDATE t_detailtindakanendoskopi SET operator=?,asistenOperator=?,jmlTindakan=?,subTotal=?,joinOK=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE idDetailTindakan=?", array($operator, $asistenop, $jmltindakan, $subtotal, $joinok, $iduser, $iddetail));
        return $sql;
    }

    function insertDetailTindakanOperasi($notindakanop, $operator, $asistenop, $kdtindakan, $tindakan, $jmltindakan, $kdtarif, $tarif, $subtotal, $jenistindakan, $joinok, $iduser)
    {
        $sql = $this->db->query("INSERT INTO t_detailtindakanendoskopi (noTindakanOP,operator,asistenOperator,kdTindakan,tindakan,jmlTindakan,kdTarif,tarif,subTotal,jenisTindakan,joinOK,statusHapus,idUser,tglUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,CONCAT(';',?),CONCAT(';',NOW()))", array($notindakanop, $operator, $asistenop, $kdtindakan, $tindakan, $jmltindakan, $kdtarif, $tarif, $subtotal, $jenistindakan, $joinok, 0, $iduser));
        return $sql;
    }
    //TODO END TINDAKAN OPERASI

    //TODO BEGIN KONFIRMASI
    function konfirmasiSelesaiTindakan($noregop, $iduser)
    {
        $sql = $this->db->query("UPDATE t_registrasiendoskopi SET statusOP=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE noRegistrasiOP=?", array('4', $iduser, $noregop));
        return $sql;
    }
    //TODO END KONFIRMASI


    function getPasienTindakan($noregistrasiop)
    {
        $this->db->where("noregistrasiop", $noregistrasiop);
        return $this->db->get("vw_detailpasienoperasi");
    }

    function getEditPasienTindakan($noregop)
    {
        $hsl = $this->db->query("SELECT * FROM vw_detailpermintaanoperasiselesaitindakan WHERE noregistrasiop = ?", array($noregop));
        return $hsl;
    }









    function getDokter()
    {
        return $this->db->query("SELECT * FROM vw_dokter ORDER BY namapetugasMedis ASC");
    }

    function getPerawat()
    {
        $this->db->select("kdPetugasMedis AS kode,namapetugasMedis AS perawat");
        $this->db->where("LEFT(kdPetugasMedis,1)='P'");
        $this->db->order_by("namapetugasMedis", "ASC");
        return $this->db->get("t_tenagamedis2");
    }









    function insertTindakanOperasi($data)
    {
        return $this->db->insert('t_tindakanop', $data);
    }


    function hapusDetailTindakanOperasi($iddetail, $iduser, $tgluser)
    {
        $this->db->set('statusHapus', '1');
        $this->db->set('idUser', $iduser);
        $this->db->set('tglUser', $tgluser);
        $this->db->where_in('idDetailTindakan', $iddetail);
        return $this->db->update('t_detailtindakanop');
    }




    function getNoTindakanOP($noregistrasiop)
    {
        $sql = $this->db->query("SELECT noRegistrasiOP AS noregop,noTindakanOP AS notinop,statusTindakan AS statustindakan,dokterOP AS dokterop,timOP AS timop,dokterAnestesi AS dokteranestesi,asistenAnestesi AS asistenanestesi,radiografer,perawatSirkuler AS perawatsirkuler,perawatInstrument AS perawatinstrument,jenisAnestesi AS jenisanestesi,statusPembayaran AS statusbayar FROM t_tindakanok WHERE noregistrasiop=?", array($noregistrasiop));
        return $sql;
    }

    function getDetailTindakanPasien($noregistrasiop, $notindakanop)
    {
        $sql = $this->db->query("SELECT * FROM vw_gettindakanpasienok WHERE noregistrasiop=? AND notindakanop=? AND statushapus=0 ORDER BY tindakan DESC", array($noregistrasiop, $notindakanop));
        return $sql;
    }
}
