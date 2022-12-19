@extends('layouts.app')

@section('main_title')
    <div class="container py-3">
        <h2 class="mb-0 text-center">Treni</h2>
    </div>
@endsection
@section('page_content')
    <div class="container py-3">
        <div class="table_wrap">
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
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                        <tr class="{{ $train['cancelled'] ? 'cancelled_text' : '' }}">
                            <td class="text-capitalize">{{ $train['agency'] }}</td>
                            <td class="text-capitalize">{{ $train['departure_station'] }}</td>
                            <td class="text-capitalize">{{ $train['arriving_station'] }}</td>
                            <td>{{ $train['departure_time'] }}</td>
                            <td>{{ $train['arriving_time'] }}</td>
                            <td>{{ $train['train_code'] }}</td>
                            <td>{{ $train['carriage_num'] }}</td>
                            @if ($train['in_time'] && !$train['cancelled'])
                                <td class="fw-bold text-success fs-5">&check;</td>
                            @elseif (!$train['in_time'] && !$train['cancelled'])
                                <td><span class="delay_text"><?php echo rand(1, 9) . ' minuti'; ?></span></td>
                            @else
                                <td></td>
                            @endif
                            @if ($train['cancelled'])
                                <td class="fw-bold text-danger">Cancellato</td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
