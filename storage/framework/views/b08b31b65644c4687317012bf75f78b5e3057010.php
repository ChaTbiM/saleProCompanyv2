 <?php $__env->startSection('content'); ?>

<?php if(empty($service_name)): ?>
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e('No Data exist between this date range!'); ?></div>
<?php endif; ?>

<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="text-center"><?php echo e(trans('file.Sale Report')); ?></h3>
            </div>
            <?php echo Form::open(['route' => 'report.sale', 'method' => 'post']); ?>

            <div class="row mb-3">
                <div class="col-md-4 offset-md-1 mt-4">
                    <div class="form-group row">
                        <label class="d-tc mt-2"><strong><?php echo e(trans('file.Choose Your Date')); ?></strong> &nbsp;</label>
                        <div class="d-tc">
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" value="<?php echo e($start_date); ?> To <?php echo e($end_date); ?>" required />
                                <input type="hidden" name="start_date" value="<?php echo e($start_date); ?>" />
                                <input type="hidden" name="end_date" value="<?php echo e($end_date); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><?php echo e(trans('file.submit')); ?></button>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="table-responsive">
        <table id="report-table" class="table table-hover">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th> <?php echo e(trans('service provider name ')); ?> </th>
                    <th><?php echo e(trans('file.Service Name')); ?></th>
                    <th><?php echo e(trans('file.Sold Amount')); ?></th>
                    <th><?php echo e(trans('file.Sold Qty')); ?></th>
                    <th>sales percentage</th>
                    <th>service provider sales</th>


                </tr>
            </thead>
            <tbody>
                <?php if(!empty($service_name)): ?>
                <?php $__currentLoopData = $service_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td> <?php echo e($service_provider_name[$key]); ?> </td>
                    <td><?php echo e($service_name[$key]); ?></td>
                    
                    <td><?php echo e(number_format((float)$sold_price[$key], 2, '.', '')); ?></td>
                    <td><?php echo e($sold_quantity[$key]); ?></td>
                    <td > 
                        <input type="number" value="0" class="form-control col-8" id="percentage" min="0" max="100" placeholder="%">
                    </td>
                    <td> 0.00 </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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
    $("ul#report #service_provider-report-menu").addClass("active");

    // $('#warehouse_id').val($('input[name="warehouse_id_hidden"]').val());
    $('.selectpicker').selectpicker('refresh');

    $('#report-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
             "info":      '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
            "search":  '<?php echo e(trans("file.Search")); ?>',
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
                text: '<?php echo e(trans("file.PDF")); ?>',
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
                text: '<?php echo e(trans("file.CSV")); ?>',
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
                text: '<?php echo e(trans("file.Print")); ?>',
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
                text: '<?php echo e(trans("file.Column visibility")); ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>