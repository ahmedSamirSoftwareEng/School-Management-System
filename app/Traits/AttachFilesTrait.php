<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($file, $file_name, $folder)
    {

        $file->storeAs('attachments/', $folder . '/' . $file_name, 'upload_attachments');
    }

    public function deleteFile($id, $name)
    {
  
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/' . $id . '/' . $name);

        if ($exists) {
          
            Storage::disk('upload_attachments')->delete('attachments/library/' . $id . '/' . $name);
        }
    }
}
