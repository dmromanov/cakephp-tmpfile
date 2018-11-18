<?php

namespace TmpFile\Test\TestCase\Filesystem;

use Cake\Filesystem\File;
use function gc_collect_cycles;
use PHPUnit\Framework\TestCase;
use TmpFile\Filesystem\TmpFile;

class TmpFileTest extends TestCase
{
    public function testConstruction()
    {
        $file = new TmpFile('foo', TMP);

        $filename = $file->name();
        $directory = $file->folder()->path;

        $this->assertTrue($file->exists());
        $this->assertStringStartsWith("foo", $filename);
        $this->assertEquals(rtrim(TMP, DS), $directory);

        $file->__destruct();
        unset($file);

        $file = new File(sprintf('%s%s%s', $directory, DS, $filename));
        $this->assertFalse($file->exists(), "File should not exist");
    }
}
