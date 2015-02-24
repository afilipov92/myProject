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
                        $this->view->result = "Знак обновлен";
                    } else {
                        $this->view->result = "Ошибка обновления";
                    }
                } else if ($this->isDeletePost()) {
                    if ($newRoadSign->deleteRoadSign()) {
                        $this->view->result = "Знак удален";
                    } else {
                        $this->view->result = "Ошибка удаления знака";
                    }
                } else {
                    if ($newRoadSign->addRoadSign()) {
                        $this->view->result = "Знак добавлен";
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
        if($this->isAjax()) {
            $this->view->displayPartial('roadsigns/form');
        } else {
            $this->view->display('roadsigns/map');
        }
    }
}