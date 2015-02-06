<div><?= $this->result ?></div>
<div id="block">
    <p align="center"><b>Форма регистрации</b></p>

    <form name="form4" class="form1" method="post">
        <div>
            <label for="login">Логин *:</label>
            <br/>
            <input id="login" type="text" name="login" required value="<?= $this->msg->login ?>">

            <p data-name="login"></p>
        </div>
        <div>
            <label for="email">E-mail адрес *:</label>
            <br/>
            <input id="email" type="email" name="email" required value="<?= $this->msg->email ?>">

            <p data-name="email"></p>
        </div>
        <div>
            <label for="password">Пароль *:</label>
            <br/>
            <input id="password" type="password" name="password" required value="">

            <p data-name="password"></p>
        </div>
        <div>
            <label for="passwordConfirm">Пароль (подтверждение) *:</label>
            <br/>
            <input id="passwordConfirm" type="password" name="passwordConfirm" required value="">

            <p data-name="passwordConfirm"></p>
        </div>
        <div>
            <label for="captcha">Защита от роботов *:</label>

            <div>
                <div>
                    <span><img src="<?= Controller::url('captcha') ?>"/></span>
                    <input id="captcha" name="captcha" placeholder="Введите ответ" type="text" required>
                </div>
                <p data-name="captcha"></p>
            </div>
        </div>
        <div>
            <input type="submit" name="submit" id="submit" value="Регистрация">
        </div>
    </form>
</div>

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