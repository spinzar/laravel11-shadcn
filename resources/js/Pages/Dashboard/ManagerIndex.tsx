import React from 'react';

const ManagerIndex: React.FC = () => {
    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Manager Dashboard</h1>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div className="bg-white shadow rounded-lg p-4">
                    <h3 className="text-lg font-bold">Team Members</h3>
                    <p className="text-3xl mt-2">15</p>
                </div>
                <div className="bg-white shadow rounded-lg p-4">
                    <h3 className="text-lg font-bold">Active Projects</h3>
                    <p className="text-3xl mt-2">6</p>
                </div>
                <div className="bg-white shadow rounded-lg p-4">
                    <h3 className="text-lg font-bold">Pending Tasks</h3>
                    <p className="text-3xl mt-2">23</p>
                </div>
            </div>

            {/* Recent Tasks */}
            <div className="mt-6">
                <h2 className="text-xl font-bold mb-4">Recent Tasks</h2>
                <ul>
                    <li className="mb-2">- Task 1: Prepare client presentation.</li>
                    <li className="mb-2">- Task 2: Review project milestones.</li>
                    <li className="mb-2">- Task 3: Schedule team meeting.</li>
                </ul>
            </div>
        </div>
    );
};

export default ManagerIndex;
