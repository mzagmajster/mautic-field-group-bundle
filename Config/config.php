<?php

declare(strict_types=1);

return [
    'name'        => 'MZagmajsterFieldGroupBundle',
    'description' => 'Enable adding custom field groups via GUI<br /> <a href="https://maticzagmajster.ddns.net/">Website</a>',
    'version'     => '1.0.0',
    'author'      => 'Matic Zagmajster',

    'routes'      => [
        'main'   => [
            'mautic_mzfgb.field_group_index' => [
                'path'       => '/field-groups/{page}',
                'controller' => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupStandardController::indexAction',
            ],

            'mautic_mzfgb.field_group_action' => [
                'path'       => '/field-groups/{objectAction}/{objectId}',
                'controller' => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupStandardController::executeAction',
            ],
        ],  // end routes.main

        'public' => [],  // end routes.public
        
        'api'    => [ 
            'mautic_api_getfieldGroup' => [
                'class'         => MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::class,
                'path'          => 'mz/field-groups/{objectId}',
                'controller' => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::indexAction',
                'method'        => 'GET',
                'defaults'      => [
                    'objectId' => -1
                ]
            ],

            'mautic_api_postfieldGroup' => [
                'class'         => MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::class,
                'path'          => 'mz/field-groups',
                'controller'    => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::newAction',
                'method'        => 'POST',
                'defaults'      => []
            ],

            'mautic_api_patchfieldGroup' => [
                'class'         => MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::class,
                'path'          => 'mz/field-groups/{objectId}',
                'controller' => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::editAction',
                'method'        => 'PATCH',
                'defaults'      => [
                    'objectId' => null
                ]
            ],

            'mautic_api_deletefieldGroup' => [
                'class'         => MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::class,
                'path'          => 'mz/field-groups/{objectId}',
                'controller' => 'MauticPlugin\MZagmajsterFieldGroupBundle\Controller\FieldGroupApiController::deleteAction',
                'method'        => 'DELETE',
                'defaults'      => [
                    'objectId' => null
                ]
            ],


        ],  // end routes.api
    ],  // end routes

    'services'    => [
        'events' => [
        ],  // end services.events

        'models' => [
            'mautic.mzfgb.model.field_group' => [
                'class' => MauticPlugin\MZagmajsterFieldGroupBundle\Model\FieldGroupModel::class,
                'arguments' => []
            ]

        ],  // end services.models

        'integrations' => [
        ],  // end services.integrations

        'forms' => [
            'mautic.mz.form.extension.field_group_type' => [
                'class'        => MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type\FieldGroupExtensionType::class,
                'arguments'    => [
                    'mautic.helper.core_parameters',
                    'mautic.mzfgb.model.field_group'
                ],
                'tag'          => 'form.type_extension',
                'tagArguments' => [
                    'extended_type' => Mautic\LeadBundle\Form\Type\FieldType::class,
                ],
            ],

            'mautic.mz.form.mz_field_group_type' => [
                'class' => MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type\MZFieldGroupType::class,
                'arguments' => [
                    'mautic.security'
                ]
            ]
        ],  // end services.forms

        'helpers' => [
        ],  // end services.helpers

        'other'        => [
        ],  // end services.other
    ],

    'menu'        => [
        'admin' => [
            'mautic.mzfgb.menu.root' => [
                'route'     => 'mautic_mzfgb.field_group_index',
                'iconClass' => 'fa-list',
                'id'        => 'mautic_mzfgb.field_group_index',
                'access'    => 'admin',
                'checks'    => [],
            ],
        ]
    ],  // end menu

    'parameters' => [],  // end parameters
];
