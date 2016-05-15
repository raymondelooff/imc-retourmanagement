<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $product = Product::paginate(15);

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'msrp' => str_replace(',', '.', $request->input('msrp'))
        ]);

        $messages = [
            'name.required' => 'De naam van het product moet ingevuld zijn.',
            'supplier.required' => 'De leverancier van het product moet ingevuld zijn.',
            'short_description.max' => 'De korte beschrijving van het product mag niet meer dan 100 tekens lang zijn.',
            'ean_code.digits' => 'De EAN-code moet uit 13 cijfers bestaan',
            'ivnoice_number.digits_between' => 'Het factuurnummer moet een nummer van maximaal 20 cijfers zijn.',
            'weight.digits_between' => 'Het gewicht moet een nummer van maximaal 10 cijfers zijn.',
            'msrp.regex' => 'De prijs moet een getal zijn zonder decimalen, of een getal met twee decimalen.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'supplier' => 'required',
            'short_description' => 'max:100',
            'ean_code' => 'digits:13',
            'invoice_number' => 'digits_between:0,20',
            'weight' => 'digits_between:0,10',
            'msrp' => 'regex:/^\d+(\.\d{2})?$/'
        ], $messages);

        Product::create($request->all());

        Session::flash('flash_message', 'product added!');

        return redirect('product');
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
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
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
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
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
        $request->merge([
            'msrp' => str_replace(',', '.', $request->input('msrp'))
        ]);

        $messages = [
            'name.required' => 'De naam van het product moet ingevuld zijn.',
            'supplier.required' => 'De leverancier van het product moet ingevuld zijn.',
            'short_description.max' => 'De korte beschrijving van het product mag niet meer dan 100 tekens lang zijn.',
            'ean_code.digits' => 'De EAN-code moet uit 13 cijfers bestaan',
            'ivnoice_number.digits_between' => 'Het factuurnummer moet een nummer van maximaal 20 cijfers zijn.',
            'weight.digits_between' => 'Het gewicht moet een nummer van maximaal 10 cijfers zijn.',
            'msrp.regex' => 'De prijs moet een getal zijn zonder decimalen, of een getal met twee decimalen.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'supplier' => 'required',
            'short_description' => 'max:100',
            'ean_code' => 'digits:13',
            'invoice_number' => 'digits_between:0,20',
            'weight' => 'digits_between:0,10',
            'msrp' => 'regex:/^\d+(\.\d{2})?$/'
        ], $messages);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        Session::flash('flash_message', 'Product gewijzigd!');

        return redirect('product');
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
        Product::destroy($id);

        Session::flash('flash_message', 'Product verwijderd!');

        return redirect('product');
    }

}
