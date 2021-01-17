<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src="<?= ASSET ?>js/jquery.js"></script>
<script src="<?= ASSET ?>js/bootstrap.bundle.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= ASSET ?>js/jquery.easing.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= ASSET ?>js/sb-admin-2.js"></script>
<script src="<?= ASSET ?>js/bootstrap-select.js"></script>
<script src="<?= ASSET ?>js/i18n/defaults-id_ID.js"></script>
<script src="<?= ASSET ?>js/bs-custom-file-input.js"></script>
<script src="<?= ASSET ?>js/script.js"></script>

<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
</script>

</body>

</html>