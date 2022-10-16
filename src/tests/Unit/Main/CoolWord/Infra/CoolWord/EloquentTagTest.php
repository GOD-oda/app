<?php

declare(strict_types=1);

namespace Tests\Feature\Unit\Main\CoolWord\Infra\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use CoolWord\Domain\CoolWord\TagCollection;
use CoolWord\Domain\CoolWord\TagId;
use CoolWord\Domain\CoolWord\TagRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\DatabaseRefreshable;
use Tests\TestCase;

class EloquentTagTest extends TestCase
{
    use DatabaseRefreshable;

    private TagRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->refreshDatabase();

        $this->repository = $this->app->make(TagRepository::class);
    }

    public function testStoreNewTag()
    {
        $tag = Tag::new(
            name: 'foo'
        );
        $tagId = $this->repository->store($tag);

        $this->assertInstanceOf(TagId::class, $tagId);
        $this->assertSame(1, \App\Models\CoolWord\Tag::count());
    }

    public function testFindByIds()
    {
        $tagIds = [];

        $tag = Tag::new(
            name: 'foo'
        );
        $tagId = $this->repository->store($tag);
        $tagIds[] = $tagId->value;

        $tag = Tag::new(
            name: 'bar'
        );
        $tagId = $this->repository->store($tag);
        $tagIds[] = $tagId->value;

        $tags = $this->repository->findByIds($tagIds);
        $this->assertInstanceOf(TagCollection::class, $tags);
        $this->assertCount(2, $tags->all());
    }
}
