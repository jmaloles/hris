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
                  <a href="{{ route('topics.show', $lesson->topic_id) }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                  
               </div>
            </div>

            <br>

            <div class="row">
               <div class="col-lg-12">
                  <div class="panel-1 panel-trans">
                     <div class="panel-heading-1">
                        <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;{{ $lesson->name }}</h4>
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
                           @foreach($lessonModules as $module)
                           <tr>
                              <td>
                                 <a href="{{ url('lesson/'.$lesson->id.'/'.pathinfo($module, PATHINFO_BASENAME)) }}" style='cursor: pointer;'>{{ pathinfo($module, PATHINFO_BASENAME) }}</a>
                              </td>
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

<script type="text/javascript">
$(document).ready(function() {
   $(".upload-lesson").click(function() {
      document.getElementById("UploadLessonForm").action = $(this).data("href");
      document.getElementById("lId").value = $(this).data("lssid");
   })
})
</script>
@endsection
