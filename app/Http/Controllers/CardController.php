<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\CardRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Input;


class CardController extends Controller
{
    public function create(CardRequest $request, ImageService $imageService) {
        $input = Input::only('imgdata','title','description', 'user');
        $filename = $imageService->create($input['imgdata']);

        $card = new Card;
        $card->ref = $filename;
        $card->title = $input['title'];
        $card->username = $input['user'];
        $card->description = $input['description'];
        $card->save();

        echo $filename;
    }


    public function display($id) {

    }
}
