@extends('admin.layouts')
@section('title', 'Admin')
@php 
    $name="Properties";$route="guesty_properties";
@endphp            
@section('content_header')
    <h1 class="m-0 text-dark">{{$name}} Management</h1>
@stop

@section('content')
    @parent
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @php 
            $addbar=["name"=>$name,"add-data"=>false,"add-name"=>"Add ". Str::singular($name),"add-anchor"=>route($route.'.create')  ,"booking-cron-job"=>true ,"property-cron-job"=>true,"get-reviews-data"=>true,"set-booking-token"=>true];
          @endphp
          @include("admin.common.add-bar")
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card  ">
            <div class="card-header">
              <h3 class="card-title">{{ $name }} Listing</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="data-table-gaurav" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                      	<th>Location</th>
                        <th>Name</th>
                        <th>SEO URL</th>
                        <th>Home Page Show</th>
                        <th>Guesty Active</th>
                        <th>Ordering</th>
                        <th>Status</th>
                        <th class="d-none">Calender</th>
                        <th>Created</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @php $sno=1;@endphp
                    @foreach($data as $client)
                        <tr>
                            <td>{{ $sno++ }}</td>
                            <td>{{ App\Models\Location::find($client->location_id)->name ?? '' }}</td>
                            <td>{{ $client->title }}</td>
                            <td>{{ $client->seo_url }}</td>
                            <td>{{ $client->is_home}}</td>
                            <td>{{ $client->active=="0"?"False":'True'}}</td>
                            <td>{{ $client->ordering }}</td>
                            <td>{{ $client->status}}</td>
                            <td class="d-none"><a href="{{ route('properties-calendar.index',$client->id) }}">Calender</a></td>
                            <td>{{ date('d-F-Y',strtotime($client->created_at)) }}</td>
                            <td>{{ date('d-F-Y',strtotime($client->updated_at)) }}</td>
                            <td>
                                <a href="{!! route($route.'.edit', [$client->id]) !!}"  onclick="return confirm('Are you sure you want to Edit this {{ $name }}?')" class="btn btn-success btn-xs raw-margin-right-8 btn-block"><i class="fa fa-pencil-alt"></i> Edit </a>
                                <form method="post" class="d-none" action="{!! route($route.'.destroy', [$client->id]) !!}"  style="margin-top: 5px;">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-danger btn-block btn-xs raw-margin-right-8" onclick="return confirm('Are you sure you want to delete this {{ $name }}, Destroy All child data?')"><i    class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop
@section("js")
@parent
<script>
  $("#data-table-gaurav").DataTable({"lengthMenu": [[ 50, -1], [ 50, "All"]],dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",});
</script>
@stop