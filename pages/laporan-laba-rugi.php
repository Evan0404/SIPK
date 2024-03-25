<div class="row">
    <div class="card shadow p-2 pt-3">
        <form method="post">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="">Hingga Tanggal</label>
                    <input type="date" name="hingga" class="form-control">
                </div>
                <div class="col-md-4 mb-2">
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" name="src">Show</button>
                        </div>
                        <div class="col-9">
                            <button class="btn btn-primary" name="srcAll">Show All</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php 
            if(isset($_POST['src'])){
            $totalMasuk = 0;
            $totalKeluar = 0;
            $kas = $con->query("SELECT SUM(jumlah) as total FROM kas WHERE tgl_kas >= '$_POST[dari]' and tgl_kas <= '$_POST[hingga]' ")->fetch_assoc();
            $masuk = $con->query("SELECT *,SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Masuk' AND tgl >= '$_POST[dari]' and tgl <= '$_POST[hingga]' GROUP BY judul");
            $keluar = $con->query("SELECT *,SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Keluar' AND tgl >= '$_POST[dari]' AND tgl <= '$_POST[hingga]' GROUP BY judul");
        ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Pendapatan</th>
                            <th>Beban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kas</td>
                            <td>Rp <?= number_format($kas['total'],0,'','.')?>,00</td>
                            <td></td>
                        </tr>
                        <?php foreach($masuk as $data){?>
                            <?php $totalMasuk  += $data['total']?>
                            <tr>
                                <td><?= $data['judul']?></td>
                                <td>Rp <?= number_format($data['total'],0,'','.')?>,00</td>
                                <td></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>Rp <?= number_format($totalMasuk+$kas['total'],0,'','.')?>,00</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php foreach($keluar as $data){?>
                            <?php $totalKeluar  += $data['total']?>
                            <tr>
                                <td><?= $data['judul']?></td>
                                <td></td>
                                <td>Rp <?= number_format($data['total'],0,'','.')?>,00</td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td><b>Total</b></td>
                            <td></td>
                            <td><b>Rp <?= number_format($totalKeluar,0,'','.')?>,00</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php 
        }elseif (isset($_POST['srcAll'])){
            $totalMasuk = 0;
            $totalKeluar = 0;
            $kas = $con->query("SELECT SUM(jumlah) as total FROM kas ")->fetch_assoc();
            $masuk = $con->query("SELECT *,SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Masuk' GROUP BY judul");
            $keluar = $con->query("SELECT *,SUM(jumlah) as total FROM masuk_keluar WHERE jenis = 'Keluar' GROUP BY judul");            
        ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Pendapatan</th>
                            <th>Beban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kas</td>
                            <td>Rp <?= number_format($kas['total'],0,'','.')?>,00</td>
                            <td></td>
                        </tr>
                        <?php foreach($masuk as $data){?>
                            <?php $totalMasuk  += $data['total']?>
                            <tr>
                                <td><?= $data['judul']?></td>
                                <td>Rp <?= number_format($data['total'],0,'','.')?>,00</td>
                                <td></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>Rp <?= number_format($totalMasuk+$kas['total'],0,'','.')?>,00</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php foreach($keluar as $data){?>
                            <?php $totalKeluar  += $data['total']?>
                            <tr>
                                <td><?= $data['judul']?></td>
                                <td></td>
                                <td>Rp <?= number_format($data['total'],0,'','.')?>,00</td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td><b>Total</b></td>
                            <td></td>
                            <td><b>Rp <?= number_format($totalKeluar,0,'','.')?>,00</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php }?>
    </div>
</div>