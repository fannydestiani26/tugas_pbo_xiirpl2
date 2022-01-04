<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
<form action="../Config/Routes.php?function=create_petugas" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <td><input type="hidden" name="id_petugas"></td>
    <tr>
        <td>Username</td>
        <td><input required type="text" name="username"  onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
    </tr>

    <tr>
        <td>Password</td>
        <td><input required type="number" name="password"></td>
    </tr>

    <tr>
        <td>Nama Petugas</td>
        <td><input required type="text" name="nama_petugas"  onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
    </tr>
    
    <tr>
        <td>Pilih Level</td>
        <td>
        <select required name="level">
                <option value="Administrator">Administrator</option>
                <option value="Petugas">Petugas</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
