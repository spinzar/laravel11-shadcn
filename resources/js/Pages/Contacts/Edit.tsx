import React from 'react';
import { useForm, usePage } from '@inertiajs/react';
import route from 'ziggy-js';

interface Contact {
    id: number;
    first_name: string;
    last_name: string;
    email: string | null;
    phone: string | null;
    address: string | null;
    city: string | null;
    region: string | null;
    country: string | null;
    postal_code: string | null;
    company_id: number | null;
}

const EditContact = () => {
    const { contact } = usePage().props as { contact: Contact };

    const { data, setData, put, processing, errors } = useForm({
        first_name: contact.first_name || '',
        last_name: contact.last_name || '',
        email: contact.email || '',
        phone: contact.phone || '',
        address: contact.address || '',
        city: contact.city || '',
        region: contact.region || '',
        country: contact.country || '',
        postal_code: contact.postal_code || '',
        company_id: contact.company_id || '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(route('contacts.update', contact.id));
    };

    return (
        <div className="max-w-2xl mx-auto p-4">
            <h1 className="text-xl font-bold mb-6">Edit Contact</h1>

            <form onSubmit={handleSubmit} className="space-y-4">
                {/* First Name */}
                <div>
                    <label htmlFor="first_name" className="block text-sm font-medium text-gray-700">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        value={data.first_name}
                        onChange={(e) => setData('first_name', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.first_name && <span className="text-red-500 text-sm">{errors.first_name}</span>}
                </div>

                {/* Last Name */}
                <div>
                    <label htmlFor="last_name" className="block text-sm font-medium text-gray-700">Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        value={data.last_name}
                        onChange={(e) => setData('last_name', e.target.value)}
                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                    {errors.last_name && <span className="text-red-500 text-sm">{errors.last_name}</span>}
                </div>

                {/* Other fields */}
                {/* Email, phone, address, city, etc. */}

                {/* Submit Button */}
                <div className="pt-4">
                    <button
                        type="submit"
                        disabled={processing}
                        className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        {processing ? 'Updating...' : 'Update Contact'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default EditContact;
