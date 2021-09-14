<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Camera') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <a href="{{ route('camera.create') }}" class="btn mb-3">New</a> 
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>Id</th> 
                                    <th>Camera Name</th> 
                                    <th>MQTT Topic</th>
                                    <th>Traffic Direction</th>
                                    <th>Coordinate</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($cameras as $camera)
                                <tr>
                                    <th>{{ $camera->id }}</th> 
                                    <td>{{ $camera->name }}</td> 
                                    <td>{{ $camera->mqtt_topic }}</td>
                                    <td>{{ $camera->traffic_direction }}</td>
                                    <td>{{ $camera->latitude }} , {{ $camera->longitude }}</td>
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
