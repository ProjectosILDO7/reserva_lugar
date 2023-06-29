<?php

namespace App\Http\Controllers;

use App\Models\MessagesCliente;
use App\Http\Requests\StoreMessagesClienteRequest;
use App\Http\Requests\UpdateMessagesClienteRequest;

class MessagesClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessagesClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessagesClienteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessagesCliente  $messagesCliente
     * @return \Illuminate\Http\Response
     */
    public function show(MessagesCliente $messagesCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessagesCliente  $messagesCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(MessagesCliente $messagesCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessagesClienteRequest  $request
     * @param  \App\Models\MessagesCliente  $messagesCliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessagesClienteRequest $request, MessagesCliente $messagesCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessagesCliente  $messagesCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessagesCliente $messagesCliente)
    {
        //
    }
}
