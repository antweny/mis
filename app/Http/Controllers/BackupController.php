<?php

namespace App\Http\Controllers;

use App\Services\BackupService;

class BackupController extends AuthController
{
    private $backup;

    public function __construct(BackupService $backup)
    {
        parent::__construct();
        $this->middleware('role:superAdmin');
        $this->backup = $backup;
    }

    /**
     * Get Backup files list
     */
    public function index()
    {
        try {
            $backups = $this->backup->get();
        }
        catch (\Exception $e) {
            return $this->error();
        }
        return view('settings.backup.index',compact('backups'));
    }

    /**
     * Create new backup file
     */
    public function create()
    {
        try {
            $this->backup->createBackup();

            return $this->success('New backup created');
        }
        catch (\Exception $e) {
            return $this->error('Backup failed!');
        }
    }

    /**
     * Download Backup file
     */
    public function download($file)
    {
        try {
            $this->backup->download($file);

            return $this->success('New backup created');
        }
        catch (\Exception $e) {
            return $this->error('Backup download failed!');
        }
    }

    /**
     * Download Backup file
     */
    public function delete($file)
    {
        try {
            $this->backup->delete($file);
            return $this->success('Backup deleted');
        }
        catch (\Exception $e) {
            return $this->error('The backup file doesn\'t exist.');
        }
    }



}
