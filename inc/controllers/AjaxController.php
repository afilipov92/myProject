<?php

class AjaxController extends Controller {
    /**
     * render parameters to js
     */
    public function mapAction() {
        $this->renderJson(RoadsignModel::selectSigns());
    }
}