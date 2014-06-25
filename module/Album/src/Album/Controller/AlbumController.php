<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    // agregamos este atributo
    protected $albumTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
    
    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator(); //ubica las clases del modelos
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}
