<?php
namespace Home;

return array(
     'controllers' => array(
            'invokables' => array(
                'Home\Controller\Home' => 'Home\Controller\HomeController',
             ),
           ),
      'router' => array(
             'routes' => array(
                 'home' => array(
                      'type' => 'segment',
                      'options' => array(
                         'route' => '/home[/][:action][/:id]',
                         'constraints' => array(
                               'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                               'id'     => '[0-9]*',
                         ),
                         'defaults' => array(
                               'controller' => 'Home\Controller\Home',
                               'action'     => 'index',
                          ),
                     ),
                   ),
                 ),
               ),       
         
       'doctrine' => array(
          'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
         
        'view_manager' => array(
        'template_map' => array(
                'layout/layout'  => __DIR__ . '/../view/layout/layout.phtml'
        ),
          'template_path_stack' => array(
                'home' => __DIR__.'/../view',
            ),
           ),
      );
?>              
