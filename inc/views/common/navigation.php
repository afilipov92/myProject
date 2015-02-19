<div class="navigation navbar-default navbar-static-top">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right nav-color-text">
                <?php
                if ($this->session->isLoggedIn()) {
                    echo '<li class="active-nav"><a href="#">' . $this->session->getName() . '</a></li>';
                    echo '<li><a href="' . Controller::url('auth', 'logout') . '">Выйти</a></li>';
                }?>
            </ul>
        </div>
    </div>
</div>