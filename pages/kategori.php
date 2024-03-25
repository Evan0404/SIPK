<div class="row">
    <div class="col-md-5 mb-3">
        <div class="card shadow p-2 pt-3">
            <h6 class="mb-2">Tambah Kategori (Uang Masuk dan Uang Keluar)</h6>
            <form method="post">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                    <input class="form-control" type="text" required  required name="nama_kategori" >
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Status</label>
                    <select name="status" class="form-control">
                        <option hidden value="Pilih Satatus">Pilih Satatus</option>
                        <option value="Uang Masuk">Uang Masuk</option>
                        <option value="Uang Keluar">Uang Keluar</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="tambah">Tambah</button>
            </form>
        </div>
    </div>
    <?php 
        if(isset($_POST['tambah'])){
            $con->query("INSERT INTO kategori (nama_kategori, status) VALUES ('$_POST[nama_kategori]', '$_POST[status]')");
            echo"
                <script>
                    alert('Berhasil Menambah Kategori');
                    document.location.href='index.php?hal=kategori';
                </script>
            ";
        }

        if(isset($_POST['ubah'])){
            $con->query("UPDATE kategori SET nama_kategori='$_POST[nama_kategori]', status='$_POST[status]' WHERE id_kategori='$_POST[id_kategori]'");
            echo"
                <script>
                    alert('Berhasil Merubah Kategori');
                    document.location.href='index.php?hal=kategori';
                </script>
            ";
        }

        if(isset($_GET['del'])){
            $con->query("DELETE FROM kategori WHERE id_kategori='$_GET[del]'");
            echo"
                <script>
                    alert('Berhasil Menghapus Kategori');
                    document.location.href='index.php?hal=kategori';
                </script>
            ";
        }  
    ?>
    <div class="col-md-7">
        <div class="card shadow p-2 pt-3">
            <h6 class="mb-2">Daftar Kategori (Uang Masuk dan Uang Keluar)</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            $getKategori = $con->query("SELECT * FROM kategori");
                            foreach($getKategori as $data){
                        ?>
                            <tr>
                                <td class="text-secondary text-xs font-weight-bold"><?= $no++?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['nama_kategori']?></td>
                                <td class="text-secondary text-xs font-weight-bold"><?= $data['status']?></td>
                                <td class="text-secondary text-xs font-weight-bold">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['id_kategori']?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-sm btn-success">Edit</button>
                                    <a href="index.php?hal=kategori&del=<?= $data['id_kategori']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ??')" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop<?= $data['id_kategori']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rubah Kategori <?= $data['nama_kategori']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                            <input class="form-control" value="<?= $data['nama_kategori']?>" type="text" required  required name="nama_kategori" >
                                            <input class="form-control" value="<?= $data['id_kategori']?>" type="text" hidden required name="id_kategori" >
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option selected value="<?= $data['status']?>"><?= $data['status']?></option>
                                                <option value="Uang Masuk">Uang Masuk</option>
                                                <option value="Uang Keluar">Uang Keluar</option>
                                            </select>
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
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>