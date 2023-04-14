<div class="row">
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                <form action="<?= base_url('transaksi_jasa/tambah_keranjang'); ?>" method="post">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                    <tr>
                    <td>
                                <div class="form-group input-group">
                                    <input type="text" id="id_jasa" name="id_jasa" class="form-control" placeholder="Cari..." readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-beli">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                    <td>
                                <div class="form-group">
                                    <input type="text" name="jasa" id="jasa" class="form-control" placeholder="nama Jasa" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="harga" id="harga" class="form-control" placeholder="harga">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <button type="submit" name="tambah_keranjang" id="add_cart" class="btn btn-secondary">
                                        <i class="fa fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top">
                        <i class="oi oi-calendar"></i>
                            <label for="date">Tanggal</label>
                        </td>
                        <td class="form-group">
                            <div class="form-group">
                                <input type="date" id="date" name="tgl "value="<?= date('Y-m-d') ?>" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                <td style="vertical-align:top">
                <label for="pegawai">Mekanik</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="pegawai" id="idpegawai"  onchange="pegawai()" style="widht: 100%;" class="form-control select2">
                                    <option>--PILIH--</option>
                                    <?php foreach($pegawai as $pg): ?>
                                    <option value="<?= $pg['id_pegawai']; ?>"><?= $pg['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
            <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top">
                            <label for="admin">No Faktur</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="user" value="<?= $no_faktur; ?>" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">
                            <label for="admin">Admin</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="user" value="<?= $this->fungsi->user_login()->username ?>" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
</div>


<form action="<?= base_url('transaksi_jasa/simpan'); ?>" method="post">
<div class="row">
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <th>No</th>
                        <th>ID Jasa</th>
                        <th>Jasa </th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody id="cart_table">
                        <?php if($keranjang ==""){ ?>
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada Jasa</td>
                        </tr>
                        <?php } else{
                        $no=1;
                        foreach($keranjang as $kjg):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kjg['id_jasa']; ?><input type="hidden" name="no_faktur[]" value="<?= $no_faktur; ?>"></td>
                            <td><?= $kjg['jasa']; ?><input type="hidden" name="id_jasa[]" value="<?= $kjg['id_jasa']; ?>"></td>
                            <td><?= $kjg['harga']; ?><input type="hidden" name="harga[]" value="<?= $kjg['harga']; ?>"></td>
                            <td>
                                <a href="<?= base_url() ?>transaksi_jasa/hapus_keranjang/<?= $kjg['id']; ?>"
                                class="btn btn-small text-warning"><i class="fa fa-trash"></i></a>
                                
                            </td>
                        </tr>
                        <?php endforeach; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" name="tgl" id="date" value="<?= date('Y-m-d') ?>">
    <input type="hidden" name="user_id" value="<?= $this->fungsi->user_login()->id_user ?>">
    <input type="hidden" name="nofaktur" value="<?= $no_faktur; ?>">
    <input type="hidden" name="nama_customer" id="id_customer">
    <input type="hidden" name="pegawai" id="id_pegawai">

</div>


<div class="row">
        <div class="col-lg-4">
        <div class="card card-widget">
        <div class="card-body">
        <table width="100%">
        <tr>
                <td style="vertical-align:top">
                            <label for="customer">Customer</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="nama_customer" id="id_customer" class="form-control select2">
                                    <option value="">--PILIH--</option>
                                    <?php foreach($customer as $cs): ?>
                                        <option value="<?= $cs['id_customer']; ?>"><?= $cs['nama_customer']; ?></option>
                                    <?php endforeach;?>
                                    </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <td style="vertical-align:top">
                            <label for="status">Status</label>
                        </td>
                    <td><div class="form-group">
                        <select name="status" class="form-control <?= form_error('status') ? 'is-invalid' : null ?>"></small>
                        <option value="">--PILIH--</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Belum">Belum Selesai</option>
                    </select>
                                    </td>
                    </tr>
                
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top: width:30%">
                            <label for="total">Total</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="total" id="total" value="<?= $total; ?>" class="form-control" readonly>
                            </div>
                        </td>    
                    </tr>
                    <tr>
                        <td style="vertical-align:top: width:30%">
                            <label for="bayar">Bayar</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="bayar" id="bayar" onkeyup="byr()" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
                    
                                    </div>
                                    </div>
                                    </div>
                <div class="col-lg-4">
        <div class="card card-widget">
            <div class="card-body">
                <div align="right">
                <h4>Kembalian : <br><b><span id="kembalian" style="font-size:46pt"> 0 </span></b></h4>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div align="right">
    <button type="submit" name="simpan" id="simpan" class="btn btn-flat btn-lg btn-secondary">
        <i class="fas fa-paper-plane"></i> Simpan
    </button>                
</div><br>
</form>
<div class="modal fade" id="modal-beli" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Data Jasa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            
            <div class="modal-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                    <th>ID Jasa</th>
                    <th>Nama Jasa</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no=1;
                foreach($jasa as $js):
                    ?>
                    <tbody>
                    <tr>
                        <td><?= $js['id_jasa']; ?></td>
                        <td><?= $js['nama_jasa']; ?></td>
                        <td>
                            <button data-id="<?= $js['id_jasa']; ?>"
                            data-nama="<?= $js['nama_jasa']; ?>"
                            class="btn btn-outline-secondary" id="pilih_js">
                            <i class="fa fa-check"></i> pilih
                            </button>
                        </td>
                </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
</div> 
</div>
</div> 
</div> 
