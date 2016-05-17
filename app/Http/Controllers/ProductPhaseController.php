<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\ProductPhase;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductPhaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productphase = ProductPhase::paginate(15);

        return view('productphase.index', compact('productphase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productphase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        ProductPhase::create($request->all());

        Flash::success('Productfase toegevoegd!');

        return redirect('productphase');
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
        $productphase = ProductPhase::findOrFail($id);

        return view('productphase.show', compact('productphase'));
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
        $productphase = ProductPhase::findOrFail($id);

        return view('productphase.edit', compact('productphase'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $productphase = ProductPhase::findOrFail($id);
        $productphase->update($request->all());

        Flash::success('Productfase bijgewerkt!');

        return redirect('productphase');
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
        ProductPhase::destroy($id);

        Flash::success('Productfase verwijderd!');

        return redirect('productphase');
    }

}
