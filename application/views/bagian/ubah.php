<!-- general form elements -->

<!-- /.card-header -->
<!-- form start -->

<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Bagian</h3>
    </div>
<!-- /.card-header -->
<!-- form start -->
        <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label>ID Bagian</label>
                    <input type="text" name="id" value="<?= $ubah_bagian['id']; ?>" class="form-control <?= form_error('id') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Bagian</label>
                <input type="text" name="nama_bagian" value="<?= $ubah_bagian['nama_bagian']; ?>" class="form-control" id="exampleInputEmail1" placeholder="nama bagian">
                <small class="form-text text-danger"><?= form_error('nama_bagian'); ?></small>
                </div>
            </div>

            
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
            </div>
    </form>
    </div>
    </div>