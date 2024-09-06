<?php
class M_permintaansudah extends CI_Model
{

    public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $where = "statusop='1' AND (norm LIKE '%$search%' OR pasien LIKE '%$search%' OR instalasi LIKE '%$search%' OR unit LIKE '%$search%' OR tglpermintaanop2 LIKE '%$search%' OR tglkonfirmasiop2 LIKE '%$search%' OR jenisop LIKE '%$search%' OR noregop LIKE '%$search%')";
        $this->db->where($where);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('vw_listoperasiendoskopi')->result_array();
    }

    public function countAll()
    {
        $this->db->where("statusop='1'");
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }

    public function countFilter($search)
    {
        $where = "statusop='1' AND (norm LIKE '%$search%' OR pasien LIKE '%$search%' OR instalasi LIKE '%$search%' OR unit LIKE '%$search%' OR tglpermintaanop2 LIKE '%$search%' OR tglkonfirmasiop2 LIKE '%$search%' OR jenisop LIKE '%$search%' OR noregop LIKE '%$search%')";
        $this->db->where($where);
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }

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
        return $sql;
    }

    function getDetailPemesananOperasi($noregop)
    {
        $select = "tro.noRM AS norm,tro.noRegistrasiPasien AS noregistrasi,tjop.jenisOperasi AS jenisop,tjop.keterangan AS warnajenisop,tro.keterangan AS keterangan,tro.noRegistrasiOP AS noregistrasiop,DATE_FORMAT( tro.tglRegistrasiOP, '%d-%m-%Y %H:%i:%s') AS tglregistrasiop,tro.dokterPengirim AS dokterpengirim,DATE_FORMAT( tro.tglPermintaanOP, '%d-%m-%Y %H:%i:%s') AS tglpermintaanop,DATE_FORMAT(tro.tglKonfirmasiJadwalOP,'%d-%m-%Y %H:%i:%s') AS tgljadwalop";
        $this->db->select($select);
        $this->db->from('t_registrasiendoskopi tro');
        $this->db->join('t_jenisop tjop', 'tro.jenisOperasi = tjop.kdJenisOperasi');
        $where = array('tro.noRegistrasiOP' => $noregop);
        $this->db->where($where);
        $sql = $this->db->get();

        return $sql;
    }

    function getDetailTindakanPasien($noregistrasiop)
    {
        $select = "tdto.tindakan AS tindakan";
        $this->db->select($select);
        $this->db->from('t_tindakanendoskopi tto');
        $this->db->join('t_detailtindakanendoskopi tdto', 'tto.noTindakanOP = tdto.noTindakanOP AND tdto.jenisTindakan = "PERMINTAAN"', 'left');
        $where = array('tto.noRegistrasiOP' => $noregistrasiop);
        $this->db->where($where);
        $sql = $this->db->get();

        return $sql;
    }

    function getDiagnosaPraPost($noregistrasiop)
    {
        $this->db->select('idDiagnosaOP AS iddiagnosa,diagnosaPra AS diagnosapra, diagnosaPost AS diagnosapost, dokterDiagnosaPra AS dokterdiagnosapra,dokterDiagnosaPost AS dokterdiagnosapost,sarsCovid AS sarscovid,idUser AS iduser,tglUser AS tgluser');
        return $this->db->get_where("t_diagnosapasienendoskopi", array('noRegistrasiOP' => $noregistrasiop));
    }

    function getDiagnosaPasien($norm)
    {
        return $this->db->query("SELECT tgldiagnosa,tgldaftar,kdicd10,icd10,deskripsi,jenisdiagnosa,dokter FROM vw_diagnosapasien WHERE norm=? ORDER BY jenisdiagnosa DESC, IF(tgldiagnosa IS NULL,tgldaftar,tgldiagnosa) ASC", array($norm));
    }

    function updateTanggalKonfirmasiOP($noregop, $tglkonfirmasi, $statusOP, $idUser)
    {
        $sql = $this->db->query("UPDATE t_registrasiendoskopi SET tglKonfirmasiJadwalOP=?,statusOP=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',now()) WHERE noRegistrasiOP=?", array($tglkonfirmasi, $statusOP, $idUser, $noregop));
        return $sql;
    }

    function batalRegistrasi($noregop, $statusOP, $idUser)
    {
        $sql = $this->db->query("UPDATE t_registrasiendoskopi SET statusOP=?,tglKonfirmasiJadwalOP=NOW(),idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',NOW()) WHERE noRegistrasiOP=?", array($statusOP, $idUser, $noregop));
        return $sql;
    }
}
