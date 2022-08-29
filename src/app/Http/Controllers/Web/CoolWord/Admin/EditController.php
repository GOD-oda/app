<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoolWord\CoolWord;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke($id, Request $request)
    {
        $model = CoolWord::findOrFail($id);

        return view('cool_words.admin.edit', $model->toArray());
    }
}
