<?php

class m_admin extends CI_Model{
    
    function __construct()
    {
        parent::__construct();

    }

    //Login
    function login_admin($where){
        return $this->db->get_where('admin', $where);
    }
    function login_guru($where){
        //return $this->db->get_where('guru', $where);
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.mapel=mapel.id_mapel');
        $this->db->where($where);
        return $this->db->get();
    }

    //Cek Password Default Guru
    function cek_passwd_guru($where){
        $this->db->select('guru.username, guru.password');
        return $this->db->get_where('guru', $where);
    }
    //Ganti Password Guru
    function update_passwd_guru($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Guru
    function list_guru(){
        //return $this->db->get('guru');
        $this->db->select('guru.*, mapel.*');
        $this->db->from('guru');
        $this->db->join('mapel', 'mapel.id_mapel=guru.mapel');
        $query = $this->db->get();
        return $query;
    }
    function insert_guru($table, $data){
        $this->db->insert($table, $data);
    }
    function update_guru($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_guru($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Mapel
    function list_mapel(){
        return $this->db->get('mapel');
    }
    function insert_mapel($table, $data){
        $this->db->insert($table, $data);
    }
    function update_mapel($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_mapel($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Siswa
    function list_siswa(){
        return $this->db->query('select siswa.*, kelas.kode_kelas from siswa join kelas on siswa.kelas=kelas.id_kelas');
    }
    function insert_siswa($table, $data){
        $this->db->insert($table, $data);
    }
    function update_siswa($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_siswa($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Kelas
    function list_kelas(){
        //return $this->db->get('kelas');
        $this->db->select('kelas.*, jurusan.*');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=kelas.jurusan');
        $this->db->order_by('kode_kelas');
        $query = $this->db->get();
        return $query;
    }
    function insert_kelas($table, $data){
        $this->db->insert($table, $data);
    }
    function update_kelas($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_kelas($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function pilih_kelas($where){
        $this->db->where($where);
        return $this->db->get('kelas');
    }
    //Jurusan
    function list_jurusan(){
        return $this->db->get('jurusan');
    }
    function insert_jurusan($table, $data){
        $this->db->insert($table, $data);
    }
    function update_jurusan($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_jurusan($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    // tampil hanya kelas
    function perkelas(){
        return $this->db->query('SELECT kelas FROM kelas GROUP BY kelas');
    }
    // tampil perkelas jurusan
    function perkelasjurusan($where){
        $this->db->select('id_kelas, kode_kelas');
        $this->db->from('kelas');
        $this->db->where($where);
        return $this->db->get();
    }

    //Nilai
    function nilai_kelas($where){
        $this->db->select('nilai.*, siswa.nis, siswa.nama, kelas.id_kelas, kelas.kelas, mapel.*');
        $this->db->from('nilai, siswa, kelas, mapel');
        $this->db->where($where);
        return $this->db->get();
    }
    //select nilai.*, siswa.nis, siswa.nama, kelas.id_kelas, kelas.kelas, mapel.* 
    //from nilai, siswa, kelas, mapel 
    //where kelas.kelas=12 and kelas.id_kelas=1 and siswa.kelas=kelas.id_kelas and nilai.id_siswa=siswa.id_siswa and nilai.id_mapel=mapel.id_mapel
    
    //Soal
    //Tampil Soal Admin
    function soal_admin(){
        return $this->db->get('soal');
    }
    //Tampil Soal Guru
    function soal_guru($where){
        return $this->db->get_where('soal', $where);
    }

}