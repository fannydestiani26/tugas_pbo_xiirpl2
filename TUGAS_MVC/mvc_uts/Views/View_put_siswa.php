<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_siswa.php';
// Membuat Object dari Class siswa
$siswa = new Controller_siswa();
$nisn = base64_decode ($_GET['nisn']);
$GetSiswa = $siswa->GetData_Where($nisn);

?>



<?php
    foreach($GetSiswa as $Get) :
?>
<div class="card">
<div class="card-header"> <h3 class="text-center">Memperbarui Data Siswa</h3></div>
<form action="../Config/Routes.php?function=put_siswa" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table class="table table-bordered table-striped">
        <input type="hidden" name="nisn" value="<?php echo $Get['nisn']; ?>">
    <tr>
        <td  class="col-sm-2 col-form-label">Nama</td>
        <td><input  class="form-control" id="floatingTextarea" type="text" name="nama" value="<?php echo $Get['nama']; ?>"></td>
    </tr>
    <tr>
        <td  class="col-sm-2 col-form-label">NIS</td>
        <td><input  class="form-control" id="floatingTextarea" type="text" name="nis" value="<?php echo $Get['nis']; ?>"></td>
    </tr>
    <tr>
        <td  class="col-sm-2 col-form-label">Kelas</td>
        <td>
            <select  class="form-control" id="floatingTextarea" name="id_kelas">
                <?php 
                $GetKelas = $siswa->GetData_Kelas();
                foreach ($GetKelas as $GetK) : ?>
                <option value="<?php echo $GetK['id_kelas'] ?>"><?php echo $GetK['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>


        </td>
    </tr>
    <tr>
        <td  class="col-sm-2 col-form-label">Alamat</td>
        <td><input  class="form-control" id="floatingTextarea" type="text" name="alamat" value="<?php echo $Get['alamat']; ?>"></td>
    </tr>
    <tr>
        <td  class="col-sm-2 col-form-label">No Telepon</td>
        <td><input  class="form-control" id="floatingTextarea" type="text" name="id_telp" value="<?php echo $Get['id_telp']; ?>">
    </tr>
    <tr>
    <td  class="col-sm-2 col-form-label">Nominal SPP</td>
        <td >
            <select  class="form-control" id="floatingTextarea"  name="id_spp">

                <!-- Logic combo Get database -->
                <option value="<?php echo $Get['id_spp']; ?>">
                <?php
                    if($Get['id_spp']=="1"){
                        echo "300000";
                    } elseif ($Get['id_spp']=="2") {
                        echo "350000";
                    } elseif ($Get['id_spp']=="3") {
                        echo "700000";
                    } else {
                        echo "150000";
                    }
                ?>
                </option>
                <!-- Logic combo Get database -->
            
                <option value="1">300000</option>
                <option value="2">350000</option>
                <option value="3">700000</option>
                <option value="4">150000</option>
            </select>

        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
        <input type="submit" class="btn" style="background-color:#D4AC0D;" href=""main.php?menu=<?php echo base64_encode('siswa') ?> value="Kembali">
        <input type="submit" class="btn btn-info" name="proses" value="Perbarui">    
    </tr>
</table
</form>
  </div>
<?php
    endforeach;
?>