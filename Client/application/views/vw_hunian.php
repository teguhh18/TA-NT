<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Daftar Hunian</title>
        <!-- Favicon-->
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('Hunian') ?>">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('Hunian/data_hunian') ?>">Kamar Kost</a>
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
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">KOST TEGAR</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Sewa Kamar Dengan Harga Murah</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <div class="row">

        <?php 
            
            $no = 1;
            foreach (   $tampil ->  hunian as $result    ) 
            {
            ?>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <!-- Gambar masih salah, seharusnya gambar diambil berdasarkan nama gambar -->
                <a href="#"><img class="card-img-top" src="<?= base_url('assets/assets_shop') ?>/images/kamar5.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#"><?php echo $result->nama;     ?></a>
                    </h4>
                    <h5>Kamar No : <?php echo $result->nomor_hunian; ?></h5>
                    <p class="card-text">Tipe Kamar : <?php echo $result->jenis; ?></p>
                    <p class="card-text">Fasilitas : <?php echo $result->deskripsi; ?></p>
                    <p class="card-text">Harga : <?php echo $result->harga; ?></p>
                </div>
                <div class="card-footer">
                    <!-- Buat tombol sewa kamar berdasarkan ketersediaan kamar-->
                    <?php
                    if($result->status == "0") {
                        echo "<span class='btn btn-danger' disable>Telah Disewa</span>";
                    }else{
                        echo anchor('ini fungsi untuk tambah sewa'.$result->id, '<button class="btn btn-success">Sewa</button>');
                    }
                    ?>
                    <!-- <button class="btn btn-warning" id="btn_detail" title="Detail Kamar" onclick="return gotoDetail('<?php echo $result->nomor_hunian; ?>')">
                    Detail
                    </button> -->

                    <!-- <button class="btn btn-warning" id="btn_detail" title="Detail Kamar" href="<?= base_url('Hunian/index/'.$result->nomor_hunian) ?>">
                    Detail -->
                    </button>
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
        <script>
            // fungsi untuk ke halaman detail hunian
            // function gotoDetail(nomor_hunian)
            // {
            //     location.href='<?php echo site_url("Hunian/detailHunian")?>'+'?nomor_hunian='+nomor_hunian
            // }

            // fungsi untuk ke halaman detail hunian
            function gotoDetail($nomor_hunian)
            {
                location.href='<?php echo site_url("Hunian/detailHunian")?>'
            }
        </script>
    </body>
</html>
