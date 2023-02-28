<?php
declare(strict_types=1);

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type;

use Mautic\LeadBundle\Form\Type\FieldType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldGroupExtensionType extends AbstractTypeExtension
{
    public function __construct()
    {}

    public function getExtendedType()
    {
        return FieldType::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $disabled = (!empty($options['data'])) ? $options['data']->isFixed() : false;

        $builder->add(
            'group',
            ChoiceType::class,
            [
                'choices'           => [
                    'mautic.lead.field.group.core'              => 'core',
                    'mautic.lead.field.group.social'            => 'social',
                    'mautic.lead.field.group.personal'          => 'personal',
                    'mautic.lead.field.group.professional'      => 'professional',
                    'mautic.mz.field.group.test1'               => 'test1',
                    'mautic.mz.field.group.test2'               => 'test2',
                ],
                'attr' => [
                    'class'   => 'form-control',
                    'tooltip' => 'mautic.lead.field.form.group.help',
                ],
                'expanded'    => false,
                'multiple'    => false,
                'label'       => 'mautic.lead.field.group',
                'placeholder' => false,
                'required'    => false,
                'disabled'    => $disabled,
            ]
        );
    }
}