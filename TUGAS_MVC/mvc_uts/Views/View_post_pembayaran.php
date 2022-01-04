<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
  include '../Controllers/Controller_pembayaran.php';
    // Membuat Object dari Class pembayaran
    $pembayaran = new Controller_pembayaran();
    $GetSpp = $pembayaran->GetData_Siswa();
    $GetSpp = $pembayaran->GetData_petugas();
    $GetSpp = $pembayaran->GetData_Spp();
    ?>

<div class="card">
<div class="card-header"> <h3 class="text-center">Membuat Data Pembayaran</h3></div>
<form action="../Config/Routes.php?function=create_pembayaran" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table class="table table-bordered table-striped">
        <input type="hidden" name="id_pembayaran">
        <tr>
            <td class="col-sm-2 col-form-label">ID Petugas</td>
            <td>
            <select class="form-control" id="floatingTextarea"  required name="id_petugas">
                <option value="">Pilih  Petugas</option>
                <?php         
                 foreach ($GetSpp as $GetS) : ?>
                    <?php if(isset($GetS['id_petugas']) && isset($GetS['nama_petugas'])): ?>
                        <option value="<?php echo $GetS['id_petugas']; ?>"><?php echo $GetS['nama_petugas']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            </td>
        </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Nama Siswa</td>
        <td>
        <select class="form-control" id="floatingTextarea"  required name="nisn">
                <option value="">Pilih Nama Siswa</option>
                <?php         
                 foreach ($GetSpp as $GetP) : ?>
                    <?php if(isset($GetP['nisn']) && isset($GetP['nama'])): ?>
                        <option value="<?php echo $GetP['nisn']; ?>"><?php echo $GetP['nama']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Tanggal Bayar</td>
        <td><input  class="form-control" id="floatingTextarea" required type="number" name="tgl_bayar"></td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Bulan Bayar</td>
        <td><input  class="form-control" id="floatingTextarea" required type="text" name="bulan_dibayar"  onkeypress="return event.charCode < 48 || event.charCode  >57"></td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Tahun Bayar</td>
        <td><input class="form-control" id="floatingTextarea" required type="number" name="tahun_dibayar"></td>
    </tr>

    <tr>
    <td class="col-sm-2 col-form-label">ID Spp</td>
        <td>
        <select class="form-control" id="floatingTextarea"  required name="id_spp">
                <option value="">Pilih Sesuai dengan nominal..</option>
                <?php         
                 foreach ($GetSpp as $GetA) : ?>
                    <?php if(isset($GetA['id_spp']) && isset($GetA['nominal'])): ?>
                        <option value="<?php echo $GetA['id_spp']; ?>"><?php echo $GetA['nominal']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>

    <tr>
        <td class="col-sm-2 col-form-label">Jumlah Bayar</td>
        <td><input class="form-control" id="floatingTextarea" required type="text" name="jumlah_bayar"></td>
    </tr>
    

    <tr>
        <td colspan="2" align="right">
        <input type="submit" class="btn btn-info" name="proses" value="Tambah">
        </td>
    </tr>
</table
</form>
