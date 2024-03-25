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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php if(!isset($_GET['anggota'])){?>
    <script>
        $(document).ready(function() {
            $('#nama_anggota').select2();
        });
    </script>
    <div class="row">
        <div class="col-md-6 h-100 mb-3">
            <div class="card p-2 h-100 pt-3 shadow-lg" style="height: 500px;">
                <h6 class="mb-2">Form Kas</h6>
                <form method="post">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Kas</label>
                        <input class="form-control" type="date" required value="<?= date('Y-m-d')?>" placeholder="Jika Kosong, ganti dengan '-'" name="tgl_kas" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Anggota</label><br>
                        <select name="anggota_id" required id="nama_anggota" class="w-100">
                            <option hidden>Piliha Anggota</option>
                            <?php 
                                $getAnggota = $con->query("SELECT * FROM anggota ORDER BY nama_anggota ASC");
                                foreach($getAnggota as $data){
                            ?>
                                <option value="<?= $data['id_anggota']?>"><?= $data['nama_anggota']?> - <?= $data['nim_anggota']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah (Senilai)</label>
                        <input class="form-control" required type="number" placeholder="Jika Kosong, ganti dengan '-'" name="jumlah" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Keterangan</label>
                        <textarea name="keterangan_kas" class="form-control" placeholder="Jika Kosong, ganti dengan '-'"></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary w-100" name="bayar">Bayar</button>
                </form>
                <?php 
                    if(isset($_POST['bayar'])){
                        $con->query("INSERT INTO kas (anggota_id, jumlah, tgl_kas, keterangan_kas) VALUES ('$_POST[anggota_id]', '$_POST[jumlah]', '$_POST[tgl_kas]', '$_POST[keterangan_kas]')");
                        echo"
                            <script>
                                alert('Berhasil Melakukan Pembayaran');
                                document.location.href='index.php?hal=kas';
                            </script>
                        ";
                    }
                    
                    if(isset($_POST['ubah'])){
                        $con->query("UPDATE kas SET tgl_kas='$_POST[tgl_kas]', jumlah='$_POST[jumlah]', keterangan_kas='$_POST[keterangan_kas]' WHERE id_kas = '$_POST[id_kas]'");
                        echo"
                            <script>
                                alert('Berhasil Merubah Pembayaran');
                                document.location.href='index.php?hal=kas';
                            </script>
                        ";
                    }
                    
                    if(isset($_GET['delKas'])){
                        $con->query("DELETE FROM kas WHERE id_kas = '$_GET[delKas]'");
                        echo"
                            <script>
                                alert('Berhasil Menghapus Pembayaran');
                                document.location.href='index.php?hal=kas';
                            </script>
                        ";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-6 h-100 mb-3">
            <div class="card p-2 h-100 pt-3 shadow-lg" style="max-height: 500px;">
                <h6 class="mb-2">Daftar Kas Anggota Bulan Ini</h6>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($getAnggota as $data) {
                            ?>
                                <tr>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['nama_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['kelas_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['nim_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold">
                                        <?php
                                            $bulanIni = date('m-Y');
                                            $status = $con->query("SELECT *, COUNT(*) as jumlah FROM kas WHERE anggota_id = '$data[id_anggota]' AND DATE_FORMAT(tgl_kas, '%m-%Y')  = '$bulanIni'")->fetch_assoc();
                                            if($status['jumlah'] != 0){
                                                $class = 'success';
                                                $text_class = 'Selesai';
                                            }else{
                                                $text_class = 'Belum';
                                                $class = 'secondary';
                                            }
                                        ?>
                                        <span class="badge badge-sm bg-gradient-<?= $class?>"><?= $text_class?></span>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card p-2 pt-3 shadow-lg">
                <h6 class="mb-2">Riwayat Kas Anggota 6 Bulan Terakhir</h6>
                <div class="table-responsive">
                    <table class="table" id="myTableRiwayat">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Riwayat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($getAnggota as $data) {
                            ?>
                                <tr>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['nama_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['kelas_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold"><?= $data['nim_anggota']?></td>
                                    <td class="text-secondary text-xs font-weight-bold">
                                        <div style="max-height: 150px;" class="table-responsive">
                                            <table class="table" id="myTable<?= $data['id_anggota']?>">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $getKas = $con->query("SELECT * FROM kas WHERE anggota_id = '$data[id_anggota]' ORDER BY tgl_kas DESC LIMIT 6");
                                                        foreach ($getKas as $dataKas) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-secondary text-xs font-weight-bold"><?= $dataKas['tgl_kas']?></td>
                                                            <td class="text-secondary text-xs font-weight-bold"><?= $dataKas['jumlah']?></td>
                                                            <td class="text-secondary text-xs font-weight-bold"><?= $dataKas['keterangan_kas']?></td>
                                                            <td class="text-secondary text-xs font-weight-bold">
                                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editKas<?= $dataKas['id_kas']?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                                <a href="index.php?hal=kas&delKas=<?= $dataKas['id_kas']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editKas<?= $dataKas['id_kas']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h4 class="modal-title fs-5" id="staticBackdropLabel">Edit Kas <?= $data['nama_anggota']?></h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Tanggal Kas</label>
                                                                        <input class="form-control" type="date" required value="<?= $dataKas['tgl_kas']?>" placeholder="Jika Kosong, ganti dengan '-'" name="tgl_kas" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Jumlah (Senilai)</label>
                                                                        <input class="form-control" type="number" value="<?= $dataKas['jumlah']?>" placeholder="Jika Kosong, ganti dengan '-'" name="jumlah" >
                                                                        <input hidden class="form-control" value="<?= $dataKas['id_kas']?>" type="text" placeholder="Jika Kosong, ganti dengan '-'" name="id_kas" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Keterangan</label>
                                                                        <textarea name="keterangan_kas" class="form-control" placeholder="Jika Kosong, ganti dengan '-'"><?= $dataKas['keterangan_kas']?></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      <button name="ubah" class="btn btn-success">Ubah</button>
                                                                    </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="index.php?hal=kas&anggota=<?= $data['id_anggota']?>" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-eye"></i> Semua</a>
                                    </td>
                                </tr>
                                <script>
                                    $(document).ready( function () {
                                        $('#myTable<?= $data['id_anggota']?>').DataTable({
                                            dom: 'lBfrtip',
                                            buttons: [
                                                'excel'
                                            ],
                                            order: [[0, 'desc']]
                                        });
                                    } );
                                
                                </script>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel'
                ],
                order: [[3, 'asc']]
            });
            $('#myTableRiwayat').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel'
                ],
                order: [[0, 'asc']]
            });
        } );
    
    </script>
