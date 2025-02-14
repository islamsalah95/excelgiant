<?php

namespace App\Http\Controllers\Dash;


use Spatie\Sitemap\Sitemap;
use App\Services\UpdateCach;
use Illuminate\Http\Request;
use Spatie\Sitemap\Tags\Url;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:setting-list|setting-create|setting-edit|setting-delete']);
        $this->middleware(['permission:setting-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:setting-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:setting-delete'], ['only' => ['destroy']]);
    }

    public function sitemap()
    {

        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
            ->add(Url::create('/contact')->setPriority(0.8)->setChangeFrequency('weekly'))
            ->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency('weekly'))
            ->add(Url::create('/pricing')->setPriority(0.8)->setChangeFrequency('weekly'))
            ->add(Url::create('/error')->setPriority(0.8)->setChangeFrequency('weekly'))
            ->writeToFile(public_path('sitemap.xml'));
        return $sitemap->toResponse(request());
    }


    public function edit()
    {

        $settingsPath = config_path('setting.php'); // Path to the setting.php file
        $settings= require $settingsPath; // Load the settings manually
        return view('dash.settings.edit', compact('settings'));
    }


    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'social_media.*' => 'required|url',
            'contact.email' => 'required|email',
            'contact.phone' => 'required|string|max:20',
            'contact.address' => 'required|string',
            'seo.title' => 'required|string',
            'seo.description' => 'required|string',
            'seo.keywords' => 'required|string',
            'branding.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Logo validation
            'branding.favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Favicon validation
        ]);

        // Path to the config file
        $configFile = config_path('setting.php');

        // Load the current settings
        $settings = config('setting');

        // Handle file uploads for logo and favicon
        if ($request->hasFile('branding.logo')) {
            // Generate a unique name for the logo, e.g., using a timestamp or a number
            $logoName = rand(3,3) . time() . '.' . $request->file('branding.logo')->getClientOriginalExtension();

            // Store the file with the specified name
            $logoPath = $request->file('branding.logo')->storeAs('icons', $logoName, 'public');
            $validatedData['branding']['logo'] = $logoName;

            // Optionally delete the old logo
            if (isset($settings['branding']['logo']) && file_exists(public_path('storage/icons/' . $settings['branding']['logo']))) {
                unlink(public_path('storage/icons/' . $settings['branding']['logo']));
            }
        }

        if ($request->hasFile('branding.favicon')) {
            // Generate a unique name for the favicon, e.g., using a timestamp or a number
            $faviconName = rand(3,3) . time() . '.' . $request->file('branding.favicon')->getClientOriginalExtension();

            // Store the file with the specified name
            $faviconPath = $request->file('branding.favicon')->storeAs('icons', $faviconName, 'public');
            $validatedData['branding']['favicon'] = $faviconName;

            // Optionally delete the old favicon
            if (isset($settings['branding']['favicon']) && file_exists(public_path('storage/icons/' . $settings['branding']['favicon']))) {
                unlink(public_path('storage/icons/' . $settings['branding']['favicon']));
            }
        }


        // Merge the validated data into current settings
        $updatedSettings = array_merge($settings, $validatedData);

        // Convert the updated settings into PHP array format
        $configContent = "<?php\n\nreturn " . var_export($updatedSettings, true) . ";\n";

        // Save the updated settings to the config file
        File::put($configFile, $configContent);

        UpdateCach::settings($updatedSettings);

        // Redirect with a success message
        return redirect()->back()->with('message', __('share.message.update'));
    }
}
