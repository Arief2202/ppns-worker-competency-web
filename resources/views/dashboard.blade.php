<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="padding-left: 30px; padding-right:30px;">
                        <div class="row">
                            <div class="col-xl">

                                <div class="d-flex justify-content-center w-100 mb-4">
                                    <img src="/assets/img/img.jpeg" alt="" width="500px" style="border-radius: 10px">
                                </div>
                            </div>
                            <div class="col-xl">
                                <h4 style="font-weight:700">Welcome to the Employee Competency Database Information System!</h4>
                                <p>Utilize our recording, scheduling, and monitoring features to enhance efficiency and accuracy in managing employee competencies.</p>
                                <p>We are here to help you achieve the highest competency standards in accordance with applicable regulations.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
