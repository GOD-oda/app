<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use App\Models\CoolWord\CoolWord as EloquentCoolWord;
use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordCollection;
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

    /**
     * @param array $initialCoolWordParameters
     * @param int $page
     * @param int $perPage
     * @param array $where
     * @param int $expectedCount
     * @return void
     * @dataProvider providesIndexPatterns
     */
    public function testIndex(array $initialCoolWordParameters, int $page, int $perPage, array $where, int $expectedCount): void
    {
        CoolWordFactory::new($initialCoolWordParameters)->create();

        $res = $this->repository->index($page, $perPage, $where);
        $this->assertInstanceOf(CoolWordCollection::class, $res);
        $this->assertCount($expectedCount, $res);
    }

    private function providesIndexPatterns(): array
    {
        return [
            [[], 1, 1, [], 1],
            [['name' => 'foo'], 1, 1, ['name' => 'foo'], 1],
            [[], 1, 1, ['name' => 'foo'], 0],
        ];
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

    public function testStore(): void
    {
        $coolWord = CoolWord::new(
            name: new Name('foo'),
            description: 'description'
        );

        $coolWordId = $this->repository->store($coolWord);
        $saved = $this->repository->findById($coolWordId);

        $this->assertNotNull($saved->id());
        // 値だけ確認できれば良いのでEqualsを使っている
        $this->assertEquals($coolWord->name(), $saved->name());
        $this->assertEquals($coolWord->views(), $saved->views());
        $this->assertEquals($coolWord->description(), $saved->description());
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
