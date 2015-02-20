<?php

class AjaxController extends Controller {
    /**
     * render parameters to js
     */
    public function mapAction() {
        $this->renderJson(RoadsignModel::selectSigns());
    }

    /**
     * render parameter to js
     */
    public function lastpointAction() {
        $this->renderJson(RoadsignModel::selectLastSign());
    }
}