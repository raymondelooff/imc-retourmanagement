<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Session;

class ProductCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productcategory = ProductCategory::paginate(15);

        return view('product-category.index', compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|unique:productcategories',
            'productstatus' => 'required'
        ]);

        ProductCategory::create($request->all());

        Flash::success('Productcategorie toegevoegd!');

        return redirect('product-category');
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
        $productcategory = ProductCategory::findOrFail($id);

        return view('product-category.show', compact('productcategory'));
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
        $productcategory = ProductCategory::findOrFail($id);

        return view('product-category.edit', compact('productcategory'));
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
            'category' => 'required|unique:productcategories',
            'productstatus' => 'required'
        ]);

        $productcategory = ProductCategory::findOrFail($id);
        $productcategory->update($request->all());

        Flash::success('Productcategorie bijgewerkt!');

        return redirect(route('product-category.show', $id));
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
        ProductCategory::destroy($id);

        Flash::success('Productcategorie verwijderd!');

        return redirect('product-category');
    }

}
