<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(Auth::user()->role == 1)
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">Add Schedule</button>
                    </div>
                    @endif
                    <div class="p-3">

                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>08:00</th>
                                    <th>09:00</th>
                                    <th>10:00</th>
                                    <th>11:00</th>
                                    <th>12:00</th>
                                    <th>13:00</th>
                                    <th>14:00</th>
                                    <th>15:00</th>
                                    <th>16:00</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=1;$i<=30;$i++)
                                <tr>
                                    <td><div >2024-05-{{ ($i<10?"0":"").$i }}</div></td>
                                    @for($b=0; $b<9;$b++)
                                    <?php $r = rand(0, 5) ?>
                                    <td style="padding:1px;"><button class="btn @if($r == 0) btn-success disabled @else btn-danger @endif" style="width:100%;">{{$r}}</button></td>
                                    @endfor
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
