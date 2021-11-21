<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Quota;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuotaController extends GeneralController
{

    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Quotas';
        $this->data->title2 = 'Nouveau Quota';
        $this->data->title3 = 'Quotas';
        $this->data->route_prefix = 'quotas';
        $this->view_folder = 'quotas';
        $this->validators = [
            'user_id' => 'required',
            'type' => 'required',
            'nombre' => 'required|integer|min:1',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->getVars();
        $this->data->filter_name =  $request->input('filter_nom');

        $ids = User::where('name', 'like', '%' . $this->data->filter_name . '%')->pluck('id')->toArray();
        $this->data->items = Quota::whereIn('user_id', $ids)->orderBy('id', 'DESC')->paginate(5);
        if ($this->isPersonnel()) {
            $this->data->items = Quota::whereIn('user_id', [Auth::user()->id])->orderBy('id', 'DESC')->paginate(5);
        }
        return view($this->view_folder . '.index', ["data" => $this->data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getVars();
        $this->data->users = User::all(['id', 'name']);
        // $thiss->data->item = User::create();
        return view($this->view_folder . '.create', ["data" => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getVars();
        request()->validate(
            $this->validators
        );
        $user_id = $request->input('user_id');
        $type = $request->input('type');
        $data = Quota::where('user_id', '=', $request->input('user_id'))
            ->where('type', '=', $request->input('type'))
            ->first(); // model or null
        if ($data) {
            //$validator = Validator::make();
            // $validator->errors()->add('type', 'Quota déjà attribué pour ce type de billet !');
            //return redirect()->route($this->view_folder . '.create')
            //->with('errors', 'Quota déjà attribué !');            
            return Redirect::back()->withErrors(['Quota déjà attribué pour ce type de billet !']);
        }
        // 
        Quota::create($request->all());
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Quota $item)
    {
        $this->getVars();
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->getVars();
        $this->data->item = Quota::find($id);
        $this->data->users = User::all(['id', 'name']);
        return view($this->view_folder . '.edit', ["data" => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Quota::find($id);
        $this->getVars();
        request()->validate(
            [
                'nombre' => 'required|integer|min:1',
            ]
        );
        $item->update($request->all());
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        Quota::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
}
