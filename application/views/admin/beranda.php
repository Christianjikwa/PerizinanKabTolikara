<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-12">

        <!-- Quick stats boxes -->
        <div class="row">
          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-teal-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $level_petugas->num_rows(); ?></h3>
                Jumlah Petugas
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-pink-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $jml_parkir->num_rows(); ?></h3>
                Jumlah Parkir Hari ini
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $jml_kendaraan->num_rows(); ?></h3>
                Jumlah Kendaraan yang diinputkan
              </div>

              <div id="today-revenue"></div>
            </div>
            <!-- /today's revenue -->

          </div>
        </div>
        <!-- /quick stats boxes -->

      </div>


    </div>
    <!-- /dashboard content -->
