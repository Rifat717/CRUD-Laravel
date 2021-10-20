@extends('welcome')
@section('content')


<!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Client Dashboard</h6>
                  
                  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Module</th>
                        <th>Description</th>
                        <th>Timeline</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                      @foreach($dashboard as $row)
                      <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->module }}</td>
                        <td>{{ $row->descriptoin }}</td>
                        <td>{{ $row->timeline }}</td>
                        <td>
                            @if($row->status=='Ongoing')
                              <span class="badge bg-primary">Ongoing</span>
                            @elseif($row->status=='Upcomming')
                                <span class="badge bg-success">Upcomming</span>
                            @else()  
                                <span class="badge bg-warning">Complete</span> 
                            @endif
                        </td>
                        <td>{{ $row->remark }}</td>
                        
 
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->


@endsection