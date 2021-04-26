<?php
defined('BASEPATH') or exit('No direct script allowed');

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller
{
	/*----------------------------------------CONSTRUCTOR----------------------------------------*/
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}

	/*----------------------------------------GET Mahasiswa----------------------------------------*/
	function index_get()
	{
		$id = $this->get('id');

		if ($id == '') {
			$Mahasiswa = $this->db->get('mahasiswa')->result();
		} else {
			$this->db->where('id', $id);
			$Mahasiswa = $this->db->get('mahasiswa')->result();
		}

		$this->response($Mahasiswa, 200);
	}

	function index_post()
	{
		$data = array(
			'id'	=>	$this->post('id'),
			'Nama'	=>	$this->post('Nama'),
			'NPM'	=>	$this->post('NPM'),
			'Email'	=>	$this->post('Email'),
			'Alamat'	=>	$this->post('Alamat'),
			'Nomor'	=>	$this->post('Nomor'),
		);
		$insert = $this->db->insert('mahasiswa', $data);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put()
	{
		$id = $this->put('id');
		$data = array(
			'id'	=>	$this->put('id'),
			'Nama'	=>	$this->put('Nama'),
			'NPM'	=>	$this->put('NPM'),
			'Email'	=>	$this->put('Email'),
			'Alamat'	=>	$this->put('Alamat'),
			'Nomor'	=>	$this->put('Nomor'),
		);

		$this->db->where('id', $id);
		$update = $this->db->update('mahasiswa', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail'), 502);
		}
	}

	function index_delete()
	{
		$id = $this->delete('id');

		$this->db->where('id', $id);

		$delete = $this->db->delete('mahasiswa');

		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail'), 502);
		}
	}
}
