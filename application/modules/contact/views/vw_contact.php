    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-end">

                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p><?= $websettings['alamat'] ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p><?= $websettings['email'] ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p><?= $websettings['no_hp'] ?></p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

                    <form action="<?= base_url('contact/send_contact') ?>" method="POST" role="form" class="" id="form-contact">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">

                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-info text-light mt-2">Send Message</button></div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
    <script>
        window.addEventListener('load', function() {
            // Mendapatkan parameter URL
            const urlParams = new URLSearchParams(window.location.search);

            // Memeriksa apakah parameter "status" diatur sebagai "true"
            if (urlParams.has('status') && urlParams.get('status') === 'true') {
                // Menampilkan alert
                alert('Pesan Berhasil dikirim');
            }
        });
    </script>