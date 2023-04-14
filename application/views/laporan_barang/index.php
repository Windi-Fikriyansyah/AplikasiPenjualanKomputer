<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-9">
                <div class="dropdown">
                    <button class="btn btn-info btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export To
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" target="_blank" href="<?= base_url('laporan_barang/cetak_laporan_barang/'); ?>">
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
                <!-- <li class="breadcrumb-item active">Periode dari <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></li> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach ($laporan_barang as $lb):
                ?>
                    <tr>
                        
                        <td><?= $lb['id_barang']; ?></td>
                        <td><?= $lb['nama_barang']; ?></td>
                        <td><?= $lb['stok']; ?></td>
                        <td><?= $lb['harga']; ?></td>
                        <td><?= $lb['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
        </div>
                </table>
</div>
