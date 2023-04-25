<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Traits\UploadFile;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /* The `use UploadFile;` statement is importing a trait called `UploadFile` into the
   `ClientController` class. Traits are a way to reuse code in multiple classes without using
   inheritance. In this case, the `UploadFile` trait provides methods for uploading and deleting
   files, which are used in the `store`, `update`, and `destroy` methods of the `ClientController`.
   By importing the trait, the `ClientController` can use these methods without having to define
   them itself. */
    use UploadFile;

    /* The `protected ;` statement is declaring a class property called `` with a
    visibility of `protected`. This property is being used to store an instance of the `Client`
    model class, which is injected into the constructor of the `ClientController` class. By storing
    this instance in a class property, it can be accessed by all methods of the `ClientController`
    class. */
    protected $client;

    /* `const CLIENTS_INDEX_ROUTE = 'admin.clients.index';` is declaring a class constant called
    `CLIENTS_INDEX_ROUTE` with a value of `'admin.clients.index'`. This constant is being used to
    store the name of a route that is used in the `store`, `update`, and `destroy` methods of the
    `ClientController` class. By using a constant, the name of the route can be easily changed in
    one place if needed, rather than having to update it in multiple places throughout the code. */
    const CLIENTS_INDEX_ROUTE = 'admin.clients.index';

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

    /**
     * This PHP function returns a paginated list of clients for an admin view.
     * 
     * @return View The `index()` function is returning a view named `admin.clients.index` with a variable
     * named `clientsList` that contains a paginated list of clients.
     */
    public function index(): View
    {
        $clientsList = $this->client->paginate(10);
        return view('admin.clients.index', compact('clientsList'));
    }

    /**
     * This PHP function returns a view for creating a new client in an admin panel.
     * 
     * @return View A view named 'admin.clients.create' is being returned.
     */
    public function create(): View
    {
        return view('admin.clients.create');
    }

    /**
     * This PHP function stores client data, validates it, uploads an image if provided, creates a new
     * client, and redirects to the clients index page.
     * 
     * @param ClientRequest request An instance of the ClientRequest class, which is a custom request class
     * that extends the base Laravel request class. It contains the data submitted by the user in the form
     * of a client creation request.
     * 
     * @return RedirectResponse A `RedirectResponse` is being returned.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), 'images');
            $validatedData['image'] = $imageName;
        }

        $this->client->create($validatedData);
        Toastr::success('Cliente criado com sucesso!', 'Sucesso');

        return redirect()->route(self::CLIENTS_INDEX_ROUTE);
    }

    /**
     * This PHP function shows a specific client's details on an admin view.
     * 
     * @param int id The parameter "id" is an integer that represents the unique identifier of a client. It
     * is used to retrieve the client from the database using the "findOrFail" method.
     * 
     * @return View A view with the data of a client with the given ID.
     */
    public function show(int $id): View
    {
        $client = $this->client->findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    public function edit(int $id): View
    /**
     * This PHP function retrieves a client by ID and returns a view for editing the client's information.
     * 
     * @param int id The parameter `` is an integer that represents the unique identifier of a client.
     * It is used to retrieve the client from the database using the `findOrFail` method of the
     * `->client` object. The retrieved client is then passed to the view as a variable named
     * ``.
     * 
     * @return View A view named 'admin.clients.edit' is being returned with a variable named 'client'
     * which contains the client data fetched by the 'findOrFail' method.
     */
    {
        $client = $this->client->findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * This function updates a client's information, including their image, and returns a redirect response
     * to the clients index page.
     * 
     * @param ClientRequest request An instance of the ClientRequest class, which is used to validate and
     * retrieve data from the HTTP request.
     * @param int id The ID of the client that needs to be updated.
     * 
     * @return RedirectResponse A RedirectResponse is being returned.
     */
    public function update(ClientRequest $request, int $id): RedirectResponse
    {
        $client = $this->client->findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $this->uploadDeleteImage($client->image);
            $imageName = $this->uploadImage($request->file('image'), 'images');
            $validatedData['image'] = $imageName;
        }

        $client->update($validatedData);
        Toastr::success('Cliente atualizado com sucesso!', 'Sucesso');

        return redirect()->route(self::CLIENTS_INDEX_ROUTE);
    }

    /**
     * This PHP function deletes a client and redirects to the clients index page while displaying a
     * success message.
     * 
     * @param int id The parameter "id" is an integer that represents the unique identifier of the client
     * that needs to be deleted.
     * 
     * @return RedirectResponse a `RedirectResponse`.
     */
    public function destroy(int $id): RedirectResponse
    {
        $client = $this->client->findOrFail($id);
        $client->delete();

        Toastr::success('Cliente excluído com sucesso!', 'Sucesso');
        return redirect()->route(self::CLIENTS_INDEX_ROUTE);
    }
}
