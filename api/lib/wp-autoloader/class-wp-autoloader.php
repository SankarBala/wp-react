<?php

class WP_Autoloader {
    /**
     * Registered namespaces/prefixes
     *
     * @var array
     */
    protected $namespaces = [];

    /**
     * Adds the classloader to the SPL autoloader stack
     *
     * @param  bool $prepend Whether to prepend to the stack
     *
     * @return bool Returns true on success or false on failure
     */
    public function register( $prepend = false ) {
        return spl_autoload_register( [ $this, 'load_class' ], true, $prepend );
    }

    /**
     * Removes the classloader from the SPL autoloader stack
     *
     * @return bool Returns true on success or false on failure
     */
    public function unregister() {
        return spl_autoload_unregister( [ $this, 'load_class' ] );
    }

    /**
     * Registers a namespace
     *
     * @param string $namespace
     * @param string $path
     * @param bool   $prepend
     *
     * @return null
     */
    public function add_namespace( $namespace, $path, $prepend = false ) {
        // normalize namespace
        $namespace = trim( $namespace, '\\' );

        // normalize path
        $path = rtrim( $path, DIRECTORY_SEPARATOR );

        // add namespace
        if ( $prepend ) {
            array_unshift( $this->namespaces, [ $namespace, $path ] );
        } else {
            array_push( $this->namespaces, [ $namespace, $path ] );
        }
    }

    /**
     * Returns the registered namespaces
     *
     * @return array
     */
    public function get_namespaces() {
        return $this->namespaces;
    }

    /**
     * Tries to resolve the given class from the registered namespaces
     *
     * @param  string $class
     *
     * @return mixed
     */
    public function load_class( $class ) {
        // check all registered namespaces
        foreach ( $this->namespaces as $namespace ) {
            list( $prefix, $path ) = $namespace;

            // find a matching prefix
            if ( 0 === strpos( $class, $prefix ) ) {
                $class_name = substr( $class, strlen( $prefix ) );

                $class_file = str_replace( [ '\\', '_' ], [ DIRECTORY_SEPARATOR, '-' ], $class_name );
                $class_file = strtolower( $class_file );
                $class_file = ltrim( $class_file, DIRECTORY_SEPARATOR );

                $last_separator = strpos( $class_file, DIRECTORY_SEPARATOR );
                $last_separator = false !== $last_separator ? ++$last_separator : 0;

                $class_file = $path . '/' . substr_replace( $class_file, 'class-', $last_separator, 0 ) . '.php';

                // require the file if it exists
                if ( is_readable( $class_file ) ) {
                    require $class_file;

                    return true;
                }
            }
        }

        // no file was found
        return false;
    }
}

