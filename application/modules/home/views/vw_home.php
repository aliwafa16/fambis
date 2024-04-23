<main id="main">

    <!-- ======= Why Choose Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Why Choose Us</h2>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bg" style="background-image: url('<?= ASSETS_URL_FRONTEND ?>img/why-us-bg.jpg')"></div>
                <div class="col-xl-7 slides  position-relative">

                    <div class="slides-1 swiper">
                        <div class="swiper-wrapper">

                            <?php foreach ($why_chooseus as $key => $value) : ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3"><?= $value['title'] ?></h3>
                                        <h4 class="mb-3"><?= $value['qoute'] ?></h4>
                                        <p><?= $value['deskripsi'] ?></p>
                                    </div>
                                </div><!-- End slide item -->
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>

        </div>
    </section><!-- End Why Choose Us Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="services-list" class="services-list">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Category</h2>

            </div>

            <div class="row gy-5">

                <?php foreach ($category as $key => $value) : ?>
                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon flex-shrink-0 me-2"><img src="<?= base_url('assets/uploads/category_images/') ?><?= $value['img'] ?>" alt="" width="50px"></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link"><?= $value['category'] ?></a></h4>
                            <p class="description"><?= $value['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3><?= $websettings['title_cta'] ?></h3>
                    <p><?= $websettings['deskripsi_cta'] ?></p>
                    <a class="cta-btn" href="<?= base_url('contact') ?>">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Recent Blog Posts</h2>

            </div>

            <div class="row gy-5">
                <?php foreach ($blogs as $key => $value) : ?>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="post-box">
                            <div class="post-img"><img src="<?= base_url('assets/uploads/banner_blogs/') ?><?= $value['banner'] ?>" class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date"><?= tgl_indo($value['post_date'])  ?></span>
                                <span class="post-author"> / <?= $value['authors_name'] ?></span>
                            </div>
                            <h3 class="post-title"><?= $value['title'] ?></h3>
                            <p><?= substr($value['body'], 0, 90) ?>...</p>
                            <a href="<?= base_url('home/blogs/') ?><?= $value['slug'] ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </section><!-- End Recent Blog Posts Section -->

</main><!-- End #main -->