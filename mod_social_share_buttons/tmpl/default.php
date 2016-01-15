<?php
/**
 * @copyright      Copyright (C) 2016 Nikita «Arttse» Bystrov. All rights reserved.
 * @license        License GNU General Public License version 3
 * @author         Nikita «Arttse» Bystrov
 */

defined ( '_JEXEC' ) or die;

$doc = JFactory::getDocument ();

/** Title of current page */
$title = $doc->title;

/** Current url of page */
$current_url = JUri::current ();

?>

<div id="ss-buttons-<?= $module->id ?>" class="ss-buttons <?= $moduleclass_sfx ?>">
    <ul>
        <?php if ( $params->get ( 'vk', true ) ) : ?>
            <li>
                <a target="_blank" href="<?= $services['vk'] . '?' . http_build_query (
                    [
                        'url'   => $current_url,
                        'title' => $title
                    ]
                ) ?>"><i class="fa fa-vk"></i></a>
            </li>
        <?php endif; ?>

        <?php if ( $params->get ( 'facebook', true ) ) : ?>
            <li>
                <a target="_blank" href="<?= $services['facebook'] . '?' . http_build_query ( [ 'url' => $current_url ] ) ?>"><i class="fa fa-facebook"></i></a>
            </li>
        <?php endif; ?>

        <?php if ( $params->get ( 'twitter', true ) ) : ?>
            <li>
                <a target="_blank" href="<?= $services['twitter'] . '?' . http_build_query ( [ 'status' => $title . ' ' . $current_url ] ) ?>"><i class="fa fa-twitter"></i></a>
            </li>
        <?php endif; ?>

        <?php if ( $params->get ( 'google-plus', true ) ) : ?>
            <li>
                <a target="_blank" href="<?= $services['google-plus'] . '?' . http_build_query ( [ 'url' => $current_url ] ) ?>"><i class="fa fa-google-plus"></i></a>
            </li>
        <?php endif; ?>
    </ul>
</div>