<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'email' => $company->email,
                    'phone' => $company->phone,
                    'address' => $company->address,
                    'city' => $company->city,
                    'region' => $company->region,
                    'country' => $company->country,
                    'postal_code' => $company->postal_code,
                    'created_at' => $company->created_at->toDateTimeString(),
                    'updated_at' => $company->updated_at->toDateTimeString(),
                ];
            }),
            'meta' => [
                'total_companies' => $this->collection->count(),
                'links' => [
                    'self' => url('/api/companies'),
                ],
            ],
        ];
    }
}