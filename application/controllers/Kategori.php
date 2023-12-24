<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       
        $start = intval($this->input->get('start'));       
        $kategori = $this->Kategori_model->get_limit_data();

       
        $data = array(
            'kategori_data' => $kategori,    
             
            'button' => 'Create',
            'start' => $start,
            'title' => 'Kategori List',
            'action' => site_url('kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_kategori' => set_value('nama_kategori'),
	);      
       
        $this->template->load('template/body','kategori/kategori_list', $data);
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
            $cek = $this->Kategori_model->cek($value['kategori']);
            if (!$cek) {
            $simpan = array('nama_kategori' => $value['kategori'], );
            $this->Kategori_model->insert($simpan);
            }
            }
            redirect(site_url('Kategori'));
        }
    }

    public function read($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'nama_kategori' => $row->nama_kategori,
	     'title' => 'Kategori Read',);
            $this->template->load('template/body','kategori/kategori_read', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('kategori'));
        }
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('create', 'ready');
            redirect(site_url('kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                 'title' => 'Kategori Update',
                'action' => site_url('kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	    );
            $this->template->load('template/body','kategori/kategori_edit', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('update', 'ready');
            redirect(site_url('kategori'));
        }
    }
     function live_update()
    {
        $data = array(
            $this->input->post('table_column')  =>  $this->input->post('value')
        );

        $this->Kategori_model->update($this->input->post('id'),$data);
    }
    public function delete($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('delete', 'ready');
            redirect(site_url('kategori'));
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-24 11:22:29 */
/* http://harviacode.com */