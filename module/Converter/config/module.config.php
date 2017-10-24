<?php
namespace Converter;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\ConverterController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'Converter' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/convert',
                    'defaults' => [
                        'controller'    => Controller\ConverterController::class,
                        'action'        => 'convert',
                    ],
                ],
                'may_terminate' => true,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'converter' => __DIR__ . '/../view',
        ],
    ],
];
