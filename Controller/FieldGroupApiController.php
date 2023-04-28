<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Controller;

use Mautic\ApiBundle\Controller\CommonApiController;
use Mautic\CoreBundle\Helper\InputHelper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use MauticPlugin\MZagmajsterFieldGroupBundle\Entity\FieldGroup;

class FieldGroupApiController extends CommonApiController {

    public function initialize(FilterControllerEvent $event)
    {
        $this->model                = $this->getModel('mz.field_group');
        $this->entityClass          = FieldGroup::class;
        $this->entityNameOne        = 'fieldGroup';
        $this->entityNameMulti      = 'fieldGroups';
        $this->serializerGroups     = [
            'fieldGroupBasicList'
        ];

        parent::initialize($event);
    }

    public function indexAction($objectId = -1) {

        if ($objectId !== -1) {
            return parent::getEntityAction((int) $objectId);
        }

        return parent::getEntitiesAction();
    }

    public function newAction() {
        return parent::newEntityAction();
    }

    public function editAction($objectId) {
        return parent::editEntityAction($objectId);
    }

    public function deleteAction($objectId) {
        return parent::deleteEntityAction($objectId);
    }


}