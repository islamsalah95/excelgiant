<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:backup-list|backup-create|backup-edit|backup-delete']);
        $this->middleware(['permission:backup-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:backup-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:backup-delete'], ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $path = base_path('storage/app/TechsupBusiness'); 

        $backupFiles = File::allFiles($path);
        
        // Filter for .sql files (if necessary)
        $sqlFiles = collect($backupFiles)->filter(function ($file) {
            return $file->getExtension() === 'sql';
        });

        return view('dash.backup.index', [
            'sqlFiles' => $sqlFiles,
        ]);
    }

    public function create()
    {
        // Run the backup command with --only-db option to back up only the database
        $exitCode = Artisan::call('backup:run', ['--only-db' => true]);

        // Check if the backup was successful (exitCode 0 indicates success)
        if ($exitCode === 0) {
            // Return a success response
            return response()->json([
                'message' => 'Database backup completed successfully',
                'status' => 'success',
            ]);
        } else {
            // Return an error response
            return response()->json([
                'message' => 'Database backup failed',
                'status' => 'error',
            ], 500);
        }
    }

    public function monitor()
    {
        // Check backup status
        $output = Artisan::call('backup:monitor');

        return response()->json([
            'status' => 'success',
            'output' => $output,
        ]);
    }

    public function destroy($backup)
    {
        $filePath = storage_path('app/backups/' . $backup);
    
        // Check if the file exists and delete it
        if (File::exists($filePath)) {
            File::delete($filePath);
    
            // Redirect with success message
            return redirect()->route('backups.index')->with('message', __('share.message.delete'));
        } else {
            return response()->json([
                'message' => 'Backup file not found',
                'status' => 'error',
            ], 404);
        }
    }


    public function retrive(Request $request)
    {
        // Validate backup name from the request
        $request->validate([
            'backup_name' => 'required|string|max:255',
        ]);
    
        // Backup name from the form
        $backupName = $request->input('backup_name');
    
        // Run the backup command
        $exitCode = Artisan::call('backup:run', ['--only-db' => true]);
    
        // Check if the backup was successful (exitCode 0 indicates success)
        if ($exitCode === 0) {
            // Retrieve the backup filename (from the config or process)
            $backupPath = storage_path('app/backups'); // Assuming this is where the backups are stored
            $backupFile = File::glob($backupPath . '/*.sql')[0]; // Get the most recent backup file
    
            // Rename the file to the custom name provided
            $newBackupFilePath = $backupPath . '/' . $backupName . '.sql';
            File::move($backupFile, $newBackupFilePath);  // Rename the file
    
            return response()->json([
                'message' => 'Database backup completed successfully with name ' . $backupName,
                'status' => 'success',  
            ]);
        } else {
            return response()->json([
                'message' => 'Database backup failed',
                'status' => 'error',
            ], 500);
        }
    }

}

