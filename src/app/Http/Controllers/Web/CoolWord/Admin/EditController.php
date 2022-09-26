<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoolWord\CoolWordResource;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\CoolWordRepository;

class EditController extends Controller
{
    public function __construct(private CoolWordRepository $coolWordRepository) {}

    /**
     * Handle the incoming request.
     *
     * @param $id
     */
    public function __invoke($id)
    {
        $coolWordId = new CoolWordId($id);

        $coolWord = $this->coolWordRepository->findById($coolWordId);
        $resource = CoolWordResource::make($coolWord);

        return view('cool_word.admin.cool_words.edit', $resource->toArray());
    }
}
