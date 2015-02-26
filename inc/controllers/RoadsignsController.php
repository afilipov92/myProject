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
        $data = "";
        if ($this->isPost()) {
            $newRoadSign->setAttributes($_POST);
            if ($newRoadSign->isFormVaild()) {
                if ($this->isEditPost()) {
                    if ($newRoadSign->editRoadSign()) {
                        $this->redirect($this->url(DEFAULT_CONTROLLER));
                    } else {
                        $this->view->result = "Ошибка обновления";
                    }
                } else if ($this->isDeletePost()) {
                    if ($newRoadSign->deleteRoadSign()) {
                        $data = $newRoadSign->id;
                        // $this->redirect($this->url(DEFAULT_CONTROLLER));
                    } else {
                        $this->view->result = "Ошибка удаления знака";
                    }
                } else {
                    if ($newRoadSign->addRoadSign()) {
                        $newRoadSign->id = $newRoadSign->getLastInsertId();
                        $data = $newRoadSign;
                        //     $this->redirect($this->url(DEFAULT_CONTROLLER));
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
        if ($this->isAjax()) {
            $this->renderJson($data);
        } else {
            $this->view->display('roadsigns/map');
        }
    }
}