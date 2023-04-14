<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Customer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Customer</label>
                    <input type="text" name="id" value="<?= $no_otomatis; ?>" class="form-control <?= form_error('id') ? 'is-invalid' : null ?>" readonly >
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Customer</label>
                    <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" placeholder="Nama Pelanggan">
                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">No Telp</label>
                    <input type="text" name="no_telp" value="<?= set_value('no_telp'); ?>" class="form-control <?= form_error('no_telp') ? 'is-invalid' : null ?>" placeholder="No Telpon">
                    <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" value="<?= set_value('alamat'); ?>" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>" placeholder="Alamat">
                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : null ?>" placeholder="Email">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="tambah" class="btn btn-secondary">Simpan</button>
                </div>
        </form>
        </div>
        </div>
            <!-- /.card -->