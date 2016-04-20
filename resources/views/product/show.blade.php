@extends('layouts.master')
@section('title', 'Product')

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th>Nr.</th>--}}
            {{--<th>Name</th><th>Description</th><th>Short Description</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--<tr>--}}
            {{--<td>{{ $product->id }}</td>--}}
            {{--<td> {{ $product->name }} </td><td> {{ $product->description }} </td><td> {{ $product->short_description }} </td>--}}
            {{--</tr>--}}
            {{--</tbody> --}}
            <tr>
                <td>EAN-code</td>
                <td>{{ $product->ean }}</td>
            </tr>
            <tr>
                <td>Locatie</td>
                <td>{{ $product->location }}</td>
            </tr>
            <tr>
                <td>Productstatus</td>
                <td>{{ $product->productstatus }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>Status {{ $product->itemStatus }}</td>
            <tr>
                <td>Staat</td>
                <td>Nieuw / Zo goed als nieuw / Gebruikt</td>
            </tr>
            <tr>
                <td>Probleemomschrijving</td>
                <td>{{ $product->problemDescription }}</td>
            </tr>

            <tr>
                <td>Serienummer</td>
                <td>{{ $product->serialNumber }}</td>
            </tr>
            <tr>
                <td>Factuurnummer</td>
                <td>{{ $product->invoiceNumber }}</td>
            </tr>
            <tr>
                <td>Gewicht</td>
                <td>{{ $product->weight }}</td>
            </tr>
            <tr>
                <td>Landcode</td>
                <td>{{ $product->countryCode }}</td>
            </tr>
            <tr>
                <td>Leverancier</td>
                <td>{{ $product->manufacturer }}</td>
            </tr>
            <tr>
                <td>Productstatus</td>
                <td>{{ $product->productStatus }}</td>
            </tr>
            <tr>
                <td>Belastingroep</td>
                <td>{{ $product->taxID }}</td>
            </tr>
            <tr>
                <td>Kleur</td>
                <td>{{ $product->color }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <strong>Beschrijving</strong>
        <p>{{ $product->description }}</p>
    </div>
    </div>

@endsection