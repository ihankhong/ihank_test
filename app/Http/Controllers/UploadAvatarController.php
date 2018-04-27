<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadAvatarController extends Controller
{
    public function index()
    {
        return view('avatar.index');
    }

    public function store(UpdateAvatarRequest $request)
    {
        $path = $request->file('avatar')->store(config('image.images_folder_name'));
        return Storage::url($path);
    }
}
