<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param CoolWordRepository $coolWordRepository
     */
    public function __invoke(Request $request, CoolWordRepository $coolWordRepository)
    {
        $coolWords = $coolWordRepository->index(
            limit: $request->get('limit', 25),
            offset: $request->get('offset', 0)
        );

        return view('cool_word.admin.cool_words.index', compact('coolWords'));
    }
}
