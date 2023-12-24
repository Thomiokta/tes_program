<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       
        $start = intval($this->input->get('start'));       
        $produk = $this->Produk_model->get_limit_data();
        $data = array(
            'produk_data' => $produk,    
             
            'button' => 'Create',
            'start' => $start,
            'title' => 'Produk List',
            'action' => site_url('produk/create_action'),
	    'id_produk' => set_value('id_produk'),
	    'nama_produk' => set_value('nama_produk'),
	    'harga' => set_value('harga'),
	    'kategori_id' => set_value('kategori_id'),
	    'status_id' => set_value('status_id'),
        'get_kategori' => $this->Produk_model->get_kategori(),
        'get_status' => $this->Produk_model->get_status(),
	);      
       
        $this->template->load('template/body','produk/produk_list', $data);
    }
     public function calldata()
    {
        date_default_timezone_set('Asia/Singapore');
        $tgl_user = date('dmy');
        $user = 'tesprogrammer';
        $c = 'C';
        $jam_user = date('H');
        $tgl_pass = date('d-m-y');
        $pass = 'bisacoding-';
        $data = array(
            'username' => "$user$tgl_user$c$jam_user",
            'password' => md5("$pass$tgl_pass"), 
        );
        $httpVariable = http_build_query($data);
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $httpVariable);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data['produk'] = json_decode($response, True);
        if (curl_errno($ch)) {
            echo 'Error:'.curl_error($ch);
        }else{
            foreach ($data['produk']['data'] as $value) {
            $id_kategori = $this->Produk_model->get_id_kategori($value['kategori']);
            $id_status = $this->Produk_model->get_id_status($value['status']);
            $simpan = array(
                'id_produk' => $value['id_produk'],
                'nama_produk' => $value['nama_produk'], 
                'kategori_id' => $id_kategori->id_kategori,
                'status_id' => $id_status->id_status,
                'harga' => $value['harga'],
            );
            $this->Produk_model->insert($simpan);
            }
            redirect(site_url('Produk'));
        }
    }
    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_produk' => $row->id_produk,
		'nama_produk' => $row->nama_produk,
		'harga' => $row->harga,
		'kategori_id' => $row->kategori_id,
		'status_id' => $row->status_id,
	     'title' => 'Produk Read',);
            $this->template->load('template/body','produk/produk_read', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('produk'));
        }
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_produk = $this->input->post('id_produk',TRUE);
            $cek = $this->Produk_model->get_by_id($id_produk);
            if (!$cek) {
            $data = array(
        'id_produk' => $this->input->post('id_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kategori_id' => $this->input->post('kategori_id',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('create', 'ready');
            redirect(site_url('produk'));
        }else{redirect(site_url('produk'));}
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                 'title' => 'Produk Update',
                'action' => site_url('produk/update_action'),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'nama_produk' => set_value('nama_produk', $row->nama_produk),
		'harga' => set_value('harga', $row->harga),
		'kategori_id' => set_value('kategori_id', $row->kategori_id),
		'status_id' => set_value('status_id', $row->status_id),
        'get_kategori' => $this->Produk_model->get_kategori(),
        'get_status' => $this->Produk_model->get_status(),
	    );
            $this->template->load('template/body','produk/produk_edit', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {
            $data = array(
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kategori_id' => $this->input->post('kategori_id',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('update', 'ready');
            redirect(site_url('produk'));
        }
    }
     function live_update()
    {
        $data = array(
            $this->input->post('table_column')  =>  $this->input->post('value')
        );

        $this->Produk_model->update($this->input->post('id'),$data);
    }
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('delete', 'ready');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
	$this->form_validation->set_rules('kategori_id', 'kategori id', 'trim|required');
	$this->form_validation->set_rules('status_id', 'status id', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-24 11:22:38 */
/* http://harviacode.com */