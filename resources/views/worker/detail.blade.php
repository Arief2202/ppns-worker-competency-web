<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Worker Detail ') }} ({{ $worker->name }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center mb-4">
                                <img src="/upload/image/{{ $worker->photo }}" alt="" style="max-width: 300px; max-height:200px;">
                            </div>
                            <div class="col-md">
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ID Number</span>
                                    <input type="text" class="form-control" value="{{ $worker->id_number }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                    <input type="text" class="form-control" value="{{ $worker->name }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Active Status</span>
                                    <input type="text" class="form-control @if(strtolower($worker->active_status) == 'active') bg-success @else bg-danger @endif" value="{{ $worker->active_status }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Gender</span>
                                    <input type="text" class="form-control" value="{{ $worker->gender }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Phone</span>
                                    <input type="text" class="form-control" value="{{ $worker->phone }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Education</span>
                                    <input type="text" class="form-control" value="{{ $worker->education }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
                                    <input type="text" class="form-control" value="{{ $worker->address }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Employee Status</span>
                                    <input type="text" class="form-control @if(strtolower($worker->employee_status) == 'active') bg-success @else bg-danger @endif" value="{{ $worker->employee_status }}" disabled>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Departement</span>
                                    <input type="text" class="form-control" value="{{ $worker->departement }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">SSW Status</span>
                                    <input type="text" class="form-control {{-- @if(strtolower($worker->ssw_status) == 'active') bg-success @else bg-danger @endif --}}" value="{{ $worker->ssw_status }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">MCU Note</span>
                                    <input type="text" class="form-control" value="{{ $worker->mcu_note }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Supervisor Name</span>
                                    <input type="text" class="form-control" value="{{ $worker->supervisor_name }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Start Date Work</span>
                                    <input type="text" class="form-control" value="{{ $worker->starting_date_work }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">End Date Work</span>
                                    <input type="text" class="form-control" value="{{ $worker->end_date_work }}" disabled>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Verified SSHE</span>
                                    <input type="text" class="form-control @if($worker->verified_sshe == '1') bg-success @else bg-danger @endif" value="@if($worker->verified_sshe == '1') Verified @else Unverified @endif" disabled>
                                </div>
                                
                                <div class="input-group-sm mb-2 d-flex justify-content-end">
                                    @if(Auth::user()->role == 1)
                                        <a href="/worker/update/{{ $worker->id }}" class="btn btn-warning">Update</a>
                                    @elseif(Auth::user()->role == 2)
                                        <button class="btn btn-danger">Unverify</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="ps-3 pe-3 pb-3">
                        @if(Auth::user()->role == 1)
                        <div class="d-flex justify-content-end mb-2">
                            <a class="btn btn-primary" href="{{ route('worker.competency.create', ['id_number'=>$worker->id_number]) }}">Add Competency</a>
                        </div>
                        @endif
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Competency</th>
                                    <th>Certification Institute</th>
                                    <th>Effective Date</th>
                                    <th>Expiration Date</th>
                                    <th>Day Left</th>
                                    <th>Update Status</th>
                                    <th>Verification Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<=5; $i++)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>Dummy</td>
                                    <td>Dummy</td>
                                    <td>{{ date('Y-m-d H:i:s') }}</td>
                                    <td>{{ date('Y-m-d H:i:s') }}</td>
                                    <td>{{ $i+1 }}</td>
                                    <td>Waiting Update</td>
                                    <td>
                                        <div class="alert alert-danger" role="alert">
                                            Unverified
                                        </div>
                                    </td>
                                    <td>                                        
                                        @if(Auth::user()->role == 1)
                                            <button class="btn btn-secondary">Update</button>
                                        @elseif(Auth::user()->role == 2)
                                            <button class="btn btn-danger">Unverify</button>
                                        @endif                                    
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
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
                }
                );
            } );
        </script>
    </x-slot>
</x-app-layout>
