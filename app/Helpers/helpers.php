<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('upload_image')) {
    /**
     * Upload an image and return the path.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @return string
     */
    function upload_image(UploadedFile $file, $folder = 'uploads')
    {
        // Generate a unique filename
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the root public uploads folder
        $path = $file->move(public_path($folder), $filename);

        // Return the relative path to the uploaded file
        return $folder . '/' . $filename;

    }
}

if (! function_exists('delete_image')) {
    /**
     * Delete an image from storage.
     *
     * @param string $path
     * @return void
     */
    function delete_image($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
