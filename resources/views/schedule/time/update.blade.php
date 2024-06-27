<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Date & Time') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedule.time.update.post') }}">@csrf      
                        <input type="hidden" name="id" value="{{ $scheduleTime->id }}">                  
                        <div class="mb-3">
                          <label for="input1" class="form-label">Date</label>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" id="input1" name="date" value="{{ old('date', date('Y-m-d', strtotime($scheduleTime->date))) }}">
                          @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input2" class="form-label">Start Time</label>
                          <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="input2" name="start_time" value="{{ old('start_time', date('H:i', strtotime($scheduleTime->start_time))) }}">
                          @error('start_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input3" class="form-label">End Time</label>
                          <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="input3" name="end_time" value="{{ old('end_time', date('H:i', strtotime($scheduleTime->end_time))) }}">
                          @error('end_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                          <a href="{{ route('schedule.time.delete', ['id' => $scheduleTime->id]) }}" class="btn btn-danger">Delete</a>
                          <div>
                            <a href="{{ route('schedule.detail', ['id' => $scheduleTime->schedule_id]) }}" class="btn btn-secondary me-3">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </form>
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
              document.getElementById("competency").value = name;
              document.getElementById("competency_show").value = name;
              document.getElementById("competency_id").value = id;
            }
        </script>
    </x-slot>
</x-app-layout>
