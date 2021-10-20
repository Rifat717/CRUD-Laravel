@extends('welcome')
@section('content')


<!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Project Module</h6>
                    <?php
                        $user_type = Session::get('user_type');
                        if ($user_type=="admin"){ 
                    ?>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					 Add Project Module
					</button>
                    <?php }?>
                  
                </div>
                <div class="table-responsive p-3">
                <?php
                    $user_type = Session::get('user_type');
                    if ($user_type=="admin"){ 
                ?>
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Module Name</th>
                        <th>Description</th>
                        <th>Timeline</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Admin Remark</th>
                        <th>Client Remark</th> 
                        
                      </tr>
                    </thead>
            
                    <tbody>
                      @foreach($project_module as $row)
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
                        <td>{{ $row->admin_remark }}</td>
                        <td>{{ $row->clients_remark }}</td>
                              
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>

            <?php
            }
            elseif ($user_type=="programmer" || $user_type=="staff") {
            ?>
            <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Module Name</th>
                        <th>Description</th>
                        <th>Timeline</th>
                        <th>Status</th>
                        <th>Remark</th>
                         <th>Action</th>
                        
                      </tr>
                    </thead>
            
                    <tbody>
                      @foreach($project_module as $row)
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

                        
                        <td>
                            @if($row->status=='Ongoing')
                            <a class="btn btn-danger" href="{{ URL::to('/complete-status/'.$row->id) }}">
                              Complete
                            </a>
                            @elseif($row->status=='Complete')
                            <a class="btn btn-success" href="{{ URL::to('/upcomming-status/'.$row->id) }}">
                              Upcomming
                            </a>
                            @else()
                            <a class="btn btn-info" href="{{ URL::to('/ongoing-status/'.$row->id) }}">
                              Ongoing
                            </a>
                            @endif
                        </td>
                        
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>

            <?php
                }
                elseif ($user_type=="client") {
            ?>
            <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Module Name</th>
                        <th>Description</th>
                        <th>Timeline</th>
                        <th>Status</th>
                        <th>Clients Remark</th>
                         <th>Action</th>
                        
                      </tr>
                    </thead>
            
                    <tbody>
                      @foreach($project_module as $row)
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
                        <td>{{ $row->clients_remark }}</td>

                        <td>
                           <button class="btn btn-info btn-sm text-primary">Add Remark</button>
                        </td>
                        
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>
            <?php
            }
            ?>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



 {{-- Add modal --}}

         
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content col-md-12">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project Info
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('/insert-project-module') }}" method="post">
            @csrf
      <div class="modal-body">

        		<div class="row">

                        <div class="col-md-4"> 

                        	<?php 

                            $project_id=DB::table('project_infos')->get();

                        	?>

                            <div class="form-group"> 
                                <label for="field-5" class="control-label"><b>Project Name</b></label> 
                                <select class="form-control" name="project_id">
                                    <option disabled="" selected="">select option</option>
                                    @foreach($project_id as $row)
                                    <option value="{{ $row->id }}">{{ $row->project_name }}</option>
                                    @endforeach
                                    
                                </select> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Module</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="Project module" name="module" required=""> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Descriptoin</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="Project descriptoin" name="descriptoin" required=""> 
                            </div> 
                        </div> 

                    </div>

                    <div class="row">

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Time Line</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="timeline" name="timeline" required=""> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Status</b></label> 
                                <select class="form-control" name="status">
                                    <option disabled="" selected="">select option</option>
                                    
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Upcomming">Upcomming</option>
                                    <option value="Complete">Complete</option>
                                </select>
                                
                                {{-- <input type="text" class="form-control" id="field-4" placeholder="status" name="status" required=""> --}} 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Remark</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="remark" name="remark" > 
                            </div> 
                        </div>

                    </div>

                     <div class="row">

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Admin Remark</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="admin remark" name="admin_remark" > 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Client Remark</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="clients remark" name="clients_remark" > 
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