<?php
  include('oneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Minuman 
                         </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th> Id Minuman</th>
                                            <th> Nama Minuman</th>
                                            <th> Nama Jenis Minuman</th>
                                            <th>Harga(s)</th>
                                            <th>Stok</th>
                                            <th> Keterangan</th>
                                            <th> Gambar</th>
                                            <th> <center>Action</center> </th>
                                        </tr>
                                    </thead>
                                    <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM minuman, jenis_minuman where minuman.id_jns_minuman=jenis_minuman.id_jns_minuman order by id_minuman desc";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['id_minuman']; ?></td>
          <td><?php echo $row['nama_minuman']; ?></td>
          <td><?php echo $row['nama_jns_minuman']; ?></td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td><?php echo $row['jmlh_stok']; ?></td>
          <td><?php echo substr($row['ket'], 0, 20); ?>...</td>
          <td style="text-align: center;"><img src="../asset/images/<?php echo $row['gbr_minuman']; ?>" style="width: 120px;"></td>
          <td>
              <a href="?page=admin&aksi=hapus_barang&id_minuman=<?php echo $row['id_minuman']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
			<tr>
				<td colspan="6">
				<a href="?page=admin" class="btn btn-success" role="button">Tambah Data</a>
                </td>
			</tr>
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>