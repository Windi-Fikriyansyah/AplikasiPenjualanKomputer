<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Bagian</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Id Bagian</label>
                    <input type="text" name="id" value="<?= $no_otomatis; ?>" class="form-control <?= form_error('id') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Bagian</label>
                    <input type="text" name="nama_bagian" value="<?= set_value('nama_bagian'); ?>" class="form-control <?= form_error('nama_bagian') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('nama_bagian'); ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="simpan" class="btn btn-secondary">Simpan</button>
                </div>
                
        </form>
</div>
</div>
            <!-- /.card -->
            