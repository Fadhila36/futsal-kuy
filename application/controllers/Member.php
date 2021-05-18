<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataMember_model');
		$this->load->model('DataLapangan_model');
		$this->load->model('DataJadwal_model');
		$this->load->model('DataPenyewaan_model');
		$this->load->model('DataPembayaran_model');
		if ($this->session->userdata('status') == NULL) {
			redirect('Login');
		}
	}

	public function index()
	{
		// $this->load->view('admin/dashboard');
		$this->data = '';
		$this->load->view('user/header');
		$this->load->view('user/index');
		$this->load->view('user/footer');
	}

	public function lapangan()
	{
		$data['lapangan'] = $this->DataLapangan_model->select('lapangan');
		$this->load->view('user/header');
		$this->load->view('user/lapangan', $data);
		$this->load->view('user/footer');
	}

	public function jadwal($id)
	{
		$data['jadwal'] = $this->DataJadwal_model->select2($id);
		$data['lapangan'] = $this->DataLapangan_model->select2($id);
		//print_r($data['jadwal']);die();
		$this->load->view('user/header');
		$this->load->view('user/jadwal', $data);
		$this->load->view('user/footer');
	}

	public function about()
	{
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = "-6.3234447,107.2992193";
		$config['zoom'] = 15;
		$config['map_height'] = "400px";
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = "-6.3234447,107.2992193";
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('user/header');
		$this->load->view('user/about', $data);
		$this->load->view('user/footer');
	}

	function pemesanan()
	{
		$tes = $this->DataPenyewaan_model->cariMember($this->session->userdata('id_user'));
		//print_r($tes[0]->id_member);die();
		$data['penyewaan'] = $this->DataPenyewaan_model->select2($tes[0]->id_member);
		//$data['pembayaran'] = $this->DataPembayaran_model->select();
		$this->load->view('user/header');
		$this->load->view('user/pemesanan', $data);
		$this->load->view('user/footer');
	}

	function profile()
	{
		$tes = $this->DataMember_model->cariId($this->session->userdata('id_user'));
		//print_r($tes[0]->id_member);die();
		$data['member'] = $this->DataMember_model->select2($tes[0]->id_member);
		$this->load->view('user/header');
		$this->load->view('user/profile', $data);
		$this->load->view('user/footer');
	}

	function profile_act()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$user = $this->input->post('username');
		$pass_baru = $this->input->post('pass_baru');

		$this->form_validation->set_rules('nama', 'Nama Member', 'required');
		$this->form_validation->set_rules('no_hp', 'No. Handphone Member', 'required');
		$this->form_validation->set_rules('email', 'Email Member', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');

		$data = array(
			'nama_member' => $nama,
			'no_hp' => $hp,
			'email' => $email
		);
		$data2 = array('username' => $user, 'password' => md5($pass_baru));

		$result = $this->DataMember_model->editUser($data, $id);
		$result = $this->DataMember_model->editUser2($data2, $id);

		if ($result > 0) {
			$this->session->set_flashdata('success', 'Edit Member successfully');
		} else {
			$this->session->set_flashdata('error', 'Member creation failed');
		}

		redirect('login/logout');
	}

	public function pesan()
	{
		if ($this->session->userdata('status') == NULL) {
			$alert = $this->session->set_flashdata('alert', 'Anda belum Login');
			//echo 'tes';die();
			redirect(base_url());
		} else {
			$data1 = $this->DataJadwal_model->lihatIDJadwal();
			$data2 = $this->DataPenyewaan_model->lihatIDPenyewaan();
			$data3 = $this->DataPembayaran_model->lihatIDPembayaran();
			$mencaridMember = $this->DataMember_model->cariId($this->session->userdata('id_user'));

			$idMember = $mencaridMember[0]->id_member;
			$idjawal = 'JD' . $data1[0]->jumlah;
			$idsewa = 'BO' . $data2[0]->jumlah;
			$idbayar = 'IV' . $data3[0]->jumlah;
			$jam_mulai = $this->input->post('time');
			$jam_selesai = $this->input->post('time2');
			$id_lap = $this->input->post('id_lap');
			$id_member = $this->input->post('id_member');
			$lama = $jam_selesai - $jam_mulai;

			$jam_mulai2 = $jam_mulai . ':00:00';
			$jam_selesai2 = $jam_selesai . ':00:00';
			//$jam_selesai = $lama*60*60;
			//print_r($jam_mulai2);die();
			$tanggal = $this->input->post('date');
			$tarif = $this->input->post('tarif');
			$total = $tarif * $lama;

			$userInfo = array(
				'id_jadwal' => $idjawal,
				'id_lap' => $id_lap,
				'jam_mulai' => $jam_mulai2,
				'jam_selesai' => $jam_selesai2,
				'durasi' => $lama,
				'tgl_main' => $tanggal,
				'id_sewa' => $idsewa
			);
			$dataInfo = array(
				'id_sewa' => $idsewa,
				'id_lap' => $id_lap,
				'id_member' => $idMember,
				'tgl_pesan' => date('Y-m-d'),
				'tgl_sewa' => $tanggal,
				'jam_mulai' => $jam_mulai2,
				'status_sewa' => 'Booking'
			);
			$dataInfo2 = array(
				'id_bayar' => $idbayar,
				'id_sewa' => $idsewa,
				'totalbayar' => $total,
				'status_bayar' => 'Menunggu Pembayaran'
			);
			//print_r($userInfo);die();
			$result = $this->DataJadwal_model->addNewUser($userInfo);
			$result = $this->DataPenyewaan_model->addNewUser($dataInfo);
			$result = $this->DataPembayaran_model->addNewUser($dataInfo2);

			redirect('member/pemesanan');
		}
	}

	function batalpesan($id)
	{
		$result = $this->DataJadwal_model->deleteJadwal2($id);
		$result = $this->DataPenyewaan_model->deleteSewa($id);
		$result = $this->DataPembayaran_model->deleteBayar2($id);
		redirect('member/lapangan');
	}

	function bukti()
	{
		$config['upload_path'] = './assets/bukti/';
		$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png';
		$config['max_size'] = '4096'; //kb
		$config['max_width'] = '10024';
		$config['max_height'] = '7680';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload()) {
			//file gaggal  upload
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			//file berhasil -> lnjut insert
			//eksekusi query insert
			$gambar = $this->upload->data();
			$id = $this->input->post('id');
			$data = array(
				'tgl_bayar' => date('Y-m-d'),
				'status_bayar' => 'Menunggu Konfirmasi',
				'bukti' => $gambar['file_name']
			);

			$result = $this->DataPembayaran_model->editBayar($data, $id);
			redirect('Member/pemesanan');
		}
	}

	function cetakpdf($id)
	{
		$this->load->library('Pdf');

		$data['penyewaan'] = $this->DataPenyewaan_model->getSewa($id);

		$this->load->view('user/cetak_sewa', $data);

		$this->pdf->setPaper('A4', 'landscape'); //tipe ukuran dan format kertas potrait atau landscape
		$html = $this->output->get_output();

		//Convert to PDF
		$this->pdf->load_html($html);
		$this->pdf->render();
		$this->pdf->stream("cetak_sewa.pdf", array('Attachment' => 0));
		// nama file pdf yang di hasilkan
	}

	function history()
	{
		$tes = $this->DataPenyewaan_model->cariMember($this->session->userdata('id_user'));
		//print_r($tes[0]->id_member);die();
		$data['penyewaan'] = $this->DataPenyewaan_model->getSewa2($tes[0]->id_member);
		$this->load->view('user/header');
		$this->load->view('user/history', $data);
		$this->load->view('user/footer');
	}
}
