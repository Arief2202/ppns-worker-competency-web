<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Work Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <form method="POST" action="{{ route('schedule.create.post') }}">@csrf       
                        <div class="mb-3">
                          <label for="input1" class="form-label">Working Activity</label>
                          <input type="text" class="form-control @error('working_activity') is-invalid @enderror" id="input1" name="working_activity" value="@if($schedule){{$schedule->working_activity}}@else{{old('working_activity')}}@endif">
                          @error('working_activity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label for="myDropDown" class="form-label">Supervisor</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('supervisor') is-invalid @enderror" aria-label="Text input with dropdown button" value="@if($schedule){{$schedule->supervisor}}@else{{old('supervisor')}}@endif" id="supervisor_show" disabled>
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:200px;">
                              Select Supervisor
                            </button>
                            <ul class="dropdown-menu" id="myDropdown">
                              <div class="pe-2 ps-2"><input type="text" class="form-control" placeholder="Search.." id="myInput" onkeyup="filterFunction()"></div> 
                              <div style="overflow-y: scroll;max-height: 300px;">
                                @foreach($workers as $i=>$supervisor)
                                <li><a class="dropdown-item" onclick="select('{{ $supervisor->name }}', '{{ $supervisor->id }}')">{{ $supervisor->name }}</a></li>
                                @endforeach
                              </div>
                            </ul>
                          </div>
                          
                          <input type="hidden" name="supervisor" id="supervisor" value="{{ old('supervisor') }}" class="@error('supervisor') is-invalid @enderror">
                          @error('supervisor')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror

                        </div>     

                        <div class="mb-3">
                          <label for="input3" class="form-label">Location</label>
                          <input type="text" class="form-control @error('location') is-invalid @enderror" id="input3" name="location" value="@if($schedule){{$schedule->location}}@else{{old('location')}}@endif">
                          @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="note" class="form-label">Note</label>
                          <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="@if($schedule){{$schedule->note}}@else{{old('note')}}@endif">
                          @error('note')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input1" class="form-label">Date</label>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" id="input1" name="date" value="@if($schedule){{date('Y-m-d', strtotime($schedule->times()->first()->date))}}@else{{old('date')}}@endif">
                          @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input2" class="form-label">Start Time</label>
                          <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="input2" name="start_time" value="@if($schedule){{date('H:i', strtotime($schedule->times()->first()->start_time))}}@else{{old('start_time', '08:00')}}@endif">
                          @error('start_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input3" class="form-label">End Time</label>
                          <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="input3" name="end_time" value="@if($schedule){{date('H:i', strtotime($schedule->times()->first()->end_time))}}@else{{old('end_time', "17:00")}}@endif">
                          @error('end_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </form>

                        <hr>
                                
                      <div class="ps-3 pe-3 pb-3">
                        @if(Auth::user()->role == 3)
                        <div class="d-flex justify-content-between mb-3">
                            <h3>Workers</h3>
                            @if(!$schedule)
                            <a class="btn btn-primary @if(!$schedule)disabled @endif" href="">Add Worker</a>
                            @else
                            <a class="btn btn-primary @if(!$schedule)disabled @endif" href="{{ route('schedule.worker.create', ['schedule_id'=>$schedule->id]) }}">Add Worker</a>
                            @endif
                        </div>
                        @endif
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Competency</th>
                                    <th>Worker</th>
                                    @if(Auth::user()->role == 3)<th>Action</th>@endif
                                </tr>
                            </thead>
                            <tbody>
                              @if($schedule)
                                @foreach($schedule->schedule_workers() as $i=>$sworker)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $sworker->competency()->competency_name }}</td>
                                        <td>{{ $sworker->worker()->name }}</td>
                                        @if(Auth::user()->role == 3)<td><a href="{{ route('schedule.worker.update', ['id' => $sworker->id]) }}" class="btn btn-secondary">Edit</a></td>@endif
                                    </tr>
                                @endforeach
                              @endif
                            </tbody>
                        </table>
                    </div>        
                    @if($schedule)
                    <form method="POST" action="{{ route('schedule.submit', ['id' => $schedule->id]) }}">@csrf 
                      <div class="d-flex justify-content-end">
                          <button type="submit" class="btn btn-success">Submit Schedule</button>
                        </div>      
                      </form>
                      @else
                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success disabled">Submit Schedule</button>
                      </div>      
                    @endif
                </div>
            </div>
        </div>
    </div>


    
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable({
                    
                    scrollY: '400px',
                    pageLength : 5,
                    lengthMenu: [[5, 10], [5, 10]]
                }
                );
            } );
            
            function filterFunction() {
              const input = document.getElementById("myInput");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdown");
              const a = div.getElementsByTagName("li");
              for (let i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
                } else {
                  a[i].style.display = "none";
                }
              }
            }

            function select(name, id){
              document.getElementById("supervisor").value = name;
              document.getElementById("supervisor_show").value = name;
              document.getElementById("supervisor_id").value = id;
            }
        </script>
    </x-slot>
</x-app-layout>