<?php }else{?>
    <?php 
        $anggota = $con->query("SELECT * FROM anggota WHERE id_anggota = '$_GET[anggota]'")->fetch_assoc();    
        $kas = $con->query("SELECT SUM(jumlah) as total FROM kas WHERE anggota_id = '$_GET[anggota]'")->fetch_assoc();
        if(isset($_POST['ubah'])){
            $con->query("UPDATE kas SET tgl_kas='$_POST[tgl_kas]', jumlah='$_POST[jumlah]', keterangan_kas='$_POST[keterangan_kas]' WHERE id_kas = '$_POST[id_kas]'");
            echo"
                <script>
                    alert('Berhasil Merubah Pembayaran');
                    document.location.href='index.php?hal=kas&anggota=$_GET[anggota]';
                </script>
            ";
        }
        
        if(isset($_GET['delKas'])){
            $con->query("DELETE FROM kas WHERE id_kas = '$_GET[delKas]'");
            echo"
                <script>
                    alert('Berhasil Menghapus Pembayaran');
                    document.location.href='index.php?hal=kas&anggota=$_GET[anggota]';
                </script>
            ";
        }    
    ?>
    <div class="row">
        <div class="card shadow p-2 pt-3">
            <a href="index.php?hal=kas" class="btn btn-sm btn-dark" style="max-width: 150px;"><i class="bi bi-arrow-left-circle" ></i> Kembali</a>
            <h6 class="mb-2">Riwayat Kas <?= $anggota['nama_anggota']?></h6>
            <div class="alert alert-success text-light" style="max-width: 400px; height: 50px; padding: 10px;" role="alert">
                <b>Total : Rp <?= number_format($kas['total'],0,'','.')?></b>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $getKas = $con->query("SELECT * FROM kas WHERE anggota_id = '$anggota[id_anggota]' ORDER BY tgl_kas DESC LIMIT 6");
                            foreach ($getKas as $dataKas) {
                        ?>
                            <tr>
                                <td class="text-secondary text-xs font-weight-bold"><?= $dataKas['tgl_kas']?></td>
                                <td class="text-secondary text-xs font-weight-bold">Rp <?= number_format($dataKas['jumlah'],0,'','.')?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $dataKas['keterangan_kas']?></td>
                                <td class="text-secondary text-xs font-weight-bold">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editKas<?= $dataKas['id_kas']?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button>
                                    <a href="index.php?hal=kas&anggota=<?= $_GET['anggota']?>&delKas=<?= $dataKas['id_kas']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editKas<?= $dataKas['id_kas']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="staticBackdropLabel">Edit Kas <?= $anggota['nama_anggota']?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal Kas</label>
                                            <input class="form-control" type="date" required value="<?= $dataKas['tgl_kas']?>" placeholder="Jika Kosong, ganti dengan '-'" name="tgl_kas" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jumlah (Senilai)</label>
                                            <input class="form-control" type="number" value="<?= $dataKas['jumlah']?>" placeholder="Jika Kosong, ganti dengan '-'" name="jumlah" >
                                            <input hidden class="form-control" value="<?= $dataKas['id_kas']?>" type="text" placeholder="Jika Kosong, ganti dengan '-'" name="id_kas" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Keterangan</label>
                                            <textarea name="keterangan_kas" class="form-control" placeholder="Jika Kosong, ganti dengan '-'"><?= $dataKas['keterangan_kas']?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button name="ubah" class="btn btn-success">Ubah</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel'
                ],
                order: [[0, 'desc']]
            });
        } );
    
    </script>
<?php }?>