<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Model;

use Mautic\CoreBundle\Model\FormModel;
use MauticPlugin\MZagmajsterFieldGroupBundle\Entity\FieldGroup;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class FieldGroupModel extends FormModel
{
    const MAUTIC_FIELD_GROUP_TRANSLATION_BASE = 'mautic.lead.field.group.';

    public function getRepository()
    {
        return $this->em->getRepository('MZagmajsterFieldGroupBundle:FieldGroup');
    }

    public function getPermissionBase()
    {
        return 'admin:full';
    }

    public function createForm($entity, $formFactory, $action = null, $options = [])
    {
        if (!$entity instanceof FieldGroup) {
            throw new MethodNotAllowedHttpException(['FieldGroup']);
        }

        if (!empty($action)) {
            $options['action'] = $action;
        }

        $options['allow_extra_fields'] = true;

        return $formFactory->create(
            'MauticPlugin\MZagmajsterFieldGroupBundle\Form\Type\MZFieldGroupType', 
            $entity, 
            $options
        );
    }

    public function getEntity($id = null)
    {
        if (null === $id) {
            $entity = new FieldGroup();
            $entity->setName('');

            return $entity;
        }

        return parent::getEntity($id);
    }

    // Custom stuff 
    public function getDefaultGroups() {
        return [
            'mautic.lead.field.group.core'              => 'core',
            'mautic.lead.field.group.social'            => 'social',
            'mautic.lead.field.group.personal'          => 'personal',
            'mautic.lead.field.group.professional'      => 'professional',
        ];
    }

    public function getGroups() {

        $groups = $this->getDefaultGroups();
        $dbRecords = $this->getEntities([
            'ignore_paginator' => false
        ]);

        foreach ($dbRecords as $record) {
            $translation =  $record->getCompTranslation();

            if (!isset($groups[$translation])) {
                $groups[$translation] = $record->getCompName();
            }
        }

        return $groups;

    }
}