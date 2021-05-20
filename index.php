<!DOCTYPE html>
<html>
<head>
	<title>MENAMPILKAN DATABASE PHP</title>
	<style>
		body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
	</style>
</head>
<body>
<br/>
<h2>Data Pelanggan</h2>


<a href="tambah.php">+ TAMBAH DATA</a>

<br/>
<br/>

<table>
	<thead>
	<tr>
		<th>No</th>
		<th>Id Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Alamat Pelanggan</th>
		<th>Kecepatan Mbps</th>
		<th>Tanggal Berlangganan</th>
		<th>Status Member</th>
	</tr>
	</thead>
<?php 
include 'koneksi.php';
$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM pelanggan");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['ID_PELANGGAN']; ?></td>
		<td><?php echo $d['NAMA_PELANGGAN']; ?></td>
		<td><?php echo $d['ALAMAT_PELANGGAN']; ?></td>
		<td><?php echo $d['KECEPATAN_PELANGGAN']; ?></td>
		<td><?php echo $d['TGL_ANGGOTA_PELANGGAN']; ?></td>
		<td><?php echo $d['STATUS']; ?></td>
		
	</tr>	
	<?php 
}
 ?>

	</table>

<h3>Tabel Paket Internet</h3>
<table>
<thead>
	<tr>
		<th>No</th>
		<th>Id Paket</th>
		<th>Kecepatan</th>
		<th>Harga</th>
		<th>Tgl Update</th>
		<th>User</th>
	</tr>
</thead>
<?php 

$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM paket_kecepatan");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['ID_PAKET']; ?></td>
		<td><?php echo $d['KECEPATAN_MBPS']; ?></td>
		<td><?php echo $d['HARGA_KECEPATAN_MBPS']; ?></td>
		<td><?php echo $d['TGL_UPDATE']; ?></td>
		<td><?php echo $d['USER_UPDATE']; ?></td>
		
	</tr>	
	<?php 
}
 ?>
</table>

<h3>Tabel Transaksi</h3>

<table>

<thead>
	<tr>
		<TH>No</TH>
		<th>Id Transaksi</th>
		<th>Id Paket</th>
		<th>Id Pelanggan</th>
		<th>Tanggal Transaksi</th>
		<th>Periode</th>
		<th>Total Transaksi</th>
	</tr>
</thead>
<?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT * from transaksi");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['ID_TRANSAKSI']; ?></td>
		<td><?php echo $d['ID_PAKET']; ?></td>
		<td><?php echo $d['ID_PELANGGAN']; ?></td>
		<td><?php echo $d['TGL_TRANSAKSI']; ?></td>
		<td><?php echo $d['KET']; ?></td>
		<td><?php echo $d['NOMINAL']; ?></td>
		
	</tr>	
	<?php 
}
 ?>

</table>


	<h3>Inner Join (mysqli_fetch_assoc)</h3>
	<h4>(Menampilkan Semua data pelanggan dari tabel pelanggan yang melakukan transaksi)</h4>

<table>

<thead>
	<tr>
		<TH>No</TH>
		<th>Id Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Alamat</th>
		<th>Status</th>
	</tr>
</thead>
<?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT A.ID_PELANGGAN,NAMA_PELANGGAN,ALAMAT_PELANGGAN,STATUS FROM Pelanggan A
		Join Transaksi B USING (ID_PELANGGAN)");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['ID_PELANGGAN']; ?></td>
		<td><?php echo $d['NAMA_PELANGGAN']; ?></td>
		<td><?php echo $d['ALAMAT_PELANGGAN']; ?></td>
		<td><?php echo $d['STATUS']; ?></td>
		
		
	</tr>	
	<?php 
}
 ?>

</table>

<h3>left outer Join (mysqli_fetch_assoc)</h3>
	<h4>(Menampilkan semua data pelanggan dari tabel pelanggan beserta data transaksinya dari tabel transaksi)</h4>

<table>

<thead>
	<tr>
		<TH>No</TH>
		<th>Id Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Alamat</th>
		<th>Status</th>
	</tr>
</thead>
<?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT A.ID_PELANGGAN,NAMA_PELANGGAN,ALAMAT_PELANGGAN,STATUS FROM Pelanggan A
		left Join Transaksi B USING (ID_PELANGGAN)");
while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['ID_PELANGGAN']; ?></td>
		<td><?php echo $d['NAMA_PELANGGAN']; ?></td>
		<td><?php echo $d['ALAMAT_PELANGGAN']; ?></td>
		<td><?php echo $d['STATUS']; ?></td>
		
		
	</tr>	
	<?php 
}
 ?>

</table>

	
</body>
</html>