@extends('layout.main') @section('content')

@if(empty($product_name))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{'No Data exist between this date range!'}}</div>
@endif

<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="text-center">{{trans('file.Sale Report')}}</h3>
            </div>
            {!! Form::open(['route' => 'report.salesman', 'method' => 'post']) !!}
            <div class="row mb-5">
                <div class="col-8 offset-md-1">
                    <label class="d-tc"><strong>{{trans('file.Choose Your Date')}}</strong> &nbsp;</label>
                    <div class="form-inline ">
                        <div class="d-tc">
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" value="{{$start_date}} To {{$end_date}}" required />
                                <input type="hidden" name="start_date" value="{{$start_date}}" />
                                <input type="hidden" name="end_date" value="{{$end_date}}" />
                            </div>
                        </div>
                        <button class="btn btn-primary ml-4" type="submit">{{trans('file.submit')}}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="table-responsive">
        <table id="report-table" class="table table-hover">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th> {{ trans('file.salesman name') }} </th>
                    <th>{{trans('file.Product Name')}}</th>
                    <th>{{trans('file.Sold Amount')}}</th>
                    <th>{{trans('file.Sold Qty')}}</th>
                    <th>{{ trans('file.sales percentage') }} </th>
                    <th> {{ trans('file.profit') }} </th>


                    {{-- <th>{{trans('file.In Stock')}}</th> --}}
                </tr>
            </thead>
            <tbody>
                @if(!empty($product_name))
                @foreach($product_id as $key => $pro_id)
                <tr>
                    <td>{{$key}}</td>
                    <td> {{$salesman_name[$key]}} </td>
                    <td>{{$product_name[$key]}}</td>
                    <td>{{number_format((float)$sold_price[$key], 2, '.', '')}}</td>
                    <td>{{$sold_quantity[$key]}}</td>
                    <td > 
                            <input type="number" value="0" class="form-control col-8" id="percentage" min="0" max="100" placeholder="%">
                    </td>
                    <td> 0.00 </td>

                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <th></th>
                <th>Total</th>
                <th></th>
                <th>0</th>
                <th>0</th>
                <th></th>
                <th>0.00</th>
            </tfoot>
        </table>
    </div>
</section>


<script type="text/javascript">


   //pdf Fonts 
   pdfMake.fonts = {
        Arial: {
                normal: 'Arial.ttf',
                bold: 'Arial.ttf',
                italics: 'Arial.ttf',
                bolditalics: 'Arial.ttf'
        },
        Roboto:{
            normal: 'Roboto-Medium.ttf',
                bold: 'Roboto-Medium.ttf',
                italics: 'Roboto-Medium.ttf',
                bolditalics: 'Roboto-Medium.ttf'
        }
};

// 
    $("ul#report").siblings('a').attr('aria-expanded','true');
    $("ul#report").addClass("show");
    $("ul#report #salesman-report-menu").addClass("active");

    // $('#warehouse_id').val($('input[name="warehouse_id_hidden"]').val());
    $('.selectpicker').selectpicker('refresh');

    $('#report-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0,5]
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                   return data;
                },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, 100], [10, 25, 50, 100]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '{{trans("file.PDF")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                customize: function(doc) {
                    doc.defaultStyle.font = 'Arial'; 
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:not(.not-exported)',
                    rows: ':visible'
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            }
        ],
        drawCallback: function () {
            var api = this.api();
            datatable_sum(api, false);
        }
    } );

    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
            var rows = dt_selector.rows( '.selected' ).indexes();

            let numberOfRows = rows.length;
            
            for(let i = 0 ; i < numberOfRows ; i++){
                let total = Number(dt_selector.cell( i ,3, {page:'current'} ).data());
                let percentageElement = $(dt_selector.cell( i ,5,{page:'current'} ).node()).children().first();
                $(percentageElement).on('change',function (){
                    let percentageValue = Number($(percentageElement).val());
                    let profit =  (( total * percentageValue ) / 100).toFixed(2);
                    dt_selector.cell( i ,6, {page:'current'} ).data( profit );
            $( dt_selector.column( 6 ).footer() ).html(dt_selector.column( 6, {page:'current'} ).data().sum().toFixed(2));

                })
            }

            // $( dt_selector.column( 2 ).footer() ).html(dt_selector.cells( rows, 2, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 3 ).footer() ).html(dt_selector.cells( rows, 3, { page: 'current' } ).data().sum());
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.cells( rows, 4, { page: 'current' } ).data().sum().toFixed(2));


        }
        else {
            var rows = dt_selector.rows({page:'current'}).indexes();
            let numberOfRows = rows.length;
            
            for(let i = 0 ; i < numberOfRows ; i++){
                let total = Number(dt_selector.cell( i ,3, {page:'current'} ).data());
                let percentageElement = $(dt_selector.cell( i ,5,{page:'current'} ).node()).children().first();
                $(percentageElement).on('change',function (){
                    let percentageValue = Number($(percentageElement).val());
                    let profit =  (( total * percentageValue ) / 100).toFixed(2);
                    dt_selector.cell( i ,6, {page:'current'} ).data( profit );
            $( dt_selector.column( 6 ).footer() ).html(dt_selector.column( 6, {page:'current'} ).data().sum().toFixed(2));

                })
            }


            // $( dt_selector.column( 2 ).footer() ).html(dt_selector.column( 2, {page:'current'} ).data().sum().toFixed(2));
            $( dt_selector.column( 3 ).footer() ).html(dt_selector.column( 3, {page:'current'} ).data().sum());
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.column( 4, {page:'current'} ).data().sum().toFixed(2));


        }
    }

$(".daterangepicker-field").daterangepicker({
  callback: function(startDate, endDate, period){
    var start_date = startDate.format('YYYY-MM-DD');
    var end_date = endDate.format('YYYY-MM-DD');
    var title = start_date + ' To ' + end_date;
    $(this).val(title);
    $('input[name="start_date"]').val(start_date);
    $('input[name="end_date"]').val(end_date);
  }
});

</script>
@endsection