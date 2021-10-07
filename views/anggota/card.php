<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1><?= $judul; ?></h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?= $judul; ?></li>
                </ol>
            </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php
            $batas = 30;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            $previous = $halaman - 1;
            $next = $halaman + 1;
            $data = mysqli_query($host,"select * from nira WHERE blokir='N'");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);
            $data_pegawai = mysqli_query($host,"select * from nira WHERE blokir='N' order by nama limit $halaman_awal, $batas");
            $nomor = $halaman_awal+1;
            while($d = mysqli_fetch_array($data_pegawai)){

            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <?= $d['posisi']?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?= $d['nama']?></b></h2>
                      <p class="text-muted text-sm"><b>Pendidikan: </b> <?= $d['pendidikan']?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ruangan: <?= $d['ruangan']?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $d['hp']?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <?php
                      if($d['foto'] !=""){
                      ?>
                      <img src="https://ppni.or.id/simk/id/image/foto/<?= $d['foto']?>" alt="user-avatar" class="img-circle img-fluid" width="80px">
                      <?php
                      }else{
                      ?>
                      
                      <img src="<?= $site_url?>/assets/AdminLTE/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                      <?php
                      }
                      ?>

                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <?php
        if($jumlah_data > $batas){
        ?>
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            <li class="page-item"><a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a></li>
            <?php 
            $max_page_list=10;
            if($total_halaman < $max_page_list){
              $coun_list=$total_halaman;
            }else{
              $coun_list=$max_page_list;
            }
              for($x=1;$x<=$coun_list;$x++){
              if($halaman == $x){
            ?> 
              <li class="page-item active">
            <?php
              }else{
              ?> 
              <li class="page-item">
                <?php
              }
                ?>   
              <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>				
            <li class="page-item"><a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a></li>
          </ul>
        </nav>
        <?php
          }
        ?>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
