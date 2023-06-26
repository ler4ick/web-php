<?php

namespace App\Http\Controllers;

use App\Rules\IncFileExtension;
use Illuminate\Http\Request;

class GuestBookUploadController extends Controller
{
    public function index() {
        return view('guestBookUpload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:2048', new IncFileExtension()]
        ]);

        $uploadedFile = $request->file('file');
        $filename = 'app/messages.inc';

        $destinationPath = storage_path('app');
        $uploadedFile->move($destinationPath, $filename);

        return back()->with('success', 'Your data have been submitted successfully.');
    }
}
