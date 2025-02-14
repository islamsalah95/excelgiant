<?php
namespace App\Services;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class UpdateCach
{
    

    private static function getTranslation()
    {
        $path = base_path('lang/ar/frontend'); // Define the path to the directory
        $files = File::allFiles($path); // Get all files in the directory
        // Extract just the file names without the '.php' extension
        return array_map(function ($file) {
            return pathinfo($file->getFilename(), PATHINFO_FILENAME); // Get file name without extension
        }, $files);
    }

    public static function getTranslationFiles($files = false)
    {
        if ($files) {
            cache()->forget('fileNames');
            cache()->put('fileNames', self::getTranslation(), 60); // Use self:: to call static method
        }

        $fileNames = cache()->remember('fileNames', 60, function () {
            return self::getTranslation(); // Use self:: to call static method
        });

        return $fileNames; 
    }




    public static function settings($updatedSettings=[])
    {

        if ($updatedSettings) {
            cache()->forget('settings');
            cache()->put('settings', $updatedSettings, 60);
        }
        // Retrieve or cache the settings
        $settings = cache()->remember('settings', 60, function () {
            $settingsPath = config_path('setting.php'); // Path to the setting.php file
            return require $settingsPath; // Load the settings manually
            // Fetch settings from the configuration file or database
            // return config('setting'); // Adjust as per your data source
        });

        return $settings;
    }




    public function __destruct()
    {
        // Clear and cache config automatically when the controller is destructed
        Artisan::call('config:clear');
        Artisan::call('config:cache');
    }
}
