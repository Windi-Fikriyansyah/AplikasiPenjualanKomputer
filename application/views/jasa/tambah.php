<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Jasa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Jasa</label>
                    <input type="text" name="id_jasa" value="<?= $no_otomatis; ?>" class="form-control <?= form_error('id_jasa') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id_jasa'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Jasa</label>
                    <input type="text" name="nama_jasa" value="<?= set_value('nama_jasa'); ?>" class="form-control <?= form_error('nama_jasa') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('nama_jasa'); ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="tambah" class="btn btn-secondary">Simpan</button>
                </div>
        </form>
        </div>
            <!-- /.card -->