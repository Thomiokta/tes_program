<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       
        $start = intval($this->input->get('start'));       
        $status = $this->Status_model->get_limit_data();

       
        $data = array(
            'status_data' => $status,    
            'button' => 'Create',
            'start' => $start,
            'title' => 'Status List',
            'action' => site_url('status/create_action'),
	    'id_status' => set_value('id_status'),
	    'nama_status' => set_value('nama_status'),
	);      
       
        $this->template->load('template/body','status/status_list', $data);
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
            $cek = $this->Status_model->cek($value['status']);
            if (!$cek) {
            $simpan = array('nama_status' => $value['status'], );
            $this->Status_model->insert($simpan);
            }
            }
            redirect(site_url('Status'));
        }
    }

    public function read($id) 
    {
        $row = $this->Status_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_status' => $row->id_status,
		'nama_status' => $row->nama_status,
	     'title' => 'Status Read',);
            $this->template->load('template/body','status/status_read', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('status'));
        }
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
		'nama_status' => $this->input->post('nama_status',TRUE),
	    );

            $this->Status_model->insert($data);
            $this->session->set_flashdata('create', 'ready');
            redirect(site_url('status'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                 'title' => 'Status Update',
                'action' => site_url('status/update_action'),
		'id_status' => set_value('id_status', $row->id_status),
		'nama_status' => set_value('nama_status', $row->nama_status),
	    );
            $this->template->load('template/body','status/status_edit', $data);
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status', TRUE));
        } else {
            $data = array(
		'nama_status' => $this->input->post('nama_status',TRUE),
	    );

            $this->Status_model->update($this->input->post('id_status', TRUE), $data);
            $this->session->set_flashdata('update', 'ready');
            redirect(site_url('status'));
        }
    }
     function live_update()
    {
        $data = array(
            $this->input->post('table_column')  =>  $this->input->post('value')
        );

        $this->Status_model->update($this->input->post('id'),$data);
    }
    public function delete($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $this->Status_model->delete($id);
            $this->session->set_flashdata('delete', 'ready');
            redirect(site_url('status'));
        } else {
            $this->session->set_flashdata('notfound', 'ready');
            redirect(site_url('status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_status', 'nama status', 'trim|required');

	$this->form_validation->set_rules('id_status', 'id_status', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Status.php */
/* Location: ./application/controllers/Status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-24 11:22:34 */
/* http://harviacode.com */