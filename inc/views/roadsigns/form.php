<form name="form4" id="form1" class="form1" method="post">
    <p align="center"><b>Форма добавления знака</b></p>
    <div><?= $this->result ?></div>
    <div>
        <input id="id" type="hidden" name="id" value="<?= $this->data->id ?>">
    </div>
    <div>
        <input id="latitude" type="hidden" name="latitude" required value="<?= $this->data->latitude ?>">
    </div>
    <div>
        <input id="longitude" type="hidden" name="longitude" required value="<?= $this->data->longitude ?>">
    </div>
    <div>
        <input id="number" type="hidden" name="number" required value="<?= $this->data->number ?>">
    </div>
    <div>
        <input id="rotation" type="hidden" name="rotation" required value="<?= $this->data->rotation ?>">
    </div>
    <div>
        <label for="info">Дополнительная инфрмация:</label>
        <br/>
        <textarea id="info" name="info">
            <?= $this->data->info ?>
        </textarea>

        <p data-name="info"></p>
    </div>

    <div>
        <input type="submit" class="btn btn-sm btn-success" name="submit" id="submit" value="Добавить знак">
        <input type="submit" class="btn btn-sm btn-warning" name="edit" id="edit" value="Редактировать знак">
        <input type="submit" class="btn btn-sm btn-danger" name="delete" id="delete" value="Удалить знак">
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
