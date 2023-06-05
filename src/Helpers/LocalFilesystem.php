<?php

namespace ThinKit\Helpers;

class LocalFilesystem
{
    public static function fileSizeBytes($dir): int
    {
        // Normalise
        $dir = rtrim(str_replace('\\', '/', $dir), '/');

        if (is_dir($dir) === true) {
            $totalSize = 0;
            $os = strtoupper(substr(PHP_OS, 0, 3));
            // If on a Unix Host (Linux, Mac OS)
            if ($os !== 'WIN') {
                $io = popen('/usr/bin/du -sb ' . $dir, 'r');
                if ($io !== false) {
                    $totalSize = intval(fgets($io, 80));
                    pclose($io);

                    return (int)$totalSize;
                }
            }
            // If on a Windows Host (WIN32, WINNT, Windows)
            if ($os === 'WIN' && extension_loaded('com_dotnet')) {
                $obj = new \COM('scripting.filesystemobject');
                if (is_object($obj)) {
                    $ref = $obj->getfolder($dir);
                    $totalSize = $ref->size;
                    $obj = null;

                    return (int)$totalSize;
                }
            }

            // If System calls did't work, use slower PHP approach
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));
            foreach ($files as $file) {
                $totalSize += $file->getSize();
            }

            return $totalSize;
        }

        if (is_file($dir) === true) {
            return (int) filesize($dir);
        }

        return 0;
    }
}
