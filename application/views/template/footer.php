           <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>asset/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>asset/js/sb-admin-2.min.js"></script>

    <script src="<?php echo base_url()?>asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
    <script>
  $(function () {
    $("#tabel").DataTable({
      "responsive": false,
      "lengthChange": true, 
      "autoWidth": true,
      "ordering": true,  
      "searching": true,
      "paging": true,
      "info": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#tabel2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function() {
    $('.swalDefaultSuccess').<?php echo $this->session->userdata('create') <> '' ? $this->session->userdata('create') : ''; ?>(function() {
      Swal.fire({
  icon: 'success',
  title: 'Create Success',
  showConfirmButton: false,
  timer: 1300
    })
    });
  });
</script>
<script>
  $(function() {
    $('.swalDefaultSuccess').<?php echo $this->session->userdata('update') <> '' ? $this->session->userdata('update') : ''; ?>(function() {
      Swal.fire({
  icon: 'success',
  title: 'Edit Success',
  showConfirmButton: false,
  timer: 1300
    })
    });
  });
</script>
<script>
  $(function() {
    $('.swalDefaultSuccess').<?php echo $this->session->userdata('delete') <> '' ? $this->session->userdata('delete') : ''; ?>(function() {
      Swal.fire({
  icon: 'success',
  title: 'Delete Success',
  showConfirmButton: false,
  timer: 1300
})
    });
  });
</script>
<script>
  $('.alert_notif').on('click',function(){
  var getLink = $(this).attr('href');
  Swal.fire({
  icon: 'warning',
  text: 'Do you want to delete ?',
  title: 'Warning!!',
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: 'Yes',
  denyButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.href = getLink
  } else if (result.isDenied) {
    Swal.fire({
  icon: 'error',
  text: 'Your file is safe :) ',
  title: 'Canceled ',
  showConfirmButton: false,
  timer: 1300
})
  }
})
                return false;
            });
        </script>
</body>

</html>