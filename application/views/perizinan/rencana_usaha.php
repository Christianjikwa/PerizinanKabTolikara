<?php
$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row(); ?>

<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">
            <?php
            if ($ceks->level == "perizinan") {?>
                Tambah
            <?php
            } ?> Rencana Usaha</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
          <?php
          echo $this->session->flashdata('msg');
          ?>
          <?php
          if ($ceks->level == "perizinan") {?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Kode Perusahaan</label>
                  <div class="col-lg-3">
                    <select class="form-control" name="kd_persh" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Kode Perusahaan</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_perusahaan->result() as $baris) {

                          echo '<option value="' . $baris->kd_persh . '">' . "$baris->kd_persh [$baris->nm_persh]" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->kd_persh . "'] = {
                                        nm_persh:'" . addslashes($baris->nm_persh) . "'
                                      };\n";
                      } ?>
                    </select>

                    <script type="text/javascript">
                    <?php echo $jsArray; ?>
                    function changeValue(id){
                      document.getElementById('nm_persh').value = dtKamar[id].nm_persh;
                    };
                    </script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_persh" id="nm_persh" class="form-control" value="" required maxlength="35" placeholder="Nama Perusahaan" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_usaha" class="form-control" value="" required maxlength="35" placeholder="Nama Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Uraian</label>
                  <div class="col-lg-10">
                    <input type="text" name="uraian" class="form-control" value="" required maxlength="35" placeholder="Uraian">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Skala</label>
                  <div class="col-lg-10">
                    <input type="text" name="skala" class="form-control" value="" required maxlength="35" placeholder="Skala">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Alamat Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="alamat_usaha" class="form-control" value="" required maxlength="35" placeholder="Alamat Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Telp. Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="telp_usaha" class="form-control" value="" required maxlength="15" placeholder="Telp. Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_ling" class="form-control" value="" required maxlength="20" placeholder="No Tgl Izin Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin SKKL</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_skkl" class="form-control" value="" required maxlength="20" placeholder="No Tgl Izin SKKL">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin UKL</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_ukl" class="form-control" value="" required maxlength="20" placeholder="No Tgl Izin UKL">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Upaya Kelola Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="upy_kelola_ling" class="form-control" value="" required maxlength="50" placeholder="Upaya Kelola Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Upaya Pantau Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="upy_pantau_ling" class="form-control" value="" required maxlength="50" placeholder="Upaya Pantau Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Periode Laporan</label>
                  <div class="col-lg-10">
                    <input type="text" name="periode_laporan" class="form-control" value="" required maxlength="35" placeholder="Periode Laporan">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

        <hr>
        <?php
        } ?>


        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <th width="10">No</th>
            <th>Kode Perusahaan</th>
            <th>Nama Perusahaan</th>
            <th>Nama Usaha</th>
            <th>Uraian</th>
            <th>Skala</th>
            <th>Alamat Usaha</th>
            <th>Telp Usaha</th>
            <th>No Tgl Izin Ling</th>
            <th>No Tgl Izin SKKL</th>
            <th>No Tgl Izin UKL</th>
            <th>Upaya Kelola Lingkungan</th>
            <th>Upaya Pantau Lingkungan</th>
            <th>Periode Laporan</th>
            <?php
            if ($ceks->level == "perizinan") {?>
            <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_rencana->result() as $baris) {
            ?>
              <tr>
                <td><?php echo $no.'.'; ?></td>
                <td><?php echo $baris->kd_persh; ?></td>
                <td><?php echo $baris->nm_persh; ?></td>
                <td><?php echo $baris->nm_usaha; ?></td>
                <td><?php echo $baris->uraian; ?></td>
                <td><?php echo $baris->skala; ?></td>
                <td><?php echo $baris->alamat_usaha; ?></td>
                <td><?php echo $baris->telp_usaha; ?></td>
                <td><?php echo $baris->no_tgl_izin_ling; ?></td>
                <td><?php echo $baris->no_tgl_izin_skkl; ?></td>
                <td><?php echo $baris->no_tgl_izin_ukl; ?></td>
                <td><?php echo $baris->upy_kelola_ling; ?></td>
                <td><?php echo $baris->upy_pantau_ling; ?></td>
                <td><?php echo $baris->periode_laporan; ?></td>
                <?php
                if ($ceks->level == "perizinan") {?>
                <td>
                  <a href="web/rencana_usaha_edit/<?php echo $baris->kd_rencana; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/rencana_usaha_hapus/<?php echo $baris->kd_rencana; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                </td>
                <?php
                } ?>
              </tr>
            <?php
            $no++;
            } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
