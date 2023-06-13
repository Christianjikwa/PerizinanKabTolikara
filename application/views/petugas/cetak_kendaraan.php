<?php
$ceks = $this->session->userdata('parkir@2017');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Kendaraan</title>
  </head>
  <body>

    <table border="0" width="100%">
      <tr>
        <td width="120">
          <img src="../assets/images/logo/logo1.png" alt="logo1" width="120">
        </td>
        <td align="center">
          <h1>DINAS KEBUDAYAAN DAN PARAWISATA PROVINSI JAMBI</h1>
        </td>
        <td width="120">
          <img src="../assets/images/logo/logo2.png" alt="logo2" width="120">
        </td>
      </tr>
    </table>

    <hr>

    <h2 align="center">Laporan Kendaraan</h2>

    <table border="1"width="100%">
      <tr>
        <th width="30">NO</th>
        <th>No PLAT</th>
        <th>Parkir Masuk</th>
        <th>Parkir Keluar</th>
        <th>Tanggal</th>
      </tr>
      <?php
      $i = 1;
      foreach ($sql->result() as $baris) {
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $baris->plat; ?></td>
        <td><?php echo $baris->jam_masuk; ?></td>
        <td><?php echo $baris->jam_keluar; ?></td>
        <td><?php echo $baris->tgl; ?></td>
      </tr>
      <?php
      $i++;
      } ?>
    </table>

    <br><br>
    <table border="0" width="100%">
      <tr>
        <td width="80%">
        </td>
        <td align="center">
          Jambi, <?php echo date('d-F-Y'); ?> <br>
          Pengelola
          <br>
          <br>
          <br>
          Herman
        </td>
      </tr>
    </table>

  </body>
</html>
