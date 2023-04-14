<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Data User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
                <div class="card-body">
                <div class="form-group">
                <label for="inputName">ID USER</label>
                <input type="text" name="id_user" value="<?= $ubah_user['id_user']; ?>"class="form-control<?= form_error('id_user') ? 'is-invalid' : null ?>"  readonly >
                    <small class="form-text text-danger"><?= form_error('id_user'); ?> </small>
                </div>
                <div class="form-group">
                    <label for="inputName">Username *</label>
                    <input type="text" name="username" value="<?= $ubah_user['username']; ?>" class="form-control">
                    <small class="form-text text-danger"><?= form_error('username'); ?> </small>
                </div>
                <div class="form-group">
                    <label for="inputName">Password *</label>
                    <input type="password" name="pass1" class="form-control <?= form_error('pass1') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass1'); ?> </small>
                </div>
                <div class="form-group">
                    <label for="inputName">Konfirmasi Password *</label>
                    <input type="password" name="pass2" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass2'); ?> </small>
                </div>
                <div class="form-group">
                    <label>Pegawai</label>
                    <select name="pegawai" class="form-control">
                    <option value="<?= $ubah_user['id_pegawai']; ?>"><?= $ubah_user['nama']; ?> </option>
                    <?php foreach($pegawai as $pg): ?>
                    <option value="<?= $pg['nama']; ?>"><?= $pg['nama']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('pegawai'); ?></small>
                    </div>
                <div class="form-group">
                    <label for="inputName">Hak Akses</label>
                    <select name="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>">
                    
                    <option value="1" <?= $ubah_user['level'] == 1 ? "selected" : null ?> >Owner</option>
                    <option value="2" <?= $ubah_user['level'] == 2 ? "selected" : null ?> >Admin</option>
                </select>
                <small class="form-text text-danger"><?= form_error('level'); ?></small>
                </div>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-secondary">Update</button>
                </div>
            
            </form>
            </div>
            </div>
            <!-- /.card -->