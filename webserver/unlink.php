<?php
    function unlink ( $filename ) {
    // try to force symlinks
    if ( is_link ($filename) ) {
        $sym = @readlink ($filename);
        if ( $sym ) {
            return is_writable ($filename) && @unlink ($filename);
        }
    }

    // try to use real path
    if ( realpath ($filename) && realpath ($filename) !== $filename ) {
        return is_writable ($filename) && @unlink (realpath ($filename));
    }

    // default unlink
    return is_writable ($filename) && @unlink ($filename);
    }   

?>