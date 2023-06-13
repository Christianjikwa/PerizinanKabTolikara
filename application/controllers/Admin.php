<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_level_petugas();
			$data['jml_parkir']     = $this->Mcrud->get_parkir_by_tgl();
			$data['jml_kendaraan']  = $this->Mcrud->get_kendaraan();
			$data['users']  		    = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/beranda', $data);
					$this->load->view('admin/footer');
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_level_petugas();
			$data['users']  		    = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$password 	= htmlentities(strip_tags($this->input->post('password')));

									$data = array(
										'password'	=> md5($password)
									);
									$this->Mcrud->update_user(array('username' => $ceks), $data);

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Berhasil disimpan.
										</div>'
									);
									redirect('admin/profile');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}

	public function petugas()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['petugas'] 		    = $this->Mcrud->get_petugas();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/petugas', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$username = htmlentities(strip_tags($_POST['username']));
							$nama 		= htmlentities(strip_tags($_POST['nama']));
							$tgl_lahir	= date('Y-m-d', strtotime(htmlentities(strip_tags($_POST['tgl']))));
							$jk 			= htmlentities(strip_tags($_POST['jk']));
							$no_hp 		= htmlentities(strip_tags($_POST['no_hp']));
							$alamat 	= htmlentities(strip_tags($_POST['alamat']));

							$query  = $this->Mcrud->get_users_by_un($username);
	 						 $cek    = $query->result();
	 						 $cekun  = $cek[0]->username;
	 						 $jumlah = $query->num_rows();

 						  if ($jumlah != 0) {
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Username "'.$username.'"</strong> Sudah ada.
										 </div>'
									 );
									 redirect('admin/petugas');
	 						} else {
								date_default_timezone_set('Asia/Jakarta');
								$tgl = date('Y-m-d H:m:s');

								$data = array(
									'username'			=> $username,
									'password'			=> md5($username),
									'level'					=> 'petugas',
									'tgl_daftar'		=> $tgl
									);
								$this->Mcrud->save_user($data);

								$data2 = array(
									'username'			=> $username,
									'nama_petugas'	=> $nama,
									'tgl_lahir'			=> $tgl_lahir,
									'jk'						=> $jk,
									'no_hp'					=> $no_hp,
									'alamat'				=> $alamat
									);
								$this->Mcrud->save_petugas($data2);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Petugas berhasil ditambahkan.
									 </div>'
								 );
								 redirect('admin/petugas');
							}
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function petugas_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "admin") {
					$this->Mcrud->delete_petugas_by_un($id);
					$this->Mcrud->delete_user_by_un($id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Petugas berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/petugas');
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function kendaraan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/kendaraan', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kendaraan = htmlentities(strip_tags($_POST['nama_kendaraan']));

								$cek_kendaraan = $this->db->query("SELECT * FROM tbl_kendaraan WHERE nama_kendaraan='$nama_kendaraan'")->num_rows();

								if ($cek_kendaraan != 0) {

										$this->session->set_flashdata('msg',
											 '
											 <div class="alert alert-warning alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times; &nbsp;</span>
													</button>
													<strong>Gagal!</strong> Jenis Kendaraan '.ucwords($nama_kendaraan).' sudah ada.
											 </div>'
										 );
										 redirect('admin/kendaraan');

								}else{

										$data = array(
											'nama_kendaraan'			=> $nama_kendaraan
											);
										$this->Mcrud->save_kendaraan($data);

										$this->session->set_flashdata('msg',
											 '
											 <div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times; &nbsp;</span>
													</button>
													<strong>Sukses!</strong> Kendaraan berhasil ditambahkan.
											 </div>'
										 );
										 redirect('admin/kendaraan');

								}

					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function kendaraan_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan_by_id($id);

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/kendaraan_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kendaraan = htmlentities(strip_tags($_POST['nama_kendaraan']));

								$data = array(
									'nama_kendaraan'			=> $nama_kendaraan
									);
								$this->Mcrud->update_kendaraan(array('id_kendaraan' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Kendaraan berhasil ditambahkan.
									 </div>'
								 );
								 redirect('admin/kendaraan');

					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function kendaraan_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "admin") {
					$this->Mcrud->delete_kendaraan_by_id($id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Kendaraan berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/kendaraan');
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function harga()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();
			$data['harga']	    		= $this->Mcrud->get_harga();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/harga', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$id_kendaraan = htmlentities(strip_tags($_POST['id_kendaraan']));
							$harga 				= htmlentities(strip_tags($_POST['harga']));
							$max_jam 			= htmlentities(strip_tags($_POST['max_jam']));
							$max_menit 		= htmlentities(strip_tags($_POST['max_menit']));
							$max_detik 		= htmlentities(strip_tags($_POST['max_detik']));
							$denda 				= htmlentities(strip_tags($_POST['denda']));

							$max_waktu = "$max_jam:$max_menit:$max_detik";

							$cek_kendaraan = $this->db->query("SELECT * FROM tbl_harga INNER JOIN tbl_kendaraan ON tbl_kendaraan.id_kendaraan=tbl_harga.id_kendaraan WHERE tbl_harga.id_kendaraan='$id_kendaraan'");

							if ($cek_kendaraan->num_rows() != 0) {

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> Jenis Kendaraan '.ucwords($cek_kendaraan->row()->nama_kendaraan).' sudah ada.
										 </div>'
									 );
									 redirect('admin/harga');

							}else{

									$data = array(
										'id_kendaraan'	=> $id_kendaraan,
										'harga'					=> $harga,
										'max_waktu'			=> $max_waktu,
										'denda'					=> $denda
										);
									$this->Mcrud->save_harga($data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Harga Kendaraan berhasil ditambahkan.
										 </div>'
									 );
									 redirect('admin/harga');

						 }
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function harga_edit($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();
			$data['cek_harga'] 	    = $this->Mcrud->get_harga_by_id($id);
			$data['harga']	    		= $this->Mcrud->get_harga();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/harga_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$id_kendaraan = htmlentities(strip_tags($_POST['id_kendaraan']));
							$harga 				= htmlentities(strip_tags($_POST['harga']));
							$max_jam 			= htmlentities(strip_tags($_POST['max_jam']));
							$max_menit 		= htmlentities(strip_tags($_POST['max_menit']));
							$max_detik 		= htmlentities(strip_tags($_POST['max_detik']));
							$denda 				= htmlentities(strip_tags($_POST['denda']));

							$max_waktu = "$max_jam:$max_menit:$max_detik";

								$data = array(
									'id_kendaraan'	=> $id_kendaraan,
									'harga'					=> $harga,
									'max_waktu'			=> $max_waktu,
									'denda'					=> $denda
									);
								$this->Mcrud->update_harga(array('id_harga' => $id), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Harga Kendaraan berhasil diubah.
									 </div>'
								 );
								 redirect('admin/harga');

					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function harga_hapus($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "admin") {
					$this->Mcrud->delete_harga_by_id($id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Harga Kendaraan berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/harga');
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function printer($id='')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  		    = $this->Mcrud->get_users();
			$data['printer']	      = $this->Mcrud->get_printer();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/printer', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_printer = htmlentities(strip_tags($_POST['nama_printer']));

								$data = array(
									'nama_printer'			=> $nama_printer,
									'status'						=> "0"
									);
								$this->Mcrud->save_printer($data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Nama Printer <b>"'.$nama_printer.'"</b> berhasil ditambahkan.
									 </div>'
								 );
								 redirect('admin/printer');

					}

					if ($id != '') {
							$data = array(
								'status'	=> '0'
								);
							$this->Mcrud->update_printer(array('id_printer'), $data);

							$data2 = array(
								'status'	=> '1'
								);
							$this->Mcrud->update_printer(array('id_printer' => $id), $data2);

							$this->session->set_flashdata('msg',
								 '
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> Printer berhasil diaktifkan.
								 </div>'
							 );
							 redirect('admin/printer');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function printer_edit($id='')
	{
	  $ceks = $this->session->userdata('kamar@2017');
	  if(!isset($ceks)) {
	    redirect('web/login');
	  }else{
	    $data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
	    $data['users']  		    = $this->Mcrud->get_users();
	    $data['cek_printer'] 	    = $this->Mcrud->get_printer_by_id($id);
	    $data['printer']	    		= $this->Mcrud->get_printer();

	    if ($data['user']->row()->level == "admin") {
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/master/printer_edit', $data);
	        $this->load->view('admin/footer');

	        if (isset($_POST['btnsimpan'])) {
							$nama_printer = htmlentities(strip_tags($_POST['nama_printer']));

								$data = array(
									'nama_printer'			=> $nama_printer
									);
	              $this->Mcrud->update_printer(array('id_printer' => $id), $data);

	              $this->session->set_flashdata('msg',
	                 '
	                 <div class="alert alert-success alert-dismissible" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                      <span aria-hidden="true">&times; &nbsp;</span>
	                    </button>
	                    <strong>Sukses!</strong> Printer berhasil diubah.
	                 </div>'
	               );
	               redirect('admin/printer');

	        }
	    }else{
	        $this->load->view('404_content');
	    }

	  }
	}


	public function printer_hapus($id='')
	{
	  $ceks = $this->session->userdata('kamar@2017');
	  if(!isset($ceks)) {
	    redirect('web/login');
	  }else{
	    $data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
	    $data['users']  		    = $this->Mcrud->get_users();

	    if ($data['user']->row()->level == "admin") {
	        $this->Mcrud->delete_printer_by_id($id);

	        $this->session->set_flashdata('msg',
	           '
	           <div class="alert alert-success alert-dismissible" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times; &nbsp;</span>
	              </button>
	              <strong>Sukses!</strong> Printer berhasil dihapus.
	           </div>'
	         );
	         redirect('admin/printer');
	    }else{
	        $this->load->view('404_content');
	    }

	  }
	}
}
