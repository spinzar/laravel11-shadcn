import React from 'react';
import { Link } from '@inertiajs/react';

const GuestIndex: React.FC = () => {
    return (
        <div className="max-w-7xl mx-auto p-4">
            <h1 className="text-2xl font-bold mb-6">Welcome to Our Platform!</h1>
            <p>Explore the features of our platform and sign up to get access to exclusive content and services.</p>

            <div className="mt-6">
                <Link href="/register" className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Sign Up
                </Link>
            </div>

            <div className="mt-4">
                <Link href="/login" className="text-blue-500 underline">
                    Already have an account? Log in here.
                </Link>
            </div>
        </div>
    );
};

export default GuestIndex;
