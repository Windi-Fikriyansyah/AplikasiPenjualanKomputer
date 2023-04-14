<!-- general form elements -->

<!-- /.card-header -->
<!-- form start -->

<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pegawai</h3>
    </div>
<!-- /.card-header -->
<!-- form start -->
        <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Id Pegawai</label>
                    <input type="text" name="id" value="<?= $ubah_pegawai['id_pegawai']; ?>" class="form-control <?= form_error('id_pegawai') ? 'is-invalid' : null ?>"  readonly >
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" value="<?= $ubah_pegawai['nama']; ?>" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">No Telp</label>
                    <input type="text" name="no_telp" value="<?= $ubah_pegawai['no_telp']; ?>" class="form-control <?= form_error('no_telp') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" value="<?= $ubah_pegawai['alamat']; ?>" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                </div>

                <div class="form-group">
                    <label>ID Bagian</label>
                    <select name="bagian" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php foreach($bagian as $bg): ?>
                    <option value="<?= $bg['id']; ?>"><?= $bg['nama_bagian']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                    </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
            </div>
    </form>
    </div>