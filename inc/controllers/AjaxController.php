<?php

class AjaxController extends Controller {
    /**
     * render parameters in js
     */
    public function mapAction() {
        $this->renderJson(RoadsignModel::selectSigns());
    }
}