<?php

declare(strict_types=1);

namespace MauticPlugin\MZagmajsterFieldGroupBundle;

use Doctrine\DBAL\Schema\Schema;
use Mautic\CoreBundle\Factory\MauticFactory;
use Mautic\PluginBundle\Bundle\PluginBundleBase;
use Mautic\PluginBundle\Entity\Plugin;

class MZagmajsterFieldGroupBundle extends PluginBundleBase
{
    /**
     * Called by PluginController::reloadAction when adding a new plugin that's not already installed.
     *
     * @param null $metadata
     */

    // onPluginInstall calls the install schema.
    /*public static function onPluginInstall(
        Plugin $plugin,
        MauticFactory $factory,
        $metadata = null,
        $installedSchema = null
    ) {
    }*/

    /**
     * Called by PluginController::reloadAction when the plugin version does not match what's installed.
     *
     * @param null   $metadata
     * @param Schema $installedSchema
     *
     * @throws \Exception
     */
    public static function onPluginUpdate(Plugin $plugin, MauticFactory $factory, $metadata = null, Schema $installedSchema = null)
    {
    }
}
