<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use App\Models\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use Tests\DatabaseRefreshable;
use Tests\TestCase;

class CoolWordRepositoryTest extends TestCase
{
    use DatabaseRefreshable;

    private CoolWordRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->refreshDatabase();

        $this->repository = $this->app->make(CoolWordRepository::class);
    }

    public function testCount()
    {
        $this->assertSame(0, $this->repository->count());

        CoolWord::factory()->create();

        $this->assertSame(1, $this->repository->count());
    }
}
