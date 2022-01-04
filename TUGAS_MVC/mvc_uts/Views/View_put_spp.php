<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_spp.php';
// Membuat Object dari Class spp
$spp = new Controller_spp();
$id_spp = base64_decode ($_GET['id_spp']);
$GetSpp = $spp->GetData_Where($id_spp);
?>



<?php
    foreach($GetSpp as $Get){
?>

<div class="card">
    <div class="card-header"> <h3 class="text-center">Memperbarui Data SPP</h3></div>
        <form action="../Config/Routes.php?function=put_spp" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
        <table class="table table-bordered table-striped">
                <input type="hidden" name="id_spp" value="<?php echo $Get['id_spp']; ?>">
            <tr>
                <td class="col-sm-2 col-form-label">Tahun</td>
                <td><input class="form-control"  id="floatingTextarea" type="text" name="tahun" value="<?php echo $Get['tahun']; ?>"></td>
            </tr>
            <tr>
                <td class="col-sm-2 col-form-label">Nominal</td>
                <td><input class="form-control"  id="floatingTextarea" type="text" name="nominal" value="<?php echo $Get['nominal']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" class="btn" style="background-color:#D4AC0D;" href=""main.php?menu=<?php echo base64_encode('spp') ?> value="Kembali">
                    <input type="submit" class="btn btn-info" name="proses" value="Perbarui">    
                </td>
            </tr>
        </table
        </form>
    </div>
<?php
    }
?>