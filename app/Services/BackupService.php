<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupService
{
    /**
     * @var
     */
    private $disk;
    private $folder;

    public function __construct()
    {
        $this->disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $this->folder = config('backup.backup.name');
    }


    /**
     * Get backup file location
     */
    private function filePath($file)
    {
        return $this->folder.'/'.$file;
    }

    /**
     * Get the backup disk
     */
    public function get()
    {
        $files = $this->disk->files($this->folder);    //Get backup folder

        return $this->getBackups($files);

    }

    /**
     * get backup files
     */
    private function getBackups($files)
    {
        $backups = [];

        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $this->disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace($this->folder.'/','',$f),
                    'file_size' => $this->disk->size($f),
                    'last_modified' => date('j F Y, H:i ',$this->disk->lastModified($f)),
                ];
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);

        return $backups;
    }

    /**
     * Create new Backup file
     */
    public function createBackup()
    {
        return $this->backupRun();
    }

    /**
     * Run backup command
     */
    private function backupRun()
    {
        Artisan::call('backup:run');

        return Artisan::output();
    }

    /**
     * Download backup file
     */
    public function download($file)
    {
        $file = $this->filePath($file); //Get file path

        if ($this->disk->exists($file)) {
            //Get disk driver
            $fs = $this->disk->getDriver();
            $stream = $fs->readStream($file);

            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            },200,[
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        }
        else {
            return back()->withErrors('sorry file do not exists');
        }
    }

    public function delete($file)
    {
        try {
            $file = $this->filePath($file);
            //Check if file exists
            if ($this->disk->exists($file)){
                $this->disk->delete($file);
            }
        }
        catch (\Exception $e) {
            throw $e;
        }
    }


}
