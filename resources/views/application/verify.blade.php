@extends('layouts.main')
@section('content')
@include('myevents.sidebar')
<div class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
    <div class=" py-8 px-5 md:px-10 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md rounded border border-gray-400">
        <div class="w-full flex justify-center text-gray-600 mb-3">
            <img src="{{ asset('storage/' . $applicant->user->image_path) }}">

        </div>



        <div>
            <!-- component -->
            <div>
                <!-- Author: FormBold Team -->
                <!-- Learn More: https://formbold.com -->
                <div class="mx-auto w-full max-w-[550px]">
                <form action="{{ route('application.update', ['applicant' => $applicant['id'], 'event' => $myevent['id'] , 'myevent'=>$myevent ]) }}" method="POST">
                        @csrf
                        <div class="-mx-3 flex">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="sm:col-span-3">
                                    <x-input-label for="name" :value="__('First name')" />
                                    <div class="mt-2">
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" readonly value="{{$applicant->user->first_name}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="sm:col-span-3">
                                    <x-input-label for="name" :value="__('Last name')" />
                                    <div class="mt-2">
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" readonly value="{{$applicant->user->last_name}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4"></div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" readonly value="{{$applicant->user->email}}" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>




                        <div class="flex mb-8"></div>
                        <div class="flex justify-center">
                            <div class="flex justify-center space-x-4">
                                <button type="submit" name="action" value="accept" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Accept</button>
                                <button type="submit" name="action" value="reject" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Reject</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>




    </div>
</div>


@endsection('content')