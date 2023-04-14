<!-- general form elements -->

<!-- /.card-header -->
<!-- form start -->

<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Customer</h3>
    </div>
<!-- /.card-header -->
<!-- form start -->
        <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label>ID Jasa</label>
                    <input type="text" name="id_jasa" value="<?= $ubah_jasa['id_jasa']; ?>" class="form-control <?= form_error('id_jasa') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id_jasa'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama jasa</label>
                <input type="text" name="nama_jasa" value="<?= $ubah_jasa['nama_jasa']; ?>" class="form-control" id="exampleInputEmail1" placeholder="nama_jasa">
                <small class="form-text text-danger"><?= form_error('nama_jasa'); ?></small>
                </div>
            </div>

            
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
            </div>
    </form>
    </div>