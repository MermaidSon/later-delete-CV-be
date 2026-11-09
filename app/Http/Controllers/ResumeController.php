<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function Download(Request $request)
    {
        $filename = 'CV Vitalii Son.docx';
        $mime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

        // 1. Приватная папка приложения (storage/app/private)
        if (Storage::disk('local')->exists($filename)) {
            return Storage::disk('local')->download($filename, $filename, [
                'Content-Type' => $mime,
            ]);
        }

        // 2. Публичная папка (storage/app/public)
        if (Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->download($filename, $filename, [
                'Content-Type' => $mime,
            ]);
        }

        // 3. Запасной вариант — файл в корне проекта (например, добавлен через git)
        if (file_exists(base_path($filename))) {
            return response()->download(base_path($filename), $filename, [
                'Content-Type' => $mime,
            ]);
        }

        abort(404, 'Resume file not found on server.');
    }

    public function AddResume(Request $request)
    {
        //if(!isset($request->input('position')) || !isset($request->input('company')) ||
          //   !isset($request->input('description')) || !isset($request->input('')))
    }
}
