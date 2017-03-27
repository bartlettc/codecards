<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class CardController extends Controller
{
    public function create(Request $request, ImageService $imageService) {
        $input = Input::only('imgdata');
        $filename = $imageService->create($input['imgdata']);
        echo $filename;
    }
}
