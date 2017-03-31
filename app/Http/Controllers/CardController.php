<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\CardRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;


class CardController extends Controller
{

    /**
     * @var array
     */
    const WHITELIST = ['title', 'description', 'creator'];


    /**
     * @param CardRequest $request
     * @param ImageService $imageService
     * @return array|View
     */
    public function create(CardRequest $request, ImageService $imageService): array
    {

        $input = Input::only('imgdata', 'meta', 'code');
        $filename = $imageService->create($input['imgdata']);
        $input['meta']['creator'] = $this->addAtSymbol($input['meta']['creator']);
        $card = new Card;
        $card->ref = $filename;
        $card->meta = $input['meta'];
        $card->code = $input['code'];
        $card->save();

        return [$card->id, $filename];
    }


    /**
     * @param $id
     * @return View
     */
    public function display($id): View
    {
        $card = Card::where(['ref' => $id])->firstOrFail();
        $card->meta = $this->filterMetaAgainstWhiteList($card->meta, self::WHITELIST);
        $card['twitterUser'] = $this->removeAtSymbol($card->meta['creator']);
        return view('display', ['card' => $card]);
    }


    /**
     * @param array $meta
     * @param array $whitelist
     * @return array
     */
    private function filterMetaAgainstWhiteList($meta, array $whitelist): array
    {
        if (empty($meta)) {
            return [];
        }

        return array_filter($meta, function ($key) use ($whitelist) {
            return in_array($key, $whitelist, true);
        }, ARRAY_FILTER_USE_KEY);
    }


    private function addAtSymbol(string $handle) :string
    {
        if(!$handle[0] === '@') {
            return '@'.$handle;
        }
        return $handle;
    }

    private function removeAtSymbol(string $handle) :string
    {
        if(!$handle[0] === '@') {
            return $handle;
        }

        return substr($handle, 1);
    }
}



