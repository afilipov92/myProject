<div class="container">
    <form id="form" class="form-signin" method="post">
        <h2 class="form-signin-heading">Вход в систему</h2>
        <input type="text" id="login" name="login" class="form-control" placeholder="Логин" required autofocus>
        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block">Войти</button>
        <a href="<?php echo Controller::url('registration')?>">Регистрация</a>
        <?php if ($this->msg) { ?>
            <div class="form-group">
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?= $this->msg ?>
                </div>
            </div>
        <?php } ?>
    </form>
</div>
