import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/react';
import route from 'ziggy-js';

interface Company {
    id: number;
    name: string;
    email: string | null;
    phone: string | null;
    city: string | null;
    country: string | null;
}

const CompaniesIndex = () => {
    // Retrieve companies from the server via props
    const { companies } = usePage().props as { companies: Company[] };

    // Handle delete action
    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this company?')) {
            Inertia.delete(route('companies.destroy', id), {
                onSuccess: () => {
                    // Optionally show a success message or handle post-delete actions
                }
            });
        }
    };

    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Companies</h1>

            <div className="mb-4">
                <Link
                    href={route('companies.create')}
                    className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Create New Company
                </Link>
            </div>

            <div className="overflow-x-auto">
                <table className="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Name
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Email
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Phone
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                City
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Country
                            </th>
                            <th className="px-6 py-3 border-b text-right text-sm font-medium text-gray-500">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {companies.map((company) => (
                            <tr key={company.id}>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{company.name}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{company.email}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{company.phone}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{company.city}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{company.country}</td>
                                <td className="px-6 py-4 border-b text-sm text-right">
                                    <Link
                                        href={route('companies.edit', company.id)}
                                        className="text-indigo-600 hover:text-indigo-900 mr-4"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(company.id)}
                                        className="text-red-600 hover:text-red-900"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default CompaniesIndex;
