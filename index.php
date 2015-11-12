<?php

//include dirname(__DIR__) . '/vendor/autoload.php';

const DEFAULT_URL = 'https://antrian.firebaseio.com/';
const DEFAULT_TOKEN = 'u6hsdIr37Px7Io8eWeOVnfJjPifrzeaFTUD6ePuo';
const DEFAULT_PATH = '/booking';

//$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

$kota = $_GET['kota'];
$fasilitas = $_GET['fasilitas'];
$entitas = $_GET['entitas'];
$jadwal = $_GET['jadwal'];

// --- reading the stored string ---
//$nama_jadwal = $firebase->get(DEFAULT_PATH . '/' . $kota . '/'. $fasilitas . '/' . $entitas . '/schedules' . '/' . $jadwal . '/name');
//$tanggal_jadwal = $firebase->get(DEFAULT_PATH . '/' . $kota . '/'. $fasilitas . '/' . $entitas . '/schedules' . '/' . $jadwal . '/date');
//$keterangan_jadwal = $firebase->get(DEFAULT_PATH . '/' . $kota . '/'. $fasilitas . '/' . $entitas . '/schedules' . '/' . $jadwal . '/desc');

//$slots = $firebase->get(DEFAULT_PATH . '/' . $kota . '/'. $fasilitas . '/' . $entitas . '/schedules' . '/' . $jadwal . '/slots');
$slots = '';
$array_slots = json_decode($slots, true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart-Q</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2" align="center">
			<img alt="Logo" src="img/72.png">
			<h4>
				Smart-Q
			</h4>
		</div>
		<div class="col-md-10">
			<table class="table">
			  <tr>
				<td>Kegiatan</td>
				<td><?php echo $nama_jadwal; ?></td>
			  </tr>
			  <tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal_jadwal; ?></td>
			  </tr>
			  <tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan_jadwal; ?></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							No
						</th>
						<th>
							Nama
						</th>
						<th>
							Alamat
						</th>
						<th>
							Nomor Tlp/HP
						</th>
						<th>
							Keterangan
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($array_slots as $row){
						$keterangan = ''; 
						$class = ''; 
						if($row["cancel"]){
							$keterangan = 'Dibatalkan';
							$class = 'class="info"'; 
						}
						if($row["pending"]){
							$keterangan = 'Ditunda';
							$class = 'class="active"'; 
						}
						if($row["proceed"]){
							$keterangan = 'Diproses';
							$class = 'class="warning"'; 
						}
						if($row["done"]){
							$keterangan = 'Selesai';
							$class = 'class="danger"'; 
						}
						echo '<tr '.$class.'>
									<td>
										'.$row["no"].'
									</td>
									<td>
										'.$row["name"].'
									</td>
									<td>
										'.$row["address"].'
									</td>
									<td>
										'.$row["phone"].'
									</td>
									<td>
										'.$keterangan.'
									</td>
								</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
  </body>
</html>
