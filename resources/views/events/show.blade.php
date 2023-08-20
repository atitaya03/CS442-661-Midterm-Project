@extends('layouts.main')

@section('content')
    <div class="mx-auto flex py-5">
        <div class="grid-column: 1" style="margin-left: 250px; display: flex; flex-direction: column; align-items: center;">
            <div class="event-detail-image">
                <img src="{{ $event->image_path }}" alt="{{ $event->name }}">
            </div>


            @if (Auth::check())
                @if (auth()->user()->role === 'MEMBER')
                    <div style="margin-block: 50px">
                    <a href="{{ route('application.form', ['event' => $event]) }}">
                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                                <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                                <span class="relative group-hover:text-white">Apply</span>
                            </button>
                        </a>
                    </div>
                @endif

            @endif
        </div>

        <div class="grid-column:2" style="margin-left: 100px">
            <div class = "event-detail-box">
                <h1 class="font-semibold text-xl"> {{ $event->name }} </h1>
            </div>

            <div class="event-detail-box">
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://i.ibb.co/G7DMFWP/icons8-clock-48.png"></span>
                    <span class="detail-info">{{ date('D d F Y g:i:s A', strtotime($event->dateTime)) }}</span>
                </div>
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://i.ibb.co/TwgxD7N/icons8-location-48.png"></span>
                    <span class="detail-info">
                        <p>{{ $event->address }} {{ $event->province }} {{ $event->district }} {{ $event->subdistrict }}</p>
                        <p>{{ $event->location_detail }}</p>
                    </span>
                </div>
            </div>


            <div class="event-detail-box">
                <p>{{ $event->detail }}</p>
            </div>
        </div>
    </div>

@endsection
