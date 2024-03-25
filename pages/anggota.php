<div class="row">
    <div class="col-md-12">
        <div class="card shadow p-2 pt-3">
            <button class="btn btn-sm btn-primary" style="max-width: 200px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">[+] Tambah</button>
            <!-- Modal Tambah -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Anggota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama Anggota</label>
                            <input class="form-control" type="text" name="nama_anggota" placeholder="Jika Kosong, ganti dengan '-'">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIM Anggota</label>
                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" name="nim_anggota" >
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Kelas Anggota</label>
                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" name="kelas_anggota" >
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor WA</label>
                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" name="wa" >
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <textarea placeholder="Jika Kosong, ganti dengan '-'" name="alamat_anggota" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php 
                if(isset($_POST['tambah'])){
                    $con->query("INSERT INTO anggota (nama_anggota, nim_anggota, kelas_anggota, wa, alamat_anggota) VALUES ('$_POST[nama_anggota]', '$_POST[nim_anggota]', '$_POST[kelas_anggota]', '$_POST[wa]', '$_POST[alamat_anggota]')");
                    echo"
                        <script>
                            alert('Berhasil Menambah Anggota');
                            document.location.href='index.php?hal=anggota';
                        </script>
                    ";
                }

                if(isset($_POST['ubah'])){
                    $con->query("UPDATE anggota SET nama_anggota='$_POST[nama_anggota]', nim_anggota='$_POST[nim_anggota]', kelas_anggota='$_POST[kelas_anggota]', wa='$_POST[wa]', alamat_anggota='$_POST[alamat_anggota]' WHERE id_anggota = '$_POST[id_anggota]'");
                    echo"
                        <script>
                            alert('Berhasil Mengubah Anggota');
                            document.location.href='index.php?hal=anggota';
                        </script>
                    ";
                }
                
                if(isset($_GET['del'])){
                    $con->query("DELETE FROM anggota WHERE id_anggota = '$_GET[del]'");
                    echo"
                        <script>
                            alert('Berhasil Menghapus Anggota');
                            document.location.href='index.php?hal=anggota';
                        </script>
                    ";
                }


            ?>
            <h6 class="mb-2">Daftar Anggota HMJ-Akuntansi</h6>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No WA</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            $getAnggota = $con->query("SELECT * FROM anggota ORDER BY nama_anggota ASC");
                            foreach($getAnggota as $data){
                        ?>
                            <tr>
                                <td class="text-secondary text-xs font-weight-bold"><?= $no++ ?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['nama_anggota']?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['kelas_anggota']?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['nim_anggota']?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['wa']?></td>
                                <td class="text-secondary text-xs font-weight-bold">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_anggota']?>"><i class="bi bi-pencil-square"></i></button>
                                    <a href="index.php?hal=anggota&del=<?= $data['id_anggota']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal Tambah -->
                            <div class="modal fade" id="edit<?= $data['id_anggota']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah <?= $data['nama_anggota']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Anggota</label>
                                            <input class="form-control" type="text" value="<?= $data['id_anggota']?>" hidden name="id_anggota" placeholder="Jika Kosong, ganti dengan '-'">
                                            <input class="form-control" type="text" value="<?= $data['nama_anggota']?>" name="nama_anggota" placeholder="Jika Kosong, ganti dengan '-'">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">NIM Anggota</label>
                                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" value="<?= $data['nim_anggota']?>" name="nim_anggota" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kelas Anggota</label>
                                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" value="<?= $data['kelas_anggota']?>" name="kelas_anggota" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor WA</label>
                                            <input class="form-control" type="text" placeholder="Jika Kosong, ganti dengan '-'" value="<?= $data['wa']?>" name="wa" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea placeholder="Jika Kosong, ganti dengan '-'" name="alamat_anggota" class="form-control"><?= $data['alamat_anggota']?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button name="ubah" type="submit" class="btn btn-primary">Ubah</button>
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
            order: [[0, 'asc']]
        });
        $('#select').select2();
    } );

</script>