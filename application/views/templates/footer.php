</div>

<!-- /.container-fluid -->


  <!-- /.content-wrapper -->
  <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Yakin Ingin Logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
    
<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
$('.custom-file-input').on('change', function(){
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("seleted").html(fileName);
});
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
$('#id_barang').click(function(){
  $('#modal-beli').modal('show');
});

$(document).ready(function(){
  $(document).on('click','#pilih_brg',function(){
    var id_barang = $(this).data('kd');
    var nama_barang = $(this).data('nama');
    // var stok = $(this).data('stok');
    var harga = $(this).data('harga');
    var keterangan = $(this).data('ket');
    $('#id_barang').val(id_barang);
    $('#nama_barang').val(nama_barang);
    // $('#stok').val(stok);
    $('#harga').val(harga);
    $('#keterangan').val(keterangan);
    $('#modal-beli').modal('hide');
    $('#jumlah').focus();
  })
})
</script>
<script>
    $(function (){
      $('.select2').select2({
        theme: 'bootstrap4'
      })
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });

    function customer(){
      var cs = document.getElementById('customer').value;
      document.getElementById('id_customer').value=cs
    }
    function byr(){
      var bayar = parseInt(document.getElementById("bayar").value);
      var total = parseInt(document.getElementById("total").value);
      var hasil = bayar-total;
      if(!isNaN(hasil))
      {
        document.getElementById("kembalian").innerHTML=hasil;
      } else{
        document.getElementById("kembalian").innerHTML=0;
      }
    }
  </script>
  <script>
$('#id_jasa').click(function(){
  $('#modal-beli').modal('show');
});

$(document).ready(function(){
  $(document).on('click','#pilih_js',function(){
    var id_jasa = $(this).data('id');
    var nama_jasa = $(this).data('nama');
    $('#id_jasa').val(id_jasa);
    $('#jasa').val(nama_jasa);
    
    $('#modal-beli').modal('hide');
    $('#jumlah').focus();
  })
})
</script>
<script>
    $(function (){
      $('.select2').select2({
        theme: 'bootstrap4'
      })
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });

    function pegawai(){
      var pg = document.getElementById('idpegawai').value;
      document.getElementById('id_pegawai').value=pg;
    }
    
    function byr(){
      var bayar = parseInt(document.getElementById("bayar").value);
      var total = parseInt(document.getElementById("total").value);
      var hasil = bayar-total;
      if(!isNaN(hasil))
      {
        document.getElementById("kembalian").innerHTML=hasil;
      } else{
        document.getElementById("kembalian").innerHTML=0;
      }
    }
  </script>
  
</body>
</html>