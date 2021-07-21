<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>Id</th> 
                                    <th>Camera Id</th> 
                                    <th>Plate Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($detections as $detection)
                                <tr>
                                    <th>{{ $detection->id }}</th> 
                                    <td>{{ $detection->camera_id }}</td> 
                                    <td>{{ $detection->plate_number }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
