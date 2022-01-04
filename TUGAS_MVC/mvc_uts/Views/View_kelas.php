<?php 

include '../Controllers/Controller_kelas.php';
 // Membuat Object dari Class kelas
$kelas = new Controller_kelas();
$GetKelas = $kelas->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>
      
        <h2 class="card_title text-center">DATA KELAS</h2>
        <h3 class="card text-center" ><a type="button" class="btn btn-outline-light bg-success" href="main.php?menu=<?php echo base64_encode('po_kelas') ?>">Tambahkan Data</a></h3>

        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Kelas</th>
                <th scope="col" class="text-center">Kompetensi Keahlian</th>
                <th scope="col" class="text-center">Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetKelas))
                {
                        $no = 1;
                        foreach($GetKelas as $Get){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $Get['nama_kelas']; ?></td>
                            <td class="text-center"><?php echo $Get['kompetensi_keahlian']; ?></td>
                            <td class="text-center">
                                <a href= "main.php?menu=<?php echo base64_encode('pu_kelas') ?>&id_kelas=<?php echo base64_encode ($Get['id_kelas']) ?>">
                                <input type="button" class="btn btn-outline-primary" name="proses" value="View"></input></a>
                                <a href="../Config/Routes.php?function=delete_kelas&id_kelas=<?php echo $Get['id_kelas'] ?>" onclick="return konfirmasi(<?php echo $Get['id_kelas']?>)">
                                <input type="button"  class="btn btn-outline-danger" name="proses" value="Delete"></input></a>
                            </td>
                        </tr>
                        <?php 
                        }
                }
            ?>
        </table>
        <script>
            var a=id_kelas;
            function konfirmasi()
            {
                return confirm('Apakah Anda yakin Ingin menghapus Data ini ?');
            }
        </script>