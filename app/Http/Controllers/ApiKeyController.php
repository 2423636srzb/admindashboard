<?php

// app/Http/Controllers/ApiKeyController.php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = ApiKey::all();
        return view('admin.api_keys.index', compact('apiKeys'));
    }

    public function create()
    {
        return view('admin.api_keys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ApiKey::create([
            'name' => $request->name,
            'key' => Str::random(32),
        ]);
        
        return redirect()->route('admin.api_keys.index')->with('message', 'API Key created successfully.');
    }

    public function edit(ApiKey $apiKey)
    {
        return view('admin.api_keys.edit', compact('apiKey'));
    }

    public function update(Request $request, ApiKey $apiKey)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $apiKey->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.api_keys.index')->with('message', 'API Key updated successfully.');
    }

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();
        return redirect()->route('admin.api_keys.index')->with('message', 'API Key deleted successfully.');
    }
}

