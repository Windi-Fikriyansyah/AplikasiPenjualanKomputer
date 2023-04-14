<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            
        </div>
    </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No Faktur</th>
                        <th>Customer</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach ($data_penjualan as $dp):
                ?>
                    <tr>
                        
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['no_faktur']; ?></td>
                        <td><?= $dp['nama_customer']; ?></td>
                        <td><?= $dp['nama_barang']; ?></td>
                        <td><?= $dp['harga']; ?></td>
                        <td><?= $dp['jumlah']; ?></td>
                        <td><?= $dp['subtotal']; ?></td>

                        <td>
                            <!-- <a href="<?= base_url() ?>barang/ubah/<?= $dp['no_faktur']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i>Edit</a> -->
                            <a href="#modal-hapus<?= $dp['no_faktur']; ?>" data-toggle="modal" class="btn btn-small text-danger">
                            <i class="fas fa-trash"></i>Hapus</a>
                            <a href="<?= base_url() ?>penjualan/cetak_faktur/<?= $dp['no_faktur']; ?>" target="_blank" 
                            class="btn btn-small text-warning"><i class="fas fa-print"></i>Cetak</a>
                            
                        </td>
                    </tr>
                
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
</div>
<?php foreach ($data_penjualan as $dp): ?>
<div class="modal fade" id="modal-hapus<?= $dp['no_faktur']; ?>" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('penjualan/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah yakin ingin hapus...?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id_barang" value="<?= $dp['no_faktur']; ?>">
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-warning">Yes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>   <!-- /.modal-dialog -->

<?php endforeach; ?>