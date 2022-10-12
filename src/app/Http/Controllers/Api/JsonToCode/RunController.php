<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\JsonToCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RunController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $json = $request->get('json');

        $json = json_encode($json, JSON_PRETTY_PRINT);
        $json = trim($json, '"');
        $rule = [
            '{' => '[',
            '}' => ']',
            ': ' => ' => ',
            '"' => "'",
        ];
        $result = str_replace(array_keys($rule), array_values($rule), $json);

        return [
            'json' => $json,
            'php' => $result,
            'foo' => 'bar'
        ];
    }
}
