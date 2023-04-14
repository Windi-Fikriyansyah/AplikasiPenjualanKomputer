<!-- general form elements -->

<!-- /.card-header -->
<!-- form start -->

<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Barang</h3>
    </div>
<!-- /.card-header -->
<!-- form start -->
    <form method="post" action="">
            <div class="card-body">
            <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="id_barang" value="<?= $ubah_barang['id_barang']; ?>" class="form-control <?= form_error('id_barang') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id_barang'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" name="nama_barang" value="<?= $ubah_barang['nama_barang']; ?>" class="form-control" id="exampleInputEmail1" placeholder="nama barang">
                    <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
               
                    <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" value="<?= $ubah_barang['harga']; ?>" class="form-control <?= form_error('harga') ? 'is-invalid' : null ?>" placeholder="Harga">
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" name="keterangan" value="<?= $ubah_barang['keterangan']; ?>" class="form-control" id="exampleInputEmail1" placeholder="keterangan">
                    <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                </div>
            </div>
                <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
            </div>
    </form>
    </div>
            
            
            
                
    
    