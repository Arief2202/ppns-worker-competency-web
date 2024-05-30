<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedule.update.post') }}">@csrf  
                      <input type="hidden" name="id" value="{{$schedule->id}}">                      
                        <div class="mb-3">
                          <label for="input1" class="form-label">Working Activity</label>
                          <input type="text" class="form-control @error('working_activity') is-invalid @enderror" id="input1" name="working_activity" value="{{ old('working_activity', $schedule->working_activity) }}">
                          @error('working_activity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input2" class="form-label">Supervisor</label>
                          <input type="text" class="form-control @error('supervisor') is-invalid @enderror" id="input2" name="supervisor" value="{{ old('supervisor', $schedule->supervisor) }}">
                          @error('supervisor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input3" class="form-label">Location</label>
                          <input type="text" class="form-control @error('location') is-invalid @enderror" id="input3" name="location" value="{{ old('location', $schedule->location) }}">
                          @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                          <a href="{{ route('schedule.delete', ['id' => $schedule->id]) }}" class="btn btn-danger">Delete</a>

                          <div>
                            <a href="{{ route('schedule.detail', ['id' => $schedule->id]) }}" class="btn btn-secondary me-3">Cancel</a>
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
