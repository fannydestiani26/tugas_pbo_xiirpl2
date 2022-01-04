<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
  include '../Controllers/Controller_pembayaran.php';
    // Membuat Object dari Class pembayaran
    $pembayaran = new Controller_pembayaran();
    $GetSpp = $pembayaran->GetData_Siswa();
    ?>


<form action="../Config/Routes.php?function=create_pembayaran" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <td><input type="hidden" name="id_pembayaran"></td>
        <tr>
            <td>ID Petugas</td>
            <td>
                <select name="id_petugas">
                    <option value="">Pilih Petugas</option>
                    <option value="1">petugas 1</option>
                    <option value="2">petugas 2</option>
                </select>
            </td>
        </tr>

    <tr>
        <td>Nama Siswa</td>
        <td>
        <select name="nisn">
                <option value="">Pilih Nama Siswa</option>
                <?php         
                 foreach ($GetSpp as $GetP) : ?>
                    <option value="<?php echo $GetP['nisn']; ?>"><?php echo $GetP['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>Tanggal Bayar</td>
        <td><input type="text" name="tgl_bayar"></td>
    </tr>

    <tr>
        <td>Bulan Bayar</td>
        <td><input type="text" name="bulan_dibayar"></td>
    </tr>

    <tr>
        <td>Tahun Bayar</td>
        <td><input type="text" name="tahun_dibayar"></td>
    </tr>

    <tr>
    <td>ID Spp</td>
        <td>
            <select required name="id_spp">
                <option value="">Pilih Nominal SPP</option>
                <option value="1">300000</option>
                <option value="2">350000</option>
                <option value="3">700000</option>
                <option value="4">150000</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Jumlah Bayar</td>
        <td><input type="text" name="jumlah_bayar"></td>
    </tr>
    

    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
