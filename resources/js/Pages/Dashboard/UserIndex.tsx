import React from 'react';

const UserIndex: React.FC = () => {
    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">User Dashboard</h1>

            <p>Welcome to your user dashboard! Here you can view your recent activity and manage your account.</p>

            {/* Recent Activity Section */}
            <div className="mt-6">
                <h2 className="text-lg font-bold">Recent Activity</h2>
                <ul>
                    <li className="mb-2">- You have 3 new notifications.</li>
                    <li className="mb-2">- Task "Update Profile" is due soon.</li>
                    <li className="mb-2">- You received 5 new messages.</li>
                </ul>
            </div>

            {/* User Tasks */}
            <div className="mt-6">
                <h2 className="text-lg font-bold">Your Tasks</h2>
                <ul>
                    <li className="mb-2">- Complete your account setup.</li>
                    <li className="mb-2">- Review recent messages.</li>
                    <li className="mb-2">- Schedule a meeting with your manager.</li>
                </ul>
            </div>
        </div>
    );
};

export default UserIndex;
