<?php

declare(strict_types=1);

namespace App\Models;

use App\Kernel\Eloquent\Models\User as Model;
use App\Collections\UserCollection;
use App\QueryBuilders\UserQueryBuilder;
use App\Models\Concerns\User\HasAccessAttributesViaMethods;
use App\Models\Concerns\User\HasRelations;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property \Carbon\CarbonImmutable|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Collections\QuoteCollection|\App\Models\Quote[] $quotes
 * @property-read int|null $quotes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 *
 * @method static UserCollection|static[] all($columns = ['*'])
 * @method static UserQueryBuilder|User checkIfEmailIsAvailableForRegister(string $email, \App\Models\User|int|null $ignore = null)
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static UserQueryBuilder|User findByAuthEmail(string $email)
 * @method static UserCollection|static[] get($columns = ['*'])
 * @method static UserQueryBuilder|User newModelQuery()
 * @method static UserQueryBuilder|User newQuery()
 * @method static UserQueryBuilder|User query()
 * @method static UserQueryBuilder|User whereAuthEmail(string $email)
 * @method static UserQueryBuilder|User whereCreatedAt($value)
 * @method static UserQueryBuilder|User whereEmail($value)
 * @method static UserQueryBuilder|User whereEmailVerifiedAt($value)
 * @method static UserQueryBuilder|User whereId($value)
 * @method static UserQueryBuilder|User wherePassword($value)
 * @method static UserQueryBuilder|User whereRememberToken($value)
 * @method static UserQueryBuilder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class User extends Model
{
    use HasAccessAttributesViaMethods;
    use HasRelations;
    use HasApiTokens;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create a new eloquent collection instance.
     */
    public function newCollection(array $models = []): UserCollection
    {
        return new UserCollection($models);
    }

    /**
     * Create a new eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     */
    public function newEloquentBuilder($query): UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }
}
