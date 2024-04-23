<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row g-5">

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <?php echo (!$blogs) ? '<h3 class="text-center">*--Artikel tidak ditemukan--*</h3>' : '' ?>
                <div class="row gy-5 posts-list">
                    <?php foreach ($blogs as $key => $value) : ?>
                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="<?= base_url('assets/uploads/banner_blogs/') ?><?= $value['banner'] ?>" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="<?= base_url('home/blogs/') ?><?= $value['slug'] ?>"><?= $value['title'] ?></a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url('search?keywords=') . $value['authors_name'] ?>"><?= $value['authors_name'] ?></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2022-01-01"><?= tgl_indo($value['post_date']) ?></time></a></li>
                                        <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> -->
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        <?= substr($value['body'], 0, 250) ?>...
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="<?= base_url('home/blogs/') ?><?= $value['slug'] ?>">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    <?php endforeach; ?>

                </div><!-- End blog posts list -->

                <!-- <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div> -->
                <!-- End blog pagination -->

            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

                <div class="sidebar ps-lg-4">

                    <div class="sidebar-item search-form">
                        <h3 class="sidebar-title">Search</h3>
                        <form action="<?= base_url('search') ?>" class="mt-3">
                            <input type="text" name="keywords">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->

                    <div class="sidebar-item categories">
                        <h3 class="sidebar-title">Categories</h3>
                        <ul class="mt-3">
                            <?php foreach ($category as $key => $value) : ?>
                                <li><a href="<?= base_url('search?keywords=') . $value['category'] ?>"><?= $value['category'] ?> <span></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- End sidebar categories-->

                    <div class="sidebar-item recent-posts">
                        <h3 class="sidebar-title">Recent Posts</h3>

                        <div class="mt-3">

                            <?php foreach ($recent_blogs as $key) : ?>
                                <div class="post-item mt-3">
                                    <img src="<?= base_url('assets/uploads/banner_blogs/') . $key['banner'] ?>" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="<?= base_url('home/blogs/') ?><?= $key['slug'] ?>"><?= $key['title'] ?></a></h4>
                                        <time datetime="2020-01-01"><?= tgl_indo($key['post_date']) ?></time>
                                    </div>
                                </div><!-- End recent post item-->
                            <?php endforeach; ?>

                        </div>

                    </div><!-- End sidebar recent posts-->

                    <div class="sidebar-item tags">
                        <h3 class="sidebar-title">Tags</h3>
                        <ul class="mt-3">
                            <?php foreach ($all_tags as $tag) : ?>
                                <li><a href="#"><?= $tag['tags'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- End sidebar tags-->

                </div><!-- End Blog Sidebar -->

            </div>

        </div>

    </div>
</section><!-- End Blog Section -->