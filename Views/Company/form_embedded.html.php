<?php

/*
 * @copyright   2016 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// Preserve the order of the default groups.
$groups = [];
foreach ($mzfgbTranslatedGroups as $group => $translation) {
    if (isset($fields[$group])) {
        $groups[] = $group;
    }
}
?>

<?php echo $view['form']->start($form); ?>
    <div class="box-layout">
        <ul class="nav nav-tabs pr-md pl-md mt-10">
            <?php $step = 1; ?>
            <?php foreach ($groups as $g): ?>
                <?php if (!empty($fields[$g])): ?>
                    <li class="<?php if (1 === $step) {
    echo 'active';
} ?>">
                        <a href="#company-<?php echo $g; ?>" class="steps" data-toggle="tab">
                            <?php echo $mzfgbTranslatedGroups[$g]; ?>
                        </a>
                    </li>
                    <?php ++$step; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-content pa-md">
        <?php echo $view->render(
            'MauticLeadBundle:Company:form_fields.html.php',
            ['form' => $form, 'groups' => $groups, 'fields' => $fields, 'embedded' => true, 'mzfgbTranslatedGroups' => $mzfgbTranslatedGroups]
        ); ?>
    </div>
    </div>

<?php echo $view['form']->end($form); ?>