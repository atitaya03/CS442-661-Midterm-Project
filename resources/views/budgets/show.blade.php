@extends('layouts.main')

@section('content')
    <div class="container mx-auto bg-gray-800 shadow-md rounded flex justify-center" style="margin-block: 30px">
        <div class="event-detail-image">
            <img src="{{ $budget->event->image_path }}" alt="{{ $budget->event->name }}">
        </div>

        <div style="margin-left: 50px">
                <div class = "event-detail-box-white">
                    <h1 class="font-semibold text-xl"> {{ $budget->event->name }} </h1>
                </div>

                <div class = "event-detail-box-white">
                    <p>{{ date("D d F Y", strtotime($budget->event->date))}}</p>
                    <p>{{ $budget->event->location }}</p>
                </div>

                <div class="event-detail-box-white">
                    <p>{{ $budget->event->detail }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto bg-white shadow-md rounded" style="margin-block: 30px">
        <div class="mx-auto flex justify-center" style="margin-block:30px">
            <div class="text-4xl font-semibold">Budget</div>
        </div>

        <div style="margin-block:10px">
            <span class="font-semibold">สถานะ: </span>
            @if($budget->status === "inprogress") <span>รอดำเนินการ</span>
            @elseif($budget->status === "completed") <span>ดำเนินการแล้ว</span>
            @endif
        </div>
        <div style="margin-block:10px">
            <span class="font-semibold">ค่าใช้จ่าย: </span>
            <span>{{ $budget->cost }}</span>
        </div>
        <div style="margin-block:10px">
            <span class="font-semibold">คำอธิบาย: </span>
            <span>{{ $budget->description }}</span>
        </div>

        <div class="mx-auto flex justify-center" style="margin-block:30px">
            <form action="{{ route('budgets.update-status', ['budget' => $budget]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                    <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                    <span class="relative group-hover:text-white">ยืนยันการเบิก</span>
                </button>
            </form>
        </div>
    </div>
@endsection
