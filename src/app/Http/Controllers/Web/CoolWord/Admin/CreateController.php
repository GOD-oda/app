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
    public function __construct(
        private CoolWordService $coolWordService,
        private CoolWordRepository $coolWordRepository
    ) {}

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $coolWord = new CoolWord(
            id: null,
            name: new Name($request->get('name')),
            views: 0
        );
        if ($this->coolWordService->isDuplicated($coolWord)) {
            throw ValidationException::withMessages([
                'errorMsg' => [
                    '名前は既に存在しています'
                ]
            ]);
        }
        $coolWordId = $this->coolWordRepository->store($coolWord);
        $newCoolWord = $this->coolWordRepository->findById($coolWordId);

        return redirect()->route('cool_word.admin.cool_words.show', ['id' => $newCoolWord->id()->value])
            ->with('success_msg', '作成成功');
    }
}
