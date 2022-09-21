<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private const PER_PAGE = 25;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param CoolWordRepository $coolWordRepository
     */
    public function __invoke(Request $request, CoolWordRepository $coolWordRepository)
    {
        $currentPage = Paginator::resolveCurrentPage();

        $count = $coolWordRepository->count();
        $coolWords = $coolWordRepository->forPage(
            page: $currentPage,
            perPage: static::PER_PAGE
        );

        $paginator = new Paginator(
            items: $coolWords,
            total: $count,
            perPage: static::PER_PAGE,
            currentPage: $currentPage,
            options: [
                'path' => route('cool_word.admin.cool_words.index')
            ]
        );

        return view('cool_word.admin.cool_words.index', compact('paginator'));
    }
}
