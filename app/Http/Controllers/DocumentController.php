<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DocumentController extends Controller
{
    public function index()
    {
        // $documents = Media::with('user')->get();
        return view(
            'pages.document.index',
            // compact('documents')
        );
    }

    public function create()
    {
        $users = User::all();
        return view('pages.document.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        if (!$user) {
            return redirect()->back()->with('err', 'Pengguna tidak ditemukan.');
        }

        if ($request->hasFile('file_zip')) {
            $zipFile = $request->file('file_zip');
            $zipFileName = 'uploaded_file.zip';
            $filePath = $zipFile->storeAs('zip_files', $zipFileName);

            $zip = new ZipArchive();
            $storagePath = storage_path('app/' . $filePath);

            if ($zip->open($storagePath) === true) {
                $extractPath = storage_path('app/zip_files/extracted/');
                if (!file_exists($extractPath)) {
                    mkdir($extractPath, 0777, true);
                }

                $zip->extractTo($extractPath);
                $zip->close();

                $extractedFiles = array_diff(scandir($extractPath), ['.', '..']);
                foreach ($extractedFiles as $extractedFile) {
                    $fullPath = $extractPath . $extractedFile;
                    if (file_exists($fullPath)) {
                        $file = new \Illuminate\Http\UploadedFile($fullPath, $extractedFile);
                        $file->storeAs('public/user_id/', $extractedFile);

                        Media::create([
                            'file_name' => $file->getClientOriginalName(),
                            'mime_type' => $file->getMimeType(),
                            'url' => Storage::url('public/user_id/' . $extractedFile),
                            'user_id' => $user->id
                        ]);
                    } else {
                        dd('File tidak ditemukan: ' . $fullPath);
                    }
                }
            } else {
                dd('Gagal membuka file ZIP.');
            }
        }

        if ($request->hasFile('file_excel')) {
            $excelFile = $request->file('file_excel');
            $excelFileName = $excelFile->getClientOriginalName();
            $excelFile->storeAs('public/user_id/', $excelFileName);

            Media::create([
                'file_name' => $excelFileName,
                'mime_type' => $excelFile->getMimeType(),
                'url' => Storage::url('public/user_id/' . $excelFileName),
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('document.index')->with('success', 'Dokumen berhasil diunggah.');
    }
}
