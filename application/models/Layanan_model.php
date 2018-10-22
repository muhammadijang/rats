<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model{
    private $_table = "layanan";

    public $id_layanan;
    public $nama_layanan;

    public function rules(){
        return [
            ['field' => 'id_layanan',
            'label' => 'ID Layanan',
            'rules' => 'required'],

            ['field'=> 'nama_layanan',
            'label' => 'Nama Layanan',
            'rules' => 'required']
        ];
    }

    //Fungsi untuk menampilkan seluruh data yang ada pada table layanan
    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->get_where($this->_table, ["id_layanan => $id"])->row();
    }
    // end function

    // Fungsi untuk menyimpan data
    public function save(){
        $post   = $this->input->post();
        $this->id_layanan   = $post["id_layanan"];
        $this->nama_layanan   = $post["nama_layanan"];
        $this->db->insert($this->_table, $this);
    }
    // end fuction save()

    // Fungsi untuk update data
    public function update(){
        $post = $this->input->post();
        $this->id_layanan = $post["id"];
        $this->nama_layanan = $post["nama_layanan"];
        $this->db->update($this->_table, $this, array('id_layanan' => $post['id']));
    }
    // end function update()

    // Fungsi untuk menghapus data
    public function delete($id){
        return $this->db->delete($this->_table, array("id_layanan" => $id));
    }
    // end function delete()
}

?>