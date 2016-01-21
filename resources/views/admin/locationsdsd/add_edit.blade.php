@extends("banner.common.main")
@section("content")
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">{{ trans('banner_messages.'.$action.'GroupUser') }}</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="{{ action('Banner\DashboardController@index') }}">{{ trans('banner_messages.home') }}</a> / <a href="{{ action('Banner\LocationController@index') }}">{{ trans('banner_messages.groupUser') }}</a> / {{ trans('banner_messages.'.$action.'GroupUser') }}
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                    <div class="col-lg-6">
	                        <form role="form" id="formSubmit" action="{{ $actionLink }}" method="post" target="postData">
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.groupName') }}</label>
	                                <input class="form-control" name="group_name" value="{{ ( isset($data[0]->group_name) ? $data[0]->group_name : '' ) }}">
	                            </div>
	                            <div class="form-group">
	                                <label>{{ trans('banner_messages.status') }}</label>
	                                <div class="radio">
	                                    <label>
	                                        <input type="radio" value="1" name="status" {{ (isset($data[0]->status) && $data[0]->status == 1 ? 'checked': '') }} id="optionsRadios1" value="yes">{{ trans('banner_messages.active') }}
	                                    </label>
	                                </div>
	                                <div class="radio">
	                                    <label>
	                                        <input type="radio" value="0" name="status" {{ (isset($data[0]->status) && $data[0]->status == 0 ? 'checked': '') }} id="optionsRadios2" value="no">{{ trans('banner_messages.noneActive') }}
	                                    </label>
	                                </div>
	                            </div>

	                            @if($action == 'edit')
	                            	<input type="hidden" name="id" value="{{ $data[0]->id }}" >
	                            @endif

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="action" value="{{ $action }}" >
	                            <button type="submit" class="btn btn btn-success">{{ trans('banner_messages.'.$action) }}</button>
	                            <button type="reset" class="btn btn-default">{{ trans('banner_messages.resetBtn') }}</button>
	                        </form>
	                    </div>
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