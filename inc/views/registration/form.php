<div class="container">
<div><?= $this->result ?></div>
    <form id="form" name="form1" class="form-signin" method="post">
        <h2 class="form-signin-heading">Форма регистрации</h2>
            <label for="login">Логин *:</label>
            <input id="login" name="login" type="text" class="form-control" required="true" value="<?= $this->data->login ?>">
            <label for="email">E-mail *:</label>
            <input id="email" name="email" type="email" class="form-control" required="true" value="<?= $this->data->email ?>">
            <label for="password">Пароль *:</label>
            <input id="password" name="password" type="password" class="form-control" required="true">
            <label for="passwordConfirm">Пароль (подтверждение) *:</label>
            <input id="passwordConfirm" name="passwordConfirm" type="password" class="form-control" required="true">

            <label for="captcha">Защита от роботов *:</label>
                <div class="input-group">
                    <span class="input-group-addon" style="padding: 0;"><img src="<?= Controller::url('captcha') ?>" /></span>
                    <input id="captcha" name="captcha" class="form-control" placeholder="Введите ответ" type="text"
                               required="true">
                </div>
            <button id="" name="submit" class="btn btn-lg btn-primary btn-block">Регистрация</button>

<?php
if (isset($this->gbErrors) AND !empty($this->gbErrors)) {
    ?>
    <div class="form-group">
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <ul>
                <?php foreach ($this->gbErrors as $fieldName => $error) { ?>
                    <li><strong><?= $fieldName ?></strong> <?= $error ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
</form>
</div>
