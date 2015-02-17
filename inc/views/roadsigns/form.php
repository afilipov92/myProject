<div><?= $this->result ?></div>
<div id="block">
    <p align="center"><b>Форма добавления знака</b></p>

    <form id="form" name="form4" class="form1" method="post">
        <div>
            <label for="id">ИД :</label>
            <br/>
            <input id="id" type="text" name="id" value="<?= $this->data->id ?>">

            <p data-name="id"></p>
        </div>
        <div>
            <label for="latitude">Широта *:</label>
            <br/>
            <input id="latitude" type="text" name="latitude" required value="<?= $this->data->latitude ?>">

            <p data-name="latitude"></p>
        </div>
        <div>
            <label for="longitude">Долгота *:</label>
            <br/>
            <input id="longitude" type="text" name="longitude" required value="<?= $this->data->longitude ?>">

            <p data-name="longitude"></p>
        </div>
        <div>
            <label for="number">Номер знака *:</label>
            <br/>
            <input id="number" type="text" name="number" required value="<?= $this->data->number ?>">

            <p data-name="number"></p>
        </div>
        <div>
            <label for="rotation">Поворот *:</label>
            <br/>
            <input id="rotation" type="text" name="rotation" required value="<?= $this->data->rotation ?>">

            <p data-name="number"></p>
        </div>
        <div>
            <label for="info">Дополнительная инфрмация:</label>
            <br/>
                <textarea id="info" name="info">
                </textarea>
            <p data-name="info"></p>
        </div>

        <div>
            <input type="submit" name="submit" id="submit" value="Добавить знак">
            <input type="submit" name="edit" id="edit" value="Редактировать знак">
            <input type="submit" name="delete" id="delete" value="Удалить знак">
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

    </form>
</div>
