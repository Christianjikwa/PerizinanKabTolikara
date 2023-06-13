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
          <h5 class="panel-title">Tambah Nama Printer</h5>
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
                  <label class="control-label col-lg-2">Nama Printer</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_printer" class="form-control" value="" required maxlength="50">
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
              <th>Nama Printer</th>
              <th>Status</th>
              <th class="text-center" width="200"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($printer as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->nama_printer; ?></td>
                  <td><?php if ($baris->status == 1) {echo '<span class="glyphicon glyphicon-heart"></span> Aktif';}?></td>
                  <td>
                    <a href="admin/printer/<?php echo $baris->id_printer; ?>" title="Aktifkan"><span class="glyphicon glyphicon-heart"></span></a> &nbsp;
                    <a href="admin/printer_edit/<?php echo $baris->id_printer; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="admin/printer_hapus/<?php echo $baris->id_printer; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
