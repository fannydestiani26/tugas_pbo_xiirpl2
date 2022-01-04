<?php 

include '../Controllers/Controller_spp.php';
 // Membuat Object dari Class spp
$spp = new Controller_spp();
$GetSpp = $spp->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>

      
        <h2 class="card_title text-center">DATA SPP</h2>
        <h3 class="card text-center" ><a type="button" class="btn btn-outline-light bg-success" href="main.php?menu=<?php echo base64_encode('po_spp') ?>">Tambahkan Data</a></h3>

        <table class="table table-bordered table-striped">
            <tr>
                <th  scope="col" class="text-center">No</th>
                <th  scope="col" class="text-center">Tahun</th>
                <th  scope="col" class="text-center">Nominal</th>
                <th  scope="col" class="text-center">Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetSpp))
                {
                        $no = 1;
                        foreach($GetSpp as $Get){
                        ?>
                        <tr>
                            <td  class="text-center"><?php echo $no++; ?></td>
                            <td  class="text-center"><?php echo $Get['tahun']; ?></td>
                            <td  class="text-center"><?php echo $Get['nominal']; ?></td>
                            <td  class="text-center">
                                <a href="main.php?menu=<?php echo base64_encode('pu_spp') ?>&id_spp=<?php echo base64_encode  ($Get['id_spp']) ?>">
                                <input type="button" class="btn btn-outline-primary" name="proses" value="View"></input></a>
                                <a href="../Config/Routes.php?function=delete_spp&id_spp=<?php echo $Get['id_spp'] ?>" onclick="return konfirmasi(<?php echo $Get['id_spp']?>)">
                                <input type="button" class="btn btn-outline-danger" name="proses" value="Delete"></input></a>
                                

                                
                            </td>
                        </tr>
                        <?php 
                        }
                }
            ?>
        </table>
        <script>
            var a=id_spp;
            function konfirmasi()
            {
                return confirm('Apakah Anda yakin Ingin menghapus Data ini ?');
            }
        </script>