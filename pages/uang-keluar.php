<div class="row">
    <div class="col-md-7 mb-3">
        <div class="card shadow w-100 p-2 pt-3" id="add">
            <h6 class="mb-2">Tambah Uang Keluar</h6>
            <form method="post">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Judul Pemasukan</label>
                    <input class="form-control" type="text" name="judul" >
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kategori</label>
                    <select name="kategori" id="select" class="form-control">
                        <option hidden>Pilih Kategori</option>
                        <?php
                            $getKategori=$con->query("SELECT * FROM kategori WHERE status = 'Uang Keluar'");
                            foreach($getKategori as $dataK){
                        ?>
                            <option value="<?= $dataK['id_kategori']?>"><?= $dataK['nama_kategori']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Jumlah (Senilai)</label>
                    <input class="form-control" type="number" name="jumlah" >
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal</label>
                    <input class="form-control" type="date" name="tgl" value="<?= date("Y-m-d")?>">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                    <textarea name="keterangan" id="" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" name="tambah">Tambah</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['tambah'])){
            $con->query("INSERT INTO masuk_keluar (judul, kategori, jumlah, tgl, keterangan, user_id, jenis) VALUES ('$_POST[judul]', '$_POST[kategori]', '$_POST[jumlah]', '$_POST[tgl]', '$_POST[keterangan]', '1', 'Keluar')");
            echo"
                <script>
                    alert('Berhasil Menambah Uang Keluar');
                    document.location.href='index.php?hal=uang-keluar';
                </script>
            ";
        }
        
        if(isset($_POST['ubah'])){
            $con->query("UPDATE masuk_keluar SET judul='$_POST[judul]', kategori='$_POST[kategori]', jumlah='$_POST[jumlah]', tgl='$_POST[tgl]', keterangan='$_POST[keterangan]' WHERE id_masuk_keluar = '$_POST[id_masuk_keluar]'");
            echo"
                <script>
                    alert('Berhasil Mengubah Uang Keluar');
                    document.location.href='index.php?hal=uang-keluar';
                </script>
            ";
        }
        
        if(isset($_GET['del'])){
            $con->query("DELETE FROM masuk_keluar WHERE id_masuk_keluar = '$_GET[del]'");
            echo"
                <script>
                    alert('Berhasil Menghapus Uang Keluar');
                    document.location.href='index.php?hal=uang-keluar';
                </script>
            ";
        }
    ?>
    <div class="col-md-5">
        <div class="card shadow w-100 p-2 pt-3 h-100 " style="max-height:100%; overflow-y: scroll;">
            <h6 class="mb-2">Daftar Uang Keluar</h6>
            <?php
                $totalMasuk = $con->query("SELECT SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Masuk'")->fetch_assoc();
                $totalKeluar = $con->query("SELECT SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Keluar'")->fetch_assoc();
                if($totalMasuk['total'] > $totalKeluar['total']){
                    $alertC ='success';
                }else{
                    $alertC ='danger';
                }
            ?>
            <div class="alert alert-<?= $alertC?> text-light" role="alert">
                <p class="m-0" align="left">
                    <b>Rp <?= number_format($totalKeluar['total'],0,'','.')?></b>
                </p>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $getMasuk = $con->query("SELECT * FROM masuk_keluar WHERE jenis = 'Keluar' ORDER BY tgl DESC");
                            foreach($getMasuk as $data){
                        ?>
                            <tr>
                                <td class="align-middle"><span class="text-secondary text-xs font-weight-bold"><?= $data['tgl']?></span></td>
                                <td class="align-middle"><span class="text-secondary text-xs font-weight-bold"><?= $data['judul']?></span></td>
                                <td class="align-middle"><span class="text-secondary text-xs font-weight-bold"><?= number_format($data['jumlah'], 0, '','.')?></span></td>
                                <td class="align-middle">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button  class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['id_masuk_keluar']?>"><center><i class="bi bi-pencil-square"></center></i></button>
                                            <a href="index.php?hal=uang-masuk&del=<?= $data['id_masuk_keluar']?>" onclick="return confirm('Data yang dihapus tidak dapat kembali, apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger btn-sm"><center><i class="bi bi-trash"></center></i></a>
                                        </div>
                                    </span>
                                </td>        
                            </tr>
                            <!-- Modal Ubah -->
                            <div class="modal fade" id="staticBackdrop<?= $data['id_masuk_keluar']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Uang Masuk <?= $data['judul']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="post">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Judul Pemasukan</label>
                                            <input class="form-control" value="<?= $data['judul']?>" type="text" name="judul" >
                                            <input hidden class="form-control" value="<?= $data['id_masuk_keluar']?>" type="text" name="id_masuk_keluar" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kategori</label>
                                            <select name="kategori" id="select" class="form-control">
                                                <?php $getNameK = $con->query("SELECT * FROM kategori WHERE id_kategori = '$data[kategori]'")->fetch_assoc();?>
                                                <option selected value="<?= $data['kategori']?>"><?= $getNameK['nama_kategori']?></option>
                                                <?php
                                                    foreach($getKategori as $dataK2){
                                                ?>
                                                    <option value="<?= $dataK2['id_kategori']?>"><?= $dataK2['nama_kategori']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jumlah</label>
                                            <input class="form-control" value="<?= $data['jumlah']?>" type="number" name="jumlah" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal</label>
                                            <input class="form-control" value="<?= $data['tgl']?>" type="date" name="tgl">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Keterangan</label>
                                            <textarea name="keterangan" id="" class="form-control"><?= $data['keterangan']?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="ubah" class="btn btn-success">Simpan</button>
                                        </div>
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'excel'
            ],
            order: [[0, 'desc']]
        });
        $('#select').select2();
    } );

</script>
