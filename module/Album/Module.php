<?php
/*Clase va inicializar el módulo*/
/*la ventaja de autoloader es no usar el require y usar el script solo cuando se instancia a la clase*/

namespace Album;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }
     /*ruta de las opciones de configuracion del módulo*/
     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
 }