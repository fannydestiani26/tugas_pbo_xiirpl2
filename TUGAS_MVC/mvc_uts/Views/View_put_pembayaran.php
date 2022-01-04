<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_pembayaran.php';
// Membuat Object dari Class pembayaran
$pembayaran = new Controller_pembayaran();
$id_pembayaran = base64_decode ($_GET['id_pembayaran']);
$GetPembayaran = $pembayaran->GetData_Where($id_pembayaran);
?>



<?php
    foreach($GetPembayaran as $Get){
?>

<div class="card">
    <div class="card-header"> <h3 class="text-center">Memperbarui Data Pembayaran</h3></div>
<form action="../Config/Routes.php?function=put_pembayaran" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table class="table table-bordered table-striped">
        <input type="hidden" name="id_pembayaran" value="<?php echo $Get['id_pembayaran']; ?>">
    <tr>
    <td  class="col-sm-2 col-form-label">Nama Petugas</td>
    <td>
         <select class="form-control" id="floatingTextarea" name="id_petugas">
         <option value="<?php echo $Get['id_petugas']; ?>">
                    <?php
                        if($Get['id_petugas']=="1"){
                            echo "petugas 1";
                        } else if ($Get['id_petugas']=="2") {
                            echo "petugas 2";
                        } else {
                            echo "petugas 3";
                        }
                          
                    ?>
                </option>
                        <!-- Logic combo Get database -->                  
                        <option value="1">petugas 1</option>
                        <option value="2">petugas 2</option>
         </select>
    </td>
    </tr>

    <tr>
        <td  class="col-sm-2 col-form-label">Nama Siswa</td>
        <td><input type="hidden" name="nisn" value="<?php echo $Get['nisn']; ?>" readonly><input class="form-control" id="floatingTextarea" type="text" value="<?php echo $Get['nama']; ?>" readonly></td>
    </tr>

    <tr>
        <td  class="col-sm-2 col-form-label">Tanggal Bayar</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="tgl_bayar" value="<?php echo $Get['tgl_bayar']; ?>"></td>
    </tr>

    <tr>
        <td  class="col-sm-2 col-form-label">Bulan dibayar</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="bulan_dibayar" value="<?php echo $Get['bulan_dibayar']; ?>"></td>
    </tr>

    <tr>
        <td  class="col-sm-2 col-form-label">Tahun Bayar</td>
        <td><input class="form-control" id="floatingTextarea"  type="text" name="tahun_dibayar" value="<?php echo $Get['tahun_dibayar']; ?>"></td>
    </tr>

    <tr>
    <td  class="col-sm-2 col-form-label">ID Spp</td>
        <td>
            <select class="form-control" id="floatingTextarea" name="id_spp">

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
        <td  class="col-sm-2 col-form-label">Jumlah Bayar</td>
        <td><input class="form-control" id="floatingTextarea" type="text" name="jumlah_bayar" value="<?php echo $Get['jumlah_bayar'] ?>"></td>
    </tr>

    <tr>
        <td colspan="2" align="right">
        <input type="submit" class="btn" style="background-color:#D4AC0D;" href=""main.php?menu=<?php echo base64_encode('pembayaran') ?> value="Kembali">
        <input type="submit" class="btn btn-info" name="proses" value="Perbarui">   
        </td>
    </tr>
</table
</form>

<?php
    }
?>