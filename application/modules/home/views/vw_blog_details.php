 <section id="blog" class="blog">
     <div class="container" data-aos="fade-up">

         <div class="row g-5">

             <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                 <article class="blog-details">

                     <div class="post-img">
                         <img src="<?= base_url('assets/uploads/banner_blogs/') . $blogs['banner'] ?>" alt="" class="img-fluid">
                     </div>

                     <h2 class="title"><?= $blogs['title'] ?></h2>

                     <div class="meta-top">
                         <ul>
                             <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url('search?keywords=') . $blogs['authors_name'] ?>"><?= $blogs['authors_name'] ?></a></li>
                             <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?= tgl_indo($blogs['post_date']) ?></time></a></li>
                             <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> -->
                         </ul>
                     </div><!-- End meta top -->

                     <div class="content">
                         <?= $blogs['body'] ?>
                     </div><!-- End post content -->

                     <div class="meta-bottom">
                         <i class="bi bi-folder"></i>
                         <ul class="cats">
                             <li><a href="<?= base_url('search?keywords=') . $blogs['category'] ?>"><?= $blogs['category'] ?></a></li>
                         </ul>

                         <i class="bi bi-tags"></i>
                         <ul class="tags">
                             <?php $tags = json_decode($blogs['tags'], true) ?>
                             <?php foreach ($tags as $key => $value) : ?>
                                 <li><a href="#"><?= $value ?></a></li>
                             <?php endforeach; ?>
                         </ul>
                     </div><!-- End meta bottom -->

                 </article><!-- End blog post -->

                 <div class="post-author d-flex align-items-center">
                     <img src="<?= base_url('assets/uploads/authors/') . $blogs['pic_profile'] ?>" class="rounded-circle flex-shrink-0" alt="">
                     <div>
                         <h4><?= $blogs['authors_name'] ?></h4>
                         <div class="social-links">
                             <a href="https://twitters.com/<?= $blogs['twitter'] ?>"><i class="bi bi-twitter"></i></a>
                             <a href="https://facebook.com/<?= $blogs['facebook'] ?>"><i class="bi bi-facebook"></i></a>
                             <a href="https://instagram.com/<?= $blogs['instagram'] ?>"><i class="biu bi-instagram"></i></a>
                         </div>
                         <p>
                             <?= $blogs['authors_desc'] ?>
                         </p>
                     </div>
                 </div><!-- End post author -->

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
                                 <li><a href="#"><?= $value['category'] ?> <span>(0)</span></a></li>
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
 </section><!-- End Blog Details Section -->