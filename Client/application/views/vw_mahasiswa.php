<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Mahasiswa</title>
    <!-- import font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- akhir import font awesome-->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>"/>
</head>



<body>
    <!-- Membuat Area Menu -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Tambah Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="setRefresh()">Refresh Data</button>
    </nav>
    <!-- Membuat Area Tabel -->
    <table>
    <!-- Judul Tabel -->
    <thead>
        <tr>
            <th style="width: 10% ;">   Aksi    </th>
            <th style="width: 5% ;">    No.     </th>
            <th style="width: 10% ;">   NPM     </th>
            <th style="width: 50% ;">   Nama       </th>
            <th style="width: 15% ;">   Telepon     </th>
            <th style="width: 10% ;">   Jurusan </th>
        </tr>
    </thead>
        <!-- Isi Tabel -->

        


             
        <tbody> 
            <?php 
            
            $no = 1;
            foreach (   $tampil ->  mahasiswa as $result    ) 
            {
    
            ?>
            
            <tr>
                <td style="text-align: center;">

                    <nav class="area-aksi">
                        <button class="btn-hapus" title="Hapus Data" id="btn_hapus" onclick="return gotoDelete('<?php echo $result->npm_mhs; ?>')"> <i class="fa-solid fa-trash-can"></i></button> 
                        <button class="btn-ubah" title="Ubah Data" id="btn_ubah"  onclick="return gotoUpdate('<?php echo $result->npm_mhs; ?>')"> <i class="fa-solid fa-pen-to-square" ></i></button>
                    </nav>
                
                </td>
                
                <td style="text-align: center;">  <?= $no;                  ?>      </td> 
                <td style="text-align: center;">  <?= $result->npm_mhs;     ?>      </td>
                <td style="text-align: justify;"> <?= $result->nama_mhs;    ?>      </td>
                <td style="text-align: center;">  <?= $result->telepon_mhs; ?>      </td>
                <td style="text-align: center;">  <?= $result->jurusan_mhs; ?>      </td>            
            </tr>

        <?php
            $no++; 
            }
        ?> 
              
        </tbody>

    </table>

    <!-- import font awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- akhir import font awesome JS -->

    <!-- JS -->
    <script>
        // Inisialisasi Object
        let btn_tambah = document.getElementById("btn_tambah")

        // // Event Tambah Data
        btn_tambah.addEventListener('click', function(){
            // alert("Tambah Data")

            location.href='<?php echo site_url ("Mahasiswa/addMahasiswa")?>'


         })

    //    btn_tambah.addEventListener('click',setRefresh)

        function setRefresh()
        {
            location.href='<?php echo base_url(); ?>'
        }

   // fungsi ke halaman ubah
        
        function gotoUpdate(npm){
           // let npmx = btoa(npm);

            location.href='<?php echo site_url ("Mahasiswa/updateMahasiswa") ?>'+'/'+npm
        }


        function gotoDelete(npm)
        {
           // let npmx = btoa(npm);
                if(confirm("Data Mahasiswa "+npm+" Ingin Di Hapus ?")=== true)
                {
                        // alert("Data Berhasil Di Hapus !! ")
                        // panggil fungsi setDelete
                        setDelete(npm);

                }
            
                
        }


        function setDelete(npm){
            //kirim data async dengan fetch
            const data = {
                "npmnya" : npm
                
                
            }
            
            fetch('<?= site_url("Mahasiswa/setDelete"); ?>', {
                 method : "POST",
                 headers : {
                    "Content-Type" : "application/json"
                 },
                 body : JSON.stringify(data)

            })

            .then((response)=>{

               return response.json()
            })
            .then(function(data){
                 
                alert(data.statusnya);
                setRefresh();
                
            })

        }

    </script>
</body>
</html>