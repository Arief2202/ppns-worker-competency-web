<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET">
                        <div class="row">
                            <div class="col-md-auto">
                                <h4>Select Date</h4> 
                            </div>
                            <div class="col-md-auto mb-3">
                                <input name="month" type="month" class="form-control" value="{{ $request->month }}" id="input1" style="width: 170px;">
                            </div>
                            <div class="col-md mb-3">
                                <button class="btn btn-primary">Show</button>
                            </div>
                            
                            @if(Auth::user()->role == 3)
                                <div class="col-md-auto d-flex justify-content-end">
                                    <a href="{{ route('schedule.manage') }}" class="btn btn-primary" style="height:40px">Work Activities</a>
                                </div>
                            @endif
                        </div>

                    </form>
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
                        {{-- }}?time={{ $request->month }}-{{ $i }} {{ $b+8<10?'0':'' --}}
                            <tbody>
                                @for($i=1;$i<=$dayCount;$i++)
                                <tr>
                                    <td><div >{{ $request->month.'-'.($i<10?"0":"").$i }}</div></td>
                                    @for($b=0; $b<9;$b++)
                                    <td style="padding:1px;"><a href="{{ route('schedule.detail.time')."?dateTime=".$request->month.'-'.($i<10?"0":"").$i."%20".(($b+8)<10?"0":"").($b+8).":00:00" }}" class="btn @if($count[$i-1][$b] == 0) btn-secondary disabled @else btn-success @endif" style="width:100%;">{{$count[$i-1][$b]}}</a></td>
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
                    pageLength : 32,
                    lengthMenu: [[32], [32]]
                }
                );
            } );
        </script>
    </x-slot>
</x-app-layout>
