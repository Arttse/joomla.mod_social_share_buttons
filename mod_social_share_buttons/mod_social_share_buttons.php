<?php
/**
 * @copyright      Copyright (C) 2016 Nikita «Arttse» Bystrov. All rights reserved.
 * @license        License GNU General Public License version 3
 * @author         Nikita «Arttse» Bystrov
 */

defined ( '_JEXEC' ) or die;

var_dump($params->get ( 'include_style-min-css', true ));

if ( $params->get ( 'include_style-css', true ) )
{
    if ( $params->get ( 'include_style-min-css', true ) )
    {
        JHtml::stylesheet ( 'mod_social_share_buttons/style.min.css', false, true );
    }
    else
    {
        JHtml::stylesheet ( 'mod_social_share_buttons/style.css', false, true );
    }
}

if ( $params->get ( 'include_font-awesome', true ) )
{
    JHtml::stylesheet ( 'mod_social_share_buttons/font-awesome.min.css', false, true );
}

$moduleclass_sfx = htmlspecialchars ( $params->get ( 'moduleclass_sfx' ) );

require JModuleHelper::getLayoutPath ( $module->module, $params->get ( 'layout', 'default' ) );