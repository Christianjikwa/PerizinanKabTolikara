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
          <h5 class="panel-title">Tambah Petugas</h5>
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
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Username</label>
                  <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" value="" required maxlength="30">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Petugas</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama" class="form-control" value="" required maxlength="100">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Lahir</label>
                  <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                    <input type="date" name="tgl" class="form-control daterange-single" value="" maxlength="10" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Jenis Kelamin</label>
                  <div class="col-lg-10">
                    <label><input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki</label> &nbsp;
                    <label><input type="radio" name="jk" value="Perempuan" required> Perempuan</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">No HP</label>
                  <div class="col-lg-10">
                    <input type="number" name="no_hp" class="form-control" value="" required maxlength="14">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Alamat</label>
                  <div class="col-lg-10">
                    <textarea name="alamat" class="form-control" rows="4" cols="80" required></textarea>
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
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Username</th>
              <th>Nama Petugas</th>
              <th>Jenis Kelamin</th>
              <th>No HP</th>
              <th>Alamat</th>
              <th>Tgl Daftar</th>
              <th>Terakhir Login</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($petugas as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->username; ?></td>
                  <td><?php echo $baris->nama_petugas; ?></td>
                  <td><?php echo $baris->jk; ?></td>
                  <td><?php echo $baris->no_hp; ?></td>
                  <td><?php echo $baris->alamat; ?></td>
                  <td><?php echo $baris->tgl_daftar; ?></td>
                  <td><?php echo $baris->terakhir_login; ?></td>
                  <td>
                    <a href="admin/petugas_hapus/<?php echo $baris->username; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
