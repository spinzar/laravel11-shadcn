// resources/js/types/index.d.ts
// User Interface
export interface User {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at?: string | null; // Optional, can be null if not verified
    owner: boolean; // Determines if the user is the account owner
    role?: string; // Role of the user (optional), e.g., 'admin', 'user', 'manager'
    photo?: string | null; // Optional profile photo
    account_id?: number; // Optional, refers to the related account
    created_at?: string; // Timestamps for when the user was created
    updated_at?: string; // Timestamps for when the user was last updated
    deleted_at?: string | null; // Nullable, in case soft deletes are enabled
    last_login?: string | null; // Optional, records the last login time
}

// Company Interface
export interface Company {
    id: number;
    name: string;
    email?: string | null; // Optional, can be null if the company has no email
    phone?: string | null; // Optional phone number
    address?: string | null; // Optional address fields
    city?: string | null;
    region?: string | null;
    country?: string | null;
    postal_code?: string | null;
    created_at?: string; // Timestamps for company creation
    updated_at?: string; // Timestamps for the last company update
    account_id?: number; // Relating the company to an account
    users?: User[]; // Optional array of users associated with the company
}

// Contact Interface
export interface Contact {
    id: number;
    first_name: string;
    last_name: string;
    email?: string | null; // Optional email field
    phone?: string | null; // Optional phone field
    address?: string | null; // Optional address fields
    city?: string | null;
    region?: string | null;
    country?: string | null;
    postal_code?: string | null;
    company?: Company | null; // Optionally linked to a company
    account_id?: number; // Relating the contact to an account
    created_at?: string; // Timestamps for contact creation
    updated_at?: string; // Timestamps for contact update
    deleted_at?: string | null; // Nullable for soft deletes
    last_contacted_at?: string | null; // Optional, records when the contact was last contacted
}

// Account Interface
export interface Account {
    id: number;
    name: string;
    created_at?: string; // Timestamps for account creation
    updated_at?: string; // Timestamps for account updates
    users?: User[]; // Optional array of related users
    companies?: Company[]; // Optional array of related companies
    contacts?: Contact[]; // Optional array of related contacts
    account_manager_id?: number; // Optional, can reference the account manager if applicable
    plan?: string; // Optional, type of plan the account is on (e.g., 'basic', 'premium')
}

// Pagination Interface (useful for paginated results)
export interface Pagination<T> {
    data: T[]; // Array of data items
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
}

// Admin Dashboard Data (as an example for the Admin Dashboard)
export interface AdminDashboardData {
    totalUsers: number;
    totalCompanies: number;
    totalContacts: number;
    recentUsers: User[]; // List of recent users
    recentCompanies: Company[]; // List of recent companies
}

// Manager Dashboard Data (as an example for the Manager Dashboard)
export interface ManagerDashboardData {
    teamSize: number;
    activeProjects: number;
    pendingTasks: number;
    recentTasks: string[]; // Array of recent tasks
}

// Guest Dashboard Data (for guests)
export interface GuestDashboardData {
    welcomeMessage: string; // Welcome message for the guest user
}

// Global PageProps Interface for Inertia.js Pages
export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth?: {
        user?: User; // The authenticated user data
    };
    flash?: {
        message?: string; // Optional flash message
    };
};

// Example of additional page data for the Admin dashboard page
export interface AdminDashboardPageProps extends PageProps {
    dashboardData: AdminDashboardData; // Admin-specific dashboard data
}

// Example of additional page data for the Manager dashboard page
export interface ManagerDashboardPageProps extends PageProps {
    dashboardData: ManagerDashboardData; // Manager-specific dashboard data
}

// Example of additional page data for the Guest dashboard page
export interface GuestDashboardPageProps extends PageProps {
    dashboardData: GuestDashboardData; // Guest-specific dashboard data
}

