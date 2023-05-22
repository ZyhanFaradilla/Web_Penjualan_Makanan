<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID.Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>E-Mail</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Kode Pos</th>                                            
                                            <th>Telp</th>
                                            <th>No.Rekening</th>
                                            <th>Nama Rekening</th>
                                            <th>Bank</th>
                                            <th>Harga</th>
                                            <th>Quantity</th>
                                            <th>Total Bayar</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	include 'oneksi.php';
                                    	$sql = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                    	while ($data=mysqli_fetch_array($sql)) {
                                    	 ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $data['id_transaksi']; ?> </td>
                                            <td> <?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['kota']; ?></td>
                                            <td><?php echo $data['pos']; ?></td>
                                            <td><?php echo $data['hp']; ?></td>
                                            <td><?php echo $data['no_rek']; ?></td>
                                            <td><?php echo $data['nama_rek']; ?></td>
                                            <td><?php echo $data['bank']; ?></td>
                                            <td><?php echo $data['harga']; ?></td>
                                            <td><?php echo $data['quantity']; ?></td>
                                            <td><?php echo $data['total_bayar']; ?></td>
                                            
                                        </tr>   
                                        <?php 
                                    };
                                         ?>                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->