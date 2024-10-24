import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import { Inertia } from '@inertiajs/inertia';
import route from 'ziggy-js';

interface User {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
}

const UsersIndex = () => {
    const { users } = usePage().props as { users: User[] };

    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this user?')) {
            Inertia.delete(route('users.destroy', id));
        }
    };

    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Users</h1>

            <div className="mb-4">
                <Link
                    href={route('users.create')}
                    className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Create New User
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
                            <th className="px-6 py-3 border-b text-right text-sm font-medium text-gray-500">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map((user) => (
                            <tr key={user.id}>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">
                                    {user.first_name} {user.last_name}
                                </td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">
                                    {user.email}
                                </td>
                                <td className="px-6 py-4 border-b text-sm text-right">
                                    <Link
                                        href={route('users.edit', user.id)}
                                        className="text-indigo-600 hover:text-indigo-900 mr-4"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(user.id)}
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

export default UsersIndex;
