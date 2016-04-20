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
                <td>{{ $product->ean_code }}</td>
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
                <td>Status {{ $product->status }}</td>
            <tr>
                <td>Staat</td>
                <td>Nieuw / Zo goed als nieuw / Gebruikt</td>
            </tr>
            <tr>
                <td>Probleemomschrijving</td>
                <td>{{ $product->problem_description }}</td>
            </tr>
            <tr>
                <td>Kwaliteitslabel</td>
                <td>{{ $product->quality_label }}</td>
            </tr>
            <tr>
                <td>Serienummer</td>
                <td>{{ $product->serial_number }}</td>
            </tr>
            <tr>
                <td>Factuurnummer</td>
                <td>{{ $product->invoice_number }}</td>
            </tr>
            <tr>
                <td>Gewicht</td>
                <td>{{ $product->weight }}</td>
            </tr>
            <tr>
                <td>Landcode</td>
                <td>{{ $product->country_code }}</td>
            </tr>
            <tr>
                <td>Leverancier</td>
                <td>{{ $product->manufacturer }}</td>
            </tr>
            <tr>
                <td>Belastingroep</td>
                <td>{{ $product->tax_group }}</td>
            </tr>
            <tr>
                <td>Kleur</td>
                <td>{{ $product->color }}</td>
            </tr>
            <tr>
                <td>Adviesprijs</td>
                <td>{{ $product->msrp }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <strong>Beschrijving</strong>
        <p>{{ $product->description }}</p>
    </div>
    </div>

@endsection