<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    
   /* public function destroy(Picture $picture)
    {
        $picture->delete();
        return '';
    }*/
    public function destroy(Picture $picture)
{
    Storage::disk('public')->delete($picture->filename);
    $picture->delete();

    return response()->noContent();
}

}
