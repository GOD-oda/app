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
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(int $id, Request $request, CoolWordService $coolWordService, CoolWordRepository $coolWordRepository)
    {
        $coolWord = new CoolWord(
            id: new CoolWordId($id),
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

        return redirect()->route('cool_words.admin.show', ['id' => $newCoolWord->id->value])
            ->with('success_msg', '更新成功');
    }
}
