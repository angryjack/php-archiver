<?php
/**
 * User: angryjack
 * Date: 09.01.19 : 15:46
 */

namespace Angryjack\Archiver;

use \ZipArchive;

class Archiver
{
    protected $archiver;

    public function __construct()
    {
        $this->archiver = new ZipArchive();
    }

    /**
     * Архивирование папки включая саму себя
     * @param $sourcePath - путь к папке
     * @param $outZipPath - по какому пути будет находиться архив и его название
     */
    public function makeArchive($sourcePath, $outZipPath)
    {
        $pathInfo = pathInfo($sourcePath);
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];

        $this->archiver->open($outZipPath, ZIPARCHIVE::CREATE);
        $this->archiver->addEmptyDir($dirName);
        $this->folderToArchive($sourcePath, $this->archiver, strlen("$parentPath/"));
        $this->archiver->close();
    }

    /**
     * Архивируем файлы и папки
     * @param $folder
     * @param $archiveInstance
     * @param $exclusiveLength
     */
    private function folderToArchive($folder, &$archiveInstance, $exclusiveLength)
    {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
            if ($f != '.' && $f != '..') {
                $filePath = "$folder/$f";
                $localPath = substr($filePath, $exclusiveLength);
                if (is_file($filePath)) {
                    $archiveInstance->addFile($filePath, $localPath);
                } elseif (is_dir($filePath)) {
                    $archiveInstance->addEmptyDir($localPath);
                    $this->folderToArchive($filePath, $archiveInstance, $exclusiveLength);
                }
            }
        }
        closedir($handle);
    }
}
