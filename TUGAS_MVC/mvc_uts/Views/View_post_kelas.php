<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
    <div class="card">
    <div class="card-header"> <h3 class="text-center">Membuat Kelas Baru</h3></div>
    <form action="../Config/Routes.php?function=create_kelas" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
    <table  class="table table-bordered table-striped">
            <input type="hidden" name="id_kelas">
        <tr>
            <td class="col-sm-2 col-form-label">Nama Kelas</td>
            <td><input class="form-control" id="floatingTextarea" placeholder="Example : XII RPL 1" required type="text" name="nama_kelas"></td>
        </tr>
        <tr>
            <td class="col-sm-2 col-form-label">Kompetensi Keahlian</td>
            <td><input class="form-control" id="floatingTextarea" required type="text" name="kompetensi_keahlian" onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                 <input type="submit" class="btn btn-info" name="proses" value="Tambah">
            </td>
        </tr>
    </table
    </form>
</div>
