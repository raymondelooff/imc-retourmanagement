@extends('layouts.master')
@section('back', url('product'))
@section('title', $product->name)

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ route('product.edit', $product->id) }}">
            <i class="fa fa-pencil"></i><span class="hidden-xs hidden-sm">Product bewerken</span>
        </a>
    </li>
@stop

@section('content')

    <div class="row">
        <div class="col col-md-6 col-md-push-6">
            <span class="price">Adviesprijs: <strong>&euro; {{ $product->msrp }}</strong></span>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>EAN-code</th>
                        <td>{{ $product->ean_code }}</td>
                    </tr>
                    <tr>
                        <th>Locatie</th>
                        <td>{{ $product->location }}</td>
                    </tr>
                    <tr>
                        <th>Productfase</th>
                        <td>{{ $product->product_phases ? $product->product_phases->name : "Nog niet bekend" }}</td>
                    </tr>
                    <tr>
                        <th>Productcategorie(&euml;n)</th>
                        <td>
                        @if($product->product_category)
                            @foreach($product->product_category as $product_category)
                                {{ $product_category->category }} - {{ $product_category->productstatus }};
                            @endforeach
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Probleemomschrijving</th>
                        <td>{{ $product->problem_description }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col col-md-6 col-md-pull-6">
            <img src="http://placehold.it/720x480" alt="Placeholder" class="img-responsive">
        </div>
        <div class="clearfix"></div>
        <div class="col col-md-6">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Serienummer</th>
                        <td>{{ $product->serial_number }}</td>
                    </tr>
                    <tr>
                        <th>Factuurnummer</th>
                        <td>{{ $product->invoice_number }}</td>
                    </tr>
                    <tr>
                        <th>Gewicht</th>
                        <td>{{ $product->weight }}</td>
                    </tr>
                    <tr>
                        <th>Landcode</th>
                        <td>{{ $product->country_code }}</td>
                    </tr>
                    <tr>
                        <th>Leverancier</th>
                        <td>{{ $product->retailer->name }}</td>
                    </tr>
                    <tr>
                        <th>Kleur</th>
                        <td>{{ $product->color }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col col-md-6">
            <strong>Beschrijving</strong>
            <p>{{ $product->description }}</p>
        </div>
    </div>

@endsection