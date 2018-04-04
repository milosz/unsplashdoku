<?php
/**
 * unsplashdoku action plugin: set background using Unsplash Source https://source.unsplash.com
 *
 * @author Milosz Galazka <milosz@sleeplessbeastie.eu>
 */
 
if(!defined('DOKU_INC')) die();
 
 
class action_plugin_unsplashdoku extends DokuWiki_Action_Plugin {
 
    /**
     * Register its handlers with the DokuWiki's event controller
     */
    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_addcss');
    }
 
    /**
     * Inject CSS into page
     */
    public function _addcss(Doku_Event $event, $param) {
	$enabled = $this->getConf('enabled');

	if ($enabled == 1) {
		$selection = $this->getConf('selection');
		if ( !empty($this->getConf('keyword'))) {
			$keyword = '?' . $this->getConf('keyword');
		}
		$background_image = 'background-image: ' . 'url(https://source.unsplash.com/' . $selection . '/' . $keyword . ');';

		if ( !empty($this->getConf('background_color'))) {
			$background_color = 'background-color: ' . $this->getConf('background_color') . ' !important;';
		}
		if ( !empty($this->getConf('background_blend'))) {
			$background_blend = 'background-blend-mode: ' . $this->getConf('background_blend') . ';';
		}

		$html_style = 'html { height: 100%; }';

		$body_style = 'body { ' . 'min-height: 100%; ' .  $background_image . ' background-size: cover; ' . $background_color . ' ' . $background_blend . ' }';
		$event->data['style'][] = array('type' => 'text/css', '_data' => $html_style . ' ' .  $body_style);
	}
    }
}
