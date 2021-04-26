<?php
class Mahasiswa extends CI_Controller
{
	var $api = "";

	function __construct()
	{
		parent::__construct();
		$this->api = "http://api.unsilshop.site";
		$this->load->library('session');
		$this->load->library('curl');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function index()
	{
		$data['dataMahasiswa'] = simplexml_load_string($this->curl->simple_get($this->api));
		$this->load->view('/mahasiswa/list', $data);
	}

	function create()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id'	=>	$this->input->post('id'),
				'Nama'	=>	$this->input->post('Nama'),
				'NPM'	=>	$this->input->post('NPM'),
				'Email'	=>	$this->input->post('Email'),
				'Alamat'	=>	$this->input->post('Alamat'),
				'Nomor'	=>	$this->input->post('Nomor')
			);

			$insert = $this->curl->simple_post($this->api . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));

			if ($insert) {
				$this->session->set_flashdata('hasil', 'Insert data berhasil');
			} else {
				$this->session->set_flashdata('hasil', 'Insert data gagal');
			}

			redirect('mahasiswa');
		} else {
			$this->load->view('/mahasiswa/create');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id'	=>	$this->input->post('id'),
				'Nama'	=>	$this->input->post('Nama'),
				'NPM'	=>	$this->input->post('NPM'),
				'Email'	=>	$this->input->post('Email'),
				'Alamat'	=>	$this->input->post('Alamat'),
				'Nomor'	=>	$this->input->post('Nomor'),
			);

			$update = $this->curl->simple_put($this->api . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));

			if ($update) {
				$this->session->set_flashdata('hasil', 'Update data berhasil');
			} else {
				$this->session->set_flashdata('hasil', 'Update data gagal');
			}

			redirect('mahasiswa');
		} else {
			$param = array('id' => $this->uri->segment(3));
			$data['dataMahasiswa'] = simplexml_load_string($this->curl->simple_get($this->api . '/mahasiswa',  $param));

			$this->load->view('/mahasiswa/edit', $data);
		}
	}

	function delete($id)
	{
		if (empty($id)) {
			redirect('mahasiswa');
		} else {
			$delete = $this->curl->simple_delete($this->api, array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));

			if ($delete) {
				$this->session->set_flashdata('hasil', 'Data berhasil dihapus');
			} else {
				$this->session->set_flashdata('hasil', 'Data gagal dihapus');
			}

			redirect('mahasiswa');
		}
	}
}
