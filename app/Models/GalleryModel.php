<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;
    public  $path = "/photos/";
    public  $jpg = ".jpg";
    public  $titles = [
        "1", "2", "3",
        "4", "5", "6",
        "7", "8", "9",
        "10", "11", "12"
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function photoModel() {
        for ($i = 0; $i<count($this->titles); $i++){
            $result[$i] = [
                "id"=>$i+1,
                'src'=> $this->path.($i+1).$this->jpg,
                "alt"=>$this->titles[$i],
                "titles"=>$this->titles[$i],
                "figcaption"=>$this->titles[$i]
            ];
        }
        return $result;
    }
}
