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
            if ($ceks->level == "penegakan_hukum") {?>
                Tambah
            <?php
            } ?> Pembinaan</h5>
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
          if ($ceks->level == "penegakan_hukum") {?>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                  <label class="control-label col-lg-2">Tgl Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_pembinaan" class="form-control" value="" required placeholder="Tgl Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jenis Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="jns_pembinaan" class="form-control" value="" required maxlength="35" placeholder="Jenis Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Image Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="file" name="image_pembinaan" class="form-control" value="" required placeholder="Image Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="pembinaan" class="form-control" value="" required maxlength="50" placeholder="Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tindakan Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="tindakan_pembinaan" class="form-control" value="" required maxlength="50" placeholder="Tindakan Pembinaan">
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
            <th>Tgl Pembinaan</th>
            <th>Jenis Pembinaan</th>
            <th>Image Pembinaan</th>
            <th>Pembinaan</th>
            <th>Tindakan Pembinaan</th>
            <th>Kesimpulan</th>
            <?php
            if ($ceks->level == "penegakan_hukum") {?>
            <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_pembinaan->result() as $baris) {
            ?>
              <tr>
                <td><?php echo $no.'.'; ?></td>
                <td><?php echo $baris->kd_persh; ?></td>
                <td><?php echo $baris->nm_persh; ?></td>
                <td><?php echo $baris->nm_usaha; ?></td>
                <td><?php echo $baris->tgl_pembinaan; ?></td>
                <td><?php echo $baris->jns_pembinaan; ?></td>
                <td><a href="<?php echo $baris->image_pembinaan; ?>" target="_blank">Lihat</a></td>
                <td><?php echo $baris->pembinaan; ?></td>
                <td><?php echo $baris->tindakan_pembinaan; ?></td>
                <td><?php echo $baris->kesimpulan; ?></td>
                <?php
                if ($ceks->level == "penegakan_hukum") {?>
                <td>
                  <a href="web/pembinaan_edit/<?php echo $baris->kd_pembinaan; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                  <a href="web/pembinaan_hapus/<?php echo $baris->kd_pembinaan; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
