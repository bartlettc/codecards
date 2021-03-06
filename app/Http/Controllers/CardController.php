<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\CardRequest;
use App\Services\ImageService;
use App\Services\MetaWhitelistService;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;


class CardController extends Controller
{

    /**
     * @param CardRequest $request
     * @param ImageService $imageService
     * @return string
     */
    public function create(CardRequest $request, ImageService $imageService): string
    {
        $input = Input::only('imgdata', 'meta', 'code');
        $input['meta']['creator'] = removeAtSymbol($input['meta']['creator']);
        $filename = $imageService->create($input['imgdata']);

        if (!$filename) {
            abort(422, 'File not Created');
        }

        $card = new Card;
        $card->ref = $filename;
        $card->meta = $input['meta'];
        $card->code = $input['code'];
        $card->save();

        return $filename;
    }


    /**
     * @param $id
     * @return View
     */
    public function display($id): View
    {
        $card = Card::where(['ref' => $id])->firstOrFail();
        $card->meta = MetaWhitelistService::filterMetaAgainstWhiteList($card->meta);
        return view('display', ['card' => $card]);
    }


}



