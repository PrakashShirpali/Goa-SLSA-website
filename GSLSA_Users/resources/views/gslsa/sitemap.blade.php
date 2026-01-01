@extends('gslsa.layout')

@section('firstlayout-title')
    Site-Map
@endsection

@section('first-layout-content')
    <div class="d-flex flex-column p-3">
        <div>
            <h5> <a href="{{ route('home') }}">{{ __('Home') }}</a></h5>
        </div>

        <div>
            <h5>{{ __('About') }}</h5>
            <ul>
                <li> <a href="{{ route('about_us') }}">{{ __('about us') }}</a></li>
                <li> <a href="{{ route('members') }}">{{ __('members') }}</a></li>
                <li> <a href="{{ route('hclsc') }}">{{ __('high court legal services committee') }}</a></li>
                <div>
                    <li>{{ __('district legal services authorities') }}</li>
                    <ul>
                        <li> <a href="{{ route('north') }}">{{ __('north') }}</a></li>
                        <li> <a href="{{ route('south') }}">{{ __('south') }}</a></li>
                    </ul>
                </div>
                <div>
                    <li>{{ __('taluka legal services committee') }}</li>
                    <ul>
                        <li>{{ __('north') }}</li>
                        <li> <a href="{{ route('bardez') }}">{{ __('bardez') }}</a></li>
                        <li> <a href="{{ route('bicholim') }}">{{ __('bicholim') }}</a></li>
                        <li> <a href="{{ route('pernem') }}">{{ __('pernem') }}</a></li>
                        <li> <a href="{{ route('ponda') }}">{{ __('ponda') }}</a></li>
                        <li> <a href="{{ route('sattari') }}">{{ __('sattari') }}</a></li>
                        <li> <a href="{{ route('tiswadi') }}">{{ __('tiswadi') }}</a></li>

                        <li>{{ __('south') }}</li>
                        <li> <a href="{{ route('canacona') }}">{{ __('canacona') }}</a></li>
                        <li> <a href="{{ route('mormugao') }}">{{ __('mormugao') }}</a></li>
                        <li> <a href="{{ route('quepem') }}">{{ __('quepem') }}</a></li>
                        <li> <a href="{{ route('salcete') }}">{{ __('salcete') }}</a></li>
                        <li> <a href="{{ route('sanguem') }}">{{ __('sanguem') }}</a></li>
                    </ul>
                </div>
            </ul>
        </div>

        <div>
            <h5>{{ __('Services') }}</h5>
            <ul>
                <li> <a href="{{ route('legalaid') }}">{{ __('Legal Aid') }}</a></li>
                <li> <a href="{{ route('lokadalat') }}">{{ __('Lok Adalat') }}</a></li>
                <li> <a href="{{ route('lokadalatschemes') }}">{{ __('Lok adalat scheme') }}</a></li>
            </ul>
        </div>

        <div>
            <h5>{{ __('Act & Rules') }}</h5>
            <ul>
                <li> <a href="{{ route('act1987') }}">{{ __('The Legal Services Authorities Act, 1987') }}</a></li>
                <li> <a href="{{ route('rules') }}">{{ __('Rules') }}</a></li>
                <li> <a href="{{ route('regulations') }}">{{ __('Regulations') }}</a></li>
                <li> <a href="{{ route('Schemes') }}">{{ __('Preventive & Strategic Legal Services Schemes') }}</a></li>
                <li> <a href="{{ route('guidelines') }}">{{ __('Guidelines') }}</a></li>
            </ul>
        </div>

        <div>
            <h5><a href="{{ route('gallery') }}">{{ __('Gallery') }}</a></h5>
        </div>

        <div>
            <h5>{{ __('Miscellaneous') }}</h5>
            <ul>
                <li> <a href="{{ route('latest_updates') }}">{{ __('Notice Board') }}</a></li>
                <li> <a href="{{ route('newsletter') }}">{{ __('Newsletter') }}</a></li>
                <li> <a href="{{ route('recruitment') }}">{{ __('Recruitment') }}</a></li>
            </ul>
        </div>
    </div>
@endsection
