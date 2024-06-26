<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Competency') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('competency.update.post') }}">@csrf
                      <input type="hidden" name="id" value="{{ $competency->id }}">                            
                        <div class="mb-3">
                          <label for="input4" class="form-label">Competency Name</label>
                          <input type="text " class="form-control @error('competency_name') is-invalid @enderror" id="input4" name="competency_name" value="{{ old('competency_name', $competency->competency_name) }}">
                          @error('competency_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        
                        <div class="d-flex justify-content-between">
                          <a href="{{ route('competency.delete', ['id'=>$competency->id]) }}" class="btn btn-danger">Delete</a>
                          <div>
                            <a href="{{ route('competency') }}" class="btn btn-secondary me-3">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
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
