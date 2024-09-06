<?php
class M_header extends CI_Model
{
    public function hitungBelumBaca()
    {
        $this->db->where("statusop='0'");
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }

    public function hitungPermintaanBelum()
    {
        $this->db->where("statusop='0'");
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }

    public function hitungPermintaanSudah()
    {
        $this->db->where("statusop='1'");
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }

    public function hitungPermintaanSelesaiTindakan()
    {
        $this->db->where("statusop='4'");
        return $this->db->get('vw_listoperasiendoskopi')->num_rows();
    }
}
