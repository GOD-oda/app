<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoolWord\Admin\StoreCoolWordFormRequest;
use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\CoolWordService;
use CoolWord\Domain\CoolWord\Name;
use Illuminate\Http\RedirectResponse;
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
     * @param StoreCoolWordFormRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function __invoke(StoreCoolWordFormRequest $request): RedirectResponse
    {
        $coolWord = CoolWord::new(
            name: new Name($request->validated('name')),
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
