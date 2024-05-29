<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Worker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="ps-3 pe-3 pb-3">                                 
                        @if(Auth::user()->role == 1)
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('worker.create') }}">Add Worker</a>
                        </div>
                        @endif
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Competency</th>
                                    <th>Active Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workers as $i=>$worker)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $worker->id_number }}</td>
                                    <td>{{ $worker->name }}</td>
                                    <td>{{ $worker->gender }}</td>
                                    <td>@foreach($worker->WorkerCompetency()->where('verification_status', '=', '1') as $c) {{ $c->competency()->competency_name }}<br> @endforeach</td>
                                    <td>{{ $worker->active_status }}</td>
                                    <td><a href="/worker/detail/{{ $worker->id_number }}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                @endforeach
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
