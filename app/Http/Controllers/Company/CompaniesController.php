<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $company = Company::create($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $company->update($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
