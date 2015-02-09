<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Traffic layer</title>
    <link href="<?= Controller::url('styles' , 'style.css')?>" rel="stylesheet"/>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&language=ru"></script>
    <script type="text/javascript"
            src="<?= Controller::url('javascript', 'map.js'); ?>">
    </script>
</head>
<ul class="nav navbar-nav navbar-right">
    <ul class="nav navbar-nav navbar-right">
        <?php
        if ($this->session->isLoggedIn()) {
            echo '<li class="active"><a href="#">' . $this->session->getName() . '</a></li>';
            echo '<li><a href="' . Controller::url('auth', 'logout') . '">Выйти</a></li>';
        }?>
    </ul>
</ul>