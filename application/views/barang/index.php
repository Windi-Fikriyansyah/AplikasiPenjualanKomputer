<div class="card">
    <div class="card-header">

    <div class="card shadow mb-4">
                        <div class="card-header py-2">
                        <div class="my-2"></div>
                                    <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-4">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Tambah</span>
                                    </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                    <th>No</th>
                    <th>Kode Service</th>
                    <th>Nama Service</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>No</th>
                                    <th>Kode Service</th>
                    <th>Nama Service</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                <!-- /.card-header -->
            
        <tbody>
        
        <?php
            $no=1;
            foreach($barang as $brg):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $brg['id_barang']; ?></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['harga']; ?></td>
                    <td><?= $brg['keterangan']; ?></td>
                <td>
                <a href="<?= base_url()?>barang/ubah/<?= $brg['id_barang']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                <a href="#modal-hapus<?= $brg['id_barang']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
            </table>
</div>
</div>
    
<?php foreach($barang as $brg): ?>
<div class="modal fade" id="modal-hapus<?= $brg['id_barang']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('barang/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </form>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
</div>
</div>


<?php endforeach; ?>