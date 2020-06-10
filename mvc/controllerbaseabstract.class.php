<?php

namespace BetterWP\MVC;

use BetterWP\MVC\ViewBaseAbstract;

abstract class ControllerBaseAbstract {

    public static function get_base_path() {
        return parent::get_base_path() . '/controllers';
    }

    public function render( string $view_name, ...$vars ) {
        return ViewBaseAbstract::render( $view_name, ...$vars );
    }

    abstract public function index( ...$params );

}
