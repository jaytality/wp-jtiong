<!-- MEMBERS ONLY MENU -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="membersOnly" aria-labelledby="membersOnlyLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="membersOnlyLabel">Members Only</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav ms-0">
            <?php
                if (in_array('administrator', (array)$current_user->roles, true)) {
                    ?>
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?= admin_url() ?>">Wordpress Admin</a>
                        </li>
                        <li class="nav-item">
                            <hr>
                        </li>
                    <?php
                }
            ?>
            <li class="nav-item">
                <a href="/snacks" class="nav-link<?= $section == 'snacks' ? ' active' : '' ?>">Only Snacks</a>
            </li>
        </ul>
    </div>
</div>