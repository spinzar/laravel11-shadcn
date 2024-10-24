import React, { useState } from 'react';
import { useForm, usePage } from '@inertiajs/react';
import { Inertia } from '@inertiajs/inertia';
import route from 'ziggy-js';

interface Company {
    id: number;
    name: string;
    email: string | null;
    phone: string | null;
    address: string | null;
    city: string | null;
    region: string | null;
    country: string | null;
    postal_code: string | null;
}

const EditCompany = () => {
    // Retrieve company details from the server via props
    const { company } = usePage().props as { company: Company };

    // Initialize form state with existing company data
    const { data, setData, put, processing, errors } = useForm({
        name: company.name || '',
        email: company.email || '',
        phone: company.phone || '',
        address: company.address || '',
        city: company.city || '',
        region: company.region || '',
        country: company.country || '',
        postal_code: company.postal_code || ''
    });

    // Handle form submission
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        // Update company via a PUT request using Inertia
        put(route('companies.update', company.id), {
            onSuccess: () => {
                // Redirect or show success message
            }
        });
    };

    return (
        <div className="max-w-2xl mx-auto p-4">
            <h1 className="text-xl font-bold mb-6">Edit Company</h1>

            <form onSubmit={handleSubmit} className="space-y-4">
                {/* Company Name */}
                <div>
                    <label htmlFor="name" className="block text-sm font-medium text-gray-700">
                        Company Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value={data.name}
                        onChange={e => setData('name', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.name && <span className="text-red-500 text-sm">{errors.name}</span>}
                </div>

                {/* Email */}
                <div>
                    <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value={data.email}
                        onChange={e => setData('email', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.email && <span className="text-red-500 text-sm">{errors.email}</span>}
                </div>

                {/* Phone */}
                <div>
                    <label htmlFor="phone" className="block text-sm font-medium text-gray-700">
                        Phone
                    </label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value={data.phone}
                        onChange={e => setData('phone', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.phone && <span className="text-red-500 text-sm">{errors.phone}</span>}
                </div>

                {/* Address */}
                <div>
                    <label htmlFor="address" className="block text-sm font-medium text-gray-700">
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        value={data.address}
                        onChange={e => setData('address', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.address && <span className="text-red-500 text-sm">{errors.address}</span>}
                </div>

                {/* City */}
                <div>
                    <label htmlFor="city" className="block text-sm font-medium text-gray-700">
                        City
                    </label>
                    <input
                        type="text"
                        name="city"
                        id="city"
                        value={data.city}
                        onChange={e => setData('city', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.city && <span className="text-red-500 text-sm">{errors.city}</span>}
                </div>

                {/* Region */}
                <div>
                    <label htmlFor="region" className="block text-sm font-medium text-gray-700">
                        Region
                    </label>
                    <input
                        type="text"
                        name="region"
                        id="region"
                        value={data.region}
                        onChange={e => setData('region', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.region && <span className="text-red-500 text-sm">{errors.region}</span>}
                </div>

                {/* Country */}
                <div>
                    <label htmlFor="country" className="block text-sm font-medium text-gray-700">
                        Country
                    </label>
                    <input
                        type="text"
                        name="country"
                        id="country"
                        value={data.country}
                        onChange={e => setData('country', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.country && <span className="text-red-500 text-sm">{errors.country}</span>}
                </div>

                {/* Postal Code */}
                <div>
                    <label htmlFor="postal_code" className="block text-sm font-medium text-gray-700">
                        Postal Code
                    </label>
                    <input
                        type="text"
                        name="postal_code"
                        id="postal_code"
                        value={data.postal_code}
                        onChange={e => setData('postal_code', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.postal_code && <span className="text-red-500 text-sm">{errors.postal_code}</span>}
                </div>

                {/* Submit Button */}
                <div className="pt-4">
                    <button
                        type="submit"
                        disabled={processing}
                        className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        {processing ? 'Updating...' : 'Update Company'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default EditCompany;
