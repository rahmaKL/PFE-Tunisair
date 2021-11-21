<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends GeneralController
{
    public function getVars() {
        parent::getVars();
        $this->data->title1 = 'Items';
        $this->data->title2 = 'Item';
        $this->data->title3 = 'Gestion des items';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->getVars();
        $this->data->items = Item::latest()->paginate(10);
        return view('items.index', ["data"=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getVars();
        // $c = collect(new Item);
        // $c = Collection::make(new Item);
        // $thiss->data->item = Item::create();
        return view('items.create', ["data"=>$this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom' => 'required',
        ]);
        Item::create($request->all());
        return redirect()->route('items.index')
                        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $this->getVars();
        $this->data->item = $item ;
        return view('items.edit', ["data"=>$this->data] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        request()->validate([
            'nom' => 'required'
        ]);
        $item->update($request->all());
        return redirect()->route('items.index')
                        ->with('success','Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');
        Item::destroy($id);
        return redirect()->route('items.index')
                        ->with('success','Member deleted successfully');
    }
}
