<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                    <label>Kode Service</label>
                    <input type="text" name="id_barang" value="<?= $no_otomatis; ?>" class="form-control <?= form_error('id_barang') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id_barang'); ?></small>
                    </div>
                    <div class="form-group">
                    <label>Nama Service</label>
                    <input type="text" name="nama_barang" value="<?= set_value('nama_barang'); ?>" class="form-control <?= form_error('nama_barang') ? 'is-invalid' : null ?>" placeholder="Nama Service">
                    <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
                    </div>
               
                    <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="<?= set_value('harga'); ?>" class="form-control <?= form_error('harga') ? 'is-invalid' : null ?>" placeholder="Harga">
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" value="<?= set_value('keterangan'); ?>" class="form-control <?= form_error('keterangan') ? 'is-invalid' : null ?>" placeholder="keterangan">
                    <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
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