@extends('layouts.main')

@section('content')
    <div class="mx-auto py-10 px-10 grid grid-cols-2">
        <div class="grid-column: 1" style=" display: flex; flex-direction: column; align-items: center;">
            <div class="event-detail-image">
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}">
            </div>
        </div>

        <div class="grid-column:2">
            <div class = "event-detail-box">
                <h1 class="font-semibold text-xl text-white"> {{ $event->name }} </h1>
            </div>

            <div class="event-detail-box">
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://i.ibb.co/G7DMFWP/icons8-clock-48.png"></span>
                    <span class="detail-info text-white ">{{ date('D d F Y', strtotime($event->date)) }}</span>
                </div>
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://i.ibb.co/TwgxD7N/icons8-location-48.png"></span>
                    <span class="detail-info text-white">
                        <p>{{ $event->address }} {{ $event->province->name }} {{ $event->district->name }} {{ $event->subdistrict->name }}</p>
                        <p>{{ $event->location_detail }}</p>
                    </span>
                </div>
            </div>
            <div class="event-detail-box text-white">
                <p>{{ $event->detail }}</p>
            </div>

            @can('apply', $event)
                <div style="margin-block: 50px">
                    <a href="{{ route('application.form', ['event' => $event]) }}">
                        <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                            <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                            <span class="relative group-hover:text-white">Apply</span>
                        </button>
                    </a>
                </div>
            @endcan
        </div>
    </div>
@endsection
