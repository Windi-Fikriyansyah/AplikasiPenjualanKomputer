<div class="card">
    <div class="card-header">

    <div class="col-md-2">
        <a href="<?= base_url('jasa/tambah'); ?>" class="btn btn-block btn-secondary">Tambah</a>
    </div>
    
</div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Jasa</th>
                    <th>Nama Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
        <tbody>
        <?php
            $no=1;
            foreach($jasa as $js):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $js['id_jasa']; ?></td>
                    <td><?= $js['nama_jasa']; ?></td>
                    <td>
                        <a href="<?= base_url()?>jasa/ubah/<?= $js['id_jasa']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#modal-hapus<?= $js['id_jasa']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
            </table>
</div>
</div>
<?php foreach($jasa as $js): ?>
<div class="modal fade" id="modal-hapus<?= $js['id_jasa']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('jasa/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id_jasa" value="<?= $js['id_jasa']; ?>">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" >Yes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>