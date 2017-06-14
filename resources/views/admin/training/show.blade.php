@extends('layouts.app')

@section('content')
   <div class="row">

      <nav class="sidebar">
         <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">

            <li class="nav-item active">
               <a class="nav-link" href="{{ route('training.index') }}">
                  <i class="fa fa-certificate"></i>&nbsp;&nbsp;Training
               </a>
            </li>

         </ul>
      </nav>

      <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

         <div class="main">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-lg-12">
                     <a href="{{ route('training.index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                     <div class="dropdown pull-right">
                        <a class="btn btn-default-action dropdown-toggle" style="text-shadow: none !important;" id="dropdownMenu1" data-toggle="dropdown"      aria-haspopup="true" aria-expanded="true"> Actions <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="margin-top: 0.55rem; margin-right: -4rem;">
                           <li><a style="cursor: pointer;" data-toggle="modal" data-target="#AddTopicModal"><i class="fa fa-plus"></i>&nbsp;Add Topic</a></li>
                           <li><a style="cursor: pointer;" data-toggle="modal" data-target="#EnrollEmployee"><i class="fa fa-thumbs-up"></i>&nbsp;Enroll Employee</a></li>
                        </ul>

                     </div>
                  </div>
               </div>

               <br>

               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel-1 panel-trans">
                        <div class="panel-heading-1">
                           <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;{{ $training->name }}</h4>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-4">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h1 class="text-center">{{ $training->employees->count() }}&nbsp;&nbsp;<small style="color: white;">Enrolled Employees</small></h1>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           <h1 class="text-center">{{ count($training->topics) }}&nbsp;&nbsp;<small>Topics</small></h1>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div class="panel panel-warning">
                        <div class="panel-heading">
                           <h1 class="text-center">{{ $training->getFileCountInsideDir() }}&nbsp;&nbsp;<small>Uploaded Files</small></h1>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-4">
                     <div class="panel panel-trans">
                        <div class="panel-heading">
                           <i class="fa fa-upload" aria-hidden="true"></i> Uploaded Files
                        </div>
                        <table class="table">
                           <tbody>
                           @foreach($trainingModules as $module)

                              <tr>
                                 <td>
                                    <a style='cursor: pointer;'>{{ pathinfo($module, PATHINFO_FILENAME) }}</a>
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <div class="col-lg-8">
                     <div class="panel panel-trans">
                        <div class="panel-heading">
                           <i class="fa fa-book" aria-hidden="true"></i> Topics
                        </div>
                        @if(count($training->topics) != 0)
                           <table class="table">
                              <tbody>
                              @foreach($training->topics as $topic)
                                 <tr>
                                    <td><a href="{{ route('topics.show', $topic->id) }}">{{ ucwords(strtolower($topic->name), " ") }}</a></td>
                                    <td>{{ $topic->lessons->count() }} Lesson(s)</td>
                                    <td><button class="btn btn-danger btn-sm delete-topic"
                                                data-toggle="modal" data-target="#DeleteTopicModal"
                                                data-tn="{{ $topic->name }}" data-href="{{ route('topics.destroy', $topic->id) }}">DELETE</button></td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        @else
                           <div class="panel-body">
                              <div class="alert error-msg" role="alert" style="padding: 10px; font-size: 13px; border-radius: 0px;">
                                 No available topics to display...
                              </div>
                           </div>
                        @endif
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-trans">
                        <div class="panel-heading"><i class="fa fa-users"></i> Enrolled Employees</div>
                        <div class="panel-body">
                           <table class="table table-striped">
                              <thead>
                              <th>#</th>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Status</th>
                              </thead>
                              <tbody>
                              @foreach($training->employees as $employee)
                                 <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->applicant->fullName() }}</td>
                                    <td>{{ $employee->applicant->job_position }}</td>
                                    <td>{{ $employee->pivot->status }}</td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>

   <!-- EnrollEmployee Modal -->
   <div class="modal fade" id="EnrollEmployee" tabindex="-1" role="dialog" aria-labelledby="EnrollEmployee">
      <form role="form" action="{{ route('training.enroll', $training->id) }}" class="form-horizontal" method="POST">
         {{ csrf_field() }}

         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Enroll Employee</h4>
               </div>

               <div class="modal-body">
                  <div class="form-group">
                     <label for="employeeDropdown" class="control-label col-md-4">Enroll Employee:</label>
                     <div class="col-md-6" style="margin-top: 7px;">
                        <select data-placeholder="Choose an Employee..." id="employeeDropdown" name="employee[]" multiple class="form-control chosen-select">
                           <option value=""></option>
                           @foreach($employees as $employee)
                              <option value="{{ $employee->id }}">{{ $employee->applicant->fullName() }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
               </div>

            </div>
         </div>
      </form>
   </div>

   <!-- AddTopic Modal -->
   <div class="modal fade" id="AddTopicModal" tabindex="-1" role="dialog" aria-labelledby="AddTopicModal">
      <form role="form" action="{{ route('topics.store') }}" class="form-horizontal" method="POST">
         {{ csrf_field() }}
         <input type="hidden" name="tid" value="{{ $training->id }}">

         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Topic</h4>
               </div>

               <div class="modal-body">
                  <div class="form-group">
                     <label for="InputTopicName" class="control-label col-md-4">Topic:</label>
                     <div class="col-md-6">
                        <input id="InputTopicName" name="name" type="text" class="form-control">
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
               </div>

            </div>
         </div>
      </form>
   </div>

   <!-- AddTopic Modal -->
   <div class="modal fade" id="DeleteTopicModal" tabindex="-1" role="dialog" aria-labelledby="DeleteTopicModal">
      <form role="form" class="form-horizontal" method="POST" id="DeleteTopicForm">
         {{ csrf_field() }}
         {{ method_field("DELETE") }}

         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Delete Topic</h4>
               </div>

               <div class="modal-body">
                  <p>Are you sure you want to delete <code><span id="topicName"></span></code></p>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>

            </div>
         </div>
      </form>
   </div>

   <script type="text/javascript">
      $('#EnrollEmployee').on('shown.bs.modal', function () {
         $('.chosen-select', this).chosen();
      });

      $(document).ready(function() {
         $(".delete-topic").click(function() {
            document.getElementById("DeleteTopicForm").action = $(this).data("href");
            document.getElementById("topicName").innerHTML = $(this).data("tn");
         })
      })
   </script>
@endsection
