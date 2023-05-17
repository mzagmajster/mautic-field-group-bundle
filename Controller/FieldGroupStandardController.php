<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Controller;

use Mautic\CoreBundle\Controller\AbstractStandardFormController;

class FieldGroupStandardController extends AbstractStandardFormController
{
    /**
     * This is also for RouteBase.
     *
     * @return string
     */
    protected function getModelName()
    {
        return 'mzfgb.field_group';
    }

    /**
     * Get controller base.
     *
     * Tells how to access this class.
     *
     * @return string
     */
    protected function getControllerBase()
    {
        return 'MZagmajsterFieldGroupBundle:FieldGroupStandard';
    }

    /**
     * Get template base.
     *
     * Tells where the templates used by AbstractStandardFormController are.
     *
     * @return string
     */
    protected function getTemplateBase()
    {
        return 'MZagmajsterFieldGroupBundle:FieldGroup';
    }

    // Standard actions on Levels.

    public function indexAction($page = 1)
    {
        return parent::indexStandard($page);
    }

    public function newAction()
    {
        return parent::newStandard();
    }

    public function editAction($objectId, $ignorePost = false)
    {
        return parent::editStandard($objectId, $ignorePost);
    }

    public function deleteAction($objectId)
    {
        return parent::deleteStandard($objectId);
    }
}