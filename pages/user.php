<div class="row">
    <?php if(isset($_GET['add'])){?>
        <div class="card shadow p-2 pt-3 mb-3">
            <h6 class="mb-2">Tambah User</h6>
            <form method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Username</label>
                            <input class="form-control" type="text" name="username" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email</label>
                            <input class="form-control" type="email" name="email" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Password</label>
                            <input class="form-control" type="password" name="password" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor WA</label>
                            <input class="form-control" type="text" name="wa" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" type="text" name="alamat" >
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-primary w-50" name="tambah">Tambah</button>
                    </center>
                </div>
            </form>
            <?php 
                if(isset($_POST['tambah'])){
                    $con->query("INSERT INTO user (username, email, password, tgl_lahir, alamat, wa) VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]', '$_POST[tgl_lahir]', '$_POST[alamat]', '$_POST[wa]')");
                    echo "
                        <script>
                            alert('Berhasil Menambah User');
                            document.location.href='index.php?hal=user';
                        </script>
                    ";
                }
            ?>
        </div>
    <?php }?>
    <div class="card shadow p-2 pt-3">
        <h6 class="mb-2">Daftar User</h6>
        <a href="index.php?hal=user&add" style="max-width: 200px;" class="btn-sm btn btn-primary">[+] Tambah</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Lahir</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">WA</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_GET['del'])){
                            $con->query("DELETE FROM user WHERE id_user = '$_GET[del]'");
                            echo "
                                <script>
                                    alert('Berhasil Menghapus User');
                                    document.location.href='index.php?hal=user';
                                </script>
                            ";
                        }
                        $getUser = $con->query("SELECT * FROM user ORDER BY username ASC");
                        foreach($getUser as $data){
                    ?>
                        <tr>
                            <td class="text-secondary text-xs font-weight-bold"><?= $data['username']?></td>
                            <td class="text-secondary text-xs font-weight-bold"><?= $data['email']?></td>
                            <td class="text-secondary text-xs font-weight-bold"><?= $data['tgl_lahir']?></td>
                            <td class="text-secondary text-xs font-weight-bold"><?= $data['alamat']?></td>
                            <td class="text-secondary text-xs font-weight-bold"><?= $data['wa']?></td>
                            <td class="text-secondary text-xs font-weight-bold">
                                <a href="index.php?hal=user&del=<?= $data['id_user']?>" class="btn btn-sm btn-danger">  <i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>