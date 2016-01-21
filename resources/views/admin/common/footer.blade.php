<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('admin/dist/js/sb-admin-2.js')}}"></script>

<script type="text/javascript">
  var msgConfirmDelete    = '{{ trans('banner_messages.msgConfirmDelete') }}' ;
  var titleErrorAlert     = '{{ trans('banner_messages.alert') }}' ;
  var massageError        = '';

  @if (isset($errorMsg))
      $( window ).load(function() {
        alertMsg('','{{$errorMsg}}');
      }); 
  @elseif (count($errors) > 0)
      @foreach ($errors->all(':message<br/>') as $error)
          massageError += '{!! $error !!}' ;
      @endforeach
      
      $( window ).load(function() {
        alertMsg('',massageError);
      });

  @endif

</script>

<script src="{{asset('admin/js/controldiv.js')}}"></script>

<iframe name="postData" style="width:900px;height:900px"></iframe>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" id="bodyFullbox">
        ...
      </div>
      <div class="modal-footer" id="closeFullbox">
        <button type="button" onclick="ajaxDelete()" style="display:none" class="btn btn-default btnDelete">{{ trans('banner_messages.yes') }}</button>
        <button type="button" class="btn btn-default btnDelete" style="display:none" data-dismiss="modal">{{ trans('banner_messages.no') }}</button>
        <button type="button" class="btn btn-default btnClose" data-dismiss="modal">{{ trans('banner_messages.close') }}</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>