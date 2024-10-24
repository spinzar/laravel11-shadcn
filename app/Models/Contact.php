<?php
// app/Models/Contact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * Contact Model
 *
 * @property int $id
 * @property int $account_id
 * @property int|null $company_id
 * @property string $first_name
 * @property string $last_name
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
 * @property-read \App\Models\Company|null $company
 * @property-read string $name
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static Builder|Contact filter(array $filters)
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact onlyTrashed()
 * @method static Builder|Contact orderByName()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereAccountId($value)
 * @method static Builder|Contact whereAddress($value)
 * @method static Builder|Contact whereCity($value)
 * @method static Builder|Contact whereCompanyId($value)
 * @method static Builder|Contact whereCountry($value)
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereDeletedAt($value)
 * @method static Builder|Contact whereEmail($value)
 * @method static Builder|Contact whereFirstName($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereLastName($value)
 * @method static Builder|Contact wherePhone($value)
 * @method static Builder|Contact wherePostalCode($value)
 * @method static Builder|Contact whereRegion($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @method static Builder|Contact withTrashed()
 * @method static Builder|Contact withoutTrashed()
 * @mixin \Eloquent
 */
class Contact extends Model
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
     * Get the company associated with the contact.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the full name of the contact (first name + last name).
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Scope a query to order contacts by last name and first name.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrderByName($query): Builder
    {
        return $query->orderBy('last_name')->orderBy('first_name');
    }

    /**
     * Scope a query to apply filters.
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter($query, array $filters): Builder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhereHas('company', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}