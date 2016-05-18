<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductPhase;
use Gate;
use App\Http\Requests;
use App\Product;
use App\Retailer;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{
    /**
     * Instantiate a new ProductController instance.
     */
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => [
            'destroy',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->user()->isRetailer()) {
            $product = Product::where('retailer_id', $request->user()->retailer_id)->paginate(15);
        } else {
            $product = Product::paginate(15);
        }

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $retailers = Retailer::all();
        $retailer_values = [];

        foreach($retailers as $retailer) {
            $retailer_values[$retailer->id] = $retailer->name;
        }

        $product_phases = ProductPhase::all();
        $product_phases_values = [];

        foreach($product_phases as $product_phase) {
            $product_phases_values[$product_phase->id] = $product_phase->name;
        }

        $product_categories = ProductCategory::all();
        $product_categories_values = [];

        foreach($product_categories as $product_category) {
            $product_categories_values[$product_category->id] = $product_category->category . ' - ' . $product_category->productstatus;
        }

        return view('product.create', compact('retailer_values', 'product_phases_values', 'product_categories_values'));
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

        if($request->user()->isRetailer()) {
            $request->merge([
                'retailer_id' => $request->user()->retailer_id,
                'productphase_id' => null
            ]);
        }

        if($request->user()->isAdmin()) {
            $request->merge([
                'productphase_id' => $request->get('productphase_id') ? $request->get('productphase_id') : null
            ]);
        }

        $messages = [
            'name.required' => 'De naam van het product moet ingevuld zijn.',
            'retailer_id.required' => 'De leverancier van het product moet ingevuld zijn.',
            'short_description.max' => 'De korte beschrijving van het product mag niet meer dan 100 tekens lang zijn.',
            'ean_code.digits' => 'De EAN-code moet uit 13 cijfers bestaan',
            'ivnoice_number.digits_between' => 'Het factuurnummer moet een nummer van maximaal 20 cijfers zijn.',
            'weight.digits_between' => 'Het gewicht moet een nummer van maximaal 10 cijfers zijn.',
            'msrp.regex' => 'De prijs moet een getal zijn zonder decimalen, of een getal met twee decimalen.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'retailer_id' => 'required',
            'short_description' => 'max:100',
            'ean_code' => 'digits:13',
            'invoice_number' => 'digits_between:0,20',
            'weight' => 'digits_between:0,10',
            'msrp' => 'regex:/^\d+(\.\d{2})?$/'
        ], $messages);

        $product = Product::create($request->all());

        if($request->user()->isAdmin()) {
            $product->product_category()->sync($request->get('product_categories'));
        }

        Flash::success('Product toegevoegd!');

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

        if (Gate::denies('show', $product)) {
            abort(403);
        }

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

        if (Gate::denies('update', $product)) {
            abort(403);
        }

        $retailers = Retailer::all();
        $retailer_values = [];

        foreach($retailers as $retailer) {
            $retailer_values[$retailer->id] = $retailer->name;
        }

        $product_phases = ProductPhase::all();
        $product_phases_values = [];

        foreach($product_phases as $product_phase) {
            $product_phases_values[$product_phase->id] = $product_phase->name;
        }

        $product_categories = ProductCategory::all();
        $product_categories_values = [];

        foreach($product_categories as $product_category) {
            $product_categories_values[$product_category->id] = $product_category->category . ' - ' . $product_category->productstatus;
        }

        return view('product.edit', compact('product', 'retailer_values', 'product_phases_values', 'product_categories_values'));
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

        if($request->user()->isRetailer()) {
            $request->merge([
                'retailer_id' => $request->user()->retailer_id,
                'productphase_id' => $request->old('productphase_id')
            ]);
        }

        if($request->user()->isAdmin()) {
            $request->merge([
                'productphase_id' => $request->get('productphase_id') ? $request->get('productphase_id') : null
            ]);
        }

        $messages = [
            'name.required' => 'De naam van het product moet ingevuld zijn.',
            'retailer_id.required' => 'De leverancier van het product moet ingevuld zijn.',
            'short_description.max' => 'De korte beschrijving van het product mag niet meer dan 100 tekens lang zijn.',
            'ean_code.digits' => 'De EAN-code moet uit 13 cijfers bestaan',
            'ivnoice_number.digits_between' => 'Het factuurnummer moet een nummer van maximaal 20 cijfers zijn.',
            'weight.digits_between' => 'Het gewicht moet een nummer van maximaal 10 cijfers zijn.',
            'msrp.regex' => 'De prijs moet een getal zijn zonder decimalen, of een getal met twee decimalen.',
        ];

        $this->validate($request, [
            'name' => 'required',
            'retailer_id' => 'required',
            'short_description' => 'max:100',
            'ean_code' => 'digits:13',
            'invoice_number' => 'digits_between:0,20',
            'weight' => 'digits_between:0,10',
            'msrp' => 'regex:/^\d+(\.\d{2})?$/'
        ], $messages);

        $product = Product::findOrFail($id);

        if (Gate::denies('update', $product)) {
            abort(403);
        }

        $product->update($request->all());

        if($request->user()->isAdmin()) {
            $product->product_category()->sync($request->get('product_categories'));
        }

        Flash::success('Product gewijzigd!');

        return redirect(route('product.show', $id));
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

        Flash::success('Product verwijderd!');

        return redirect('product');
    }

}
