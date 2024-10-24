<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCompanyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($item) {
                return [
                    'user' => [
                        'id' => $item->user->id,
                        'first_name' => $item->user->first_name,
                        'last_name' => $item->user->last_name,
                        'email' => $item->user->email,
                        'owner' => $item->user->owner,
                        'photo' => $item->user->photo,
                        'created_at' => $item->user->created_at ? $item->user->created_at->toDateTimeString() : null,
                        'updated_at' => $item->user->updated_at ? $item->user->updated_at->toDateTimeString() : null,
                    ],
                    'company' => [
                        'id' => $item->company->id,
                        'name' => $item->company->name,
                        'email' => $item->company->email,
                        'phone' => $item->company->phone,
                        'address' => $item->company->address,
                        'city' => $item->company->city,
                        'region' => $item->company->region,
                        'country' => $item->company->country,
                        'postal_code' => $item->company->postal_code,
                        'created_at' => $item->company->created_at ? $item->company->created_at->toDateTimeString() : null,
                        'updated_at' => $item->company->updated_at ? $item->company->updated_at->toDateTimeString() : null,
                    ],
                ];
            }),
            'meta' => [
                'total_records' => $this->collection->count(),
                'links' => [
                    'self' => url('/api/user-companies'),
                ],
            ],
        ];
    }
}