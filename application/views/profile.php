<?php
$ceks = $user->row()->username; ?>
<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="panel panel-flat col-md-6">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Profile - Ubah Password</legend>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-3">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $ceks; ?>" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
                  </div>
                </div>

            </fieldset>
            <div class="col-md-12">
              <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </form>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
