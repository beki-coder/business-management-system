<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    // List all clients
    public function index()
    {
        $clients = Client::all();
        return Inertia::render('Admin/Clients/Index', compact('clients'));
    }

    // Show form to create a client
    public function create()
    {
        return Inertia::render('Admin/Clients/Create');
    }

    // Store a new client
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    // Show form to edit a client
    public function edit(Client $client)
    {
        return Inertia::render('Admin/Clients/Edit', compact('client'));
    }

    // Update client data
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Delete a client
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}