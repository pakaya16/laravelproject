@extends("admin.common.main")
@section("content")
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('banner_messages.user') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">

                    <div class="pull-left"> 
                        <form class="form-inline" actioon="{{ action('Admin\UserController@index') }}"> 
                            <input type="text" class="form-control" id="" name="q" value="{{ (isset($search)?$search:'') }}"> 
                            <button type="submit" class="btn btn-default">{{ trans('banner_messages.search') }}</button> 
                        </form> 
                    </div>


                    <div class="pull-right">
                        <a href="{{ action('Admin\UserController@create') }}" class="btn btn-default">{{ trans('banner_messages.createUser') }}</a>
                    </div>
                    
                </div>

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ action('Admin\DashboardController@index') }}">{{ trans('banner_messages.home') }}</a> / {{ trans('banner_messages.user') }}
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>{{ trans('banner_messages.id') }}</th>
                                        <th>{{ trans('banner_messages.username') }}</th>
                                        <th>{{ trans('banner_messages.fNameLname') }}</th>
                                        <th>{{ trans('banner_messages.groupUser') }}</th>
                                        <th>{{ trans('banner_messages.createDate') }}</th>
                                        <th>{{ trans('banner_messages.status') }}</th>
                                        <th>{{ trans('banner_messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $data as $key => $val )
                                        <tr class="">
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->username }}</td>
                                            <td>{{ $val->first_name . ' ' . $val->last_name }}</td>
                                            <td>{{ (isset($val->group_user)?$val->group_user->group_name:'') }}</td>
                                            <td>{{ $val->created_at }}</td>
                                            <td>{{ $val->status }}</td>
                                            <td class="center">
                                                <a href="{{ action('Admin\UserController@edit',['id'=>$val->id]) }}" class="btn btn-default">{{ trans('banner_messages.edit') }}</a>
                                                <button onclick="deleteFn('{{ action('Admin\UserController@destroy',['id'=>$val->id]) }}')" class="btn btn-default">{{ trans('banner_messages.delete') }}</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @include('admin.common.pagination')

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
@endsection