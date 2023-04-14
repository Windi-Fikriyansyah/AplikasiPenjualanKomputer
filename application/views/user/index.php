<div class="card">
    <div class="card-header">

   
                <!-- /.card-header -->
                <div class="card shadow mb-4">
                        <div class="card-header py-2">
                        <div class="my-2"></div>
                                    <a href="<?= base_url('user/tambah'); ?>" class="btn btn-success btn-icon-split">
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
                                        <th>Nomor</th>
                                        <th>id_user</th>
                                        <th>User Name</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>id_user</th>
                                        <th>User Name</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
            $no=1;
            foreach($user as $usr):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $usr['id_user'] ?></td>
                    <td><?= $usr['username']; ?></td>
                    <td><?= $usr['nama']; ?></td>
                    <td><?= $usr['level'] == 1 ? "Owner" : "Admin" ?></td>
                    <td>
                        <a href="<?= base_url() ?>user/ubah/<?= $usr['id_user']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i>Edit</a>
                        <a href="#modal-hapus<?= $usr['id_user']; ?>" data-toggle="modal" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                                </table>
                            </div>
                        </div>
                    

               

            <!-- Footer -->
<?php foreach($user as $usr): ?>
<div class="modal fade" id="modal-hapus<?= $usr['id_user']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('user/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id_user" value="<?= $usr['id_user']; ?>">
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