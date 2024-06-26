<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Date & Time') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedule.time.create.post') }}">@csrf      
                        <input type="hidden" name="schedule_id" value="{{ $id }}">                  
                        <div class="mb-3">
                          <label for="input1" class="form-label">Date</label>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" id="input1" name="date" value="{{ old('date') }}">
                          @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input2" class="form-label">Start Time</label>
                          <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="input2" name="start_time" value="{{ old('start_time', '08:00') }}">
                          @error('start_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input3" class="form-label">End Time</label>
                          <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="input3" name="end_time" value="{{ old('end_time', '17:00') }}">
                          @error('end_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('schedule.detail', ['id' => $id]) }}" class="btn btn-secondary me-3">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
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
