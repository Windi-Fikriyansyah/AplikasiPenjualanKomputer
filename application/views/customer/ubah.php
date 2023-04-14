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
                    <input type="hidden" name="id" value="<?= $ubah_customer['id_customer']; ?>">
                    <label for="exampleInputEmail1">ID Customer</label>
                    <input type="text" name="id" value="<?= $ubah_customer['id_customer']; ?>" class="form-control" id="exampleInputEmail1" placeholder="id" readonly >
                    <small class="form-text text-danger"><?= form_error('id'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Customer</label>
                <input type="text" name="nama" value="<?= $ubah_customer['nama_customer']; ?>" class="form-control" id="exampleInputEmail1" placeholder="nama">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nomor Telpon</label>
                    <input type="text" name="no_telp" value="<?= $ubah_customer['no_telp']; ?>" class="form-control" id="exampleInputEmail1" placeholder="no_telp">
                    <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" value="<?= $ubah_customer['alamat']; ?>" class="form-control" id="exampleInputEmail1" placeholder="alamat">
                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="<?= $ubah_customer['email']; ?>" class="form-control" id="exampleInputEmail1" placeholder="email">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
            </div>

            
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
            </div>
    </form>
    </div>
    </div>