<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kamar</h1>
    </div>
    
    <a href="<?= base_url('admin/data_kamar/tambah_kamar'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          
          <th>Nama Kamar</th>
          <th>Nomor Kamar</th>
          <th>Jenis</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            
            $no = 1;
            foreach (   $tampil ->  hunian as $result    ) 
            {
            ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td>
            <img width="70px;" src="<?= base_url('assets/upload/'). $result->gambar; ?>" alt="">
          </td>
          
          <td><?= $result->nama; ?></td>
          <td><?= $result->nomor_hunian; ?></td>
          <td><?= $result->jenis; ?></td>
          <td><?= $result->deskripsi; ?></td>
          <td>
            <?php if($result->status == 0){ ?>
              <span class="badge badge-danger">Tidak Tersedia</span>
            <?php }
            else{ ?>
              <span class="badge badge-primary">Tersedia</span>
            <?php } ?>
          </td>
          <td>
            <a href="<?= base_url('admin/data_kamar/detail_kamar/'). $result->id; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
            <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_kamar/delete_kamar/'). $result->id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_kamar/update_kamar/'). $result->id; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php
            $no++; 
            }
        ?> 
      </tbody>
    </table>



  </section>
</div>