<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
<form action="../Config/Routes.php?function=create_spp" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <td><input required type="hidden" name="id_spp"></td>
    <tr>
        <td>Tahun</td>
        <td><input required type="number" name="tahun"></td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td><input required type="number" name="nominal"></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
