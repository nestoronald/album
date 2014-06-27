<?php

namespace Album\Model;

 use Zend\Db\TableGateway\TableGateway;

 class SuscribeteTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getSuscribete($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveSuscribete(Suscribete $Suscribete)
     {
         $data = array(
             'artist' => $Suscribete->artist,
             'title'  => $Suscribete->title,
         );

         $id = (int) $Suscribete->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAlbum($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteSuscribete($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }

