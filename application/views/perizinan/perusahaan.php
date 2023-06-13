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
            } ?> Perusahaan</h5>
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
                  <div class="col-lg-2">
                    <input type="text" name="kd_persh" class="form-control" value="" required maxlength="4" placeholder="Kode Perusahaan" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_persh" class="form-control" value="" required maxlength="35" placeholder="Nama Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Alamat Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="alamat_persh" class="form-control" value="" required maxlength="35" placeholder="Alamat Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">NPWP Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="npwp_persh" class="form-control" value="" required maxlength="35" placeholder="NPWP Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Penanggung Jawab</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_pjwb" class="form-control" value="" required maxlength="35" placeholder="Nama Penanggung Jawab">
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
            <th>ALamat Perusahaan</th>
            <th>NPWP Perusaahaan</th>
            <th>Nama Penanggung Jawab</th>
            <?php
            if ($ceks->level == "perizinan") {?>
              <th class="text-center" width="100"></th>
            <?php
            } ?>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($v_perusahaan->result() as $baris) {
            ?>
              <tr>
                <td><?php echo $no.'.'; ?></td>
                <td><?php echo $baris->kd_persh; ?></td>
                <td><?php echo $baris->nm_persh; ?></td>
                <td><?php echo $baris->alamat_persh; ?></td>
                <td><?php echo $baris->npwp_persh; ?></td>
                <td><?php echo $baris->nm_pjwb; ?></td>
                <?php
                if ($ceks->level == "perizinan") {?>
                  <td>
                    <a href="web/perusahaan_edit/<?php echo $baris->kd_persh; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="web/perusahaan_hapus/<?php echo $baris->kd_persh; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
