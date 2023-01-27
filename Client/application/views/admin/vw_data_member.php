<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Member</h1>
    </div>
    
    <a href="<?= base_url('admin/Data_Member/tambah_member'); ?>" class="btn btn-primary mb-3">Tambah Member</a>

    <h5>Role = 1 (admin) Role = 0 (Customer)</h5>
    

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Gender</th>
          <th>No.Telepon</th>
          <th>No.KTP</th>
          <th>Password</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            
            $no = 1;
            foreach (   $tampil ->  member as $result    ) 
            {
            ?>
        <tr>
          <td><?= $no++; ?>.</td>

          
          <td><?= $result->nama; ?></td>
          <td><?= $result->email; ?></td>
          
          <td><?= $result->alamat; ?></td>
          <td><?= $result->gender; ?></td>
          <td><?= $result->telepon; ?></td>
          <td><?= $result->ktp; ?></td>
          <td><?= $result->pass; ?></td>
          <td><?= $result->role; ?></td>
          
          <td>
           
            <a  onclick="return gotoDelete('<?php echo $result->ktp; ?>')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_member/update_member/'). $result->id; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php
            $no++; 
            }
        ?> 
      </tbody>
    </table>

    <script>

  
        // buat fungsi untuk hapus data
        function gotoDelete(ktp)
        {
            if(confirm("Data Member No KTP "+ktp+" Ingin Dihapus ?") === true)
            {                

                // panggil fungsi setDelete
                setDelete(ktp);                
            }
        }

        function setDelete(ktp)
        {
            // buat variabel/konstanta data
            const data = {
                "ktpnya" : ktp,                
            }

            // kirim data async dengan fetch
            fetch('<?php echo base_url('admin/Data_Member/deleteMember'); ?>',
            {
                method : "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body: JSON.stringify(data)
            })

            .then((response)=>
            {
                return response.json()
            })

            .then(function(data)
            {
                // jika nilai "err" = 0
                // if(data.err === 0)
                    // alert("Data Berhasil Dihapus")
                // jika nilai "err" = 1
                // else
                    // alert("Data Gagal Dihapus !")
                alert(data.statusnya);
                //  panggil fungsi setRefresh
                // setRefresh();
            })
        }
    </script>

  </section>
</div>

