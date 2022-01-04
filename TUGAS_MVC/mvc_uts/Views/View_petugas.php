<?php 

include '../Controllers/Controller_petugas.php';
 // Membuat Object dari Class petugas
$petugas = new Controller_petugas();
$GetPetugas = $petugas->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>
    
        <h2 class="card_title text-center">DATA PETUGAS</h2>
        <h3 class="card text-center" ><a type="button" class="btn btn-outline-light bg-success" href="main.php?menu=<?php echo base64_encode('po_petugas') ?>">Tambahkan Data</a></h3>

        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Password</th>
                <th scope="col" class="text-center">Nama Petugas</th>
                <th scope="col" class="text-center">Level</th>
                <th scope="col" class="text-center">Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetPetugas))
                {
                        $no = 1;
                        foreach($GetPetugas as $Get){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $Get['username']; ?></td>
                            <td class="text-center"><?php echo $Get['password']; ?></td>
                            <td class="text-center"><?php echo $Get['nama_petugas']; ?></td>
                            <td class="text-center"><?php echo $Get['level']; ?></td>
                            <td class="text-center">
                                <a href="main.php?menu=<?php echo base64_encode('pu_petugas') ?>&id_petugas=<?php echo base64_encode  ($Get['id_petugas']) ?>">
                                <input type="button" class="btn btn-outline-primary" name="proses" value="View"></input></a>
                                <a href="../Config/Routes.php?function=delete_petugas&id_petugas=<?php echo $Get['id_petugas'] ?>" onclick="return konfirmasi(<?php echo $Get['id_petugas']?>)">
                                <input type="button" class="btn btn-outline-danger" name="proses" value="Delete"></input></a>
                            </td>
                        </tr>
                        <?php 
                        }
                }
            ?>
        </table>
        <script>
            
            function konfirmasi(id_petugas)
            {
                return confirm('Apakah Anda yakin Ingin menghapus Data ini ?');
            }
        </script>