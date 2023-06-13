<?php
  $cek    = $user->result();
  $nama   = $cek[0]->nama_petugas;
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h2 class="panel-title">
            <center>Selamat Datang, <?php echo ucwords($nama); ?></center>
          </h2>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
