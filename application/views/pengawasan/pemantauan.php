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
            if ($ceks->level == "hasil_pengawasan") {?>
                Tambah
            <?php
            } ?> Pemantauan</h5>
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
          if ($ceks->level == "hasil_pengawasan") {?>
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
                  <label class="control-label col-lg-2">Hasil Pantau</label>
                  <div class="col-lg-10">
                    <textarea name="hsl_pantau" rows="8" cols="80" class="form-control" placeholder="Hasil Pantau" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Isi Pantauan</label>
                  <div class="col-lg-10">
                    <input type="text" name="isi_pantauan" class="form-control" value="" required maxlength="50" placeholder="Isi Pantauan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Patuh</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="patuh" required>
                        <option value="">-- Pilih --</option>
                        <option value="taat">Taat</option>
                        <option value="tidak">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Mutu</label>
                  <div class="col-lg-10">
                    <input type="text" name="mutu" class="form-control" value="" required maxlength="10" placeholder="Mutu">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Waktu Pengawasan</label>
                  <div class="col-lg-10">
                    <input type="date" name="waktu_pengawasan" class="form-control" value="" required placeholder="Waktu Pengawasan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Semester</label>
                  <div class="col-lg-10">
                    <input type="text" name="semester" class="form-control" value="" required maxlength="3" placeholder="Semester">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kesimpulan</label>
                  <div class="col-lg-10">
                    <input type="text" name="kesimpulan" class="form-control" value="" required maxlength="50" placeholder="Kesimpulan">
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
            <th>Hasil Pantau</th>
            <th>Isi Pantauan</th>
            <th>Patuh</th>
            <th>Mutu</th>
            <th>Waktu Pengawasan</th>
            <th>Semester</th>
            <th>Kesimpulan</th>
            <?php
            if ($ceks->level == "hasil_pengawasan") {?>
            <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_pemantauan->result() as $baris) {
            ?>
              <tr>
                <td><?php echo $no.'.'; ?></td>
                <td><?php echo $baris->kd_persh; ?></td>
                <td><?php echo $baris->nm_persh; ?></td>
                <td><?php echo $baris->nm_usaha; ?></td>
                <td><?php echo $baris->hsl_pantau; ?></td>
                <td><?php echo $baris->isi_pantauan; ?></td>
                <td><?php echo $baris->patuh; ?></td>
                <td><?php echo $baris->mutu; ?></td>
                <td><?php echo $baris->waktu_pengawasan; ?></td>
                <td><?php echo $baris->semester; ?></td>
                <td><?php echo $baris->kesimpulan; ?></td>
                <?php
                if ($ceks->level == "hasil_pengawasan") {?>
                <td>
                  <a href="web/pemantauan_edit/<?php echo $baris->kd_pemantauan; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/pemantauan_hapus/<?php echo $baris->kd_pemantauan; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
