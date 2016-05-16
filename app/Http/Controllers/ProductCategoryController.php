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

        return view('productcategory.index', compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        if (ProductCategory::where('category', '=', Input::get('category'))->exists() && ProductCategory::where('productstatus', '=', Input::get('productstatus'))->exists()) {
            Flash::error('Categorie <strong>' . Input::get('category') . '</strong> met status <strong>'. Input::get('productstatus') .'</strong> bestaat al!');
            return redirect('productcategory');
        }
        ProductCategory::create($request->all());

        Flash::success('Product Categorie toegevoegd!');

        return redirect('productcategory');
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

        return view('productcategory.show', compact('productcategory'));
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

        return view('productcategory.edit', compact('productcategory'));
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
        $this->validate($request, ['category' => 'required', 'productstatus' => 'required', ]);

        $productcategory = ProductCategory::findOrFail($id);
        $productcategory->update($request->all());

        Flash::success('Product Categorie bijgewerkt!');

        return redirect('productcategory');
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

        Flash::success('Product Categorie verwijderd!');

        return redirect('productcategory');
    }

}
