<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\CoolWordService;
use CoolWord\Domain\CoolWord\Name;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    public function __construct(private CoolWordService $coolWordService, private CoolWordRepository $coolWordRepository) {}

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(int $id, Request $request)
    {
        $coolWord = $this->coolWordRepository->findById(new CoolWordId($id));

        if ($this->coolWordService->isDuplicated($coolWord)) {
            throw ValidationException::withMessages([
                'errorMsg' => [
                    '名前は既に存在しています'
                ]
            ]);
        }
        $this->coolWordRepository->store($coolWord);

        return redirect()->route('cool_word.admin.cool_words.show', ['id' => $coolWord->id()->value])
            ->with('success_msg', '更新成功');
    }
}
