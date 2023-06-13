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
          <h5 class="panel-title">Tambah Harga</h5>
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
                  <label class="control-label col-lg-2">Nama Kendaraan</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kendaraan" required>
                      <option value="">-- Pilih Kendaraan --</option>
                      <?php
                      foreach ($kendaraan->result() as $baris) {
                      ?>
                        <option value="<?php echo $baris->id_kendaraan; ?>"><?php echo $baris->nama_kendaraan; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Parkir</label>
                  <div class="col-lg-10">
                    <input type="number" name="harga" class="form-control" value="" required maxlength="30">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Max Waktu Parkir</label>
                  <div class="col-lg-2">
                    <input type="text" name="max_jam" class="form-control" value="" required maxlength="2" placeholder="Jam">
                  </div>
                  <div class="col-lg-2">
                    <input type="text" name="max_menit" class="form-control" value="" required maxlength="2" placeholder="menit">
                  </div>
                  <div class="col-lg-2">
                    <input type="text" name="max_detik" class="form-control" value="" required maxlength="2" placeholder="detik">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Denda Parkir</label>
                  <div class="col-lg-10">
                    <input type="number" name="denda" class="form-control" value="" required maxlength="30">
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
        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nama Kendaraan</th>
              <th>Harga</th>
              <th>Max Waktu</th>
              <th>Denda</th>
              <th class="text-center" width="100"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($harga as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->nama_kendaraan; ?></td>
                  <td><?php echo $baris->harga; ?></td>
                  <td><?php echo $baris->max_waktu; ?></td>
                  <td><?php echo $baris->denda; ?></td>
                  <td>
                    <a href="admin/harga_edit/<?php echo $baris->id_harga; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="admin/harga_hapus/<?php echo $baris->id_harga; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                  </td>
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
