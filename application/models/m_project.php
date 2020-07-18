<?php 
if(! defined('BASEPATH')) die('Tidak boleh akses langsung');

class m_project extends CI_Model

{
  function cek_login($table,$where)//fungsi model untuk melakukan login
  {      
      return $this->db->get_where($table,$where);
  }

  public function input_data($data)// fungsi untuk  measukkan database data ke database
  {
      $this->db->insert('tb_covid', $data);// perintah input data
  }  

  public function hapus_data($where, $table)//fungsi untuk menghapus data
  {
      $this->db->where($where);
      $this->db->delete($table);
  }

  function edit_data($where,$table)
  {
      return $this->db->get_where($table,$where);
  }

  public function update_data($where,$c,$table)
  {
      $this->db->where($where);
      $this->db->update($table,$c);
  }

    //fungsi untuk halaman awal dan halaman utama admin
  public function get_all_data()
  {
      //membuat query untuk mengambil data dari tabel tb_covid
      $query = $this->db->query('select * from tb_covid');
      $hasil = $query->result();
      $query->free_result();
      return $hasil;
  }

	public function insertimport($data)//fungsi untuk import excel
  {
      $this->db->insert_batch('tb_covid', $data);
      return $this->db->insert_id();
  }

  function fetch_data()//fungsi untuk export excel
  {
      $this->db->order_by("id", "ASC");
      $query = $this->db->get("tb_covid");
      return $query->result();
  }
  
  public function kecamatan()
  {
      $query = $this->db->query("select * from tb_covid");//select tabel dari database
      $hasil = $query->result();
      $query->free_result();
      return $hasil;
  }

  public function getkecamatan()
  {
      $this->db->select('kecamatan, pp, odp, pdp, positif');//select field dari tabel statistik
      $query = $this->db->get('tb_covid');//nama tabel 'covid'
      $hasil = $query->result();
      $query->free_result();
      return $hasil;
  }   
}