<?php

declare(strict_types=1);

namespace CoolWord\Infra\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use CoolWord\Domain\CoolWord\TagCollection;
use CoolWord\Domain\CoolWord\TagId;
use CoolWord\Domain\CoolWord\TagRepository;

final class EloquentTag implements TagRepository
{
    public function store(Tag $tag): TagId
    {
        if ($tag->hasId()) {
            $eloquentTag = \App\Models\CoolWord\Tag::findOrFail($tag->id()->value);
        } else {
            $eloquentTag =  new \App\Models\CoolWord\Tag();
        }

        $eloquentTag->name = $tag->name();
        $eloquentTag->save();

        return new TagId($eloquentTag->id);
    }

    public function findByIds(array $ids): TagCollection
    {
        $tags = \App\Models\CoolWord\Tag::find($ids)->map(function ($tag) {
            return new Tag(
                id: new TagId($tag->id),
                name: $tag->name
            );
        });

        return new TagCollection(...$tags);
    }
}
