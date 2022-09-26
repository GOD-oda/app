<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

final class CoolWordService
{
    public function __construct(
        private CoolWordRepository $coolWordRepository
    ) {}

    public function isDuplicated(CoolWord $coolWord): bool
    {
        $found = $this->coolWordRepository->findByName($coolWord->name());
        if ($found === null) {
            return false;
        }

        if ($coolWord->id()->value !== $found->id()->value && $coolWord->name()->value === $found->name()->value) {
            return true;
        }

        return false;
    }
}
