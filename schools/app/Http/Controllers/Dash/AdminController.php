<?php
namespace App\Http\Controllers\Dash;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    public function __construct()
    {
        // Protect routes with permissions
        $this->middleware('permission:admin-list')->only(['index']);
        $this->middleware('permission:admin-create')->only(['create', 'store']);
        $this->middleware('permission:admin-edit')->only(['edit', 'update']);
        $this->middleware('permission:admin-delete')->only(['destroy']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('dash.admins.create');

    }


    /**
     * Show.
     */
    
     public function profile()
     { 
        return view('dash.admins.profile', ['admin' => auth()->user()]);
         
     }

     public function updateProfile(Request $request)
     { 

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'img' => 'nullable|image|max:10000',
        ]);
        
        $admin = auth()->user();
        // Update user details
        $admin = User::findOrFail($admin->id);
        $admin->update([
            'name' => json_encode(['ar' => $request->name_ar, 'en' => $request->name_en], JSON_UNESCAPED_UNICODE),
            'password' => $request->password ?  Hash::make($request->password) : $admin->password
        ]);

        if ($request->img) {
            uploadImage($admin, $request->img, 'profile_image');
        }

        // Flash success message
        session()->flash('message', __('Profile updated successfully.'));
        
        return redirect()->back()->with('message', __('share.message.update'));
     }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($admin)
     {
         
         $admin=User::find($admin);
 
         return view('dash.admins.edit',['admin'=> $admin]);
 
     }


}
