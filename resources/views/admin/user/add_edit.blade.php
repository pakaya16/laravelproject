@extends("admin.common.main")
@section("content")
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">{{ trans('banner_messages.'.$action.'User') }}</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="{{ action('Admin\DashboardController@index') }}">{{ trans('banner_messages.home') }}</a> / <a href="{{ action('Admin\UserController@index') }}">{{ trans('banner_messages.user') }}</a> / {{ trans('banner_messages.'.$action.'User') }}
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<form role="form" method="post" action="{{ $actionLink }}">
		                    <div class="col-lg-6">
{{-- 		                    	<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control input-sm" id="inputEmail3" placeholder="Email">
							    </div>
							  </div> --}}

	                        	<div class="form-group">
	                                <label>{{ trans('banner_messages.groupUser') }}</label>
	                                <select class="form-control input-sm" name="group_id">
	                                	@foreach($groupUser as $key => $val)
	                                    	<option {{ (isset($data[0]->group_id) && $data[0]->group_id == $val->id) ? 'selected="selected"' : '' }} value="{{ $val->id }}">{{ $val->group_name }}</option>
	                                    @endforeach
	                                </select>
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.username') }}</label>
	                                <input class="form-control input-sm" name="username" value="{{ inputValue('username', $data) }}">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.password') }}</label>
	                                <input type="password" class="form-control input-sm" name="password" value="{{ inputValue('password', $data) }}">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.fName') }}</label>
	                                <input class="form-control input-sm" name="first_name" value="{{ inputValue('first_name', $data) }}">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.lName') }}</label>
	                                <input class="form-control input-sm" name="last_name" value="{{ inputValue('last_name', $data) }}">
	                            </div>

		                    </div>
		                    <!-- /.col-lg-6 (nested) -->
							<div class="col-lg-6">
								<div class="form-group">
	                                <label>{{ trans('banner_messages.position') }}</label>
	                                <input class="form-control input-sm" value="{{ inputValue('position', $data) }}" name="position">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.department') }}</label>
	                                <input class="form-control input-sm" value="{{ inputValue('department', $data) }}" name="department">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.status') }}</label>
	                                <div class="radio">
	                                    <label>
	                                        <input value="1" type="radio" name="status" {{ (isset($data[0]->status) && $data[0]->status == 1 ? 'checked': (old('status')==1?'checked':'')) }} id="optionsRadios1" value="yes">{{ trans('banner_messages.active') }}
	                                    </label>
	                                </div>
	                                <div class="radio">
	                                    <label>
	                                        <input value="0" type="radio" name="status" {{ (isset($data[0]->status) && $data[0]->status == 0 ? 'checked': (!empty(old('status'))&&old('status')==0?'checked':'')) }} id="optionsRadios2" value="no">{{ trans('banner_messages.noneActive') }}
	                                    </label>
	                                </div>
	                            </div>

							</div>

		                    <div class="col-lg-12">
		                    	@if( $action == 'edit' )
		                    		<input type="hidden" name="id" value="{{$data[0]->id}}" >
		                    		<input type="hidden" name="_method" value="PATCH" >
		                    	@endif
		                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                            <button type="submit" class="btn btn btn-success">{{ trans('banner_messages.'.$action) }}</button>
	                            <button type="reset" class="btn btn-default">{{ trans('banner_messages.resetBtn') }}</button>
		                    </div>
						</form>

	                    <!-- /.col-lg-6 (nested) -->
	                </div>
	                <!-- /.row (nested) -->
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
@endsection