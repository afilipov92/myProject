<ul class="nav navbar-nav navbar-right">
    <ul class="nav navbar-nav navbar-right">
        <?php
        if ($this->session->isLoggedIn()) {
            echo '<li class="active"><a href="#">' . $this->session->getName() . '</a></li>';
            echo '<li><a href="' . Controller::url('auth', 'logout') . '">Выйти</a></li>';
        }?>
    </ul>
</ul>