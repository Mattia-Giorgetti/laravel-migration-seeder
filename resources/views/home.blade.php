@extends('layouts.app')

@section('main_title')
    <div class="container py-3">
        <h2 class="mb-0 text-center">Treni</h2>
    </div>
@endsection
@section('page_content')
    <div class="container py-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Azienda</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col">Orario Partenza</th>
                    <th scope="col">Orario Arrivo</th>
                    <th scope="col">Codice Treno</th>
                    <th scope="col">Numero Carrozze</th>
                    <th scope="col">In Orario</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr class="{{ $train['cancelled'] ? 'text-danger' : 'text-success' }}">
                        <td>{{ $train['agency'] }}</td>
                        <td>{{ $train['departure_station'] }}</td>
                        <td>{{ $train['arriving_station'] }}</td>
                        <td>{{ $train['departure_time'] }}</td>
                        <td>{{ $train['arriving_time'] }}</td>
                        <td>{{ $train['train_code'] }}</td>
                        <td>{{ $train['carriage_num'] }}</td>
                        @if ($train['in_time'] && !$train['cancelled'])
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        @if ($train['cancelled'])
                            <td class="fw-bold">&check;</td>
                        @else
                            <td class="fw-bold">&cross;</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
