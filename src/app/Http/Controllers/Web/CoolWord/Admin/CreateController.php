<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\CoolWordService;
use CoolWord\Domain\CoolWord\Name;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param CoolWordService $coolWordService
     * @param CoolWordRepository $coolWordRepository
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request, CoolWordService $coolWordService, CoolWordRepository $coolWordRepository)
    {
        $coolWord = new CoolWord(
            id: null,
            name: new Name($request->get('name'))
        );
        if ($coolWordService->isDuplicated($coolWord)) {
            throw ValidationException::withMessages([
                'errorMsg' => [
                    '名前は既に存在しています'
                ]
            ]);
        }
        $coolWordId = $coolWordRepository->store($coolWord);
        $newCoolWord = $coolWordRepository->findById($coolWordId);

        return redirect()->route('cool_word.admin.cool_words.show', ['id' => $newCoolWord->id()->value])
            ->with('success_msg', '作成成功');
    }
}
