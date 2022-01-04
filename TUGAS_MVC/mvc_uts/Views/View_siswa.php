<?php 

include '../Controllers/Controller_siswa.php';
 // Membuat Object dari Class siswa
$siswa = new Controller_siswa();
$GetSiswa = $siswa->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($GetSiswa);
// die;
?>
       
        <h2 class="card_title text-center">DATA SISWA</h2>
        <h3 class="card text-center" ><a type="button" class="btn btn-outline-light bg-success" href="main.php?menu=<?php echo base64_encode('po_siswa') ?>">Tambahkan Data</a></h3>


        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">NISN</th>
                <th scope="col" class="text-center">NIS</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Alamat</th>
                <th scope="col" class="text-center">No Telepon</th>
                <th scope="col" class="text-center">Nominal</th>
                <th scope="col" class="text-center">Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetSiswa))
                {
                        $no = 1;
                        foreach($GetSiswa as $Get){
                        ?>
                        <tr>
                            <td  class="text-center"><?php echo $no++; ?></td>
                            <td  class="text-center"><?php echo $Get['nisn']; ?></td>
                            <td  class="text-center"><?php echo $Get['nis']; ?></td>
                            <td  class="text-center"><?php echo $Get['nama']; ?></td>
                            <td  class="text-center"><?php echo $Get['nama_kelas']; ?></td>
                            <td  class="text-center"><?php echo $Get['alamat']; ?></td>
                            <td  class="text-center"><?php echo $Get['id_telp']; ?></td>
                            <td  class="text-center"><?php echo $Get['nominal']; ?></td>
                            <td  class="text-center">
                                <a href="main.php?menu=<?php echo base64_encode('pu_siswa') ?>&nisn=<?php echo base64_encode ($Get['nisn']) ?>">
                                <input type="button" class="btn btn-outline-primary" name="proses" value="View"></input></a>
                                <a href="../Config/Routes.php?function=delete_siswa&nisn=<?php echo $Get['nisn'] ?>" onclick="return konfirmasi(<?php echo $Get['nisn']?>)">
                                <input type="button" class="btn btn-outline-danger" name="proses" value="Delete"></input></a>
                            </td>
                        </tr>
                        <?php 
                        }
                }
            ?>
        </table>
        <script>
            
            function konfirmasi(nisn)
            {
                return confirm('Apakah Anda yakin Ingin menghapus Data ini ?');
            }
        </script>