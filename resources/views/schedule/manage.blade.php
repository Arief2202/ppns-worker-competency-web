<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="ps-3 pe-3 pb-3">                                 
                        @if(Auth::user()->role == 3)
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('schedule.create') }}">Add Schedule</a>
                        </div>
                        @endif
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Working Activity</th>
                                    <th>Supervisor</th>
                                    <th>Location</th>
                                    <th>Period</th>
                                    <th>Workers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0;$i<10;$i++)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ "Assembling Robot" }}</td>
                                    <td>{{ "Mr. Asep" }}</td>
                                    <td>{{ "PT. Ajinomoto" }}</td>
                                    <td>{{ "8 Day" }}</td>
                                    <td>{{ "9 People" }}</td>
                                    <td><button class="btn btn-secondary">Detail</button></td>
                                </tr>
                                @endfor
                                {{-- @foreach($workers as $i=>$worker)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $worker->id_number }}</td>
                                    <td>{{ $worker->name }}</td>
                                    <td>{{ $worker->gender }}</td>
                                    <td>@foreach($worker->WorkerCompetency()->where('verification_status', '=', '1') as $c) {{ $c->competency()->competency_name }}<br> @endforeach</td>
                                    <td>{{ $worker->active_status }}</td>
                                    <td><a href="/worker/detail/{{ $worker->id_number }}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable({
                    
                    scrollY: '400px',
                }
                );
            } );
        </script>
    </x-slot>
</x-app-layout>
