<?php 

include '../Controllers/Controller_pembayaran.php';
 // Membuat Object dari Class pembayaran
$pembayaran = new Controller_pembayaran();
$GetPembayaran = $pembayaran->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>


       
        <h2 class="card_title text-center">DATA PEMBAYARAN</h2>
        <h3 class="card text-center" ><a type="button" class="btn btn-outline-light bg-success" href="main.php?menu=<?php echo base64_encode('po_pembayaran') ?>">Tambahkan Data</a></h3>

        <table  class="table table-bordered table-striped">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Petugas</th>
                <th scope="col" class="text-center">NISN</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Tanggal Bayar</th>
                <th scope="col" class="text-center">Bulan Bayar</th>
                <th scope="col" class="text-center">Tahun Bayar</th>
                <th scope="col" class="text-center">Nominal</th>
                <th scope="col" class="text-center">Jumlah Bayar</th>
                <th scope="col" class="text-center">Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetPembayaran))
                {
                        $no = 1;
                        foreach($GetPembayaran as $Get){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $Get['nama_petugas']; ?></td>
                            <td class="text-center"><?php echo $Get['nisn']; ?></td>
                            <td class="text-center"><?php echo $Get['nama']; ?></td>
                            <td class="text-center"><?php echo $Get['tgl_bayar']; ?></td>
                            <td class="text-center"><?php echo $Get['bulan_dibayar']; ?></td>
                            <td class="text-center"><?php echo $Get['tahun_dibayar']; ?></td>
                            <td class="text-center"><?php echo $Get['nominal']; ?></td>
                            <td class="text-center"><?php echo $Get['jumlah_bayar']; ?></td>
                            <td class="text-center">
                                <a href="main.php?menu=<?php echo base64_encode('pu_pembayaran') ?>&id_pembayaran=<?php echo base64_encode  ($Get['id_pembayaran']) ?>">
                                <input type="button" class="btn btn-outline-primary" name="proses" value="View"></input></a>
                                <a href="../Config/Routes.php?function=delete_pembayaran&id_pembayaran=<?php echo $Get['id_pembayaran'] ?>" onclick="return konfirmasi(<?php echo $Get['id_pembayaran']?>)">
                                <input type="button" class="btn btn-outline-danger" name="proses" value="Delete"></input></a>
                            </td>
                        </tr>
                        <?php 
                        }
                }
            ?>
        </table>
        <script>
            var a=id_pembayaran;
            function konfirmasi()
            {
                return confirm('Apakah Anda yakin Ingin menghapus Data ini ?');
            }
        </script>