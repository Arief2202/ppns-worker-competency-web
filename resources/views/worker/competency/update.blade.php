<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Worker Competency') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('worker.competency.update.post') }}">@csrf
                      <input type="hidden" name="id" value="{{ $workerCompetency->id }}">
                      <input type="hidden" name="worker_id" value="{{ $workerCompetency->worker()->id }}">
                      <input type="hidden" name="competency_id" id="competency_id" value="{{ old('competency_id', $workerCompetency->competency_id) }}">
                        <div class="mb-3">
                          <label for="myDropDown" class="form-label">Competency</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('competency') is-invalid @enderror" aria-label="Text input with dropdown button" value="{{ old('competency', $workerCompetency->competency()->competency_name) }}" id="competency_show" disabled>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Select Competency
                            </button>
                            <ul class="dropdown-menu" id="myDropdown">
                              <div class="pe-2 ps-2"><input type="text" class="form-control" placeholder="Search.." id="myInput" onkeyup="filterFunction()"></div> 
                              <div style="overflow-y: scroll;max-height: 300px;">
                                @foreach($competencies as $i=>$competency)
                                <li><a class="dropdown-item" onclick="select('{{ $competency->competency_name }}', '{{ $competency->id }}')">{{ $competency->competency_name }}</a></li>
                                @endforeach
                              </div>
                            </ul>
                          </div>
                          
                          <input type="hidden" name="competency" id="competency" value="{{ old('competency', $workerCompetency->competency()->competency_name)}}" class="@error('competency') is-invalid @enderror">
                          @error('competency')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror

                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label">Worker Name</label>
                          <input type="text" class="form-control" value="{{ $workerCompetency->worker()->name }}" disabled>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Worker ID Number</label>
                          <input type="text" class="form-control" value="{{ $workerCompetency->worker()->id_number }}" disabled>
                        </div>


                        <div class="mb-3">
                          <label for="input1" class="form-label">Certification Institute</label>
                          <input type="text" class="form-control @error('certification_institute') is-invalid @enderror" id="input1" name="certification_institute" value="{{ old('certification_institute', $workerCompetency->certification_institute) }}">
                          @error('certification_institute')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                  <label for="input2" class="form-label">Effective Date</label>
                                  <input type="date" class="form-control @error('effective_date') is-invalid @enderror" id="input2" name="effective_date" value="{{ old('effective_date', date('Y-m-d', strtotime($workerCompetency->effective_date))) }}">
                                  @error('effective_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                  <label for="input3" class="form-label">Expiration Date</label>
                                  <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="input3" name="expiration_date" value="{{ old('expiration_date', date('Y-m-d', strtotime($workerCompetency->expiration_date))) }}">
                                  @error('expiration_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">                              
                              <div class="mb-3">
                                <label for="input4" class="form-label">Update Status</label>
                                <input type="text " class="form-control @error('update_status') is-invalid @enderror" id="input4" name="update_status" value="{{ old('update_status', $workerCompetency->update_status) }}">
                                @error('update_status')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                              </div>
                            </div>
                            
                        </div>

                        
                        <div class="d-flex justify-content-between">
                          <a href="{{ route('worker.competency.delete', ['id'=>$workerCompetency->id]) }}" class="btn btn-danger">Delete</a>
                          <div>
                            <a href="{{ route('worker.detail', ['id_number'=>$workerCompetency->worker()->id_number]) }}" class="btn btn-secondary me-3">Cancel</a>
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
