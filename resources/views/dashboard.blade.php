<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 body">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div class="content">
                @foreach ($roster as $index => $les)
                    <div onclick="getKlas({{ $les['id'] }})" class="row roster py-1 my-2">
                        <div class="col info py-2">{{ $les['date'] }}</div>
                        <div class="col info py-2">{{ $les['start-time'] }}</div>
                        <div class="col info py-2">{{ $les['end-time'] }}</div>
                        <div class="col info py-2">{{ $les['subject'] }}</div>
                        <div class="col info py-2">{{ $les->klas->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="abscence" class="send">afwezigheid</div>

        <script>
            function getKlas(id){
                window.location.href = "/dashboard/lesson/" + id;
            }
        </script>
        <script>
            let sender = document.getElementById('abscence');
            sender.addEventListener("click", () =>{
                window.location.href = "dashboard/abscence";
            });
        </script>
    </div>
</x-app-layout>
