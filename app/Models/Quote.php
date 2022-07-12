<?php

declare(strict_types=1);

namespace App\Models;

use App\Collections\QuoteCollection;
use App\Kernel\Eloquent\Models\Model;
use App\QueryBuilders\QuoteQueryBuilder;
use App\Models\Concerns\Quote\HasAccessAttributesViaMethods;
use App\Models\Concerns\Quote\HasRelations;

/**
 * App\Models\Quote
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $text
 * @property string $language
 * @property int $shared
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\User|null $user
 *
 * @method static QuoteCollection|static[] all($columns = ['*'])
 * @method static QuoteQueryBuilder|Quote checkCanBeAdded(string $text, string $language, \App\Models\Quote|int|null $ignore = null)
 * @method static QuoteCollection|static[] get($columns = ['*'])
 * @method static QuoteQueryBuilder|Quote newModelQuery()
 * @method static QuoteQueryBuilder|Quote newQuery()
 * @method static QuoteQueryBuilder|Quote query()
 * @method static QuoteQueryBuilder|Quote whereCreatedAt($value)
 * @method static QuoteQueryBuilder|Quote whereId($value)
 * @method static QuoteQueryBuilder|Quote whereLanguage($value)
 * @method static QuoteQueryBuilder|Quote whereShared($value)
 * @method static QuoteQueryBuilder|Quote whereText($value)
 * @method static QuoteQueryBuilder|Quote whereUpdatedAt($value)
 * @method static QuoteQueryBuilder|Quote whereUserId($value)
 * @mixin \Eloquent
 */
final class Quote extends Model
{
    use HasAccessAttributesViaMethods;
    use HasRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quotes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'language',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Create a new eloquent collection instance.
     */
    public function newCollection(array $models = []): QuoteCollection
    {
        return new QuoteCollection($models);
    }

    /**
     * Create a new eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     */
    public function newEloquentBuilder($query): QuoteQueryBuilder
    {
        return new QuoteQueryBuilder($query);
    }

    /**
     * Increment the value of the "shared" column.
     */
    public function incrementShared(): int
    {
        return $this->increment('shared', 1);
    }
}
