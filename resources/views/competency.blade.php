<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competency') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="p-3">

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
                                @for($i=1;$i<=30;$i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ rand(1000,10000) }}</td>
                                    <td>{{ fake()->name() }}</td>
                                    <td>{{ rand(0,1) ? "Male" : "Female"}}</td>
                                    <td>Welding</td>
                                    <td>Active</td>
                                    <td><button class="btn btn-secondary">Detail</button></td>
                                </tr>
                                @endfor
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
