<!-- Advanced login -->
<form action="" method="post">
  <div class="panel panel-body login-form">
    <div class="text-center">
      <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
      <h5 class="content-group">Form Daftar <small class="display-block">Silahkan daftar</small></h5>
      <?php
      echo $this->session->flashdata('msg');
      ?>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
      <div class="form-control-feedback">
        <i class="icon-user-check text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="text" class="form-control" placeholder="NRP" name="nrp" required>
      <div class="form-control-feedback">
        <i class="icon-credit-card text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <select class="form-control" name="bagian" required>
          <option value="" selected="select">-- Bagian --</option>
          <?php
          foreach ($bagian as $baris) {
            echo '<option value="'.$baris->id_bagian.'">'.$baris->nama_bagian.'</option>';
          }?>
      </select>
      <div class="form-control-feedback">
        <i class="icon-price-tag2 text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="email" class="form-control" placeholder="Email" name="email" required>
      <div class="form-control-feedback">
        <i class="icon-mention text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="text" class="form-control" placeholder="Username" name="username" required>
      <div class="form-control-feedback">
        <i class="icon-user-check text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="password" class="form-control" placeholder="Password" name="password" required>
      <div class="form-control-feedback">
        <i class="icon-user-lock text-muted"></i>
      </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
      <input type="password" class="form-control" placeholder="Ulangi Password" name="password2" required>
      <div class="form-control-feedback">
        <i class="icon-user-lock text-muted"></i>
      </div>
    </div>

    <div class="col-md-12">
      <div class="col-md-6">
        <div class="form-group">
          <a href="" class="btn bg-teal btn-block btn-lg"><i class="icon-circle-left2 position-left"></i> Kembali</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <button type="submit" class="btn bg-teal btn-block btn-lg" name="btndaftar">Daftar <i class="icon-circle-right2 position-right"></i></button>
        </div>
      </div>
    </div>

  </div>
</form>
<!-- /advanced login -->
