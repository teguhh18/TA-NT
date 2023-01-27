<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Tambah Data Member</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('admin/Data_Member/tambah_member_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label id="lbl_nama" for="txt_nama">Nama Member</label>
                <input id="txt_nama" type="text" name="nama_kamar" class="form-control">
                <div id="err_nama" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_email" for="txt_email">Email</label>
                <input id="txt_email" type="text" name="no" class="form-control">
                <div id="err_email" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_alamat" for="txt_alamat">Alamat</label>
                <input id="txt_alamat" type="text" name="deskripsi_kamar" class="form-control">
                <div id="err_alamat" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_gender" for="cbo_gender">Gender</label>
                <select name="jenis" id="cbo_gender" class="form-control">
                  <option value="-">--Pilih--</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <div id="err_gender" class="text-small text-danger"></div>
              </div>
             
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label id="lbl_telepon" for="txt_telepon">No. Telepon</label>
                <input id="txt_telepon" type="number" name="harga" class="form-control">
                <div id="err_telepon" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_ktp" for="txt_ktp">No KTP</label>
                <input id="txt_ktp" type="text" name="harga" class="form-control">
                
                <div id="err_ktp" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_pass" for="txt_pass">Password</label>
                <input id="txt_pass" type="text" name="harga" class="form-control">
                
                <div id="err_pass" class="text-small text-danger"></div>
              </div>

              <div class="form-group">
                <label id="lbl_role" for="cbo_role">Role</label>
                <select name="jenis" id="cbo_role" class="form-control">
                  <option value="-">--Pilih--</option>
                  <option value="1">Admin</option>
                  <option value="0">Member Biasa</option>
                </select>
                <div id="err_role" class="text-small text-danger"></div>
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

            let lbl_email = document.getElementById("lbl_email");
            let txt_email = document.getElementById("txt_email");
            let err_email = document.getElementById("err_email");

            let lbl_gender = document.getElementById("lbl_gender");
            let cbo_gender = document.getElementById("cbo_gender");
            let err_gender = document.getElementById("err_gender");

            let lbl_alamat = document.getElementById("lbl_alamat");
            let txt_alamat = document.getElementById("txt_alamat");
            let err_alamat = document.getElementById("err_alamat");

            let lbl_role = document.getElementById("lbl_role");
            let cbo_role = document.getElementById("cbo_role");
            let err_role = document.getElementById("err_role");

            let lbl_telepon = document.getElementById("lbl_telepon");
            let txt_telepon = document.getElementById("txt_telepon");
            let err_telepon = document.getElementById("err_telepon");

            let lbl_ktp = document.getElementById("lbl_ktp");
            let txt_ktp = document.getElementById("txt_ktp");
            let err_ktp = document.getElementById("err_ktp");

            let lbl_pass = document.getElementById("lbl_pass");
            let txt_pass = document.getElementById("txt_pass");
            let err_pass = document.getElementById("err_pass");
            

            // jika nama tidak diisi
            if(txt_nama.value === "")
            {
                err_nama.style.display = 'unset';
                err_nama.innerHTML = "Nama Member Harus Diisi !";
                
          
            }
            // jika nama diisi
            else
            {
              err_nama.style.display = 'none';
              err_nama.innerHTML = "";
              
            }
            
            // ternary operator
            const email = (txt_email.value === "") ?
            [
                err_email.style.display = 'unset',
                err_email.innerHTML = "Email Member Harus Diisi !",
                           
            ]
            :
            [
                err_email.style.display = 'none',
                err_email.innerHTML = "",
                               
            ]

            const alamat = (txt_alamat.value === "") ?
            [
                err_alamat.style.display = 'unset',
                err_alamat.innerHTML = "Alamat Member Harus Diisi !",
                            
            ]
            :
            [
                err_alamat.style.display = 'none',
                err_alamat.innerHTML = "",
                                
            ]

            const gender = (cbo_gender.selectedIndex === 0) ?
            [
                err_gender.style.display = 'unset',
                err_gender.innerHTML = "Gender Member Harus Dipilih !",
                            
            ]
            :
            [
                err_gender.style.display = 'none',
                err_gender.innerHTML = "",
                               
            ]


            const telepon = (txt_telepon.value === "") ?
            [
                err_telepon.style.display = 'unset',
                err_telepon.innerHTML = "No Telepon Harus Diisi !",
                            
            ]
            :
            [
                err_telepon.style.display = 'none',
                err_telepon.innerHTML = "",
                                
            ]

            const ktp = (txt_ktp.value === "") ?
            [
                err_ktp.style.display = 'unset',
                err_ktp.innerHTML = "Nomor KTP Harus Diisi !",
                            
            ]
            :
            [
                err_ktp.style.display = 'none',
                err_ktp.innerHTML = "",
                                
            ]

            const pass = (txt_pass.value === "") ?
            [
                err_pass.style.display = 'unset',
                err_pass.innerHTML = "Password Harus Diisi !",
                            
            ]
            :
            [
                err_pass.style.display = 'none',
                err_pass.innerHTML = "",
                                
            ]

            const role = (cbo_role.selectedIndex === 0) ?
            [
                err_role.style.display = 'unset',
                err_role.innerHTML = "Role Harus Dipilih !",
                            
            ]
            :
            [
                err_role.style.display = 'none',
                err_role.innerHTML = "",
                               
            ]
            
            // jika semua komponen terisi
            if(err_nama.innerHTML === "" && email[1] === "" && alamat[1] === "" && gender[1] === "" && telepon[1] === "" && ktp[1] === "" && pass[1] === "" && role[1] === "")
            {
                // panggil method setSave
                setSave(txt_nama.value,txt_email.value,txt_alamat.value,cbo_gender.value,txt_telepon.value,txt_ktp.value,txt_pass.value,cbo_role.value);
            }            
        });

        const setSave = (nama,email,alamat,gender,telepon,ktp,pass,role) => {
            // buat variabel untuk form
            let form = new FormData();

            // isi/tambah nilai untuk form
            form.append("nama",nama);
            form.append("email",email);
            form.append("alamat",alamat);
            form.append("gender",gender);
            form.append("telepon",telepon);
            form.append("ktp",ktp);
            form.append("pass",pass);
            form.append("role",role);

            // proses kirim data ke controller
            fetch('<?php echo base_url("admin/Data_Member/tambah_member_aksi"); ?>',{
                method: "POST",
                body: form
            })
    .then((response) => response.json())        
    .then((result) => alert(result.statusnya))    
    .catch((error) => alert("Data Gagal Dikirim !"))
        }
</script>