<?php

namespace BetterWP\Pattern;

/**
 * TODO: everything
 */
abstract class HookableAbstract {
    public $key;
    public $callback;

    function __call($method, $args) {
        if (isset($this->$method) && $this->$method instanceof \Closure) {
            return call_user_func_array($this->$method, $args);
        }

        trigger_error("Call to undefined method " . get_called_class() . '::' . $method, E_USER_ERROR);
    }
    
    // The code to be run within the shortcode
    public function _callback( ...$params ) {
        if( is_callable( $this->callback ) ) {
            return $this->callback( ...$params );
        }

        return '';
    }

    abstract public function register(...$params);
    abstract public function delete(...$params);
    abstract public function do(...$params);
}