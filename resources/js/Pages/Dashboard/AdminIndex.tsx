import React from 'react';
import { usePage } from '@inertiajs/react';

interface AdminDashboardData {
    totalUsers: number;
    totalCompanies: number;
    recentUsers: {
        id: number;
        first_name: string;
        last_name: string;
        email: string;
        created_at: string;
    }[];
    recentCompanies: {
        id: number;
        name: string;
        created_at: string;
    }[];
}

const AdminIndex: React.FC = () => {
    const { totalUsers, totalCompanies, recentUsers, recentCompanies } = usePage().props as AdminDashboardData;

    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Admin Dashboard</h1>

            {/* Dashboard Statistics */}
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div className="bg-white shadow rounded-lg p-4">
                    <h3 className="text-lg font-bold">Total Users</h3>
                    <p className="text-3xl mt-2">{totalUsers}</p>
                </div>
                <div className="bg-white shadow rounded-lg p-4">
                    <h3 className="text-lg font-bold">Total Companies</h3>
                    <p className="text-3xl mt-2">{totalCompanies}</p>
                </div>
            </div>

            {/* Recent Users */}
            <div className="mb-6">
                <h2 className="text-xl font-bold mb-4">Recent Users</h2>
                <div className="overflow-x-auto">
                    <table className="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">Name</th>
                                <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">Email</th>
                                <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            {recentUsers.map((user) => (
                                <tr key={user.id}>
                                    <td className="px-6 py-4 border-b text-sm text-gray-700">
                                        {user.first_name} {user.last_name}
                                    </td>
                                    <td className="px-6 py-4 border-b text-sm text-gray-700">{user.email}</td>
                                    <td className="px-6 py-4 border-b text-sm text-gray-700">
                                        {new Date(user.created_at).toLocaleDateString()}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>

            {/* Recent Companies */}
            <div className="mb-6">
                <h2 className="text-xl font-bold mb-4">Recent Companies</h2>
                <div className="overflow-x-auto">
                    <table className="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">Company Name</th>
                                <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            {recentCompanies.map((company) => (
                                <tr key={company.id}>
                                    <td className="px-6 py-4 border-b text-sm text-gray-700">{company.name}</td>
                                    <td className="px-6 py-4 border-b text-sm text-gray-700">
                                        {new Date(company.created_at).toLocaleDateString()}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default AdminIndex;
