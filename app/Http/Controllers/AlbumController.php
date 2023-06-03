<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\GalleryModel;

class AlbumController extends Controller
{
    private $galleryModel;
    public function __construct(GalleryModel $galleryModel)
    {
        $this->galleryModel = $galleryModel;
    }

    public  function index() {
        $vars = [
            'args'=>$this->galleryModel->photoModel(),
        ];
        return view('album', $vars);
    }
}
