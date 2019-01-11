<?php
/**
 * User: angryjack
 * Date: 11.01.19 : 11:00
 */

namespace Angryjack\Test\Archiver;

require_once __DIR__ . '/../src/Archiver.php';

use Angryjack\Archiver\Archiver;

class ArchiverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testMakeArchive()
    {
        $a = new Archiver();

        $sourcePath = 'not a path';
        $outZipPath = 'test.zip';

        $a->makeArchive($sourcePath, $outZipPath);
    }
}
