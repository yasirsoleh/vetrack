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
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('camera.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="label" for="name">Device Name</label>
                            <input type="text" name="name" placeholder="Camera Name" class="input input-bordered">
                            <label class="label" for="mqtt_topic">MQTT Topic</label>
                            <input type="text" name="mqtt_topic" placeholder="MQTT Topic" class="input input-bordered">
                            <select class="select select-bordered w-full max-w-xs" name="traffic_direction">
                                <option disabled="disabled" selected="selected">Traffic Direction</option> 
                                <option value="inbound">inbound</option> 
                                <option value="outbound">outbound</option> 
                            </select>
                            <label class="label" for="latitude">Latitude</label>
                            <input type="text" name="latitude" placeholder="Latitude" class="input input-bordered">
                            <label class="label" for="longitude">Longitude</label>
                            <input type="text" name="longitude" placeholder="Longitude" class="input input-bordered">
                            <input class="btn mt-3" type="submit">                      
                        </form>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
