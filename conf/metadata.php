<?php
/*
 * unsplashdoku plugin, configuration metadata
 *
 */

$meta['enabled'] = array('onoff');
$meta['keyword'] = array('string', '_pattern' => '/^([a-z]+)?$/');
$meta['selection'] = array('multichoice', '_choices' => array('weekly', 'daily'));
$meta['background_color'] = array('multichoice','_choices' => array('','#000','#111', '#222','#333','#444','#555','#666','#777','#888','#999','#aaa','#bbb','#ccc','#ddd','#eee','#fff'));
$meta['background_blend'] = array('multichoice','_choices' => array('','screen', 'soft-light', 'hard-light', 'luminosity'));
