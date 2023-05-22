<?php
  include('oneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
 <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Makanan 
                         </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th> Id Makanan</th>
                                            <th> Nama Makanan</th>
                                            <th> Jenis Makanan</th>
                                            <th>Harga(s)</th>
                                            <th>Stok</th>
                                            <th> Keterangan</th>
                                            <th> Gambar</th>
                                            <th> <center>Action</center> </th>
                                        </tr>
                                    </thead> 

<?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM makanan, jenis_makanan where makanan.id_jns_makanan=jenis_makanan.id_jns_makanan order by id_makanan desc";
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
          <td><?php echo $row['id_makanan']; ?></td>
          <td><?php echo $row['nama_makanan']; ?></td>
          <td><?php echo $row['nama_jns_makanan']; ?></td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td><?php echo $row['jmlh_stok']; ?></td>
          <td><?php echo substr($row['ket'], 0, 20); ?>...</td>
          <td style="text-align: center;"><img src="../asset/images/<?php echo $row['gbr_makanan']; ?>" style="width: 120px;"></td>
          <td>
              <a href="?page=admin&aksi=hapus_makanan&id_makanan=<?php echo $row['id_makanan']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
			<tr>
				<td colspan="6">
				<a href="?page=admin&aksi=makanan" class="btn btn-success" role="button">Tambah Data</a>
                </td>
			</tr>

		</table>
                            </div>
                        </div>
</div>                             	   