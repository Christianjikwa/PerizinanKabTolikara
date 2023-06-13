<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['users']  			  = $this->Mcrud->get_data('tbl_user');
			$data['perusahaan']  		= $this->Mcrud->get_data('tbl_perusahaan');
			$data['rencana_usaha']	= $this->Mcrud->get_data('tbl_rencana');
			$this->load->view('header', $data);
			$this->load->view('beranda', $data);
			$this->load->view('footer');
		}
	}


	public function login()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(isset($ceks)) {
			//$this->load->view('404_content');
			redirect('');
		}else{
			$this->load->view('web/header');
			$this->load->view('web/login');
			$this->load->view('web/footer');

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('web/login');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('web/login');
										 } else {

																$this->session->set_userdata('kamar@2017', "$cekun");

																redirect('web');
										 }
						 }
				}
		}
	}


	public function logout() {
     if ($this->session->has_userdata('kamar@2017')) {
         $this->session->sess_destroy();
         redirect('');
     }
     redirect('');
  }


	public function lupa_password()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('web/header');
			$this->load->view('web/lupa_password');
			$this->load->view('web/footer');
		}
	}

	function error_not_found(){
		$this->load->view('404_content');
	}




	public function profile()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);

					$this->load->view('header', $data);
					$this->load->view('profile', $data);
					$this->load->view('footer');

					if (isset($_POST['btnupdate'])) {
						$username 	= htmlentities(strip_tags($this->input->post('username')));
						$password 	= htmlentities(strip_tags($this->input->post('password')));

						$cek_data = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $username);
						if ($cek_data->num_rows() == 0) {
								$status = "update";
						}else{
								if ($username == $ceks) {
										$status = "update";
								}else{
										$status = "";
								}
						}

						if ($status == "update") {
								$data = array(
									'username'	=> $username,
									'password'	=> md5($password)
								);
								$this->Mcrud->update_data('tbl_user', array('username' => $ceks), $data);
								$this->session->has_userdata('kamar@2017');
								$this->session->set_userdata('kamar@2017', "$username");
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
								);
						}else{
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Username '.$username.' sudah ada.
									</div>'
								);
						}

						redirect('web/profile');
					}

		}
	}



	public function perusahaan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data('tbl_perusahaan');

					$this->load->view('header', $data);
					$this->load->view('perizinan/perusahaan', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 		= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 		= htmlentities(strip_tags($_POST['nm_persh']));
							$alamat_persh = htmlentities(strip_tags($_POST['alamat_persh']));
							$npwp_persh 	= htmlentities(strip_tags($_POST['npwp_persh']));
							$nm_pjwb 			= htmlentities(strip_tags($_POST['nm_pjwb']));

							$cek_kd = $this->Mcrud->get_data_by_pk('tbl_perusahaan', 'kd_persh', $kd_persh);
							if ($cek_kd->num_rows() == 0) {
								$status = "simpan";
							}else{
								$status = "";
							}

							if ($status == "simpan") {
									$data = array(
										'kd_persh'			=> $kd_persh,
										'nm_persh'			=> $nm_persh,
										'alamat_persh'	=> $alamat_persh,
										'npwp_persh'		=> $npwp_persh,
										'nm_pjwb'				=> $nm_pjwb
										);
									$this->Mcrud->save_data('tbl_perusahaan', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Perusahaan berhasil ditambahkan.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> Kode Perusahaan '.strtoupper($kd_persh).' sudah ada.
										 </div>'
									 );
							}

							redirect('web/perusahaan');
					}


		}
	}

	public function perusahaan_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data_by_pk('tbl_perusahaan', 'kd_persh', $id);

			if ($data['v_perusahaan']->num_rows() == 0){
				redirect('web/perusahaan');
			}else{
				$data['v_perusahaan'] = $data['v_perusahaan']->row();
			}

					$this->load->view('header', $data);
					$this->load->view('perizinan/perusahaan_edit', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$nm_persh 		= htmlentities(strip_tags($_POST['nm_persh']));
							$alamat_persh = htmlentities(strip_tags($_POST['alamat_persh']));
							$npwp_persh 	= htmlentities(strip_tags($_POST['npwp_persh']));
							$nm_pjwb 			= htmlentities(strip_tags($_POST['nm_pjwb']));

								$data = array(
									'nm_persh'			=> $nm_persh,
									'alamat_persh'	=> $alamat_persh,
									'npwp_persh'		=> $npwp_persh,
									'nm_pjwb'				=> $nm_pjwb
								);
								$this->Mcrud->update_data('tbl_perusahaan', array('kd_persh' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Perusahaan berhasil diubah.
									 </div>'
								 );
								 redirect('web/perusahaan');

					}

		}
	}

	public function perusahaan_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_perusahaan', 'kd_persh', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Perusahaan berhasil dihapus.
						 </div>'
					 );
					 redirect('web/perusahaan');

		}
	}

	public function rencana_usaha()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_rencana']	    = $this->Mcrud->get_data('tbl_rencana');

					$this->load->view('header', $data);
					$this->load->view('perizinan/rencana_usaha', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$uraian 						= htmlentities(strip_tags($_POST['uraian']));
							$skala 							= htmlentities(strip_tags($_POST['skala']));
							$alamat_usaha 			= htmlentities(strip_tags($_POST['alamat_usaha']));
							$telp_usaha 				= htmlentities(strip_tags($_POST['telp_usaha']));
							$no_tgl_izin_ling 	= htmlentities(strip_tags($_POST['no_tgl_izin_ling']));
							$no_tgl_izin_skkl 	= htmlentities(strip_tags($_POST['no_tgl_izin_skkl']));
							$no_tgl_izin_ukl 		= htmlentities(strip_tags($_POST['no_tgl_izin_ukl']));
							$upy_kelola_ling 		= htmlentities(strip_tags($_POST['upy_kelola_ling']));
							$upy_pantau_ling 		= htmlentities(strip_tags($_POST['upy_pantau_ling']));
							$periode_laporan 		= htmlentities(strip_tags($_POST['periode_laporan']));

									$data = array(
										'kd_persh'					=> $kd_persh,
										'nm_persh'					=> $nm_persh,
										'nm_usaha'					=> $nm_usaha,
										'uraian'						=> $uraian,
										'skala'							=> $skala,
										'alamat_usaha'			=> $alamat_usaha,
										'telp_usaha'				=> $telp_usaha,
										'no_tgl_izin_ling'	=> $no_tgl_izin_ling,
										'no_tgl_izin_skkl'	=> $no_tgl_izin_skkl,
										'no_tgl_izin_ukl'		=> $no_tgl_izin_ukl,
										'upy_kelola_ling'		=> $upy_kelola_ling,
										'upy_pantau_ling'		=> $upy_pantau_ling,
										'periode_laporan'		=> $periode_laporan
										);
									$this->Mcrud->save_data('tbl_rencana', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Rencana Usaha berhasil ditambahkan.
										 </div>'
									 );

							redirect('web/rencana_usaha');
					}


		}
	}


	public function rencana_usaha_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan'] = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_rencana']    = $this->Mcrud->get_data_by_pk('tbl_rencana', 'kd_rencana', $id);

			if ($data['v_rencana']->num_rows() == 0){
				redirect('web/rencana_usaha');
			}else{
				$data['v_rencana'] = $data['v_rencana']->row();
			}

					$this->load->view('header', $data);
					$this->load->view('perizinan/rencana_usaha_edit', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha 				  = htmlentities(strip_tags($_POST['nm_usaha']));
							$uraian 						= htmlentities(strip_tags($_POST['uraian']));
							$skala 							= htmlentities(strip_tags($_POST['skala']));
							$alamat_usaha 			= htmlentities(strip_tags($_POST['alamat_usaha']));
							$telp_usaha 				= htmlentities(strip_tags($_POST['telp_usaha']));
							$no_tgl_izin_ling 	= htmlentities(strip_tags($_POST['no_tgl_izin_ling']));
							$no_tgl_izin_skkl 	= htmlentities(strip_tags($_POST['no_tgl_izin_skkl']));
							$no_tgl_izin_ukl 		= htmlentities(strip_tags($_POST['no_tgl_izin_ukl']));
							$upy_kelola_ling 		= htmlentities(strip_tags($_POST['upy_kelola_ling']));
							$upy_pantau_ling 		= htmlentities(strip_tags($_POST['upy_pantau_ling']));
							$periode_laporan 		= htmlentities(strip_tags($_POST['periode_laporan']));

									$data = array(
										'kd_persh'					=> $kd_persh,
										'nm_persh'					=> $nm_persh,
										'nm_usaha'				  => $nm_usaha,
										'uraian'						=> $uraian,
										'skala'							=> $skala,
										'alamat_usaha'			=> $alamat_usaha,
										'telp_usaha'				=> $telp_usaha,
										'no_tgl_izin_ling'	=> $no_tgl_izin_ling,
										'no_tgl_izin_skkl'	=> $no_tgl_izin_skkl,
										'no_tgl_izin_ukl'		=> $no_tgl_izin_ukl,
										'upy_kelola_ling'		=> $upy_kelola_ling,
										'upy_pantau_ling'		=> $upy_pantau_ling,
										'periode_laporan'		=> $periode_laporan
										);
								$this->Mcrud->update_data('tbl_rencana', array('kd_rencana' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Rencana Usaha berhasil diubah.
									 </div>'
								 );
								 redirect('web/rencana_usaha');
					}

		}
	}

	public function rencana_usaha_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_rencana', 'kd_rencana', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Rencana Usaha berhasil dihapus.
						 </div>'
					 );
					 redirect('web/rencana_usaha');

		}
	}

	public function pengelolaan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pengelolaan']	= $this->Mcrud->get_data('tbl_pengelolaan');

					$this->load->view('header', $data);
					$this->load->view('pengawasan/pengelolaan', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$th_pengawasan		 	= htmlentities(strip_tags($_POST['th_pengawasan']));
							$waktu_pengawasan		= htmlentities(strip_tags($_POST['waktu_pengawasan']));
							$semester		 				= htmlentities(strip_tags($_POST['semester']));
							$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));
							$hasil		 					= htmlentities(strip_tags($_POST['hasil']));
							$patuh		 					= htmlentities(strip_tags($_POST['patuh']));

									$data = array(
										'kd_persh'					=> $kd_persh,
										'nm_persh'					=> $nm_persh,
										'nm_usaha'				  => $nm_usaha,
										'th_pengawasan'			=> $th_pengawasan,
										'waktu_pengawasan'	=> $waktu_pengawasan,
										'semester'					=> $semester,
										'kesimpulan'				=> $kesimpulan,
										'hasil'							=> $hasil,
										'patuh'							=> $patuh
										);
									$this->Mcrud->save_data('tbl_pengelolaan', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Pengelolaan berhasil ditambahkan.
										 </div>'
									 );

							redirect('web/pengelolaan');
					}

		}
	}


	public function pengelolaan_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			   = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']  = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pengelolaan'] = $this->Mcrud->get_data_by_pk('tbl_pengelolaan', 'kd_pengelolaan', $id);

			if ($data['v_pengelolaan']->num_rows() == 0){
				redirect('web/pengelolaan');
			}else{
				$data['v_pengelolaan'] = $data['v_pengelolaan']->row();
			}

					$this->load->view('header', $data);
					$this->load->view('pengawasan/pengelolaan_edit', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$th_pengawasan		 	= htmlentities(strip_tags($_POST['th_pengawasan']));
							$waktu_pengawasan		= htmlentities(strip_tags($_POST['waktu_pengawasan']));
							$semester		 				= htmlentities(strip_tags($_POST['semester']));
							$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));
							$hasil		 					= htmlentities(strip_tags($_POST['hasil']));
							$patuh		 					= htmlentities(strip_tags($_POST['patuh']));

									$data = array(
										'kd_persh'					=> $kd_persh,
										'nm_persh'					=> $nm_persh,
										'nm_usaha'				  => $nm_usaha,
										'th_pengawasan'			=> $th_pengawasan,
										'waktu_pengawasan'	=> $waktu_pengawasan,
										'semester'					=> $semester,
										'kesimpulan'				=> $kesimpulan,
										'hasil'							=> $hasil,
										'patuh'							=> $patuh
										);
								$this->Mcrud->update_data('tbl_pengelolaan', array('kd_pengelolaan' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Pengelolaan berhasil diubah.
									 </div>'
								 );
								 redirect('web/pengelolaan');
					}

		}
	}

	public function pengelolaan_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_pengelolaan', 'kd_pengelolaan', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Pengelolaan berhasil dihapus.
						 </div>'
					 );
					 redirect('web/pengelolaan');

		}
	}


	public function pemantauan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pemantauan']		= $this->Mcrud->get_data('tbl_pemantauan');

					$this->load->view('header', $data);
					$this->load->view('pengawasan/pemantauan', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$hsl_pantau		 			= $_POST['hsl_pantau'];
							$isi_pantauan				= htmlentities(strip_tags($_POST['isi_pantauan']));
							$patuh		 					= htmlentities(strip_tags($_POST['patuh']));
							$mutu		 						= htmlentities(strip_tags($_POST['mutu']));
							$waktu_pengawasan		= htmlentities(strip_tags($_POST['waktu_pengawasan']));
							$semester		 				= htmlentities(strip_tags($_POST['semester']));
							$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));

									$data = array(
										'kd_persh'					=> $kd_persh,
										'nm_persh'					=> $nm_persh,
										'nm_usaha'				  => $nm_usaha,
										'hsl_pantau'				=> $hsl_pantau,
										'isi_pantauan'			=> $isi_pantauan,
										'patuh'							=> $patuh,
										'mutu'							=> $mutu,
										'waktu_pengawasan'	=> $waktu_pengawasan,
										'semester'					=> $semester,
										'kesimpulan'				=> $kesimpulan
										);
									$this->Mcrud->save_data('tbl_pemantauan', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Pemantauan berhasil ditambahkan.
										 </div>'
									 );

							redirect('web/pemantauan');
					}

		}
	}


	public function pemantauan_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			   = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']  = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pemantauan']  = $this->Mcrud->get_data_by_pk('tbl_pemantauan', 'kd_pemantauan', $id);

			if ($data['v_pemantauan']->num_rows() == 0){
				redirect('web/pemantauan');
			}else{
				$data['v_pemantauan'] = $data['v_pemantauan']->row();
			}

					$this->load->view('header', $data);
					$this->load->view('pengawasan/pemantauan_edit', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
						$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
						$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
						$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
						$hsl_pantau		 			= $_POST['hsl_pantau'];
						$isi_pantauan				= htmlentities(strip_tags($_POST['isi_pantauan']));
						$patuh		 					= htmlentities(strip_tags($_POST['patuh']));
						$mutu		 						= htmlentities(strip_tags($_POST['mutu']));
						$waktu_pengawasan		= htmlentities(strip_tags($_POST['waktu_pengawasan']));
						$semester		 				= htmlentities(strip_tags($_POST['semester']));
						$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));

								$data = array(
									'kd_persh'					=> $kd_persh,
									'nm_persh'					=> $nm_persh,
									'nm_usaha'				  => $nm_usaha,
									'hsl_pantau'				=> $hsl_pantau,
									'isi_pantauan'			=> $isi_pantauan,
									'patuh'							=> $patuh,
									'mutu'							=> $mutu,
									'waktu_pengawasan'	=> $waktu_pengawasan,
									'semester'					=> $semester,
									'kesimpulan'				=> $kesimpulan
									);
								$this->Mcrud->update_data('tbl_pemantauan', array('kd_pemantauan' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Pemantauan berhasil diubah.
									 </div>'
								 );
								 redirect('web/pemantauan');
					}

		}
	}

	public function pemantauan_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_pemantauan', 'kd_pemantauan', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Pemantauan berhasil dihapus.
						 </div>'
					 );
					 redirect('web/pemantauan');

		}
	}

	public function pembinaan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']   = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pembinaan']		= $this->Mcrud->get_data('tbl_pembinaan');

					$this->load->view('header', $data);
					$this->load->view('penegakan_hukum/pembinaan', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$tgl_pembinaan 			= htmlentities(strip_tags($_POST['tgl_pembinaan']));
							$jns_pembinaan			= htmlentities(strip_tags($_POST['jns_pembinaan']));
							$pembinaan		 			= htmlentities(strip_tags($_POST['pembinaan']));
							$tindakan_pembinaan	= htmlentities(strip_tags($_POST['tindakan_pembinaan']));
							$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));

							$file_size = 11000; //10 MB
							$this->upload->initialize(array(
								"upload_path"   => "./files/",
								"allowed_types" => "jpg|jpeg|png|gif|pdf",
								"max_size" => "$file_size"
							));

							if ($this->upload->do_upload('image_pembinaan'))
							{
									$gbr = $this->upload->data();
									$filename = $gbr['file_name'];
									$filename = "files/".$filename;
									$filename = preg_replace('/ /', '_', $filename);

									$data = array(
										'kd_persh'					 => $kd_persh,
										'nm_persh'					 => $nm_persh,
										'nm_usaha'				   => $nm_usaha,
										'tgl_pembinaan'			 => $tgl_pembinaan,
										'jns_pembinaan'			 => $jns_pembinaan,
										'image_pembinaan'		 => $filename,
										'pembinaan'					 => $pembinaan,
										'tindakan_pembinaan' => $tindakan_pembinaan,
										'kesimpulan'				 => $kesimpulan
										);
									$this->Mcrud->save_data('tbl_pembinaan', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Pembinaan berhasil ditambahkan.
										 </div>'
									 );
							}else{
									$error = $this->upload->display_errors();
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('web/pembinaan');
					}

		}
	}


	public function pembinaan_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			   = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_perusahaan']  = $this->Mcrud->get_data('tbl_perusahaan');
			$data['v_pembinaan']   = $this->Mcrud->get_data_by_pk('tbl_pembinaan', 'kd_pembinaan', $id);

			if ($data['v_pembinaan']->num_rows() == 0){
				redirect('web/pembinaan');
			}else{
				$data['v_pembinaan'] = $data['v_pembinaan']->row();
			}

					$this->load->view('header', $data);
					$this->load->view('penegakan_hukum/pembinaan_edit', $data);
					$this->load->view('footer');

					if (isset($_POST['btnsimpan'])) {
							$kd_persh 					= htmlentities(strip_tags($_POST['kd_persh']));
							$nm_persh 					= htmlentities(strip_tags($_POST['nm_persh']));
							$nm_usaha		 				= htmlentities(strip_tags($_POST['nm_usaha']));
							$tgl_pembinaan 			= htmlentities(strip_tags($_POST['tgl_pembinaan']));
							$jns_pembinaan			= htmlentities(strip_tags($_POST['jns_pembinaan']));
							$pembinaan		 			= htmlentities(strip_tags($_POST['pembinaan']));
							$tindakan_pembinaan	= htmlentities(strip_tags($_POST['tindakan_pembinaan']));
							$kesimpulan		 			= htmlentities(strip_tags($_POST['kesimpulan']));

						$cek_pembinaan = $this->Mcrud->get_data_by_pk('tbl_pembinaan', 'kd_pembinaan', $id)->row();

						$file_size = 11000; //10 MB
						$this->upload->initialize(array(
							"upload_path"   => "./files/",
							"allowed_types" => "jpg|jpeg|png|gif|pdf",
							"max_size" => "$file_size"
						));

						// kita cek dulu dengan kode error 4
            if ($_FILES['image_pembinaan']['error'] <> 4) {
								if ( ! $this->upload->do_upload('image_pembinaan'))
								{
											$status = "";
								}
								 else
								{
											unlink($cek_pembinaan->image_pembinaan);
											$gbr = $this->upload->data();
											$filename = $gbr['file_name'];
											$filename = "files/".$filename;
											$filename = preg_replace('/ /', '_', $filename);

											$status = "yes";
								}
						}else{
								$filename = $cek_pembinaan->image_pembinaan;
								$status = "yes";
						}

						if ($status == "yes") {
								$data = array(
									'kd_persh'					 => $kd_persh,
									'nm_persh'					 => $nm_persh,
									'nm_usaha'				   => $nm_usaha,
									'tgl_pembinaan'			 => $tgl_pembinaan,
									'jns_pembinaan'			 => $jns_pembinaan,
									'image_pembinaan'		 => $filename,
									'pembinaan'					 => $pembinaan,
									'tindakan_pembinaan' => $tindakan_pembinaan,
									'kesimpulan'				 => $kesimpulan
									);
								$this->Mcrud->update_data('tbl_pembinaan', array('kd_pembinaan' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Pembinaan berhasil ditambahkan.
									 </div>'
								 );
						}else{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Gagal!</strong> '.$error.'.
									 </div>'
								 );
						}
								 redirect('web/pembinaan');
					}

		}
	}

	public function pembinaan_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
					$cek_pembinaan = $this->Mcrud->get_data_by_pk('tbl_pembinaan', 'kd_pembinaan', $id)->row();
					unlink("$cek_pembinaan->image_pembinaan");

					$this->Mcrud->delete_data_by_pk('tbl_pembinaan', 'kd_pembinaan', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Pembinaan berhasil dihapus.
						 </div>'
					 );
					 redirect('web/pembinaan');

		}
	}

}
