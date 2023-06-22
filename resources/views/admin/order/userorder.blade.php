@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order Management</h4>
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="my_card mb-4">
                          <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <div class="text-center d-block">
                                    <button class="btn btn-sm btn-success text-white">
                                        Apply Filter
                                    </button>
                                </div>
                            </a>
                          </div>
                          <div id="collapseOne" id="show_filter" class="collapse p-3 pt-4" data-parent="#accordion">
                            <form class="" method="get" action="{{route('user_order')}}">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Customer name/email</label>
                                        <div><input type="text" value="{{request('search')}}" class="form-control form-control-sm" name="search" id="" placeholder="Search"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt">
                                        <div class="form-group">
                                            <label for="">Action</label>
                                            <div class="d-flex">
                                                <div><button type="submit" id="filter_btn" class="btn btn-success btn-sm mr-3 text-white">Filter</button></div>
                                                <div><a href="{{route('user_order')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh text-white">  Refresh</button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table order-listing-child table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Plan Name</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Receipt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($dataObj))
                                    @php
                                        $i=($dataObj->perPage()*($dataObj->currentPage()-1))
                                    @endphp
                                    @foreach($dataObj as $data)
                                        @php $i++; @endphp 
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{ucfirst($data->User->name)}}</td>
                                            <td>{{$data->User->email}}</td>
                                            <td>{{$data->Plan->plan_name}}</td>
                                            <td>{{$data->currency}}</td>
                                            <td>{{$data->plan_amount}}</td>
                                            <td>{{date('d-M-Y',strtotime($data->created_at))}}</td>
                                            <td>
                                                @if($data->status == 'success')
                                                    <button class="btn_challan_approved action_button">
                                                        @php echo ucfirst($data->status); @endphp
                                                    </button>
                                                @elseif($data->status == 'pending')
                                                <button class="btn_challan_pending action_button">
                                                    @php echo ucfirst($data->status); @endphp
                                                </button>
                                                @else
                                                    <button class="btn_challan_rejected action_button">
                                                        @php echo ucfirst($data->status); @endphp
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('download_invoice',['id'=>$data->id])}}" class="btn btn-sm btn-primary action_button">Download</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex justify-content-between mt-3">
                                <div>
                                    {{'Showing '.$dataObj->firstItem().' to' .' '. $dataObj->lastItem().' of'.' '.$dataObj->total()}}
                                </div>
                                <div style="float:right;" >
                                    {{-- {{$dataObj->links()}} --}}
                                    {{-- {{ $dataObj->appends($_GET)->links() }} --}}
                                    {{ $dataObj->onEachSide(0)->appends($_GET)->links() }}
                                </div>
                            </div> 
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.order-listing-child').DataTable({
        "bPaginate": false,
        bPaginate:false,
        bInfo : false,
        paging:false,
        searching:false,
        });
        @if(request('search'))
            $(".collapse").addClass("show");
        @endif
    });
</script>
@endpush
