<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\JsonToCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JsonToCode\Processor;

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

        $processor = new Processor($json);

        return [
            'php' => $processor->toPhp(),
        ];
    }
}
