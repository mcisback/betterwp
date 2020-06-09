<?php

namespace BetterWP\Hooks;

use BetterWP\Pattern\HookableAbstact as HookableAbstract;

/**
 * TODO: everything
 */
class AjaxAction extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        add_action(
            'wp_ajax_' . $this->key,
            array( $this, '_callback' )
        );

        add_action(
            'wp_ajax_nopriv_' . $this->key,
            array( $this, '_callback' )
        );
    
    }

    public function delete(...$params) {
        return remove_action( 'wp_ajax_' . $this->key );
    }

    public function do(...$params) {
        return do_action( 'wp_ajax_' . $this->key );
    }
}