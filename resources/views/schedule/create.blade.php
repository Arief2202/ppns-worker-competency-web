<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Work Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedule.create.post') }}">@csrf                        
                        <div class="mb-3">
                          <label for="input1" class="form-label">Working Activity</label>
                          <input type="text" class="form-control @error('working_activity') is-invalid @enderror" id="input1" name="working_activity" value="{{ old('working_activity') }}">
                          @error('working_activity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label for="myDropDown" class="form-label">Supervisor</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('supervisor') is-invalid @enderror" aria-label="Text input with dropdown button" value="{{ old('supervisor') }}" id="supervisor_show" disabled>
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
                          <input type="text" class="form-control @error('location') is-invalid @enderror" id="input3" name="location" value="{{ old('location') }}">
                          @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('schedule.manage') }}" class="btn btn-secondary me-3">Cancel</a>
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
              document.getElementById("supervisor").value = name;
              document.getElementById("supervisor_show").value = name;
              document.getElementById("supervisor_id").value = id;
            }
        </script>
    </x-slot>
</x-app-layout>
