<!-- ======= Hero Section ======= -->
<style>
    .hero {
        width: 100%;
        min-height: 100vh;
        background: url('<?= base_url('assets/uploads/web_settings/banner/') . $websettings['banner_hero'] ?>') top center;
        background-size: cover;
        position: relative;
        padding: 120px 0;
        z-index: 3;
    }
</style>

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up"><?= $websettings['nama'] ?></h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <p><?= $websettings['deskripsi'] ?> </p>
                </blockquote>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?= base_url('contact') ?>" class="btn-get-started">Get Started</a>
                    <a href="<?= $websettings['link_youtube'] ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>

            </div>
        </div>
    </div>
</section><!-- End Hero Section -->