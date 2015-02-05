<?php

class RoadsignsController extends Controller {
    public function indexAction() {
        $this->view->display('roadsigns/map');
    }
}