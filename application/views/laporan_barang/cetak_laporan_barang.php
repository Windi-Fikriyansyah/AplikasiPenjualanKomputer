<!DOCTYPE html>
<html><head>
<title>Laporan Baranag</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
<div style="text-align:justify; margin-top: 20px">
<p style="text-align: center; line-height: 20px">
    <span style="font-size: 15px">LAPORAN PERSEDIAAN SUKU CADANG</span><br/>
    <span style="font-size: 20px;"><strong>CV. AUTO ONO</strong></span><br/>
    <span style="font-size: 12px">Jln. Adisucipto KM. 13,5. kode pos:78391 email:ottoonno99@gmail.com telp:081255164879 </span><br/>
    <hr>
    </p>
  </div>
<center>
<table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'></span></br>
</td>
</table>
<table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
</br>
<tr align='center'>
<th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
</tr>
<?php foreach ($laporan_barang as $lb): ?>
<tr>
            <td><?= $lb['id_barang']; ?></td>
            <td><?= $lb['nama_barang']; ?></td>
            <td><?= $lb['stok']; ?></td>
            <td><?= $lb['harga']; ?></td>
            <td><?= $lb['keterangan']; ?></td>
<?php endforeach; ?>

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