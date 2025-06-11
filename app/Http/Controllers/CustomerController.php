<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Show all customers
    public function index()
    {
        $customers = Customer::all(); // Fetch all customer records
        return view('customers.index', compact('customers')); // Send to view
    }

    // Show the customer creation form
    public function create()
    {
        return view('customers.create'); // Show form page
    }

    // Store a new customer in the database
    public function store(Request $request)
    {
        // Optional: Validate form input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string'
        ]);

        // Save the customer
        Customer::create($request->all());

        // Redirect to customer list
        return redirect('/customers')->with('success', 'Customer created successfully!');
    }
}