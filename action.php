<?php
/**
 * unsplash action plugin: set background from unsplash
 *
 * @author Milosz Galazka <milosz@sleeplessbeastie.eu>
 */
 
if(!defined('DOKU_INC')) die();
 
 
class action_plugin_unsplash extends DokuWiki_Action_Plugin {
 
    /**
     * Register its handlers with the DokuWiki's event controller
     */
    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_addcss');
    }
 
    /**
     * Add CSS into page headers.
     */
    public function _addcss(Doku_Event $event, $param) {
        $event->data['style'][] = array(
                            'type'    => 'text/css',
                            '_data'   => 'html {height: 100%;} body {min-height: 100%;background-image: url(https://source.unsplash.com/weekly/) !important; background-size: cover;background-blend-mode: screen; background-color: #aaa !important; }');
    }
}
