<?php

namespace BetterWP\Pattern;

/**
 * TODO: everything
 */
abstract class FactorableAbstract  {
    protected static $hookables_container = [];
    protected static $hookable_class = '';

    public static function add( $cb, ...$params ){
        
        if(is_callable($cb)) {
        
            $hookable = $cb(new static::$hookable_class());
            $hookable->register(...$params);

            static::$hookables_container[ $hookable->key ] = $hookable;
        
        } elseif (is_object($cb)) {
            
            if(is_a($cb, static::$hookable_class)) {
                $cb->register(...$params);
            }
        
        }
    
    }

    public static function add_many( $many ) {
        foreach($many as $key => $cb) {
            $hookable = new static::$hookable_class();
            $hookable->key = $key;
            $hookable->callback = $cb;
            $hookable->register();

            static::$hookables_container[ $key ] = $hookable;
        }
    }

    public static function del( $key ) {

        if( static::exists( $key ) ) {
    
            static::get( $key )->delete();

            static::unset( $key );

        }
    
    }

    public static function do( string $key ) {
        if( static::exists( $key ) ) {
            
            self:$hookables[ $key ]->do();

        }
    }

    public static function exists( string $key ) {
        return array_key_exists( $key, static::$hookables_container );
    }

    public static function get( string $key ) {
        return static::$hookables_container[ $key ];
    }

    public static function unset( string $key ) {
        unset( static::$hookables_container[ $key ] );
    }
}