import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import route from 'ziggy-js';

interface Report {
    id: number;
    title: string;
    description: string;
    created_at: string;
    updated_at: string;
}

const ReportsIndex = () => {
    // Fetch the reports from the page props
    const { reports } = usePage().props as { reports: Report[] };

    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Reports</h1>

            {/* Button to create a new report */}
            <div className="mb-4">
                <Link
                    href={route('reports.create')}
                    className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Create New Report
                </Link>
            </div>

            {/* Reports Table */}
            <div className="overflow-x-auto">
                <table className="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Title
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Description
                            </th>
                            <th className="px-6 py-3 border-b text-left text-sm font-medium text-gray-500">
                                Created At
                            </th>
                            <th className="px-6 py-3 border-b text-right text-sm font-medium text-gray-500">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {reports.map((report) => (
                            <tr key={report.id}>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{report.title}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">{report.description}</td>
                                <td className="px-6 py-4 border-b text-sm text-gray-700">
                                    {new Date(report.created_at).toLocaleDateString()}
                                </td>
                                <td className="px-6 py-4 border-b text-sm text-right">
                                    <Link
                                        href={route('reports.edit', report.id)}
                                        className="text-indigo-600 hover:text-indigo-900 mr-4"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        href={route('reports.show', report.id)}
                                        className="text-green-600 hover:text-green-900 mr-4"
                                    >
                                        View
                                    </Link>
                                    <button
                                        className="text-red-600 hover:text-red-900"
                                        onClick={() => {
                                            if (confirm('Are you sure you want to delete this report?')) {
                                                Inertia.delete(route('reports.destroy', report.id));
                                            }
                                        }}
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

export default ReportsIndex;
