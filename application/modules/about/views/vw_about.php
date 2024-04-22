    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4 align-items-center" data-aos="fade-up">
                <div class="col-lg-4">
                    <img src="<?= base_url('assets/uploads/images/') . $about['images'] ?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="content ps-lg-5">
                        <?= $about['body'] ?>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <section id="services-list" class="services-list">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Services</h2>

            </div>

            <div class="row gy-5">

                <?php foreach ($services as $key => $value) : ?>
                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon flex-shrink-0 me-2"><img src="<?= base_url('assets/uploads/services_images/') ?><?= $value['img'] ?>" alt="" width="50px"></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link"><?= $value['services'] ?></a></h4>
                            <p class="description"><?= $value['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section><!-- End Our Services Section -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Team</h2>

            </div>

            <div class="row gy-4">
                <?php foreach ($teams as $key => $value) : ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="<?= base_url('assets/uploads/authors/') . $value['images'] ?>" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://twitter.com/<?= $value['twitter'] ?>"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.facebook.com/<?= $value['facebook'] ?>"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/<?= $value['instagram'] ?>"><i class="bi bi-instagram"></i></a>
                                    <a href="https://www.linkedin.com/<?= $value['linked_in'] ?>"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?= $value['name'] ?></h4>
                                <span><?= $value['title'] ?></span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                <?php endforeach; ?>
            </div>

        </div>
    </section><!-- End Team Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>

            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <?php foreach ($testimoni as $key => $value) : ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <?php for ($i = 1; $i < $value['rating']; $i++) {
                                        echo '<i class="bi bi-star-fill"></i>';
                                    } ?>
                                </div>
                                <p>
                                    <?= $value['description'] ?>
                                </p>
                                <div class="profile mt-auto">
                                    <img src="<?= base_url('assets/uploads/testimoni/') . $value['images'] ?>" class="testimonial-img" alt="">
                                    <h3><?= $value['name'] ?></h3>
                                    <h4><?= $value['title'] ?></h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    <?php endforeach; ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->