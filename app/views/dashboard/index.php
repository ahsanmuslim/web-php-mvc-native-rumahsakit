<?php 
$countDokter = count($data['dokter']);
$countPasien = count($data['pasien']);
$countMedis = count($data['medis']);
$countPoli = count($data['poli']);

//script untuk menampikan data dari DBase
foreach ( $data['grafik_poli'] as $pol ):
  $poli[] = $pol['nama_poli'];
  $total1[] = $pol['jml_pasien'];
endforeach;


foreach ( $data['grafik_dokter'] as $dok ):
  $dokter[] = $dok['nama_dokter'];
  $total2[] = $dok['jml_pasien'];
endforeach;

foreach ( $data['grafik_harian'] as $trend ):
  $tanggal[] = date('d F Y',strtotime($trend['tgl_periksa']));
  $total3[] = $trend['total'];
endforeach;

foreach ( $data['grafik_user'] as $usr ):
  $user[] = $usr['nama_user'];
  $jmltransaksi[] = $usr['transaksi'];
endforeach;

foreach ( $data['grafik_obat'] as $obt ):
  $obat[] = $obt['nama_obat'];
  $stok[] = $obt['stok'];
endforeach;

?>

<style type="text/css">
  
.posisi[prosentase-grafik] {
    position: absolute;
    top: 110px;
    left: 240px;
}


.content[prosentase-grafik] {
    color: #A3A3A3;
    font-size: 45px;
    font-weight: bold;
    font-family: Calibri, Helvetica, sans-serif;
}
  
</style>

<!-- Header Dashboard -->
<div class="row">
  <div class="col-lg-12">
    <h1>Dashboard <small>Statistics Overview</small></h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-tachometer-alt"></i> Dashboard</li>
    </ol>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
    </div>
  </div>
</div><!-- /.row -->

<!-- Informasi jumlah dokter, pasien, poli & rekam medis -->
<div class="row">
  <div class="col-lg-3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-hospital fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
            <p class="announcement-heading"><strong><?= $countPoli; ?></strong></p>
            <p class="announcement-text"><strong>Total Poliklinik</strong></p>
          </div>
        </div>
      </div>
      <a href="<?= BASEURL; ?>/poli">
        <div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-8">
              Lihat Poliklinik
            </div>
            <div class="col-xs-4 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-8">
            <i class="fa fa-stethoscope fa-5x"></i>
          </div>
          <div class="col-xs-4 text-right">
            <p class="announcement-heading"><strong><?= $countDokter; ?></strong></p>
            <p class="announcement-text"><strong>Total Dokter</strong></p>
          </div>
        </div>
      </div>
      <a href="<?= BASEURL; ?>/dokter">
        <div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-8">
              Lihat Dokter
            </div>
            <div class="col-xs-4 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-8">
            <i class="fa fa-bed fa-5x"></i>
          </div>
          <div class="col-xs-4 text-right">
            <p class="announcement-heading"><strong><?= $countPasien; ?></strong></p>
            <p class="announcement-text"><strong>Total Pasien</strong></p>
          </div>
        </div>
      </div>
      <a href="<?= BASEURL; ?>/pasien">
        <div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-8">
              Lihat Pasien
            </div>
            <div class="col-xs-4 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-8">
            <i class="fa fa-file-medical fa-5x"></i>
          </div>
          <div class="col-xs-4 text-right">
            <p class="announcement-heading"><strong><?= $countMedis; ?></strong></p>
            <p class="announcement-text"><strong>Rekam Medis</strong></p>
          </div>
        </div>
      </div>
      <a href="<?= BASEURL; ?>/medis">
        <div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-8">
              Lihat Rekam Medis
            </div>
            <div class="col-xs-4 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div><!-- /.row -->


<br>
<!-- Content untuk grafik kunjungan pasien based on Poli-->
<div class="row">

      <div class="col-lg-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-chart-pie"></i> Grafik pasien berdasarkan Poliklinik</h4>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
              
            <div style="width:auto">
                <canvas id="poliChart"></canvas>
            </div>
            
            <!-- Floating label -->
            <div prosentase-grafik="" class="content posisi"><?= $countMedis; ?></div>

            <script>
            var ctx = document.getElementById('poliChart').getContext('2d');
            var poliChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode($poli); ?>,
                    // labels: ["TI-1 Terbina","Blm Terbina"],
                    datasets: [{
                        label: 'Jml Pasien',
                        data: <?= json_encode($total1); ?>,
                        // data: ["85","15"],
                        backgroundColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                      position: 'bottom',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            display: false
                        }]
                    }
                }
            });

            </script>

            </div>
          </div>
        </div>
      </div>

    <!-- Content untuk grafik kunjungan pasien based on Dokter-->
      <div class="col-lg-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-chart-bar"></i> Grafik pasien berdasarkan Dokter</h4>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
              
            <div style="width:auto">
                <canvas id="dokterChart"></canvas>
            </div>


            <script>
            var ctx = document.getElementById('dokterChart').getContext('2d');
            var dokterChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($dokter); ?>,
                    datasets: [{
                        label: 'Jml Pasien',
                        data: <?= json_encode($total2); ?>,
                        backgroundColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                  legend: {
                      position: 'bottom',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            display: false
                        }]
                    }
                }
            });

            </script>

            </div>
          </div>
        </div>
      </div>

</div>


<br>
<!-- Content untuk grafik kunjungan pasien berdasarkan trend harian / bulanan-->
<div class="row">

      <div class="col-lg-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-chart-line"></i> Trend kunjungan pasien berdasarkan per hari</h4>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
              
            <div style="height: auto">
                <canvas id="trendChart"></canvas>
            </div>

            <script>
            var ctx = document.getElementById('trendChart').getContext('2d');
            var trendChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($tanggal); ?>,
                    datasets: [{
                        label: 'Pasien',
                        data: <?= json_encode($total3); ?>,
                        backgroundColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>

            </div>
          </div>
        </div>
      </div>

</div>

<br>
<!-- Content untuk grafik Stock Obat-->
<div class="row">

      <div class="col-lg-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-chart-bar"></i> Grafik stok obat</h4>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
              
            <div style="width:auto">
                <canvas id="stokObat"></canvas>
            </div>

            <script>
            var ctx = document.getElementById('stokObat').getContext('2d');
            var stokObat = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($obat); ?>,
                    datasets: [{
                        label: 'Stok Obat',
                        data: <?= json_encode($stok); ?>,
                        backgroundColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderColor: [
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                      position: 'bottom',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            </script>

            </div>
          </div>
        </div>
      </div>

    <!-- Content untuk grafik aktifitas user-->
      <div class="col-lg-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-chart-pie"></i> Grafik aktifitas user berdasarkan transaksi rekam medis</h4>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
              
            <div style="width:auto">
                <canvas id="userActivity"></canvas>
            </div>


            <script>
            var ctx = document.getElementById('userActivity').getContext('2d');
            var userActivity = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?= json_encode($user); ?>,
                    datasets: [{
                        label: 'Transaksi',
                        data: <?= json_encode($jmltransaksi); ?>,
                        backgroundColor: [
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderColor: [
                            'rgba(29, 219, 72, 1)',
                            'rgba(70, 255, 204, 1)',
                            'rgba(255, 92, 70, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(213, 255, 115, 1)',
                            'rgba(250, 202, 195 , 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                  legend: {
                      position: 'bottom',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            display: false
                        }]
                    }
                }
            });

            </script>

            </div>
          </div>
        </div>
      </div>

</div>
