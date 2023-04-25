<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

trait UploadFile
{
    /**
     * It uploads an image to the server and returns the name of the file
     * 
     * @param UploadedFile file The file that was uploaded.
     * @param string directory The directory where the file will be stored.
     * 
     * @return string The file name of the uploaded file.
     */
    protected function uploadImage(UploadedFile $file, string $directory): string
    {
        $fileName = time() . '.' . $file->extension();
        $isFileMoved = $file->storeAs($directory, $fileName, 'public');

        if (!$isFileMoved) {
            return response()->json([
                'message' => 'Failed to upload file.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $fileName;
    }

    /**
     * This function deletes an image file from the public storage disk in Laravel.
     * 
     * @param path  is a nullable string parameter that represents the path of the image file that
     * needs to be deleted. If the value of  is not null, the function will delete the image file from
     * the public disk storage.
     */
    protected function uploadDeleteImage(?string $path): void
    {
        if ($path !== null) {
            Storage::disk('public')->delete('images/' . $path);
        }
    }
}
