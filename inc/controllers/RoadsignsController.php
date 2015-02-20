<?php

class RoadsignsController extends Controller {
    /**
     * manipulation to add, edit, delete road signs
     */
    public function indexAction() {
        if (!$this->session->isLoggedIn()) {
            $this->redirect(Controller::url('auth', 'login'));
        }
        $newRoadSign = new RoadsignModel($this->session->getId());
        $this->view->result = "";
        if ($this->isPost()) {
            $newRoadSign->setAttributes($_POST);
            if ($newRoadSign->isFormVaild()) {
                if ($this->isEditPost()) {
                    if ($newRoadSign->editRoadSign()) {
                        $this->redirect(BASE_URL);
                    } else {
                        $this->view->result = "Ошибка обновления";
                    }
                } else if ($this->isDeletePost()) {
                    if ($newRoadSign->deleteRoadSign()) {
                        $this->redirect(BASE_URL);
                    } else {
                        $this->view->result = "Ошибка удаления знака";
                    }
                } else {
                    if ($newRoadSign->addRoadSign()) {
                        $this->redirect(BASE_URL);
                    } else {
                        $this->view->result = "Ошибка сохранения";
                    }
                }
            } else {
                $this->view->gbErrors = $newRoadSign->getErrors();
            }

        }
        $this->view->data = $newRoadSign;
        $marker = new MarkerModel();
        $this->view->markers = $marker->getListMarkers();
        $this->view->cat = $marker->categories;
        $this->view->display('roadsigns/map');
    }
}