<?php

declare(strict_types=1);

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type;

use Mautic\CoreBundle\Helper\CoreParametersHelper;
use Mautic\LeadBundle\Form\Type\FieldType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldGroupExtensionType extends AbstractTypeExtension
{
    /**
     * @var CoreParametersHelper;
     */
    private $coreParametersHelper;

    public function __construct(CoreParametersHelper $coreParametersHelper)
    {
        $this->coreParametersHelper = $coreParametersHelper;
    }

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
                'choices'           => $this->coreParametersHelper->get('mz_fgb_field_groups'),
                'attr'              => [
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
