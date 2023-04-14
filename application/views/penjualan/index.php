<div class="card card-widget">
    <div class="card-body">
<div class="row">
    <div class="col-lg-4">
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
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
            <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                
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
    
    <div class="col-lg-4">
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
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                <form action="<?= base_url('penjualan/tambah_keranjang'); ?>" method="post">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                    <tr>
                    <td>
                                <div class="form-group input-group">
                                    <input type="text" id="id_barang" name="id_barang" class="form-control" placeholder="pilih barang" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-beli">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                    <td>
                                <div class="form-group">
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="nama barang" readonly>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="form-group">
                                    <input type="text" name="stok" id="stok" class="form-control" placeholder="stok" readonly>
                                </div>
                            </td> -->
                            <td>
                                <div class="form-group">
                                    <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input required type="number" id="jumlah" name="jumlah" min="1" class="form-control" placeholder="jumlah" required>
                            </td>
                            <td>
                                <div class="form-group">
                                    <button type="submit" name="tambah_keranjang" id="add_cart" class="btn btn-secondary">
                                        <i class="fa fa-cart-plus"></i>
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
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>subtotal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody id="cart_table">
                        <?php 
                    $no       = 1;
                    $total    = 0;
                    $subtotal = 0;
                    $cekminus = 0;
                    foreach($cart as $ct)
                    {
                        if($ct['transaksi']=="penjualan")
                        {
                        $rowid    = $ct['rowid'];
                        $linkhapus= site_url("penjualan/hapus_data/$rowid");
                        $subtotal = $ct['qty']*$ct['price'];
                        $total   += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $ct['id'];?></td>
                        <td><?php echo $ct['name'];?></td>
                        <td align="right">
                        <span class="pull-left">Rp</span>
                        <?php echo $ct['price'];?>
                        </td>
                        <td align="center"><?php echo $ct['qty']; ?></td>
                        <td align="right">
                        <span class="pull-left">Rp</span>
                        <?php echo number_format($subtotal, 0, ',','.');?>
                        </td>
                        <td>
                        <a href="<?php echo $linkhapus;?>" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                    <tr style="font-weight: bold;" class="text-blue">
                        <td colspan="5">Total</td>
                        <td align="right">
                        <span class="pull-left">Rp</span>
                        <?php echo number_format($total, 0, ',','.');?>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<form action="<?= base_url('penjualan/simpan'); ?>" method="post">
    <input type="hidden" name="tgl" id="date" value="<?= date('Y-m-d') ?>">
    <input type="hidden" name="user_id" value="<?= $this->fungsi->user_login()->id_user ?>">
    <input type="hidden" name="nofaktur" value="<?= $no_faktur; ?>">
</div>


<div class="row">
        <div class="col-lg-6">
        <div class="card card-widget">
        <div class="card-body">
        <table width="100%">
        <tr>
                <td style="vertical-align:top: width:30%">
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
                                </td>
                    </tr>
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
                </table>
                
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-widget">
            <div class="card-body">
                <table width="100%">
                    
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
                    <tr>
                        <td>
                        <b><span id="kembalian" style="font-size:27pt"> 0 </span></b>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="card-footer">
<div align="right">
    <button type="submit" name="simpan" id="simpan" target="_blank" class="btn btn-flat btn-lg btn-secondary">
        <i class="fas fa-paper-plane"></i> Simpan
    </button>               
</div>
</div>
<br>

</form>
<div class="modal fade" id="modal-beli" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            
            <div class="modal-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no=1;
                foreach($barang as $brg):
                ?>
                <tbody>
                <tr>
                    <td><?= $brg['id_barang']; ?></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['harga']; ?></td>
                    <td><?= $brg['keterangan']; ?></td>
                    <td>
                        <button data-kd="<?= $brg['id_barang']; ?>"
                        data-nama="<?= $brg['nama_barang']; ?>"
                        data-harga="<?= $brg['harga']; ?>"
                        data-ket="<?=  $brg['keterangan']; ?>"
                        class="btn btn-outline-secondary" id="pilih_brg">
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
