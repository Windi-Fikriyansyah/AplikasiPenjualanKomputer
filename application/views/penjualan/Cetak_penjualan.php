<!DOCTYPE html>
<html><head>
<title>Faktur Penjualan</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
<div style="text-align:justify; margin-top: 5px">
    <!-- <img src="<?= base_url(); ?>assets/dist/img/name.jpeg" style="width: 8cm; height: 3cm; float:left; margin:0 20px 20px 0;"/> -->
    <p style="text-align: center; line-height: 20px">
    <span style="font-size: 15px">BUKTI TRANSAKSI</span><br/>
    <span style="font-size: 20px;"><strong>DERMAGA KOMPUTER</strong></span><br/>
    <span style="font-size: 12px">Jln. Suwignyo Gg Nur V kode pos:78244 telp:089649259183  </span><br/>
    <hr>
    </p>
</div>
<center>
<table style='width:800px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>FAKTUR PENJUALAN</b></span></br>
Nama Customer : <?= $cetak['nama_customer']; ?></br>
No Telp : <?= $cetak['no_telp']; ?></br>
Alamat: <?= $cetak['alamat']; ?></br>
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'></span></b></br>
Tanggal : <?= $cetak['tanggal']; ?> </br>
No Faktur. : <?= $cetak['no_faktur']; ?> </br>
</td>
</table>
<table cellspacing='0' style='width:800px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
</br>
<tr align='center'>
<td width='10%'>Kode Barang</td>
<td width='20%'>Nama Barang</td>
<td width='13%'>Harga</td>
<td width='4%'>Jumlah</td>
<td width='13%'>Total Harga</td>
</tr>

<?php foreach ($detail as $ctk ): ?>
<tr>
<td><?= $ctk['id_barang']; ?></td>
<td><?= $ctk['nama_barang']; ?></td>
<td><?= $ctk['harga']; ?></td>
<td><?= $ctk['jumlah']; ?></td>
<td style='text-align:right'><?= number_format($ctk['subtotal'],0, ',','.'); ?></td>
<?php endforeach; ?>


<tr>

<td colspan = '4'><div style='text-align:right'><b>Total Yang Harus Di Bayar Adalah : </b></div></td>
<td style='text-align:right'><b>Rp. <?= number_format($cetak['total_harga'], 0, ',','.'); ?></b></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right'><b>Cash : </b></div></td>
<td style='text-align:right'><b>Rp. <?= number_format($cetak['total_bayar'], 0, ',','.'); ?></b></td>
</tr>
<tr>

<td colspan = '4'><div style='text-align:right'><b>Kembalian : </b></div></td>
<td style='text-align:right'><b>Rp. <?= number_format($cetak['kembalian'], 0, ',','.'); ?></b></td>
</b>
</tr>
</table>
 
<table style='width:800px; font-size:7pt;' cellspacing='2'>
<br>
<br>
<br>
<tr>
<td align='center'>TTD,</br></br></br></br></br></br><u>(.....)</u></td>
<td style='border:0px solid black; padding:5px; text-align:left; width:40%'></td>
<td align='center'>Dibuat Oleh,</br></br></br></br></br></br><u>(<?=$cetak['username']; ?>)</u></td>
</tr>
</table>
</center>
</body>
</html>