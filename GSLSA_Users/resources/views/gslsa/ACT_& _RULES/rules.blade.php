@extends('gslsa.layout')

@section('firstlayout-title')
    rules
@endsection

@section('first-layout-content')
    @php
        $items = [
            [
                'src' => 'https://drive.google.com/file/d/1S2xRnAsjJrxEnk0iswVxor-6AMSNNrhz/view',
                'name' => __('Rules l1'),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1htOIPZv9QtNheMyx6MKGo3cYkpI6jTLr/view',
                'name' => __('Rules l2'),
            ],
        ];
    @endphp
    <x-actand-rules title="{{ __('Rules') }}" :items="$items" />
@endsection
