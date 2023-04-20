<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Traits\UploadFile;

class ClientController extends Controller
{
    use UploadFile;

    protected $client;

    /**
     * This is a constructor function that sets the value of a class property called "client" to the value
     * passed as an argument.
     * 
     * @param Client client The parameter `` is an instance of the `Client` class. It is being
     * injected into the constructor of another class, which means that the class that is receiving this
     * parameter can use the methods and properties of the `Client` class. This is an example of dependency
     * injection, which is a
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clientsList = $this->client->paginate(10);
        return view('admin.clients.index', compact('clientsList'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }


    public function store(ClientRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), 'images');
            $validatedData['image'] = $imageName;
        }

        $this->client->create($validatedData);

        return redirect()->route('admin.clients.index')->with('message', 'Client created successfully!');
    }


    public function show(int $id)
    {
        $client = $this->client->findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }


    public function edit(int $id)
    {
        $client = $this->client->findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, int $id)
    {
        $client = $this->client->findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $this->uploadDeleteImage($client->image);
            $imageName = $this->uploadImage($request->file('image'), 'images');
            $validatedData['image'] = $imageName;
        }

        $client->update($validatedData);
        return redirect()->route('admin.clients.index');
    }

    public function destroy(int $id)
    {
        $client = $this->client->findOrFail($id);
        $this->uploadDeleteImage($client->image);
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}
