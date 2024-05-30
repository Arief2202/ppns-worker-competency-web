<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="z-index: 0">
            <div class="bg-dark2 dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedule.worker.update.post') }}">@csrf      
                      <input type="hidden" name="id" id="id" value="{{ old('id', $scheduleWorker->id) }}">                  
                      <input type="hidden" name="schedule_id" id="schedule_id" value="{{ old('schedule_id', $scheduleWorker->schedule_id) }}">                  
                      <input type="hidden" name="competency_id" id="competency_id" value="{{ old('competency_id', $scheduleWorker->competency_id) }}">                  
                      <input type="hidden" name="worker_id" id="worker_id" value="{{ old('worker_id', $scheduleWorker->worker_id) }}">                  
                        <div class="mb-3">
                          <label for="myDropDown" class="form-label">Competency</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('competency') is-invalid @enderror" aria-label="Text input with dropdown button" value="{{ old('competency', $scheduleWorker->competency()->competency_name) }}" id="competency_show" disabled>
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:200px;">
                              Select Competency
                            </button>
                            <ul class="dropdown-menu" id="myDropdown">
                              <div class="pe-2 ps-2"><input type="text" class="form-control" placeholder="Search.." id="myInput" onkeyup="filterFunction()"></div> 
                              <div style="overflow-y: scroll;max-height: 300px;">
                                @foreach($competencies as $i=>$competency)
                                <li><a class="dropdown-item" onclick="select('{{ $schedule_id }}', '{{ $competency->competency_name }}', '{{ $competency->id }}')">{{ $competency->competency_name }}</a></li>
                                @endforeach
                              </div>
                            </ul>
                          </div>
                          
                          <input type="hidden" name="competency" id="competency" value="{{ old('competency', $scheduleWorker->competency()->competency_name) }}" class="@error('competency') is-invalid @enderror">
                          @error('competency')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror

                        </div>                     
                        <div class="mb-5">
                          <label for="myDropDown" class="form-label">Worker</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('worker') is-invalid @enderror" aria-label="Text input with dropdown button" value="{{ old('worker', $scheduleWorker->worker()->name) }}" id="worker_show" disabled>
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:200px;" @if(!old('competency')) disabled @endif id="buttonSelectWorker">
                              Select Worker
                            </button>
                            <ul class="dropdown-menu" id="myDropdown" >
                              <div class="pe-2 ps-2"><input type="text" class="form-control" placeholder="Search.." id="myInput" onkeyup="filterFunction2()"></div> 
                              <div style="overflow-y: scroll;max-height: 300px;" id="ajaxWorker">
                              </div>
                            </ul>
                          </div>
                          
                          <input type="hidden" name="worker" id="worker" value="{{ old('worker', $scheduleWorker->worker()->name) }}" class="@error('worker') is-invalid @enderror">
                          @error('worker')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror

                        </div>  
                        {{-- <div style="height: 300px"></div> --}}
                        <div class="d-flex justify-content-between">
                          <a href="{{ route('schedule.worker.delete', ['id' => $scheduleWorker->id]) }}" class="btn btn-danger">Delete</a>
                          <div>
                            <a href="{{ route('schedule.detail', ['id' => $schedule_id]) }}" class="btn btn-secondary me-3">Cancel</a>
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

                @if($schedule_id && $scheduleWorker->competency()->competency_name && $scheduleWorker->competency()->id)
                  document.getElementById("buttonSelectWorker").disabled = false;
                  updateWorkerList("{{ $schedule_id }}", "{{ $scheduleWorker->competency()->id }}");
                @endif
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

            function select(schedule_id, name, id){
              document.getElementById("competency").value = name;
              document.getElementById("competency_show").value = name;
              document.getElementById("competency_id").value = id;
              document.getElementById("worker").value = null;
              document.getElementById("worker_show").value = null;
              document.getElementById("worker_id").value = null;
              updateWorkerList(schedule_id, id);
            }

            function updateWorkerList(schedule_id, id){              
              var workerList = document.getElementById("ajaxWorker");
              document.getElementById("buttonSelectWorker").disabled = false;
              $.ajax({
               type:"GET",
               dataType: "json",
              //  data:{id: id, name: name},
                url: "{{route('schedule.worker.filter')}}?competency_id="+id+"&schedule_id="+schedule_id,
               success:function(data)
               {
                  var returnVar = "";
                  for(var i = 0; i < data.count; i++){
                    workerName = data.data[i].name;
                    workerName = workerName.replace("'", "\\'");
                    returnVar += '<li><a class="dropdown-item" onclick="select2(\''+workerName+'\', \''+data.data[i].id+'\')">'+data.data[i].name+'</a></li>';
                  }
                  workerList.innerHTML = returnVar;
                  console.log(returnVar);
               }
              });
            }

            
            function filterFunction2() {
              const input = document.getElementById("myInput2");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdown2");
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
            function select2(name, id){
              document.getElementById("worker").value = name;
              document.getElementById("worker_show").value = name;
              document.getElementById("worker_id").value = id;
            }

        </script>
    </x-slot>
</x-app-layout>
