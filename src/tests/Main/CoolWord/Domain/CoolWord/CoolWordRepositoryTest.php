<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use App\Models\CoolWord\CoolWord as EloquentCoolWord;
use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\Name;
use Database\Factories\CoolWord\CoolWordFactory;
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

    public function testFindById(): void
    {
        $coolWordId = new CoolWordId(1);
        $res = $this->repository->findById($coolWordId);
        $this->assertNull($res);

        $coolWord = CoolWordFactory::new()->create();
        $coolWordId = new CoolWordId($coolWord->id);
        $res = $this->repository->findById($coolWordId);
        $this->assertInstanceOf(CoolWord::class, $res);
    }

    public function testFindByName(): void
    {
        $name = new Name('foo');
        $res = $this->repository->findByName($name);
        $this->assertNull($res);

        $coolWord = CoolWordFactory::new()->create();
        $name = new Name($coolWord->name);
        $res = $this->repository->findByName($name);
        $this->assertInstanceOf(CoolWord::class, $res);
    }

    public function testCount(): void
    {
        $this->assertSame(0, $this->repository->count());

        EloquentCoolWord::factory()->create();

        $this->assertSame(1, $this->repository->count());
    }

    public function testCountUpViews()
    {
        $model = EloquentCoolWord::factory()->create();
        $id = new CoolWordId($model->id);

        $this->repository->countUpViews($id, 1);

        $this->assertSame(1, $this->repository->findById($id)->views());
    }
}
