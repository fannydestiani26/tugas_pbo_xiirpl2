<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
<div class="card">
<div class="card-header"> <h3 class="text-center">Membuat Data SPP</h3></div>
    <form action="../Config/Routes.php?function=create_spp" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
    <table class="table table-bordered table-striped">
            <input required type="hidden" name="id_spp">
        <tr>
            <td class="col-sm-2 col-form-label">Tahun</td>
            <td><input  class="form-control" id="floatingTextarea" required type="number" name="tahun"></td>
        </tr>
        <tr>
            <td class="col-sm-2 col-form-label">Nominal</td>
            <td><input  class="form-control" id="floatingTextarea" required type="number" name="nominal"></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" class="btn btn-info" name="proses" value="Tambah"></td>
        </tr>
    </table
    </form>
</div>
