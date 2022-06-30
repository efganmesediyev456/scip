<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileManagerController extends Controller
{
    public function upload(Request $request): Response
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|file|mimes:jpg,png,jpeg,pdf,docx,xlsx,xls,webp,svg,mp4'
        ]);

        $names = [];

        foreach ($request->file('files') as $file) {
            $fileName = Str::uuid() . '.' . $file->guessClientExtension();

            $file->storeAs('', $fileName, 'temporary');

            $names[] = $fileName;

            dispatch(function () use ($fileName) {
                if (Storage::disk('temporary')->fileExists($fileName)) {
                    Storage::disk('temporary')->delete($fileName);
                }
            })->onQueue('file')->delay(now()->addDay());
        }

        return response(compact('names'));
    }

    public function editorUpload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:png|max:2048'
        ]);

        $fileName = Str::upper(Str::uuid()) . '.' . $request->file('upload')->guessClientExtension();

        $request->file('upload')->storeAs('', $fileName, 'public');

        $url = Storage::disk('public')->url($fileName);

        echo json_encode([
            'url' =>                 url($url)

        ]);
        die();
    }
}
