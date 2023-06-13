<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['petugas']  = $this->Mcrud->get_petugas();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('404_content');
			}else{
					$this->load->view('petugas/header', $data);
					$this->load->view('petugas/beranda', $data);
					$this->load->view('petugas/footer');
			}

		}
	}

	public function profile()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['petugas']  		  = $this->Mcrud->get_petugas();

			if ($data['user']->row()->level == "petugas") {
					$this->load->view('petugas/header', $data);
					$this->load->view('petugas/profile', $data);
					$this->load->view('petugas/footer');

					if (isset($_POST['btnupdate'])) {
						$password 	= htmlentities(strip_tags($this->input->post('password')));
						$nama 			= htmlentities(strip_tags($this->input->post('nama')));
						$tgl_lahir 	= date('Y-m-d', strtotime(htmlentities(strip_tags($_POST['tgl']))));
						$jk 				= htmlentities(strip_tags($this->input->post('jk')));
						$no_hp 			= htmlentities(strip_tags($this->input->post('no_hp')));
						$alamat 		= htmlentities(strip_tags($this->input->post('alamat')));

							if ($password != "") {
										$data = array(
											'password'	=> md5($password)
										);
										$this->Mcrud->update_user(array('username' => $ceks), $data);
							}

							$data2 = array(
								'nama_petugas'	=> $nama,
								'tgl_lahir'			=> $tgl_lahir,
								'jk'						=> $jk,
								'no_hp'					=> $no_hp,
								'alamat'				=> $alamat
								);
							$this->Mcrud->update_petugas(array('username' => $ceks), $data2);

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times; &nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Profile berhasil diubah.
										</div>'
									);
									redirect('petugas/profile');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function p_masuk()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_petugas_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['petugas']  		  = $this->Mcrud->get_petugas();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();
			$data['printer']	      = $this->Mcrud->get_printer_by_status();
			$data['query']			    = $this->Mcrud->get_masuk_by_max();

			if ($data['user']->row()->level == "petugas") {
					$this->load->view('petugas/header', $data);
					$this->load->view('petugas/p_masuk', $data);
					$this->load->view('petugas/footer');

					if (isset($_POST['btnsimpan'])) {
						$kendaraan 	= htmlentities(strip_tags($this->input->post('kendaraan')));
						$plat 			= htmlentities(strip_tags($this->input->post('plat')));
						$id_petugas = $data['user']->row()->id_petugas;

						date_default_timezone_set('Asia/Jakarta');
						$tgl = date('Y-m-d');
						$jam = date('H:i:s');

							header("Content-Type: image/bmp");

							$config['cacheable']	= true; //boolean, the default is true
							$config['cachedir']		= ''; //string, the default is application/cache/
							$config['errorlog']		= ''; //string, the default is application/logs/
							$config['quality']		= true; //boolean, the default is true
							$config['size']				= ''; //interger, the default is 1024
							$config['black']			= array(224,255,255); // array, default is array(255,255,255)
							$config['white']			= array(70,130,180); // array, default is array(0,0,0)
							$this->ciqrcode->initialize($config);


							$jml_query  = $this->Mcrud->get_masuk();
							$query	    = $data['query'];
								$id_masuk = $query->id_masuk;

								if ($id_masuk == "") {
										$id_masuk = 1;
								}else{
										$id_masuk = $id_masuk+1;
								}

							error_reporting(0);
							/* tulis dan buka koneksi ke printer */

							$printer = $data['printer']->nama_printer;

							if (!$handle = printer_open($printer)) {
								$this->session->set_flashdata('msg',
								'
								<div class="alert alert-warning alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times; &nbsp;</span>
									 </button>
									 Printer <strong>"'.$printer.'"</strong> tidak terdeteksi, Silahkan periksa kembali.
								</div>'
								);
							}else{
								$nama_qr = "$tgl $plat $id_masuk";
								$nama_qr = preg_replace('/ /', '_', $nama_qr);
								//$link_qr = "qrcode/png/$nama_qr.png";
								$link_qr_png = "qrcode/png/$nama_qr.png";
								$link_qr_bmp = "qrcode/bmp/$nama_qr.bmp";

								$token = md5("Parkir ID : $id_masuk");

								$params['data'] 		= "$token";
								$params['level'] 		= 'H';
								$params['size'] 		= 10;
								$params['savename'] = FCPATH."$link_qr_png";
								$this->ciqrcode->generate($params);

								$this->load->view('php-image-magician/php_image_magician.php');
	                $magicianObj = new imageLib("$link_qr_png");
	                $magicianObj -> saveImage("$link_qr_bmp");

								$data2 = array(
									'plat'					=> $plat,
									'id_kendaraan'	=> $kendaraan,
									'tgl'						=> $tgl,
									'jam_masuk'			=> $jam,
									'qrcode'				=> "$link_qr_bmp",
									'token'					=> $token,
									'id_petugas'		=> $id_petugas
									);
								$this->Mcrud->save_masuk($data2);

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times; &nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> No. Plat <b>"'.$plat.'"</b> Berhasil disimpan.
										</div>'
									);
							}
							redirect('petugas/p_masuk/'.$id_masuk.'');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function p_keluar()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_petugas_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['petugas']  		  = $this->Mcrud->get_petugas();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();
			$data['printer']	      = $this->Mcrud->get_printer_by_status();
			$data['query']			    = $this->Mcrud->get_masuk_by_max();

			if ($data['user']->row()->level == "petugas") {
					$this->load->view('petugas/header', $data);
					$this->load->view('petugas/p_keluar', $data);
					$this->load->view('petugas/footer');


			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function keluar_add()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('');
		}else{
			$qrcode  	 	 	 = htmlentities($this->input->post('plat'));

			$query  = $this->Mcrud->get_masuk_by_token($qrcode);
			$id_masuk  = $query->row()->id_masuk;
			$id_kendaraan		   = $query->row()->id_kendaraan;
			$plat		   = $query->row()->plat;
			$jam_masuk = $query->row()->jam_masuk;

			date_default_timezone_set('Asia/Jakarta');
			$jam_keluar = date('H:i:s');
			$jam_start 	 = substr("$jam_masuk", 0, 2);
			$menit_start = substr("$jam_masuk", 3, 2);
			$jam_end = substr("$jam_keluar", 0, 2);
			$menit_end = substr("$jam_keluar", 3, 2);

			$hasil = (intVal($jam_end) - intVal($jam_start)) * 60 + (intVal($menit_end) - intVal($menit_start));
			$hasil = $hasil / 60;
			$jam = number_format($hasil,2);

			$cek_parkir = $this->db->query("SELECT * FROM tbl_harga where id_kendaraan ='$id_kendaraan'")->row();
			$harga 			= $cek_parkir->harga;
			$max_parkir = $cek_parkir->max_waktu;
			$denda 			= $cek_parkir->denda;

			$jam = $jam."00";
			if ($jam > $max_parkir) {
					$harga = $harga + $denda;
			}

				if ($query->num_rows() == 0) {
						$pesan = '
						<div class="alert alert-danger alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> ID QRCODE Parkir tidak ditemukan.
						</div>';
						echo json_encode(array("statusErr" => TRUE, "pesan" => $pesan));
				}else{
					$query2  = $this->Mcrud->get_keluar_by_id_masuk($id_masuk)->num_rows();
					if ($query2 == 0) {
						$data = array(
							'id_masuk'	 => $id_masuk,
							'jam_keluar' => $jam_keluar
						);
						$insert = $this->Mcrud->save_keluar($data);

						$pesan = '
						<!--<div class="alert alert-success alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times; &nbsp;</span>
							 </button>
							 <strong>Sukses!</strong>.
						</div>-->
						<div class="col-md-6" style="background-color:orange;color:#222;">
              <b style="font-size:50px;">
                '.$plat.'
              </b>
            </div>
            <div class="col-md-6" style="background-color:#222;color:orange">
              <b style="font-size:50px;">
                Rp. '.$harga.'
              </b>
            </div>
						';
						echo json_encode(array("statusAdd" => TRUE, "pesan" => $pesan));
					}else{
						$pesan = '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> ID QRCODE Parkir sudah pernah discan.
						</div>';
						echo json_encode(array("statusAda" => TRUE, "pesan" => $pesan));
					}
				}
		}
	}

	public function lap_kendaraan()
	{
		$ceks = $this->session->userdata('parkir@2017');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			    = $this->Mcrud->get_petugas_by_un($ceks);
			$data['level_petugas']  = $this->Mcrud->get_petugas_by_un($ceks);
			$data['petugas']  		  = $this->Mcrud->get_petugas();
			$data['kendaraan']	    = $this->Mcrud->get_kendaraan();
			$data['printer']	      = $this->Mcrud->get_printer_by_status();
			$data['query']			    = $this->Mcrud->get_masuk_by_max();

			if ($data['user']->row()->level == "petugas") {
					$this->load->view('petugas/header', $data);
					$this->load->view('petugas/lap_kendaraan', $data);
					$this->load->view('petugas/footer');
			}else{
					$this->load->view('404_content');
			}

		}

	}

	public function cetak_kendaraan()
	{
			$ceks = $this->session->userdata('parkir@2017');
			if(!isset($ceks)) {
				redirect('web/login');
			}else{
				$data['user']  			    = $this->Mcrud->get_petugas_by_un($ceks);
				$data['level_petugas']  = $this->Mcrud->get_petugas_by_un($ceks);

				if ($data['user']->row()->level == "petugas") {
						if (isset($_POST['cetak'])) {
								$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
								$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));
								$data['sql'] = $this->db->query("SELECT * FROM tbl_kendaraan
																				         INNER JOIN tbl_masuk ON tbl_masuk.id_kendaraan=tbl_kendaraan.id_kendaraan
																				         INNER JOIN tbl_keluar ON tbl_keluar.id_masuk=tbl_masuk.id_masuk
																				         WHERE (tbl_masuk.tgl BETWEEN '$tgl1' AND '$tgl2')");

								$this->load->view('petugas/cetak_kendaraan', $data);

						}else{
								redirect('petugas/lap_kendaraan');
						}
				}else{
						$this->load->view('404_content');
				}

			}
	}

}
