<?php

namespace App\Tags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Forum\Thread;

class Tag extends Model
{
    /**
     * @var string
     */
    protected $table = 'tags';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return \App\Forum\Thread[]
     */
    public function threads()
    {
        return $this->threadsRelation;
    }

    public function threadsRelation(): MorphToMany
    {
        return $this->morphedByMany(Thread::class, 'taggable', 'taggables', 'tag_id');
    }
}