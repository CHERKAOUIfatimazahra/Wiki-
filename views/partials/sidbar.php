<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="/assets/images/wiki.png" alt="Wiki™">
        </div>
        <span class="logo_name">Wiki™</span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <?php if ($_SESSION['role'] == 1): ?>
                <li><a href="/dashboard">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">users</span>
                    </a></li>
                <li><a href="/dashboard/category">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Category</span>
                    </a></li>
                <li><a href="/dashboard/tag">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Tags</span>
                    </a></li>
            <?php endif ?>

            <li><a href="/dashboard/wiki">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">wikis</span>
                </a></li>
        </ul>
        <ul class="logout-mode">
            <li><a href="/logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            <li><a href="/">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Home</span>
                </a></li>
        </ul>
    </div>
</nav>