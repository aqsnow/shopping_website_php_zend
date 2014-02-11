<?php
namespace ShoppingCart;
return array(
     'controllers' => array(
            'invokables' => array(
                'ShoppingCart\Controller\ShoppingCart' => 'ShoppingCart\Controller\ShoppingCartController',
             ),
           ),
      'router' => array(
             'routes' => array(
                 'shoppingcart' => array(
                      'type' => 'segment',
                      'options' => array(
                         'route' => '/shoppingcart[/][:action][/:id][/:number]',
                         'constraints' => array(
                               'action' => '[a-zA-Z0-9_-]*',
                               'id'     => '[0-9]*',
                               'number' => '[0-9]*',                              
                         ),
                         'defaults' => array(
                               'controller' => 'ShoppingCart\Controller\ShoppingCart',
                               'action'     => 'show',
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
                'shopping_cart' => __DIR__.'/../view',
                'credit_pay_success' =>  __DIR__.'/../view/shopping-cart/shopping-cart/paysuccess.phtml'
            ),
           ),

      );
?>              
