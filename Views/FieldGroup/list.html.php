<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
if ('index' == $tmpl) {
    $view->extend('MZagmajsterFieldGroupBundle:FieldGroup:index.html.php');
}
?>

<?php if (count($items)): ?>
    <div class="table-responsive page-list">
        <table class="table table-hover table-striped table-bordered mzfgb-list" id="fieldGroupTable">
            <thead>
            <tr>
                <?php
                echo $view->render(
                    'MauticCoreBundle:Helper:tableheader.html.php',
                    [
                        'checkall'        => 'true',
                        'target'          => '#fieldGroupTable',
                        'routeBase'       => 'mzfgb.field_group',
                        'templateButtons' => [],
                    ]
                );

                echo $view->render(
                    'MauticCoreBundle:Helper:tableheader.html.php',
                    [
                        'sessionVar' => 'mzfgb.field_group',
                        'orderBy'    => 'fg.name',
                        'text'       => 'mautic.core.name',
                        'class'      => 'col-mzfgb-name',
                        'default'    => true,
                    ]
                );

                echo $view->render(
                    'MauticCoreBundle:Helper:tableheader.html.php',
                    [
                        'sessionVar' => 'mzfgb.field_group',
                        'orderBy'    => 'fg.id',
                        'text'       => 'mautic.core.id',
                        'class'      => 'visible-md visible-lg col-mzfgb-id',
                    ]
                );
                ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td>
                        <?php
                        echo $view->render(
                            'MauticCoreBundle:Helper:list_actions.html.php',
                            [
                                'item'            => $item,
                                'templateButtons' => [
                                    'edit'   => true,
                                    'delete' => true,
                                ],
                                'routeBase' => 'mzfgb.field_group',
                            ]
                        );
                        ?>
                    </td>
                    <td>
                        <div>

                            <?php echo $view->render(
                                'MauticCoreBundle:Helper:publishstatus_icon.html.php',
                                ['item' => $item, 'model' => 'mzfgb.field_group']
                            ); ?>
                            
                            <a href="<?php echo $view['router']->url(
                                'mautic_mzfgb.field_group_action',
                                ['objectAction' => 'edit', 'objectId' => $item->getId()]
                            ); ?>" data-toggle="ajax">
                                <?php echo $item->getName(); ?>
                            </a>
                            
                        </div>
                    </td>
                    <td class="visible-md visible-lg"><?php echo $item->getId(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <?php echo $view->render(
            'MauticCoreBundle:Helper:pagination.html.php',
            [
                'totalItems' => count($items),
                'page'       => $page,
                'limit'      => $limit,
                'menuLinkId' => 'mautic_mzfgb.field_group_index',
                'baseUrl'    => $view['router']->url('mautic_mzfgb.field_group_index'),
                'sessionVar' => 'mzfgb.field_group',
            ]
        ); ?>
    </div>
<?php else: ?>
    <?php echo $view->render(
        'MauticCoreBundle:Helper:noresults.html.php',
        ['tip' => 'mautic.mzfgb.action.noresults.tip']
    ); ?>
<?php endif; ?>
