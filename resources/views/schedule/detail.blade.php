<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedule Detail') }}
        </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('schedule.manage') }}" class="btn btn-secondary ms-3">< Back</a>
                    
                    <div class="d-flex justify-content-between m-3">
                        <h3>Detail of Work Activities</h3>
                        @if(Auth::user()->role == 3)
                        <a href="{{ route('schedule.update', ['id' => $schedule->id]) }}" class="btn btn-primary">Edit Data</a>
                        @else
                        <div></div>
                        @endif
                    </div>
                    <div class="p-3">
                        <div class="input-group input-group mb-2">
                            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 150px">Working Activity</span>
                            <input type="text" class="form-control" value="{{ $schedule->working_activity }}" disabled>
                        </div>
                        <div class="input-group input-group mb-2">
                            <span class="input-group-text" id="inputGroup-sizing-sm"style="width: 150px">Supervisor</span>
                            <input type="text" class="form-control" value="{{ $schedule->supervisor }}" disabled>
                        </div>
                        <div class="input-group input-group mb-2">
                            <span class="input-group-text" id="inputGroup-sizing-sm"style="width: 150px">Location</span>
                            <input type="text" class="form-control" value="{{ $schedule->location }}" disabled>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-xl-6">

                            <div class="ps-3 pe-3 pb-3">
                                @if(Auth::user()->role == 3)
                                <div class="d-flex justify-content-between mb-3">
                                    <h3>Date Time</h3>
                                    <a class="btn btn-primary" href="{{ route('schedule.time.create', ['schedule_id'=>$schedule->id]) }}">Add Date & Time</a>
                                </div>
                                @endif
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            @if(Auth::user()->role == 3)<th>Action</th>@endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schedule->times() as $i=>$time)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td><div style="width: 100px">{{ date('Y-m-d (l)', strtotime($time->date)) }}</div></td>
                                                <td>{{ date('H:i', strtotime($time->start_time)) }}</td>
                                                <td>{{ date('H:i', strtotime($time->end_time)) }}</td>
                                                @if(Auth::user()->role == 3)<td><a href="{{ route('schedule.time.update', ['id' => $time->id]) }}" class="btn btn-secondary">Edit</a></td>@endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="col-xl-6">

                            <div class="ps-3 pe-3 pb-3">
                                @if(Auth::user()->role == 3)
                                <div class="d-flex justify-content-between mb-3">
                                    <h3>Workers</h3>
                                    <a class="btn btn-primary" href="{{ route('schedule.worker.create', ['schedule_id'=>$schedule->id]) }}">Add Worker</a>
                                </div>
                                @endif
                                <table id="myTable2" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Competency</th>
                                            <th>Worker</th>
                                            @if(Auth::user()->role == 3)<th>Action</th>@endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schedule->schedule_workers() as $i=>$sworker)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{ $sworker->competency()->competency_name }}</td>
                                                <td>{{ $sworker->worker()->name }}</td>
                                                @if(Auth::user()->role == 3)<td><a href="{{ route('schedule.worker.update', ['id' => $sworker->id]) }}" class="btn btn-secondary">Edit</a></td>@endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable({
                    scrollX: true,
                    pageLength : 5,
                    lengthMenu: [[5, 10], [5, 10]]
                });
                $('#myTable2').DataTable({
                    scrollX: true,
                    pageLength : 5,
                    lengthMenu: [[5, 10], [5, 10]]
                }
                );
            } );
        </script>
    </x-slot>
</x-app-layout>
