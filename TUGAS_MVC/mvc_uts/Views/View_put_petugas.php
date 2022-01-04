<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_petugas.php';
// Membuat Object dari Class petugas
$petugas = new Controller_petugas();
$id_petugas = base64_decode ($_GET['id_petugas']);
$GetPetugas = $petugas->GetData_Where($id_petugas);
?>



<?php
    foreach($GetPetugas as $Get){
?>

<div class="card">
    <div class="card-header"> <h3 class="text-center">Memperbarui Data Petugas</h3></div>
<form action="../Config/Routes.php?function=put_petugas" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table  class="table table-bordered table-striped">
        <input type="hidden" name="id_petugas" value="<?php echo $Get['id_petugas']; ?>">
    <tr>
        <td class="col-sm-2 col-form-label">Username</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="username" value="<?php echo $Get['username']; ?>"></td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Password</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="password" value="<?php echo $Get['password']; ?>"></td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Nama Petugas</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="nama_petugas" value="<?php echo $Get['nama_petugas']; ?>"></td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Level</td>
        <td>
            <select class="form-control" id="floatingTextarea" name="level">

                <!-- Logic combo Get database -->
                <option value="<?php echo $Get['level']; ?>">
                <?php
                    if($Get['level']=="Administrator")
                    {
                        echo "Administrator";
                    }
                    else{
                        echo "Petugas";
                    }
                ?>
                </option>
                <!-- Logic combo Get database -->



                <option value="Admin">Administrator</option>
                <option value="Petugas">Petugas</option>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="2" align="right">
        <input type="submit" class="btn" style="background-color:#D4AC0D;" href=""main.php?menu=<?php echo base64_encode('spp') ?> value="Kembali">
        <input type="submit" class="btn btn-info" name="proses" value="Perbarui">  
        </td>
    </tr>
</table
</form>

<?php
    }
?>