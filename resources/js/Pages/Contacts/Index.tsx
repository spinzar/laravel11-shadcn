import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/react';
import route from 'ziggy-js';

interface Contact {
    id: number;
    first_name: string;
    last_name: string;
    email: string | null;
    phone: string | null;
    company?: {
        name: string;
    } | null;
}

const ContactsIndex = () => {
    const { contacts } = usePage().props as { contacts: Contact[] };

    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this contact?')) {
            Inertia.delete(route('contacts.destroy', id));
        }
    };

    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Contacts</h1>

            <div className="mb-4">
                <Link
                    href={route('contacts.create')}
                    className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Create New Contact
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
                                Company
                            </th>
                            <th className="px-6 py-3 border-b text-right text-sm font-medium text-gray-500">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {contacts.map((contact) => (
                            <tr key={contact.id}>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{contact.first_name} {contact.last_name}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{contact.email}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{contact.phone}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{contact.company?.name}</td>
                                <td className="px-6 py-4 border-b text-sm text-right">
                                    <Link
                                        href={route('contacts.edit', contact.id)}
                                        className="text-indigo-600 hover:text-indigo-900 mr-4"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(contact.id)}
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

export default ContactsIndex;
