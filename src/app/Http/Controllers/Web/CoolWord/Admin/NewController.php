<?php

namespace App\Http\Controllers\Web\CoolWord\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('cool_words.admin.new');
    }
}
