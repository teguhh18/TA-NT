<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Tambah Data Kamar</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('admin/Data_Kamar/tambah_kamar_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label id="lbl_nama" for="txt_nama">Nama Kamar</label>
                <input id="txt_nama" type="text" name="nama_kamar" class="form-control">
                <div id="err_nama" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_nomor" for="txt_nomor">Nomor Kamar</label>
                <input id="txt_nomor" type="number" name="no" class="form-control">
                <div id="err_nomor" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_jenis" for="cbo_jenis">Jenis Kamar</label>
                <select name="jenis" id="cbo_jenis" class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="REG">Reguler</option>
                  <option value="VIP">VIP</option>
                  <option value="VVIP">VVIP</option>
                </select>
                <div id="err_jenis" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_deskripsi" for="txt_deskripsi">Deskripsi Kamar</label>
                <input id="txt_deskripsi" type="text" name="deskripsi_kamar" class="form-control">
                <div id="err_deskripsi" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_status" for="cbo_status">Status Kamar</label>
                <select name="status" id="cbo_status" class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
                <div id="err_status" class="text-small text-danger"></div>
              </div>

             

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label id="lbl_harga" for="txt_harga">Harga Sewa perhari</label>
                <input id="txt_harga" type="number" name="harga" class="form-control">
                <div id="err_harga" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_gambar" for="txt_gambar">Nama File Gambar</label>
                <input id="txt_gambar" type="text" name="harga" class="form-control">
                <label for=""><b>Disesuaikan dengan nama file foto yang akan di upload. Ex : fotokamar.jpg</b></label>
                <div id="err_gambar" class="text-small text-danger"></div>
              </div>
              
              <div class="form-group">
                <label id="" for="">Gambar</label>
                <input id="" type="file" name="gambar" class="form-control">
                <label for="gambar"><b>Disarankan Upload Foto Tipe Landscape !!!</b></label>
              </div>

              <button id="btn_simpan" class="btn btn-success mt-4" >Simpan</button>
              <button type="reset" class="btn btn-danger mt-4">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>


  </section>
</div>

<script>
  // inisialisasi object
        let btn_simpan = document.getElementById("btn_simpan");

        btn_simpan.addEventListener('click',function(){
            // inisialisasi object

            let lbl_nama = document.getElementById("lbl_nama");
            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");

            let lbl_nomor = document.getElementById("lbl_nomor");
            let txt_nomor = document.getElementById("txt_nomor");
            let err_nomor = document.getElementById("err_nomor");

            let lbl_jenis = document.getElementById("lbl_jenis");
            let cbo_jenis = document.getElementById("cbo_jenis");
            let err_jenis = document.getElementById("err_jenis");

            let lbl_deskripsi = document.getElementById("lbl_deskripsi");
            let txt_deskripsi = document.getElementById("txt_deskripsi");
            let err_deskripsi = document.getElementById("err_deskripsi");

            let lbl_status = document.getElementById("lbl_status");
            let cbo_status = document.getElementById("cbo_status");
            let err_status = document.getElementById("err_status");

            let lbl_harga = document.getElementById("lbl_harga");
            let txt_harga = document.getElementById("txt_harga");
            let err_harga = document.getElementById("err_harga");

            let lbl_gambar = document.getElementById("lbl_gambar");
            let txt_gambar = document.getElementById("txt_gambar");
            let err_gambar = document.getElementById("err_gambar");
            

            // jika nama tidak diisi
            if(txt_nama.value === "")
            {
                err_nama.style.display = 'unset';
                err_nama.innerHTML = "Nama Kamar Harus Diisi !";
                
          
            }
            // jika nama diisi
            else
            {
              err_nama.style.display = 'none';
              err_nama.innerHTML = "";
              
            }
            
            // ternary operator
            const nomor = (txt_nomor.value === "") ?
            [
                err_nomor.style.display = 'unset',
                err_nomor.innerHTML = "Nomor Kamar Harus Diisi !",
                           
            ]
            :
            [
                err_nomor.style.display = 'none',
                err_nomor.innerHTML = "",
                               
            ]

            const jenis = (cbo_jenis.selectedIndex === 0) ?
            [
                err_jenis.style.display = 'unset',
                err_jenis.innerHTML = "Jenis Kamar Harus Dipilih !",
                            
            ]
            :
            [
                err_jenis.style.display = 'none',
                err_jenis.innerHTML = "",
                               
            ]

            const deskripsi = (txt_deskripsi.value === "") ?
            [
                err_deskripsi.style.display = 'unset',
                err_deskripsi.innerHTML = "Deskripsi Kamar Harus Diisi !",
                            
            ]
            :
            [
                err_deskripsi.style.display = 'none',
                err_deskripsi.innerHTML = "",
                                
            ]

            const status = (cbo_status.selectedIndex === 0) ?
            [
                err_status.style.display = 'unset',
                err_status.innerHTML = "Jenis Kamar Harus Dipilih !",
                            
            ]
            :
            [
                err_status.style.display = 'none',
                err_status.innerHTML = "",
                                
            ]

            const harga = (txt_harga.value === "") ?
            [
                err_harga.style.display = 'unset',
                err_harga.innerHTML = "Harga Kamar Harus Diisi !",
                            
            ]
            :
            [
                err_harga.style.display = 'none',
                err_harga.innerHTML = "",
                                
            ]

            const gambar = (txt_gambar.value === "") ?
            [
                err_gambar.style.display = 'unset',
                err_gambar.innerHTML = "Nama Gambar Kamar Harus Diisi !",
                            
            ]
            :
            [
                err_gambar.style.display = 'none',
                err_gambar.innerHTML = "",
                                
            ]
            
            // jika semua komponen terisi
            if(err_nama.innerHTML === "" && nomor[1] === "" && jenis[1] === "" && deskripsi[1] === "" && status[1] === "" && harga[1] === "" && gambar[1] === "")
            {
                // panggil method setSave
                setSave(txt_nama.value,txt_nomor.value,cbo_jenis.value,txt_deskripsi.value,cbo_status.value,txt_harga.value,txt_gambar.value);
            }            
        });

        const setSave = (nama,nomor,jenis,deskripsi,status,harga,gambar) => {
            // buat variabel untuk form
            let form = new FormData();

            // isi/tambah nilai untuk form
            form.append("nama",nama);
            form.append("nomor",nomor);
            form.append("deskripsi",deskripsi);
            form.append("status",status);
            form.append("harga",harga);
            form.append("gambar",gambar);

            // proses kirim data ke controller
            fetch('<?php echo base_url("admin/Data_Kamar/tambah_kamar_aksi"); ?>',{
                method: "POST",
                body: form
            })
    .then((response) => response.json())        
    .then((result) => alert(result.statusnya))    
    .catch((error) => alert("Data Gagal Dikirim !"))
        }
</script>