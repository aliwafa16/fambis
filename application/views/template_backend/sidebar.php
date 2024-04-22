        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?= ASSETS_URL ?>images/logo_blue.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item <?= ($title == 'Dashboard') ? 'active' : '' ?>">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($sidebar == 'websettings') ? 'active' : '' ?>">
                            <a href="<?= base_url('websettings') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Website Setting</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Management Blog</li>
                        <li class="sidebar-item <?= ($sidebar == 'blogs') ? 'active' : '' ?>">
                            <a href="<?= base_url('blogs') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Blogs</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($sidebar == 'category_blogs') ? 'active' : '' ?>">
                            <a href="<?= base_url('category_blogs') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Category Blogs</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($sidebar == 'authors') ? 'active' : '' ?>">
                            <a href="<?= base_url('authors') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Authors</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($sidebar == 'tags') ? 'active' : '' ?>">
                            <a href="<?= base_url('tags') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>