<!DOCTYPE html>
<html><head>
<title>Laporan Penjualan</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
<div style="text-align:justify; margin-top: 20px">
<!-- <img src="<?= base_url(); ?>assets/dist/img/name.jpeg" style="width: 8cm; height: 3cm; float:left; margin:0 20px 20px 0;"/> -->
    <p style="text-align: center; line-height: 20px">
    <span style="font-size: 15px">LAPORAN PENDAPATAN</span><br/>
    <span style="font-size: 20px;"><strong>DERMAGA KOMPUTER</strong></span><br/>
    <span style="font-size: 12px">Jln. Suwignyo Gg Nur V kode pos:78244 telp:089649259183 </span><br/>
    <hr>
    </p>
  </div>
<center>
<table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>Tanggal : <?= date('d F Y', strtotime($tgl_awal)); ?> s.d <?= date('d F Y', strtotime($tgl_akhir)); ?></b></span></br>
</td>
</table>
<table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
</br>
<tr align='center'>
  <th>Tanggal</th>
  <th>No Faktur</th>
  <th>Petugas</th>
  <th>Nama Supplier</th>
  <th>Kode Barang</th>
  <th>Nama Barang</th>
  <th>Harga</th>
  <th>Jumlah</th>
  <th>Subtotal</th>
</tr>
<?php foreach ($lap_penjualan as $lp): ?>
<tr>
  <td><?= $lp['tanggal']; ?></td>
  <td><?= $lp['no_faktur']; ?></td>
  <td><?= $lp['username']; ?></td>
  <td><?= $lp['nama_customer']; ?></td>
  <td><?= $lp['id_barang']; ?></td>
  <td><?= $lp['nama_barang']; ?></td>
  <td><?= $lp['harga']; ?></td>
  <td><?= $lp['jumlah']; ?></td>
  <td>Rp. <?= number_format($lp['subtotal'], 0, ',','.'); ?></td>
<?php endforeach; ?>

<tr>
<td colspan = '8'><div style='text-align:left; font-size:14pt'><b>Total Penjualan Barang</b></div></td>
<td style='text-align:left; font-size:14pt'><b>Rp. <?= number_format($grand_total, 2, ',','.'); ?></b></td>
</tr>
</table>

<table style='width:100%; font-size:7pt;' cellspacing='2'>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<tr>
<td style='border:0px solid black; padding:5px; text-align:left; width:80%'></td>
<td align='center'>Kuburaya, <?= date('d F Y'); ?></br>Penanggung Jawab,</br></br></br></br></br></br><u>..................</u></td>
</tr>
</table>
</center>
</body>
</html>