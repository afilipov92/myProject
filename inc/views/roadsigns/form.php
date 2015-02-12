<div><?= $this->result ?></div>
<div id="block">
    <p align="center"><b>Форма добавления знака</b></p>

    <form name="form4" class="form1" method="post">
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
            <input id="number" type="text" name="number" required value=""<?= $this->data->number ?>">

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