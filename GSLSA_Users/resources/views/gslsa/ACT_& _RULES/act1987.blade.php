@extends('gslsa.layout')

@section('firstlayout-title')
    The Legal Services Authorities Act, 1987
@endsection

@section('first-layout-content')
    @php
        $items = [
            [
                'src' => 'https://drive.google.com/file/d/1WJ21cJ-zxkxLLq_-5pFRs3qROh16x7Tv/view',
                'name' => __('Act-1987', ["name" => "English"]),
            ],
            [
                'src' => 'https://drive.google.com/file/d/1k_Q7IgWw_xAtnqJvFWWrwfjp7EN5icYV/view',
                'name' => __('Act-1987', ["name" => "हिंदी"]),
            ],
        ];
    @endphp

    <x-actand-rules title="{{ __('The Legal Services Authorities Act, 1987') }}" :items="$items" />
@endsection
{{--  --}}