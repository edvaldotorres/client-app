<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
