<?php
namespace Auth;

use Auth\Model\Auth;
use Auth\Model\AuthTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
  public function getAutoloaderConfig()
  {
      return array('Zend\Loader\ClassMapAutoloader' => array(
                    __DIR__.'/autoload_classmap.php',
                    ),
                    'Zend\Loader\StandardAutoLoader' => array(
                           'namespaces' => array(
                         __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__,
                         ),
                        ),
                       );
  }  
 
  public function getConfig()
  {
      return include __DIR__.'/config/module.config.php';
  }
  
  public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Auth\Model\AuthTable' =>  function($sm) {
                     $tableGateway = $sm->get('AuthTableGateway');
                     $table = new HomeTable($tableGateway);
                     return $table;
                 },
                 'AuthTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Home());
                     return new TableGateway('login', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }

?>
