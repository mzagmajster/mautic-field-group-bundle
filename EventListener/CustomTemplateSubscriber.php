<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\EventListener;

use Mautic\CoreBundle\CoreEvents;
use Mautic\CoreBundle\Event\CustomTemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use MauticPlugin\MZagmajsterFieldGroupBundle\Model\FieldGroupModel;

class CustomTemplateSubscriber implements EventSubscriberInterface
{
    /**
     * @var FieldGroupModel
     */
    private $fieldGroupModel;

    /**
     * @var array
     */
    private $templatesToReplace;

    public function __construct(
        FieldGroupModel $fieldGroupModel
    ) {
        $this->fieldGroupModel = $fieldGroupModel;
        $this->templatesToReplace = [
            'MauticLeadBundle:Lead:lead.html.php',
            'MauticLeadBundle:Lead:form.html.php',
            'MauticLeadBundle:Field:list.html.php',

            'MauticLeadBundle:Company:company.html.php',
            'MauticLeadBundle:Company:form_embded.html.php',
            'MauticLeadBundle:Company:form_fields.html.php',
            'MauticLeadBundle:Company:form_standalone.html.php',

        ];
    }

    public static function getSubscribedEvents()
    {
        return [
            CoreEvents::VIEW_INJECT_CUSTOM_TEMPLATE => [
                ['replaceTemplates', 0],
            ],
        ];
    }

    public function replaceTemplates(CustomTemplateEvent $event)
    {

        $currentTemplate = $event->getTemplate();
        //die($currentTemplate);
        if (!in_array($currentTemplate, $this->templatesToReplace)) {
            return;
        }

        $vars = $event->getVars();
        $vars['mzfgbTranslatedGroups'] = $this->fieldGroupModel->getTranslatedGroups();

        if ('MauticLeadBundle:Lead:lead.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Lead:lead.html.php');
        } elseif ('MauticLeadBundle:Lead:form.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Lead:form.html.php');
        } elseif ('MauticLeadBundle:Field:list.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Field:list.html.php');
        } elseif ('MauticLeadBundle:Company:company.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Company:company.html.php');
        } elseif ('MauticLeadBundle:Company:form_embded.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Company:form_embded.html.php');
        } elseif ('MauticLeadBundle:Company:form_fields.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Company:form_fields.html.php');
        } elseif ('MauticLeadBundle:Company:form_standalone.html.php' == $event->getTemplate()) {
            $event->setTemplate('MZagmajsterFieldGroupBundle:Company:form_standalone.html.php');
        }

        $event->setVars($vars);
    }
}