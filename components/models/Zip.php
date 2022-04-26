<?php

class Zip {
    public static function deleteZip($dirPath, $name) {
        if (!is_dir($dirPath)) return false;
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') $dirPath .= '/';
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if($file == $name . ".zip") unlink($file);
        }

        return true;
    }

    public static function createZip($dirPath, $name)
    {
        $token = Other::genString(5);
        $zpath = 'public/documents/zip/' . $name . '_' . $token . '.zip';
        $zip = new ZipArchive();
        $zip->open($zpath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $dirPath = "public/documents/$name";
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }

        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file)
        {
            $zip->addFile($file, $file);
        }
        $zip->close();
        return "/" . $zpath;
    }
}