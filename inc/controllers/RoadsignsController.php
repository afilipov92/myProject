<?php

class RoadsignsController extends Controller {
    public function indexAction() {
        if (!$this->session->isLoggedIn()) {
            $this->redirect(Controller::url('auth', 'login'));
        }
        $newRoadSign = new RoadsignModel($this->session->getId());
        $this->view->result = "";
        if ($this->isPost()) {
            $newRoadSign->setAttributes($_POST);
            if ($newRoadSign->isFormVaild()) {
                if ($newRoadSign->addRoadSign()) {
                    $this->view->result = "Вы успешно добавили знак";
                } else {
                    $this->view->result = "Ошибка сохранения";
                }
            } else {
                $this->view->gbErrors = $newRoadSign->getErrors();
            }

        }
       // $this->view->roadSigns = RoadsignModel::selectSigns();
        $this->view->data = $newRoadSign;
        $marker = new MarkerModel();
        $this->view->markers = $marker->getListMarkers();
        $this->view->cat = $marker->categories;
        if($this->isAjax()){
            $this->view->displayPartial('roadsigns/form');
        } else {
            $this->view->display('roadsigns/map');
        }
       // $this->view->display('roadsigns/map');
    }
}