<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                        <span><?= $websettings['nama'] ?></span>
                    </a>
                    <p><?= $websettings['deskripsi_footer'] ?></p>
                    <div class="social-links d-flex  mt-3">
                        <a href="<?= $websettings['twitter'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="<?= $websettings['facebook'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="<?= $websettings['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="<?= $websettings['linkedin'] ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url() ?>">Home</a></li>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url('about') ?>">About us</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Category</h4>

                    <ul>
                        <?php foreach ($category as $key => $value) : ?>
                            <li><i class="bi bi-dash"></i> <a href="<?= base_url('search?keywords=') . $value['category'] ?>"><?= $value['category'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        <?= $websettings['alamat'] ?> <br>
                        <strong>Phone:</strong><?= $websettings['no_hp'] ?><br>
                        <strong>Email:</strong><?= $websettings['email'] ?><br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>ESQ Business School</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/aos/aos.js"></script>
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= ASSETS_URL_FRONTEND ?>/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= ASSETS_URL_FRONTEND ?>/js/main.js"></script>

</body>

</html>