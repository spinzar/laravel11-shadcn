<?php
// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Company Model
 *
 * @property int $id
 * @property int $account_id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $region
 * @property string|null $country
 * @property string|null $postal_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @method static CompanyFactory factory($count = null, $state = [])
 * @method static Builder|Company filter(array $filters)
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company onlyTrashed()
 * @method static Builder|Company query()
 * @method static Builder|Company whereAccountId($value)
 * @method static Builder|Company whereAddress($value)
 * @method static Builder|Company whereCity($value)
 * @method static Builder|Company whereCountry($value)
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereDeletedAt($value)
 * @method static Builder|Company whereEmail($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereName($value)
 * @method static Builder|Company wherePhone($value)
 * @method static Builder|Company wherePostalCode($value)
 * @method static Builder|Company whereRegion($value)
 * @method static Builder|Company whereUpdatedAt($value)
 * @method static Builder|Company withTrashed()
 * @method static Builder|Company withoutTrashed()
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Resolve route binding to include trashed records.
     *
     * @param mixed $value
     * @param string|null $field
     * @return Model|static
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }

    /**
     * Get all contacts associated with the company.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Apply filters to the Company query.
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter($query, array $filters): Builder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', '%'.$search.'%');
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
