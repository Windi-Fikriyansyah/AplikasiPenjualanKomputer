<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-9">
                <div class="dropdown">
                    <button class="btn btn-info btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export To
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" target="_blank" href="<?= base_url('laporan_pendapatan/cetak_laporan_pendapatan/'. $tgl_awal . '/' . $tgl_akhir); ?>">
                        <span class="icon text-black-200">
                            <i class="fas fa-fw fa-print"></i>
                        </span>
                        <span class="text-black-200">Print</span>
                        </a>
                        
</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div align="right">
                <li class="breadcrumb-item active">Periode dari <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></li>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No Faktur</th>
                        <th>Petugas</th>
                        <th>Nama Supplier</th>
                        <th>Kode Jasa</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach ($lap_pendapatan as $dp):
                ?>
                    <tr>
                        
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['no_faktur']; ?></td>
                        <td><?= $dp['username']; ?></td>
                        <td><?= $dp['nama_customer']; ?></td>
                        <td><?= $dp['id_jasa']; ?></td>
                        <td><?= $dp['nama_jasa']; ?></td>
                        <td><?= $dp['harga']; ?></td>
                        <td><?= number_format($dp['total_harga'],0, ',','.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfooter>
                        <tr>
                            <th colspan="7">Grand Total Pendapatan</th>
                            <th>Rp. <?= number_format($grand_total, 0, ',','.'); ?></th>
                        </tr>
                    </tfooter>
            </table>
        </div>
</div>
