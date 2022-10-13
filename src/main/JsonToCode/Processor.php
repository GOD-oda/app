<?php

declare(strict_types=1);

namespace JsonToCode;

final class Processor
{
    public function __construct(private readonly string $input) {}

    public function toPhp(): string
    {
        $json = trim($this->toJson(), '"');
        $rule = [
            '{' => '[',
            '}' => ']',
            ': ' => ' => ',
            '"' => "'",
            '\n' => '<br>',
            '\\' => ''
        ];

        return str_replace(array_keys($rule), array_values($rule), $json);
    }

    private function toJson(): string
    {
        return json_encode($this->input);
    }
}
