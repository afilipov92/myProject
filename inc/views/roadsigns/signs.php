<?php foreach ($this->markers as $key => $arr) { ?>
    <div><h3 class="extremum-click"><?= $this->cat[$key]; ?></h3>
        <div class="extremum-slide">
            <?php foreach ($arr as $sign){
                $id = substr($sign, 0, strpos($sign, '.'));
            ?>
                <img id="<?php echo $id; ?>" src="<?php echo Controller::url('images','road_signs' , $key, $sign); ?>" width="40" hegiht="40" />
            <?php }  ?>
        </div>
    </div>
<?php } ?>

