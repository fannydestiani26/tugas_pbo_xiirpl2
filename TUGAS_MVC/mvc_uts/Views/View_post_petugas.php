<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
    <div class="card">
    <div class="card-header"> <h3 class="text-center">Membuat Data Petugas</h3></div>
    <form action="../Config/Routes.php?function=create_petugas" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
    <table class="table table-bordered table-striped">
            <input type="hidden" name="id_petugas">
        <tr>
            <td class="col-sm-2 col-form-label">Username</td>
            <td><input class="form-control" id="floatingTextarea" required type="text" name="username"  onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
        </tr>

        <tr>
            <td class="col-sm-2 col-form-label">Password</td>
            <td><input class="form-control" id="floatingTextarea" required type="number" name="password"></td>
        </tr>

        <tr>
            <td class="col-sm-2 col-form-label">Nama Petugas</td>
            <td><input class="form-control" id="floatingTextarea" required type="text" name="nama_petugas"  onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
        </tr>
        
        <tr>
            <td class="col-sm-2 col-form-label">Pilih Level</td>
            <td>
            <select class="form-control" id="floatingTextarea" required name="level">
                    <option value="">Pilih</option>
                    <option value="Admin">Administrator</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
            <input type="submit" class="btn btn-info" name="proses" value="Tambah">
            </td>
        </tr>
</table>
    </form>
