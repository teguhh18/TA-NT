<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail Hunian</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url("ext/style.css") ?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Kost Tegar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#!">Kamar Kost</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="#!">Penyewaan</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="#!">Tentang</a>
                        </li>
                        
                    </ul>
                    <!-- <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                        f    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form> -->
                </div>
            </div>
        </nav>
        
        <!-- Section-->
        <div class="container">
  <div style="height: 150px;"></div>

  <?php 
            
            $no = 1;
            foreach (   $tampil ->  hunian as $detail    ) 
            {
            ?>
  <div class="card">
    <div class="card-body">
    
      <div class="row">
        <div class="">
          <img width="100%" src="<?= $detail->gambar; ?>" alt="">
        </div>
        <div class="table" style="margin-top: 10px;">
          <table class="table">
            <tr>
              <th>Nama Kamar</th>
              <td><?= $detail->nama_hunian; ?></td>
            </tr>
            <tr>
              <th>No Kamar</th>
              <td><?= $detail->nomor_hunian; ?></td>
            </tr>

            <tr>
              <th>Jenis</th>
              <td><?= $detail->jenis_hunian; ?></td>
            </tr>

            <tr>
              <th>Fasilitas</th>
              <td><?= $detail->deskripsi_hunian; ?></td>
            </tr>
            
            <tr>
              <th>Status</th>
              <td>
                <?php if($detail->status_hunian == '1'){
                  echo "Tersedia";
                }
                else{
                  echo "Tidak tersedia / Sudah Disewa";
                } ?>
              </td>
              
            </tr>

            <tr>
              <th>Harga</th>
              <td><?= $detail->harga_hunian; ?></td>
            </tr>

            <tr>
            
              <td>
              <?php
                if($detail->status == "0"){ ?>
                  <span class="btn btn-danger">Telah Disewa</span>
                <?php }
                else{
                  echo anchor('customer/rental/tambah_rental/'. $detail->nomor_kamar, '<button class="btn btn-success">Sewa</button>');
                }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>

      

    </div>
  </div>

  <?php
            $no++; 
            }
        ?> 

</div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Kost Tegar 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="ext/scripts.js"></script>
    </body>
</html>
