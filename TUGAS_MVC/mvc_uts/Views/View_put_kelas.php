<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_kelas.php';
// Membuat Object dari Class kelas
$kelas = new Controller_kelas();
$id_kelas = base64_decode($_GET['id_kelas']);
$GetKelas = $kelas->GetData_Where($id_kelas);
?>



<?php
    foreach($GetKelas as $Get) {
?>

<div class="card">
    <div class="card-header"> <h3 class="text-center">Memperbarui Kelas</h3></div>
        <form action="../Config/Routes.php?function=put_kelas" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
        <table class="table table-bordered table-striped">
                <input type="hidden" name="id_kelas" value="<?php echo $Get['id_kelas']; ?>">
            <tr>
                <td class="col-sm-2 col-form-label">Nama Kelas</td>
                <td ><input class="form-control" id="floatingTextarea" type="text" name="nama_kelas" value="<?php echo $Get['nama_kelas']; ?>"></td>
            </tr>
            <tr>
                <td  class="col-sm-2 col-form-label">Kompetensi Keahlian</td>
                <td ><input class="form-control"  id="floatingTextarea" type="text" name="kompetensi_keahlian" value="<?php echo $Get['kompetensi_keahlian']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" class="btn" style="background-color:#D4AC0D;" href=""main.php?menu=<?php echo base64_encode('kelas') ?> value="Kembali">
                    <input type="submit" class="btn btn-info" name="proses" value="Perbarui">    
                </td>
            </tr>
        </table
        </form>
</div>
<?php
    }
?>