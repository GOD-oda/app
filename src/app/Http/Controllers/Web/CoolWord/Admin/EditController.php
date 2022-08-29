<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoolWord\CoolWord;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     */
    public function __invoke($id)
    {
        $model = CoolWord::findOrFail($id);

        return view('cool_words.admin.edit', $model->toArray());
    }
}
