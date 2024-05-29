<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-end">
                        <a href="/report/export" class="btn btn-primary">Export Excel</a>
                    </div>
                    <div class="p-3">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    <th>Employee Status</th>
                                    <th>Competency</th>
                                    <th>Expired</th>
                                    <th>Dayleft</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workerCompetency as $i=>$workc)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $workc->worker()->name }}</td>
                                    <td>{{ $workc->worker()->id_number }}</td>
                                    <td>{{ $workc->worker()->employee_status }}</td>
                                    <td>{{ $workc->competency()->competency_name}}</td>
                                    <td>{{ $workc->expiration_date }}</td>
                                    <td>{{ $workc->dayLeft() }}</td>
                                    <td>{{ $workc->update_status }}</td>
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
