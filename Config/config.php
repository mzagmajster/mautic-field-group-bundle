<?php

declare(strict_types=1);

return [
    'name'        => 'MZagmajsterFieldGroupBundle',
    'description' => 'Enable adding custom field groups via GUI',
    'version'     => '0.0.0',
    'author'      => 'Matic Zagmajster',

    'routes'      => [
        'main'   => [],  // end routes.main
        'public' => [],  // end routes.public
        'api'    => [],  // end routes.api
    ],  // end routes

    'services'    => [
        'events' => [
        ],  // end services.events

        'models' => [
        ],  // end services.models

        'integrations' => [
        ],  // end services.integrations

        'forms' => [
            'mautic.mz.form.extension.field_group_type' => [
                'class'        => MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type\FieldGroupExtensionType::class,
                'arguments'    => [
                    'mautic.helper.core_parameters',
                ],
                'tag'          => 'form.type_extension',
                'tagArguments' => [
                    'extended_type' => Mautic\LeadBundle\Form\Type\FieldType::class,
                ],
            ],
        ],  // end services.forms

        'helpers' => [
        ],  // end services.helpers

        'other'        => [
        ],  // end services.other
    ],

    'menu'        => [],  // end menu

    'parameters' => [
        'mz_fgb_field_groups' => [
            'mautic.lead.field.group.core'              => 'core',
            'mautic.lead.field.group.social'            => 'social',
            'mautic.lead.field.group.personal'          => 'personal',
            'mautic.lead.field.group.professional'      => 'professional',

        /** Add new groups. */
        ],
    ],
];
