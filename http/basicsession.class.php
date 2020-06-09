<?php

namespace BetterWP\Http;

use BetterWP\Http\SessionContainer;
/**
 * TODO: everything
 */
class BasicSession extends SessionContainer {
    public static function start() {

        if( !session_id() ) {

            session_start();

        }
    
    }

    public static function destroy() {
        session_destroy();
    }

    public static function unset() {
        // remove all session variables
        session_unset();
    }

    public static function stop() {
        self::unset();
        self::destroy();
    }
}