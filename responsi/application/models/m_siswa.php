<?php
class m_siswa extends CI_Model
{
    public function get_keyword($keyword)
    {
        $this->db->order_by('siswa.nik', 'ASC');
        return $this->db->from('siswa')
            ->join('kelas', 'kelas.kd_kelas=siswa.kd_kelas')
            ->like('nik', $keyword)
            ->or_like('nama', $keyword)
            ->or_like('gender', $keyword)
            ->or_like('kelas', $keyword)
            ->get()
            ->result();
    }
    function tampilSiswa($kd_kelas)
    {
        if ($kd_kelas == true) {
            $this->db->order_by('siswa.nik', 'ASC');
            return $this->db->from('siswa')
                ->join('nilai', 'nilai.nik=siswa.nik')
                ->join('pelajaran', 'pelajaran.kd_pelajaran=nilai.kd_pelajaran')
                ->join('semester', 'semester.kd_semester=nilai.kd_semester')
                ->where('siswa.kd_kelas', $kd_kelas)
                ->get()
                ->result();
        } else {
            $this->db->order_by('siswa.nik', 'ASC');
            return $this->db->from('siswa')
                ->join('kelas', 'kelas.kd_kelas=siswa.kd_kelas')
                ->get()
                ->result();
        }
    }
    function tampilSiswaPelajaran($kategori)
    {
        $this->db->order_by('siswa.nik', 'ASC');
        return $this->db->from('siswa')
            ->join('kelas', 'kelas.kd_kelas=siswa.kd_kelas', 'AND')
            ->join('nilai', 'nilai.nik=siswa.nik')
            ->join('pelajaran', 'pelajaran.kd_pelajaran=nilai.kd_pelajaran')
            ->join('semester', 'semester.kd_semester=nilai.kd_semester')
            ->where('nilai.kd_pelajaran', $kategori['kd_pelajaran'])
            ->where('nilai.kd_semester', $kategori['kd_semester'])
            ->where('kelas.kelas', $kategori['kelas'])
            ->get()
            ->result();
    }
    function pelajaranDipilih($nik)
    {

        $this->db->order_by('siswa.nik', 'ASC');
        return $this->db->from('siswa')
            ->join('ambil', 'ambil.nik=siswa.nik')
            ->join('pelajaran', 'pelajaran.kd_pelajaran=ambil.kd_pelajaran')
            ->where('siswa.nik', $nik['nik'])
            ->get()
            ->result();
    }
    public function hapus_pelajaran($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function nilai($nik)
    {
        $this->db->order_by('siswa.nik', 'ASC');
        return $this->db->from('siswa')
            ->join('nilai', 'nilai.nik=siswa.nik')
            ->join('pelajaran', 'pelajaran.kd_pelajaran=nilai.kd_pelajaran')
            ->join('semester', 'semester.kd_semester=nilai.kd_semester')
            ->where('siswa.nik', $nik['nik'])
            ->get()
            ->result();
    }
    public function ubahnik($nik)
    {
        return $nik['nik'];
    }
    public function tampil_update_nilai($kategori)
    {
        $this->db->order_by('siswa.nik', 'ASC');
        return $this->db->from('siswa')
            ->join('kelas', 'kelas.kd_kelas=siswa.kd_kelas', 'AND')
            ->join('nilai', 'nilai.nik=siswa.nik')
            ->join('pelajaran', 'pelajaran.kd_pelajaran=nilai.kd_pelajaran')
            ->join('semester', 'semester.kd_semester=nilai.kd_semester')
            ->where('nilai.id_nilai', $kategori['id_nilai'])
            ->get()
            ->result();
    }

    public function update_nilai($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function ubahkelas($kelas)
    {
        return $this->db->from('kelas')
            ->where('kelas', $kelas)
            ->get()
            ->result();
    }
}
