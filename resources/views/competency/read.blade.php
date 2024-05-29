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
                    @if(Auth::user()->role == 1)
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('competency.create') }}" class="btn btn-primary">Add Competency</a>
                    </div>
                    @endif
                    <div class="p-3">

                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Competency</th>
                                    @if(Auth::user()->role == 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($competencies as $i=>$com)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $com->competency_name }}</td>                                    
                                    @if(Auth::user()->role == 1)
                                    <td><a href="{{route('competency.update', ['id'=>$com->id])}}" class="btn btn-secondary">Edit</a></td>
                                    @endif
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
