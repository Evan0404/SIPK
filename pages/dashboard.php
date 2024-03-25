<?php
  $bulanIni = date('Y-m');
  // Penghitungan Bulan Ini
  $kasBulanIni=$con->query("SELECT SUM(jumlah) AS total FROM kas WHERE DATE_FORMAT(tgl_kas, '%Y-%m') = '$bulanIni'")->fetch_assoc();
  $uangMasukBulanIni=$con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Masuk' AND DATE_FORMAT(tgl, '%Y-%m')='$bulanIni'")->fetch_assoc();
  $uangKeluarBulanIni=$con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Keluar' AND DATE_FORMAT(tgl, '%Y-%m')='$bulanIni'")->fetch_assoc();

  // Penghitungan Semua 
  $kas=$con->query("SELECT SUM(jumlah) AS total FROM kas ")->fetch_assoc();
  $uangMasuk=$con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Masuk' ")->fetch_assoc();
  $uangKeluar=$con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Keluar' ")->fetch_assoc();

  // Daftar 12 Bulan
  $getKas=$con->query("SELECT *, DATE_FORMAT(tgl_kas, '%M %Y') as bulan, DATE_FORMAT(tgl_kas, '%m') as bulanNo, SUM(jumlah) as total FROM kas GROUP BY bulan ORDER BY bulanNo ASC LIMIT 12");
  $getMasuk=$con->query("SELECT *, DATE_FORMAT(tgl, '%M %Y') as bulan, SUM(jumlah) as total FROM masuk_keluar WHERE jenis= 'Masuk' GROUP BY bulan LIMIT 7  ");
  $getKeluar=$con->query("SELECT *, DATE_FORMAT(tgl, '%M %Y') as bulan, SUM(jumlah) as total FROM masuk_keluar WHERE jenis= 'Keluar' GROUP BY bulan LIMIT 7  ");
?>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-5 mb-2">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">
                Kas
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($kas['total'], 0, '', '.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle"
            >
              <i class="bi bi-cash-coin text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-5 mb-2">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">
                Masuk
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($uangMasuk['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle"
            >
              <i class="bi bi-cash-stack text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-5 mb-2">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">
                Keluar
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($uangKeluar['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle"
            >
              <i class="bi bi-database-fill-dash text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-5 mb-2">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">
                Saldo
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($kas['total']+$uangMasuk['total']-$uangKeluar['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle"
            >
              <i class="bi bi-wallet text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-4 mb-2">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">
                Kas Bulan Ini
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($kasBulanIni['total'], 0, '', '.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle"
            >
              <i class="bi bi-cash-coin text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-x-sm mb-0 text-uppercase font-weight-bold" style="font-size: x-small;">
                Masuk Bulan ini
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($uangMasukBulanIni['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle"
            >
              <i class="bi bi-cash-stack text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-x-sm mb-0 text-uppercase font-weight-bold" style="font-size: x-small;">
                Keluar Bulan ini
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($uangKeluarBulanIni['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle"
            >
              <i class="bi bi-database-fill-dash text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-x-sm mb-0 text-uppercase font-weight-bold" style="font-size: x-small;">
                Saldo Bulan ini
              </p>
              <h6 class="font-weight-bolder">Rp<?= number_format($kasBulanIni['total']+$uangMasukBulanIni['total']-$uangKeluarBulanIni['total'],0,'','.')?></h6>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle"
            >
              <i class="bi bi-wallet text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Saldo 12 Bulan Terakhir</h6>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas
            id="chart-line"
            class="chart-canvas"
            height="300"
          ></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Perbandingan Kas, Masuk, Keluar</h6>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas
            id="chart-pie"
            class="chart-canvas"
            height="300"
          ></canvas>
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="row mt-4">
  <div class="col-md-4 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">Kas 12 Bulan Terakhir</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($getKas as $data){?>
              <tr>
                <td class="text-secondary text-xs font-weight-bold"><?= $data['bulan']?></td>
                <td class="text-secondary text-xs font-weight-bold">Rp<?= number_format($data['total'], 0,'','.')?></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">Uang Masuk 12 Bulan Terakhir</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($getMasuk as $data){?>
              <tr>
                <td class="text-secondary text-xs font-weight-bold"><?= $data['bulan']?></td>
                <td class="text-secondary text-xs font-weight-bold">Rp<?= number_format($data['total'], 0,'','.')?></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">uang Keluar 12 Bulan Terakhir</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($getKeluar as $data){?>
              <tr>
                <td class="text-secondary text-xs font-weight-bold"><?= $data['bulan']?></td>
                <td class="text-secondary text-xs font-weight-bold">Rp<?= number_format($data['total'], 0,'','.')?></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<br>

