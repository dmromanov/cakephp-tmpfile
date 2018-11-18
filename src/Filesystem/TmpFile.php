<?php

namespace TmpFile\Filesystem;

use Cake\Filesystem\File;
use function register_shutdown_function;

/**
 * Temporary File
 *
 * A class for creating files, that will be deleted after program's terminated.
 *
 * @package TmpFile\Filesystem
 */
class TmpFile extends File
{
    /**
     * TmpFile constructor.
     *
     * @param string $prefix The prefix of the generated temporary filename.
     * @param string $path The directory where the temporary filename will be created
     * @param int $mode File permissions
     */
    public function __construct(string $prefix = '', string $path = TMP, int $mode = 0755)
    {
        $file = tempnam($path, $prefix);
        // Shutdown function runs in case of an error.
        register_shutdown_function(function () {
            $this->delete();
        });
        parent::__construct($file, true, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function __destruct()
    {
        $this->delete();
        parent::__destruct();
    }
}
