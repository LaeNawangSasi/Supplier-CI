<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    private $_table = "karyawan";

    public $Karyawan_id;
    public $Karyawan_nama;
    public $Karyawan_alamat;
    public $Karyawan_telepon;

    public function rules()
    {
        return [
            ['field' => 'Karyawan_nama',
            'label' => 'Karyawan_Nama',
            'rules' => 'required'],

            ['field' => 'Karyawan_alamat',
            'label' => 'Karyawan_Alamat',
            'rules' => 'required'],
            
            ['field' => 'Karyawan_telepon',
            'label' => 'Karyawan_telepon',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["Karyawan_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->Karyawan_id = $post["id"];
        $this->Karyawan_nama = $post["Karyawan_nama"];
        $this->Karyawan_alamat= $post["Karyawan_alamat"];
        $this->Karyawan_telepon = $post["Karyawan_telepon"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Karyawan_id = $post["id"];
        $this->Karyawan_nama = $post["Karyawan_nama"];
        $this->Karyawan_alamat= $post["Karyawan_alamat"];
        $this->Karyawan_telepon = $post["Karyawan_telepon"];
        $this->db->update($this->_table, $this, array('karyawan_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("karyawan_id" => $id));
    }
}
