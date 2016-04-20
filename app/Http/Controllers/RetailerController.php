<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Retailer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RetailerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $retailer = Retailer::paginate(15);

        return view('retailer.index', compact('retailer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('retailer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Retailer::create($request->all());

        Session::flash('flash_message', 'Retailer aangemaakt!');

        return redirect('retailer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $retailer = Retailer::findOrFail($id);

        return view('retailer.show', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $retailer = Retailer::findOrFail($id);

        return view('retailer.edit', compact('retailer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        $retailer = Retailer::findOrFail($id);
        $retailer->update($request->all());

        Session::flash('flash_message', 'Retailer bijgewerkt!');

        return redirect('retailer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Retailer::destroy($id);

        Session::flash('flash_message', 'Retailer verwijderd!');

        return redirect('retailer');
    }

}
