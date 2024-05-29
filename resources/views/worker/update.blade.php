<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Worker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('worker.update.post') }}" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="id" value="{{ $worker->id }}">
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image" onchange="previewImage()">
                            @error('image')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-5 img-preview-div">                            
                            <label for="image" class="form-label">Photo Preview</label>
                            <img for="image" src="/upload/image/{{ $worker->photo }}" alt="" class="img-preview img-fluid" style="max-width:200px; max-height:150px;">
                        </div>
                        <div class="mb-3">
                          <label for="input1" class="form-label">ID Number</label>
                          <input type="text" class="form-control @error('id_number') is-invalid @enderror" id="input1" name="id_number" value="{{ old('id_number', $worker->id_number) }}">
                          {{-- @dd(old('id_number')) --}}
                          @error('id_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input2" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="input2" name="name" value="{{ old('name', $worker->name ) }}">
                          @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="input3" class="form-label">Active Status</label><br>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->active_status == "Active") checked @endif class="form-check-input" type="radio" name="active_status" id="input3_1" value="Active">
                                      <label class="form-check-label" for="input3_1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->active_status == "non-Active") checked @endif class="form-check-input" type="radio" name="active_status" id="input3_2" value="non-Active">
                                      <label class="form-check-label" for="input3_2">non-Active</label>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="input4" class="form-label">Gender</label><br>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->gender == "Male") checked @endif class="form-check-input" type="radio" name="gender" id="input4_1" value="Male">
                                      <label class="form-check-label" for="input4_1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->gender == "Female") checked @endif class="form-check-input" type="radio" name="gender" id="input4_2" value="Female">
                                      <label class="form-check-label" for="input4_2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="input5" class="form-label">Employee Status</label><br>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->employee_status == "Active") checked @endif class="form-check-input" type="radio" name="employee_status" id="input5_1" value="Active">
                                      <label class="form-check-label" for="input5_1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->employee_status == "non-Active") checked @endif class="form-check-input" type="radio" name="employee_status" id="input5_2" value="non-Active">
                                      <label class="form-check-label" for="input5_2">non-Active</label>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="input5" class="form-label">SSW Status</label><br>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->ssw_status == "SSW") checked @endif class="form-check-input" type="radio" name="ssw_status" id="input5_1" value="SSW">
                                      <label class="form-check-label" for="input5_1">SSW</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input @if($worker->ssw_status == "non-SSW") checked @endif class="form-check-input" type="radio" name="ssw_status" id="input5_2" value="non-SSW">
                                      <label class="form-check-label" for="input5_2">non-SSW</label>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        

                        <div class="mb-3">
                          <label for="input6" class="form-label">Phone</label>
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="input6" name="phone" value="{{ old('phone', $worker->phone ) }}">
                          @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input6" class="form-label">Education</label>
                          <input type="text" class="form-control @error('education') is-invalid @enderror" id="input6" name="education" value="{{ old('education', $worker->education ) }}">
                          @error('education')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input7" class="form-label">Adress</label>
                          <input type="text" class="form-control @error('address') is-invalid @enderror" id="input7" name="address" value="{{ old('address', $worker->address ) }}">
                          @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input8" class="form-label">Departement</label>
                          <input type="text" class="form-control @error('departement') is-invalid @enderror" id="input8" name="departement" value="{{ old('departement', $worker->departement ) }}">
                          @error('departement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        {{-- <div class="mb-3">
                          <label for="input9" class="form-label">SSW Status</label>
                          <input type="text" class="form-control @error('ssw_status') is-invalid @enderror" id="input9" name="ssw_status" value="{{ old('ssw_status', $worker->ssw_status ) }}">
                          @error('ssw_status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div> --}}
                        <div class="mb-3">
                          <label for="input10" class="form-label">MCU Note</label>
                          <input type="text" class="form-control @error('mcu_note') is-invalid @enderror" id="input10" name="mcu_note" value="{{ old('mcu_note', $worker->mcu_note ) }}">
                          @error('mcu_note')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="input11" class="form-label">Supervisor Name</label>
                          <input type="text" class="form-control @error('supervisor_name') is-invalid @enderror" id="input11" name="supervisor_name" value="{{ old('supervisor_name', $worker->supervisor_name ) }}">
                          @error('supervisor_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="input1" class="form-label">Starting Date Work</label>
                                  <input type="date" class="form-control @error('starting_date_work') is-invalid @enderror" id="input1" name="starting_date_work" value="{{ old('starting_date_work', date('Y-m-d', strtotime($worker->starting_date_work))) }}">
                                  @error('starting_date_work')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="input1" class="form-label">End Date Work</label>
                                  <input type="date" class="form-control @error('end_date_work') is-invalid @enderror" id="input1" name="end_date_work" value="{{ old('end_date_work', date('Y-m-d', strtotime($worker->end_date_work))) }}">
                                  @error('end_date_work')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a href="{{ route('worker.delete', ['id'=>$worker->id]) }}" class="btn btn-danger">Delete</a>                          
                          <div>
                            <a href="{{ route('worker.detail', ['id_number'=>$worker->id_number]) }}" class="btn btn-secondary me-3">Cancel</a>
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

            function previewImage(){
                const image = document.querySelector("#image");
                const imgPreview = document.querySelector('.img-preview');
                const imgPreviewDiv = document.querySelector('.img-preview-div');
                imgPreview.style.display = 'block';
                imgPreviewDiv.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    </x-slot>
</x-app-layout>
