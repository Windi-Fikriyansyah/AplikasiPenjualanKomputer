<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label>ID USER</label>
                    <input type="text" name="id_user" value="<?= $no_otomatis; ?>" class="form-control <?= form_error('id_user') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('id_user'); ?></small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">User Name*</label>
                    <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="pass1" value="<?= set_value('pass1'); ?>" class="form-control <?= form_error('pass1') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass1'); ?></small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password*</label>
                    <input type="password" name="pass2" value="<?= set_value('pass2'); ?>" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass2'); ?></small>
                    </div>
                    <div class="form-group">
                    <label>Nama Pegawai</label>
                    <select name="pegawai" class="form-control select2">
                    <option value="">--PILIH--</option>
                    <?php foreach($pegawai as $pg): ?>
                    <option value="<?= $pg['id_pegawai']; ?>"><?= $pg['nama']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('id_pegawai'); ?></small>
                    </div>
                <div class="form-group">
                    <label for="email">Hak Akses</label>
                    <select name="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>"></small>
                        <option value="">--PILIH--</option>
                        <option value="1">Owner</option>
                        <option value="2">Admin</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('level'); ?></small>
                    </div>
                    </div>

                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="tambah" class="btn btn-secondary">Simpan</button>
                </div>
                </div>
                
        </form>
        </div>
        
            <!-- /.card -->