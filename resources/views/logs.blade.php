<x-app-layout>

    @can('visit logs')
     <div class="py-5">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">

                   <div class="d-grid gap-2 d-md-flex">
                    <h1 class="m-1 fw-bold display-6">Activity Log</h1>

                   </div>

                <!-- Table -->

                <div class="container px-6 py-4">

                      <table class="table table-bordered table-striped">
                            <thead>
                               <tr>
                                  <th>Timestamp</th>
                                  <th>Log Entry</th>
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($logs as $log)
                                  <tr>
                                     <td>{{ $log->created_at }}</td>
                                     <td>{{ $log->log_entry }}</td>
                                  </tr>
                               @endforeach
                            </tbody>
                      </table>
                   </div>
                </div>


             </div>

     </div>
    @endcan

 </x-app-layout>
