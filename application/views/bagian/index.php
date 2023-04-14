<div class="card">
    <div class="card-header">

    <div class="card shadow mb-4">
                        <div class="card-header py-2">
                        <div class="my-2"></div>
                                    <a href="<?= base_url('bagian/tambah'); ?>" class="btn btn-success btn-icon-split">
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
                    <th>Nama Bagian</th>
                    <th>Aksi</th>
                </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                    <th>No</th>
                    <th>Nama Bagian</th>
                    <th>Aksi</th>
                </tr>
                                    </tfoot>
                                    <tbody>
            <!-- /.card-header -->
            
        <?php
            $no=1;
            foreach($bagian as $bg):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $bg['nama_bagian']; ?></td>
                    <td>
                        <a href="<?= base_url()?>bagian/ubah/<?= $bg['id']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#modal-hapus<?= $bg['id']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                          
                            
                            
                    
<?php foreach($bagian as $bg): ?>
<div class="modal fade" id="modal-hapus<?= $bg['id']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('bagian/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id" value="<?= $bg['id']; ?>">
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


<?php endforeach; ?>
