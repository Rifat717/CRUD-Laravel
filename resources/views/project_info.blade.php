@extends('welcome')
@section('content')


<!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Project Info</h6>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					 Add Project Info
					</button>
                  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Project Name</th>
                        <th>Project Duration</th>
                        <th>Demo Url</th>
                        
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Project Name</th>
                        <th>Project Duration</th>
                        <th>Demo Url</th>
                        
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </tfoot>
                    
                    <tbody>
                      @foreach($project_info as $row)
                      <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->project_name }}</td>
                        <td>{{ $row->project_duration }}</td>
                        <td>{{ $row->demo_url }}</td>
                        
                        
                        
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



          {{-- Add modal --}}

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content col-md-12">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project Info
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('/insert-project-info') }}" method="post">
            @csrf
      <div class="modal-body">

        		<div class="row">

                        <div class="col-md-4"> 

                        	<?php 

                            $user_id=DB::table('all_users')->get();

                        	?>

                            <div class="form-group"> 
                                <label for="field-5" class="control-label"><b>All User</b></label> 
                                <select class="form-control" name="user_id">
                                    <option disabled="" selected="">select user</option>
                                    @foreach($user_id as $user)
                                    <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                                    @endforeach
                                    
                                </select> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Project Name</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="Project Name" name="project_name" required=""> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Project Duration</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="Project Duration" name="project_duration" required=""> 
                            </div> 
                        </div> 

                    </div>

                    <div class="row">

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Demo Url</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="Demo Url" name="demo_url" required=""> 
                            </div> 
                        </div>

                    </div>

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>



@endsection