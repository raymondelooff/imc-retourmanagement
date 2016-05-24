@extends('layouts.master')
@section('back', url('product',  $product->id))
@section('title', 'Product wijzigen')

@section('content')

    {!! Form::model($product, [
        'method' => 'PATCH',
        'url' => ['product', $product->id],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="row">

        <div class="col-sm-6">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Naam *', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Beschrijving', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
                {!! Form::label('short_description', 'Korte beschrijving', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ean_code') ? 'has-error' : ''}}">
                {!! Form::label('ean_code', 'EAN', ['class' => 'col-sm-4 control-label', 'maxlength' => '13']) !!}
                <div class="col-sm-8">
                    {!! Form::number('ean_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ean_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('serial_number') ? 'has-error' : ''}}">
                {!! Form::label('serial_number', 'Serienummer', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('serial_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : ''}}">
                {!! Form::label('invoice_number', 'Factuurnummer', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('invoice_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
                {!! Form::label('weight', 'Gewicht (kg)', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country_code') ? 'has-error' : ''}}">
                {!! Form::label('country_code', 'Landcode', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('country_code', array(
                        "AF" => "Afghanistan (‫افغانستان‬‎)",
                        "AX" => "Åland Islands (Åland)",
                        "AL" => "Albania (Shqipëri)",
                        "DZ" => "Algeria (‫الجزائر‬‎)",
                        "AS" => "American Samoa",
                        "AD" => "Andorra",
                        "AO" => "Angola",
                        "AI" => "Anguilla",
                        "AQ" => "Antarctica",
                        "AG" => "Antigua and Barbuda",
                        "AR" => "Argentina",
                        "AM" => "Armenia (Հայաստան)",
                        "AW" => "Aruba",
                        "AC" => "Ascension Island",
                        "AU" => "Australia",
                        "AT" => "Austria (Österreich)",
                        "AZ" => "Azerbaijan (Azərbaycan)",
                        "BS" => "Bahamas",
                        "BH" => "Bahrain (‫البحرين‬‎)",
                        "BD" => "Bangladesh (বাংলাদেশ)",
                        "BB" => "Barbados",
                        "BY" => "Belarus (Беларусь)",
                        "BE" => "Belgium (België)",
                        "BZ" => "Belize",
                        "BJ" => "Benin (Bénin)",
                        "BM" => "Bermuda",
                        "BT" => "Bhutan (འབྲུག)",
                        "BO" => "Bolivia",
                        "BA" => "Bosnia and Herzegovina (Босна и Херцеговина)",
                        "BW" => "Botswana",
                        "BV" => "Bouvet Island",
                        "BR" => "Brazil (Brasil)",
                        "IO" => "British Indian Ocean Territory",
                        "VG" => "British Virgin Islands",
                        "BN" => "Brunei",
                        "BG" => "Bulgaria (България)",
                        "BF" => "Burkina Faso",
                        "BI" => "Burundi (Uburundi)",
                        "KH" => "Cambodia (កម្ពុជា)",
                        "CM" => "Cameroon (Cameroun)",
                        "CA" => "Canada",
                        "IC" => "Canary Islands (islas Canarias)",
                        "CV" => "Cape Verde (Kabu Verdi)",
                        "BQ" => "Caribbean Netherlands",
                        "KY" => "Cayman Islands",
                        "CF" => "Central African Republic (République centrafricaine)",
                        "EA" => "Ceuta and Melilla (Ceuta y Melilla)",
                        "TD" => "Chad (Tchad)",
                        "CL" => "Chile",
                        "CN" => "China (中国)",
                        "CX" => "Christmas Island",
                        "CP" => "Clipperton Island",
                        "CC" => "Cocos (Keeling) Islands (Kepulauan Cocos (Keeling))",
                        "CO" => "Colombia",
                        "KM" => "Comoros (‫جزر القمر‬‎)",
                        "CD" => "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)",
                        "CG" => "Congo (Republic) (Congo-Brazzaville)",
                        "CK" => "Cook Islands",
                        "CR" => "Costa Rica",
                        "CI" => "Côte d’Ivoire",
                        "HR" => "Croatia (Hrvatska)",
                        "CU" => "Cuba",
                        "CW" => "Curaçao",
                        "CY" => "Cyprus (Κύπρος)",
                        "CZ" => "Czech Republic (Česká republika)",
                        "DK" => "Denmark (Danmark)",
                        "DG" => "Diego Garcia",
                        "DJ" => "Djibouti",
                        "DM" => "Dominica",
                        "DO" => "Dominican Republic (República Dominicana)",
                        "EC" => "Ecuador",
                        "EG" => "Egypt (‫مصر‬‎)",
                        "SV" => "El Salvador",
                        "GQ" => "Equatorial Guinea (Guinea Ecuatorial)",
                        "ER" => "Eritrea",
                        "EE" => "Estonia (Eesti)",
                        "ET" => "Ethiopia",
                        "FK" => "Falkland Islands (Islas Malvinas)",
                        "FO" => "Faroe Islands (Føroyar)",
                        "FJ" => "Fiji",
                        "FI" => "Finland (Suomi)",
                        "FR" => "France",
                        "GF" => "French Guiana (Guyane française)",
                        "PF" => "French Polynesia (Polynésie française)",
                        "TF" => "French Southern Territories (Terres australes françaises)",
                        "GA" => "Gabon",
                        "GM" => "Gambia",
                        "GE" => "Georgia (საქართველო)",
                        "DE" => "Germany (Deutschland)",
                        "GH" => "Ghana (Gaana)",
                        "GI" => "Gibraltar",
                        "GR" => "Greece (Ελλάδα)",
                        "GL" => "Greenland (Kalaallit Nunaat)",
                        "GD" => "Grenada",
                        "GP" => "Guadeloupe",
                        "GU" => "Guam",
                        "GT" => "Guatemala",
                        "GG" => "Guernsey",
                        "GN" => "Guinea (Guinée)",
                        "GW" => "Guinea-Bissau (Guiné Bissau)",
                        "GY" => "Guyana",
                        "HT" => "Haiti",
                        "HM" => "Heard & McDonald Islands",
                        "HN" => "Honduras",
                        "HK" => "Hong Kong (香港)",
                        "HU" => "Hungary (Magyarország)",
                        "IS" => "Iceland (Ísland)",
                        "IN" => "India (भारत)",
                        "ID" => "Indonesia",
                        "IR" => "Iran (‫ایران‬‎)",
                        "IQ" => "Iraq (‫العراق‬‎)",
                        "IE" => "Ireland",
                        "IM" => "Isle of Man",
                        "IL" => "Israel (‫ישראל‬‎)",
                        "IT" => "Italy (Italia)",
                        "JM" => "Jamaica",
                        "JP" => "Japan (日本)",
                        "JE" => "Jersey",
                        "JO" => "Jordan (‫الأردن‬‎)",
                        "KZ" => "Kazakhstan (Казахстан)",
                        "KE" => "Kenya",
                        "KI" => "Kiribati",
                        "XK" => "Kosovo (Kosovë)",
                        "KW" => "Kuwait (‫الكويت‬‎)",
                        "KG" => "Kyrgyzstan (Кыргызстан)",
                        "LA" => "Laos (ລາວ)",
                        "LV" => "Latvia (Latvija)",
                        "LB" => "Lebanon (‫لبنان‬‎)",
                        "LS" => "Lesotho",
                        "LR" => "Liberia",
                        "LY" => "Libya (‫ليبيا‬‎)",
                        "LI" => "Liechtenstein",
                        "LT" => "Lithuania (Lietuva)",
                        "LU" => "Luxembourg",
                        "MO" => "Macau (澳門)",
                        "MK" => "Macedonia (FYROM) (Македонија)",
                        "MG" => "Madagascar (Madagasikara)",
                        "MW" => "Malawi",
                        "MY" => "Malaysia",
                        "MV" => "Maldives",
                        "ML" => "Mali",
                        "MT" => "Malta",
                        "MH" => "Marshall Islands",
                        "MQ" => "Martinique",
                        "MR" => "Mauritania (‫موريتانيا‬‎)",
                        "MU" => "Mauritius (Moris)",
                        "YT" => "Mayotte",
                        "MX" => "Mexico (México)",
                        "FM" => "Micronesia",
                        "MD" => "Moldova (Republica Moldova)",
                        "MC" => "Monaco",
                        "MN" => "Mongolia (Монгол)",
                        "ME" => "Montenegro (Crna Gora)",
                        "MS" => "Montserrat",
                        "MA" => "Morocco (‫المغرب‬‎)",
                        "MZ" => "Mozambique (Moçambique)",
                        "MM" => "Myanmar (Burma) (မြန်မာ)",
                        "NA" => "Namibia (Namibië)",
                        "NR" => "Nauru",
                        "NP" => "Nepal (नेपाल)",
                        "NL" => "Netherlands (Nederland)",
                        "NC" => "New Caledonia (Nouvelle-Calédonie)",
                        "NZ" => "New Zealand",
                        "NI" => "Nicaragua",
                        "NE" => "Niger (Nijar)",
                        "NG" => "Nigeria",
                        "NU" => "Niue",
                        "NF" => "Norfolk Island",
                        "MP" => "Northern Mariana Islands",
                        "KP" => "North Korea (조선 민주주의 인민 공화국)",
                        "NO" => "Norway (Norge)",
                        "OM" => "Oman (‫عُمان‬‎)",
                        "PK" => "Pakistan (‫پاکستان‬‎)",
                        "PW" => "Palau",
                        "PS" => "Palestine (‫فلسطين‬‎)",
                        "PA" => "Panama (Panamá)",
                        "PG" => "Papua New Guinea",
                        "PY" => "Paraguay",
                        "PE" => "Peru (Perú)",
                        "PH" => "Philippines",
                        "PN" => "Pitcairn Islands",
                        "PL" => "Poland (Polska)",
                        "PT" => "Portugal",
                        "PR" => "Puerto Rico",
                        "QA" => "Qatar (‫قطر‬‎)",
                        "RE" => "Réunion (La Réunion)",
                        "RO" => "Romania (România)",
                        "RU" => "Russia (Россия)",
                        "RW" => "Rwanda",
                        "BL" => "Saint Barthélemy (Saint-Barthélemy)",
                        "SH" => "Saint Helena",
                        "KN" => "Saint Kitts and Nevis",
                        "LC" => "Saint Lucia",
                        "MF" => "Saint Martin (Saint-Martin (partie française))",
                        "PM" => "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
                        "WS" => "Samoa",
                        "SM" => "San Marino",
                        "ST" => "São Tomé and Príncipe (São Tomé e Príncipe)",
                        "SA" => "Saudi Arabia (‫المملكة العربية السعودية‬‎)",
                        "SN" => "Senegal (Sénégal)",
                        "RS" => "Serbia (Србија)",
                        "SC" => "Seychelles",
                        "SL" => "Sierra Leone",
                        "SG" => "Singapore",
                        "SX" => "Sint Maarten",
                        "SK" => "Slovakia (Slovensko)",
                        "SI" => "Slovenia (Slovenija)",
                        "SB" => "Solomon Islands",
                        "SO" => "Somalia (Soomaaliya)",
                        "ZA" => "South Africa",
                        "GS" => "South Georgia & South Sandwich Islands",
                        "KR" => "South Korea (대한민국)",
                        "SS" => "South Sudan (‫جنوب السودان‬‎)",
                        "ES" => "Spain (España)",
                        "LK" => "Sri Lanka (ශ්‍රී ලංකාව)",
                        "VC" => "St. Vincent & Grenadines",
                        "SD" => "Sudan (‫السودان‬‎)",
                        "SR" => "Suriname",
                        "SJ" => "Svalbard and Jan Mayen (Svalbard og Jan Mayen)",
                        "SZ" => "Swaziland",
                        "SE" => "Sweden (Sverige)",
                        "CH" => "Switzerland (Schweiz)",
                        "SY" => "Syria (‫سوريا‬‎)",
                        "TW" => "Taiwan (台灣)",
                        "TJ" => "Tajikistan",
                        "TZ" => "Tanzania",
                        "TH" => "Thailand (ไทย)",
                        "TL" => "Timor-Leste",
                        "TG" => "Togo",
                        "TK" => "Tokelau",
                        "TO" => "Tonga",
                        "TT" => "Trinidad and Tobago",
                        "TA" => "Tristan da Cunha",
                        "TN" => "Tunisia (‫تونس‬‎)",
                        "TR" => "Turkey (Türkiye)",
                        "TM" => "Turkmenistan",
                        "TC" => "Turks and Caicos Islands",
                        "TV" => "Tuvalu",
                        "UM" => "U.S. Outlying Islands",
                        "VI" => "U.S. Virgin Islands",
                        "UG" => "Uganda",
                        "UA" => "Ukraine (Україна)",
                        "AE" => "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)",
                        "GB" => "United Kingdom",
                        "US" => "United States",
                        "UY" => "Uruguay",
                        "UZ" => "Uzbekistan (Oʻzbekiston)",
                        "VU" => "Vanuatu",
                        "VA" => "Vatican City (Città del Vaticano)",
                        "VE" => "Venezuela",
                        "VN" => "Vietnam (Việt Nam)",
                        "WF" => "Wallis and Futuna",
                        "EH" => "Western Sahara (‫الصحراء الغربية‬‎)",
                        "YE" => "Yemen (‫اليمن‬‎)",
                        "ZM" => "Zambia",
                        "ZW" => "Zimbabwe"
                    ), null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('country_code', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', 'Locatie', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            @if(Auth::user()->isAdmin())
                <div class="form-group {{ $errors->has('retailer_id') ? 'has-error' : ''}}">
                    {!! Form::label('retailer_id', 'Retailer *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('retailer_id', $retailer_values, null, ['class' => 'form-control']) !!}
                        {!! $errors->first('retailer_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('productphase_id') ? 'has-error' : ''}}">
                    {!! Form::label('productphase_id', 'Productfase', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('productphase_id', array_replace(['' => 'Nog niet bekend'], $product_phases_values), null, ['class' => 'form-control']) !!}
                        {!! $errors->first('productphase_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('product_categories[]') ? 'has-error' : ''}}">
                    {!! Form::label('product_categories[]', 'Productcategorie', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('product_categories[]', $product_categories_values, $product->product_category->lists('id')->toArray(), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                        {!! $errors->first('product_categories[]', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
            <div class="form-group {{ $errors->has('problem_description') ? 'has-error' : ''}}">
                {!! Form::label('problem_description', 'Probleemomschrijving', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('problem_description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('problem_description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                {!! Form::label('color', 'Kleur: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('color', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('msrp') ? 'has-error' : ''}}">
                {!! Form::label('msrp', 'Adviesprijs', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></div>
                        {!! Form::text('msrp', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! $errors->first('msrp', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <p>Velden met een * zijn verplicht</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::submit('Pas product aan', ['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
        </div>

    </div>

    {!! Form::close() !!}

@endsection
