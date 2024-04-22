    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2022 &copy; Voler</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/app.js"></script>

    <script src="<?= ASSETS_URL_BACKEND ?>assets/vendors/chartjs/Chart.min.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/pages/dashboard.js"></script>

    <script src="<?= ASSETS_URL_BACKEND ?>assets/js/main.js"></script>

    <script src="<?= ASSETS_URL ?>datatables/jquery.dataTables.min.js"></script>
    <script src="<?= ASSETS_URL ?>datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Include Choices JavaScript -->
    <script src="<?= ASSETS_URL_BACKEND ?>assets/vendors/choices.js/choices.min.js"></script>

    <!-- Toast -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Alerts -->
    <script src="<?= ASSETS_URL ?>alerts/cute-alert.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(".modal")
            });
            $('.js-example-basic-multiple').select2({
                theme: 'bootstrap-5'
            });
        });

        function success(msg) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "200",
                "timeOut": "2000",
                "extendedTimeOut": "200",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                onHidden: function() {
                    window.location.href = '<?= base_url() ?><?= $this->uri->segment(1) ?>'
                }
            }
            toastr.success(`${msg}`)

        }

        function errors(msg) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "600",
                "timeOut": "5000",
                "extendedTimeOut": "600",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error(`${msg}`)
        }
    </script>
    </body>

    </html>