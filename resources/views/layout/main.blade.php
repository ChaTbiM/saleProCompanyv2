<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('public/logo', $general_setting->site_logo)}}" />
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap-datepicker.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/jquery-timepicker/jquery.timepicker.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap-select.min.css') ?>" type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/font-awesome/css/font-awesome.min.css') ?>" type="text/css">
    <!-- Drip icon font-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/dripicons/webfont.css') ?>" type="text/css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo asset('public/css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" type="text/css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>" type="text/css">
    <!-- virtual keybord stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/keyboard/css/keyboard.css') ?>" type="text/css">
    <!-- date range stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/daterange/css/daterangepicker.min.css') ?>" type="text/css">
    <!-- table sorter stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('public/vendor/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.default.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/css/dropzone.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.css') ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/bootstrap-datepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery.timepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/popper.js/umd/popper.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/keyboard/js/jquery.keyboard.js') ?>"></script>  
    <script type="text/javascript" src="<?php echo asset('public/vendor/keyboard/js/jquery.keyboard.extension-autocomplete.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery.cookie/jquery.cookie.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/chart.js/Chart.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/charts-custom.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/front.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/daterangepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/dropzone.js') ?>"></script>
    
    <!-- table sorter js-->
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/pdfmake.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/vfs_fonts.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/dataTables.bootstrap4.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/dataTables.buttons.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/buttons.bootstrap4.min.js') ?>">"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/buttons.colVis.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/buttons.html5.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/buttons.print.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/sum().js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/datatable/dataTables.checkboxes.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> 
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('public/css/custom-'.$general_setting->theme) ?>" type="text/css" id="custom-style">
  </head>
  
  <body onload="myFunction()">
    <div id="loader"></div>
      <!-- Side Navbar -->
      <nav class="side-navbar">
        <div class="side-navbar-wrapper">
          <!-- Sidebar Header    -->
          <!-- Sidebar Navigation Menus-->
          <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
              <li><a href="{{url('/')}}"> <i class="dripicons-meter"></i><span>{{ __('file.dashboard') }}</span></a></li>
              <?php

              Global $user_id,$company_name,$company_id;

              $user_id = Auth::user()->id; // init one time
              $company_name = DB::select("select * from general_settings")[0]->site_title;
              $company_id = DB::connection("mysql_base")->select("select * from companies where name = ?", [$company_name])[0]->id;
                
              function getPermissionActive($permission_name){
                  global $user_id,$company_name;

                  return DB::connection("mysql_base")->select("SELECT * FROM `company_has_user_has_permissions` WHERE   (user_id,permission_name,company_name) = (?,?,?) ",[$user_id,$permission_name,$company_name]);
                }

              function checkModule($module_id){
                global $user_id,$company_id;
                return DB::connection("mysql_base")->select("SELECT * FROM `companies_modules` WHERE   (module_id,company_id) = (?,?) ",[$module_id,$company_id]);
                
              }


                $index_permission_active = getPermissionActive("products-index");
                $print_barcode_active = getPermissionActive("print_barcode");
                $stock_count_active = getPermissionActive("stock_count");
                $adjustment_active = getPermissionActive("adjustment");
                $add_permission_active = getPermissionActive("products-add");
                // $role = DB::table('roles')->find(Auth::user()->role_id);
                
              ?>
             

              @if (!empty(checkModule(1)))
              <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{__('file.product')}}</span><span></a>
                <ul id="product" class="collapse list-unstyled ">
                  <li id="category-menu"><a href="{{route('category.index')}}">{{__('file.category')}}</a></li>
                  @if(!empty($index_permission_active))
                  <li id="product-list-menu"><a href="{{route('products.index')}}">{{__('file.product_list')}}</a></li>
                  <?php 
                  ?>
                  @if(!empty($add_permission_active))
                  <li id="product-create-menu"><a href="{{route('products.create')}}">{{__('file.add_product')}}</a></li>
                  @endif
                  @endif
                  @if(!empty($print_barcode_active))
                  <li id="printBarcode-menu"><a href="{{route('product.printBarcode')}}">{{__('file.print_barcode')}}</a></li>
                  @endif
                  @if(!empty($adjustment_active))
                    <li id="adjustment-list-menu"><a href="{{route('qty_adjustment.index')}}">{{trans('file.Adjustment List')}}</a></li>
                    <li id="adjustment-create-menu"><a href="{{route('qty_adjustment.create')}}">{{trans('file.Add Adjustment')}}</a></li>
                  @endif
                  @if($stock_count_active)
                    <li id="stock-count-menu"><a href="{{route('stock-count.index')}}">{{trans('file.Stock Count')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php  
              // Services
                  $index_permission_active = getPermissionActive("services-index");
                  $add_permission_active = getPermissionActive("services-add");
                  
              ?>
              @if(!empty($index_permission_active) && !empty(checkModule(12)))
              <li><a href="#service" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{__('file.service')}}</span><span></a>
                <ul id="service" class="collapse list-unstyled ">
                  <li id="service-category-menu"><a href="{{route('service_category.index')}}">{{__('file.services_category')}}</a></li>
                  @if(!empty($index_permission_active))
                  <li id="service-list-menu"><a href="{{route('services.index')}}">{{__('file.service_list')}}</a></li>
                  @endif
                  @if(!empty($add_permission_active))
                  <li id="product-create-menu"><a href="{{route('services.create')}}">{{__('file.add_service')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php 
                  $index_permission_active = getPermissionActive("purchases-index");
                  // $module_active =
              ?>
              @if(!empty($index_permission_active) && !empty(checkModule(2)) )
              <li><a href="#purchase" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-card"></i><span>{{trans('file.Purchase')}}</span></a>
                <ul id="purchase" class="collapse list-unstyled ">
                  <li id="purchase-list-menu"><a href="{{route('purchases.index')}}">{{trans('file.Purchase List')}}</a></li>
                  <?php 
                    $add_permission_active = getPermissionActive("purchases-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li id="purchase-create-menu"><a href="{{route('purchases.create')}}">{{trans('file.Add Purchase')}}</a></li>
                  <li id="purchase-import-menu"><a href="{{url('purchases/purchase_by_csv')}}">{{trans('file.Import Purchase By CSV')}}</a></li>
                  @endif
                </ul>
              </li>
              
              @endif
              
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'sales-index')->first();
                $index_permission_active = getPermissionActive("sales-index");

                $gift_card_permission = DB::table('permissions')->where('name', 'gift_card')->first();
                $gift_card_permission_active = getPermissionActive("gift_card");

                $coupon_permission = DB::table('permissions')->where('name', 'coupon')->first();
                $coupon_permission_active = getPermissionActive("coupon");
              ?>
              @if(checkModule(3) !== null )
              <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-cart"></i><span>{{trans('file.Sale')}}</span></a>
                <ul id="sale" class="collapse list-unstyled ">
                  @if(!empty($index_permission_active))
                  <li id="sale-list-menu"><a href="{{route('sales.index')}}">{{trans('file.Sale List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'sales-add')->first();
                    $add_permission_active = getPermissionActive("sales-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li><a href="{{route('sale.pos')}}">POS</a></li>
                  <li id="sale-create-menu"><a href="{{route('sales.create')}}">{{trans('file.Add Sale')}}</a></li>
                  <li id="sale-import-menu"><a href="{{url('sales/sale_by_csv')}}">{{trans('file.Import Sale By CSV')}}</a></li>
                  @endif
                  @endif
                  @if(!empty($gift_card_permission_active))
                  <li id="gift-card-menu"><a href="{{route('gift_cards.index')}}">{{trans('file.Gift Card List')}}</a> </li>
                  @endif
                  @if(!empty($coupon_permission_active))
                  <li id="coupon-menu"><a href="{{route('coupons.index')}}">{{trans('file.Coupon List')}}</a> </li>
                  @endif
                  <li id="delivery-menu"><a href="{{route('delivery.index')}}">{{trans('file.Delivery List')}}</a></li>
                </ul>
              </li>
              @endif
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'expenses-index')->first();
                $index_permission_active = getPermissionActive("expenses-index");
              ?>
              @if(!empty($index_permission_active) && !empty(checkModule(4)) )
              <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span>{{trans('file.Expense')}}</span></a>
                <ul id="expense" class="collapse list-unstyled ">
                  <li id="exp-cat-menu"><a href="{{route('expense_categories.index')}}">{{trans('file.Expense Category')}}</a></li>
                  <li id="exp-list-menu"><a href="{{route('expenses.index')}}">{{trans('file.Expense List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'expenses-add')->first();
                    $add_permission_active = getPermissionActive("expenses-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li><a id="add-expense" href=""> {{trans('file.Add Expense')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'quotes-index')->first();
                $index_permission_active = getPermissionActive("quotes-index");
              ?>
              @if(!empty($index_permission_active) && !empty(checkModule(5)))
              <li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document"></i><span>{{trans('file.Quotation')}}</span><span></a>
                <ul id="quotation" class="collapse list-unstyled ">
                  <li id="quotation-list-menu"><a href="{{route('quotations.index')}}">{{trans('file.Quotation List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'quotes-add')->first();
                    $add_permission_active = getPermissionActive("quotes-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li id="quotation-create-menu"><a href="{{route('quotations.create')}}">{{trans('file.Add Quotation')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'transfers-index')->first();
                $index_permission_active = getPermissionActive("transfers-index");
              ?>
              @if(!empty($index_permission_active) && !empty(checkModule(6)))
              <li><a href="#transfer" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-export"></i><span>{{trans('file.Transfer')}}</span></a>
                <ul id="transfer" class="collapse list-unstyled ">
                  <li id="transfer-list-menu"><a href="{{route('transfers.index')}}">{{trans('file.Transfer List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'transfers-add')->first();
                    $add_permission_active = getPermissionActive("transfers-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li id="transfer-create-menu"><a href="{{route('transfers.create')}}">{{trans('file.Add Transfer')}}</a></li>
                  <li id="transfer-import-menu"><a href="{{url('transfers/transfer_by_csv')}}">{{trans('file.Import Transfer By CSV')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              @if(!empty(checkModule(7)))
              <li><a href="#return" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-archive"></i><span>{{trans('file.return')}}</span></a>
                <ul id="return" class="collapse list-unstyled ">
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'returns-index')->first();
                    $index_permission_active = getPermissionActive("returns-index");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="sale-return-menu"><a href="{{route('return-sale.index')}}">{{trans('file.Sale')}}</a></li>
                  @endif
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'purchase-return-index')->first();
                    $index_permission_active = getPermissionActive("purchase-return-index");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="purchase-return-menu"><a href="{{route('return-purchase.index')}}">{{trans('file.Purchase')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'account-index')->first();
                $index_permission_active = getPermissionActive("account-index");

                // $money_transfer_permission = DB::table('permissions')->where('name', 'money-transfer')->first();
                $money_transfer_permission_active = getPermissionActive("money-transfer");

                // $balance_sheet_permission = DB::table('permissions')->where('name', 'balance-sheet')->first();
                $balance_sheet_permission_active = getPermissionActive("balance-sheet");

                // $account_statement_permission = DB::table('permissions')->where('name', 'account-statement')->first();
                $account_statement_permission_active = getPermissionActive("account-statement");

              ?>
              @if((!empty($index_permission_active) || !empty($balance_sheet_permission_active) || !empty($account_statement_permission_active)) && !empty(checkModule(8)))
              <li class=""><a href="#account" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-briefcase"></i><span>{{trans('file.Accounting')}}</span></a>
                <ul id="account" class="collapse list-unstyled ">
                  @if(!empty($index_permission_active))
                  <li id="account-list-menu"><a href="{{route('accounts.index')}}">{{trans('file.Account List')}}</a></li>
                  <li><a id="add-account" href="">{{trans('file.Add Account')}}</a></li>
                  @endif
                  @if(!empty($money_transfer_permission_active))
                  <li id="money-transfer-menu"><a href="{{route('money-transfers.index')}}">{{trans('file.Money Transfer')}}</a></li>
                  @endif
                  @if(!empty($balance_sheet_permission_active))
                  <li id="balance-sheet-menu"><a href="{{route('accounts.balancesheet')}}">{{trans('file.Balance Sheet')}}</a></li>
                  @endif
                  @if(!empty($account_statement_permission_active))
                  <li id="account-statement-menu"><a id="account-statement" href="">{{trans('file.Account Statement')}}</a></li>
                  @endif
                </ul>
              </li>
              @endif
              <?php 
                // $department = DB::table('permissions')->where('name', 'department')->first();
                $department_active = getPermissionActive("department");

                // $index_employee = DB::table('permissions')->where('name', 'employees-index')->first();
                $index_employee_active = getPermissionActive("employees-index");

                // $attendance = DB::table('permissions')->where('name', 'attendance')->first();
                $attendance_active = getPermissionActive("attendance");

                // $payroll = DB::table('permissions')->where('name', 'payroll')->first();
                $payroll_active = getPermissionActive("payroll");
              ?>
              @if(!empty(checkModule(9)))
              <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                  @if(!empty($department_active))
                  <li id="dept-menu"><a href="{{route('departments.index')}}">{{trans('file.Department')}}</a></li>
                  @endif
                  @if(!empty($index_employee_active))
                  <li id="employee-menu"><a href="{{route('employees.index')}}">{{trans('file.Employee')}}</a></li>
                  @endif
                  @if(!empty($attendance_active))
                  <li id="attendance-menu"><a href="{{route('attendance.index')}}">{{trans('file.Attendance')}}</a></li>
                  @endif
                  @if(!empty($payroll_active))
                  <li id="payroll-menu"><a href="{{route('payroll.index')}}">{{trans('file.Payroll')}}</a></li>
                  @endif
                  <li id="holiday-menu"><a href="{{route('holidays.index')}}">{{trans('file.Holiday')}}</a></li>
                </ul>
              </li>
              @endif

              @if(!empty(checkModule(10)))
              <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user"></i><span>{{trans('file.People')}}</span></a>
                <ul id="people" class="collapse list-unstyled ">
                  <?php 
                  $index_permission_active = getPermissionActive("user-index");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="user-list-menu"><a href="{{route('user.index')}}">{{trans('file.User List')}}</a></li>
                  <?php $add_permission_active = getPermissionActive("users-add");
                  ?>
                  @if($add_permission_active)
                  <li id="user-create-menu"><a href="{{route('user.create')}}">{{trans('file.Add User')}}</a></li>
                  @endif
                  @endif
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'customers-index')->first();
                    $index_permission_active = getPermissionActive("customers");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="customer-list-menu"><a href="{{route('customer.index')}}">{{trans('file.Customer List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'customers-add')->first();
                    $add_permission_active = getPermissionActive("customers-add");
                    ?>
                  @if(!empty($add_permission_active))
                  <li id="customer-create-menu"><a href="{{route('customer.create')}}">{{trans('file.Add Customer')}}</a></li>
                  @endif
                  @endif
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'billers-index')->first();
                    $index_permission_active = getPermissionActive("billers-index");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="biller-list-menu"><a href="{{route('biller.index')}}">{{trans('file.Biller List')}}</a></li>
                  <?php 
                    $add_permission = DB::table('permissions')->where('name', 'billers-add')->first();
                    $add_permission_active = getPermissionActive("billers-add");

                  ?>
                  @if(!empty($add_permission_active))
                  <li id="biller-create-menu"><a href="{{route('biller.create')}}">{{trans('file.Add Biller')}}</a></li>
                  @endif
                  @endif
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'suppliers-index')->first();
                    $index_permission_active = getPermissionActive("suppliers-index");
                  ?>
                  @if(!empty($index_permission_active))
                  <li id="supplier-list-menu"><a href="{{route('supplier.index')}}">{{trans('file.Supplier List')}}</a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'suppliers-add')->first();
                    $add_permission_active = getPermissionActive("suppliers-add");
                  ?>
                  @if(!empty($add_permission_active))
                  <li id="supplier-create-menu"><a href="{{route('supplier.create')}}">{{trans('file.Add Supplier')}}</a></li>
                  @endif
                  @endif
                </ul>
              </li>
              @endif
              @if(!empty(checkModule(11)))
              <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span>{{trans('file.Reports')}}</span></a>
                <?php
                  $profit_loss_active = getPermissionActive("profit-loss");
                  $best_seller_active = getPermissionActive("best-seller");
                  $warehouse_report_active = getPermissionActive("warehouse-report");
                  $warehouse_stock_report_active = getPermissionActive("warehouse-stock-report");
                  $product_report_active = getPermissionActive("product-report");

                  $daily_sale_active = getPermissionActive("daily-saly");
                  $monthly_sale_active = getPermissionActive("monthly-sale");
                  $daily_purchase_active = getPermissionActive("daily-purchase");
                  $monthly_purchase_active = getPermissionActive("monthly-purchase");
                  $purchase_report_active = getPermissionActive("purchase-report");
                  $sale_report_active = getPermissionActive("sale-report");
                  $payment_report_active = getPermissionActive("payment-report");
                  $product_qty_alert_active = getPermissionActive("product-qty-alert");
                  $user_report_active = getPermissionActive("user-report");

                  $customer_report_active = getPermissionActive("customer-report");
                  $supplier_report_active = getPermissionActive("supplier-report");
                  $due_report_active = getPermissionActive("due-report");
                ?>
                <ul id="report" class="collapse list-unstyled ">
                  @if(!empty($profit_loss_active))
                  <li id="profit-loss-report-menu">
                    {!! Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' => 'profitLoss-report-form']) !!}
                    <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <a id="profitLoss-link" href="">{{trans('file.Summary Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                  @if(!empty($best_seller_active))
                  <li id="best-seller-report-menu">
                    <a href="{{url('report/best_seller')}}">{{trans('file.Best Seller')}}</a>
                  </li>
                  @endif
                  @if(!empty($product_report_active))
                  <li id="product-report-menu">
                    {!! Form::open(['route' => 'report.product', 'method' => 'post', 'id' => 'product-report-form']) !!}
                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="report-link" href="">{{trans('file.Product Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                  @if(!empty($daily_sale_active))
                  <li id="daily-sale-report-menu">
                    <a href="{{url('report/daily_sale/'.date('Y').'/'.date('m'))}}">{{trans('file.Daily Sale')}}</a>
                  </li>
                  @endif
                  @if(!empty($monthly_sale_active))
                  <li id="monthly-sale-report-menu">
                    <a href="{{url('report/monthly_sale/'.date('Y'))}}">{{trans('file.Monthly Sale')}}</a>
                  </li>
                  @endif
                  @if(!empty($daily_purchase_active))
                  <li id="daily-purchase-report-menu">
                    <a href="{{url('report/daily_purchase/'.date('Y').'/'.date('m'))}}">{{trans('file.Daily Purchase')}}</a>
                  </li>
                  @endif
                  @if(!empty($monthly_purchase_active))
                  <li id="monthly-purchase-report-menu">
                    <a href="{{url('report/monthly_purchase/'.date('Y'))}}">{{trans('file.Monthly Purchase')}}</a>
                  </li>
                  @endif
                  @if(!empty($sale_report_active))
                  <li id="sale-report-menu">
                    {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']) !!}
                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="sale-report-link" href="">{{trans('file.Sale Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                  @if(!empty($payment_report_active))
                  <li id="payment-report-menu">
                    {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']) !!}
                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <a id="payment-report-link" href="">{{trans('file.Payment Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                  @if(!empty($purchase_report_active))
                  <li id="purchase-report-menu">
                    {!! Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' => 'purchase-report-form']) !!}
                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="purchase-report-link" href="">{{trans('file.Purchase Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                  @if(!empty($warehouse_report_active))
                  <li id="warehouse-report-menu">
                    <a id="warehouse-report-link" href="">{{trans('file.Warehouse Report')}}</a>
                  </li>
                  @endif
                  @if(!empty($warehouse_stock_report_active))
                  <li id="warehouse-stock-report-menu">
                    <a href="{{route('report.warehouseStock')}}">{{trans('file.Warehouse Stock Chart')}}</a>
                  </li>
                  @endif
                  @if(!empty($product_qty_alert_active))
                  <li id="qtyAlert-report-menu">
                    <a href="{{route('report.qtyAlert')}}">{{trans('file.Product Quantity Alert')}}</a>
                  </li>
                  @endif
                  @if(!empty($user_report_active))
                  <li id="user-report-menu">
                    <a id="user-report-link" href="">{{trans('file.User Report')}}</a>
                  </li>
                  @endif
                  @if(!empty($customer_report_active))
                  <li id="customer-report-menu">
                    <a id="customer-report-link" href="">{{trans('file.Customer Report')}}</a>
                  </li>
                  @endif
                  @if(!empty($supplier_report_active))
                  <li id="supplier-report-menu">
                    <a id="supplier-report-link" href="">{{trans('file.Supplier Report')}}</a>
                  </li>
                  @endif
                  @if(!empty($due_report_active))
                  <li id="due-report-menu">
                    {!! Form::open(['route' => 'report.dueByDate', 'method' => 'post', 'id' => 'due-report-form']) !!}
                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                    <a id="due-report-link" href="">{{trans('file.Due Report')}}</a>
                    {!! Form::close() !!}
                  </li>
                  @endif
                </ul>
              </li>
              @endif
              <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-gear"></i><span>{{trans('file.settings')}}</span></a>
                <ul id="setting" class="collapse list-unstyled ">
                  <?php

                      // $warehouse_permission = DB::table('permissions')->where('name', 'warehouse')->first();
                      $warehouse_permission_active = getPermissionActive("warehouse");

                      // $customer_group_permission = DB::table('permissions')->where('name', 'customer_group')->first();
                      $customer_group_permission_active = getPermissionActive("customer_group");

                      // $brand_permission = DB::table('permissions')->where('name', 'brand')->first();
                      $brand_permission_active = getPermissionActive("brand");

                      // $unit_permission = DB::table('permissions')->where('name', 'unit')->first();
                      $unit_permission_active = getPermissionActive("unit");

                      // $tax_permission = DB::table('permissions')->where('name', 'tax')->first();
                      $tax_permission_active = getPermissionActive("tax");

                      // $general_setting_permission = DB::table('permissions')->where('name', 'general_setting')->first();
                      $general_setting_permission_active = getPermissionActive("general_setting");

                      // $mail_setting_permission = DB::table('permissions')->where('name', 'mail_setting')->first();
                      $mail_setting_permission_active = getPermissionActive("mail_setting");

                      // $sms_setting_permission = DB::table('permissions')->where('name', 'sms_setting')->first();
                      $sms_setting_permission_active = getPermissionActive("sms_setting");

                      // $create_sms_permission = DB::table('permissions')->where('name', 'create_sms')->first();
                      $create_sms_permission_active = getPermissionActive("create_sms");

                      // $pos_setting_permission = DB::table('permissions')->where('name', 'pos_setting')->first();
                      $pos_setting_permission_active = getPermissionActive("pos_setting");

                      // $hrm_setting_permission = DB::table('permissions')->where('name', 'hrm_setting')->first();
                      $hrm_setting_permission_active = getPermissionActive("hrm_setting");
                  ?>
                  @if(!empty($warehouse_permission_active))
                  <li id="warehouse-menu"><a href="{{route('warehouse.index')}}">{{trans('file.Warehouse')}}</a></li>
                  @endif
                  @if(!empty($customer_group_permission_active))
                  <li id="customer-group-menu"><a href="{{route('customer_group.index')}}">{{trans('file.Customer Group')}}</a></li>
                  @endif
                  @if(!empty($brand_permission_active))
                  <li id="brand-menu"><a href="{{route('brand.index')}}">{{trans('file.Brand')}}</a></li>
                  @endif
                  @if(!empty($unit_permission_active))
                  <li id="unit-menu"><a href="{{route('unit.index')}}">{{trans('file.Unit')}}</a></li>
                  @endif
                  @if(!empty($tax_permission_active))
                  <li id="tax-menu"><a href="{{route('tax.index')}}">{{trans('file.Tax')}}</a></li>
                  @endif
                  <li id="user-menu"><a href="{{route('user.profile', ['id' => Auth::id()])}}">{{trans('file.User Profile')}}</a></li>
                  @if(!empty($create_sms_permission_active))
                  <li id="create-sms-menu"><a href="{{route('setting.createSms')}}">{{trans('file.Create SMS')}}</a></li>
                  @endif
                  @if(!empty($general_setting_permission_active))
                  <li id="general-setting-menu"><a href="{{route('setting.general')}}">{{trans('file.General Setting')}}</a></li>
                  @endif
                  @if(!empty($mail_setting_permission_active))
                  <li id="mail-setting-menu"><a href="{{route('setting.mail')}}">{{trans('file.Mail Setting')}}</a></li>
                  @endif
                  @if(!empty($sms_setting_permission_active))
                  <li id="sms-setting-menu"><a href="{{route('setting.sms')}}">{{trans('file.SMS Setting')}}</a></li>
                  @endif
                  @if(!empty($pos_setting_permission_active))
                  <li id="pos-setting-menu"><a href="{{route('setting.pos')}}">POS {{trans('file.settings')}}</a></li>
                  @endif
                  @if(!empty($hrm_setting_permission_active))
                  <li id="hrm-setting-menu"><a href="{{route('setting.hrm')}}"> {{trans('file.HRM Setting')}}</a></li>
                  @endif
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>
              <span class="brand-big">@if($general_setting->site_logo)<img src="{{url('public/logo', $general_setting->site_logo)}}" width="50">&nbsp;&nbsp;@endif<a href="{{url('/')}}"><h1 class="d-inline">{{$general_setting->site_title}}</h1></a></span>
              
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <?php 
                  $add_permission = DB::table('permissions')->where('name', 'sales-add')->first();
                  $add_permission_active = getPermissionActive("sales");

                  $empty_database_permission = DB::table('permissions')->where('name', 'empty_database')->first();
                  $empty_database_permission_active = getPermissionActive("empty_database");
                ?>
                @if( !empty($add_permission_active))
                <li class="nav-item"><a class="dropdown-item btn-pos btn-sm" href="{{route('sale.pos')}}"><i class="dripicons-shopping-bag"></i><span> POS</span></a></li>
                @endif      
                <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>    
                @if($alert_product > 0)
                <li class="nav-item">
                      <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger">{{$alert_product}}</span>
                      </a>
                      <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">
                          <li class="notifications">
                            <a href="{{route('report.qtyAlert')}}" class="btn btn-link"> {{$alert_product}} product exceeds alert quantity</a>
                          </li>
                      </ul>
                </li>
                @endif
                <li class="nav-item">
                      <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-web"></i> <span>{{__('file.language')}}</span> <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                          <li>
                            <a href="{{ url('language_switch/en') }}" class="btn btn-link"> English</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/es') }}" class="btn btn-link"> Español</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/ar') }}" class="btn btn-link"> عربى</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/pt_BR') }}" class="btn btn-link"> Portuguese</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/fr') }}" class="btn btn-link"> Français</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/de') }}" class="btn btn-link"> Deutsche</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/id') }}" class="btn btn-link"> Malay</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/hi') }}" class="btn btn-link"> हिंदी</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/vi') }}" class="btn btn-link"> Tiếng Việt</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/ru') }}" class="btn btn-link"> русский</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/tr') }}" class="btn btn-link"> Türk</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/it') }}" class="btn btn-link"> Italiano</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/nl') }}" class="btn btn-link"> Nederlands</a>
                          </li>
                          <li>
                            <a href="{{ url('language_switch/lao') }}" class="btn btn-link"> Lao</a>
                          </li>
                      </ul>
                </li>
                <li class="nav-item"> 
                    <a class="dropdown-item" href="{{ url('read_me') }}" target="_blank"><i class="dripicons-information"></i> {{trans('file.Help')}}</a>
                </li>
                <li class="nav-item">
                  <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span>{{ucfirst(Auth::user()->name)}}</span> <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                      <li> 
                        <a href="{{route('user.profile', ['id' => Auth::id()])}}"><i class="dripicons-user"></i> {{trans('file.profile')}}</a>
                      </li>
                      @if(!empty($general_setting_permission_active))
                      <li> 
                        <a href="{{route('setting.general')}}"><i class="dripicons-gear"></i> {{trans('file.settings')}}</a>
                      </li>
                      @endif
                      <li> 
                        <a href="{{url('my-transactions/'.date('Y').'/'.date('m'))}}"><i class="dripicons-swap"></i> {{trans('file.My Transaction')}}</a>
                      </li>
                      <li> 
                        <a href="{{url('holidays/my-holiday/'.date('Y').'/'.date('m'))}}"><i class="dripicons-vibrate"></i> {{trans('file.My Holiday')}}</a>
                      </li>
                      @if(!empty($empty_database_permission_active))
                      <li>
                        <a onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')" href="{{route('setting.emptyDatabase')}}"><i class="dripicons-stack"></i> {{trans('file.Empty Database')}}</a>
                      </li>
                      @endif
                      <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="dripicons-power"></i>
                            {{trans('file.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                  </ul>
                </li> 
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <div class="page">

      <!-- expense modal -->
      <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Expense')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'expenses.store', 'method' => 'post']) !!}
                    <?php 
                      $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                      $lims_account_list = \App\Account::where('is_active', true)->get();
                    
                    ?>
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Expense Category')}} *</label>
                            <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                @foreach($lims_expense_category_list as $expense_category)
                                <option value="{{$expense_category->id}}">{{$expense_category->name . ' (' . $expense_category->code. ')'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Warehouse')}} *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                @foreach($lims_warehouse_list as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Amount')}} *</label>
                            <input type="number" name="amount" step="any" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Account')}}</label>
                            <select class="form-control selectpicker" name="account_id">
                            @foreach($lims_account_list as $account)
                                @if($account->is_default)
                                <option selected value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                                @else
                                <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Note')}}</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- account modal -->
      <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Account')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'accounts.store', 'method' => 'post']) !!}
                      <div class="form-group">
                          <label>{{trans('file.Account No')}} *</label>
                          <input type="text" name="account_no" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.name')}} *</label>
                          <input type="text" name="name" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Initial Balance')}}</label>
                          <input type="number" name="initial_balance" step="any" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Note')}}</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- account statement modal -->
      <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Account Statement')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'accounts.statement', 'method' => 'post']) !!}
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Account')}}</label>
                            <select class="form-control selectpicker" name="account_id">
                            @foreach($lims_account_list as $account)
                                <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Type')}}</label>
                            <select class="form-control selectpicker" name="type">
                                <option value="0">{{trans('file.All')}}</option>
                                <option value="1">{{trans('file.Debit')}}</option>
                                <option value="2">{{trans('file.Credit')}}</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>{{trans('file.Choose Your Date')}}</label>
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" required />
                                <input type="hidden" name="start_date" />
                                <input type="hidden" name="end_date" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- warehouse modal -->
      <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Warehouse Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.warehouse', 'method' => 'post']) !!}
                    <?php 
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.Warehouse')}} *</label>
                          <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" id="warehouse-id" data-live-search-style="begins" title="Select warehouse...">
                              @foreach($lims_warehouse_list as $warehouse)
                              <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- user modal -->
      <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.User Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.user', 'method' => 'post']) !!}
                    <?php 
                      $lims_user_list = DB::table('users')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.User')}} *</label>
                          <select name="user_id" class="selectpicker form-control" required data-live-search="true" id="user-id" data-live-search-style="begins" title="Select user...">
                              @foreach($lims_user_list as $user)
                              <option value="{{$user->id}}">{{$user->name . ' (' . $user->phone. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- customer modal -->
      <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Customer Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.customer', 'method' => 'post']) !!}
                    <?php 
                      $lims_customer_list = DB::table('customers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.customer')}} *</label>
                          <select name="customer_id" class="selectpicker form-control" required data-live-search="true" id="customer-id" data-live-search-style="begins" title="Select customer...">
                              @foreach($lims_customer_list as $customer)
                              <option value="{{$customer->id}}">{{$customer->name . ' (' . $customer->phone_number. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- supplier modal -->
      <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Supplier Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.supplier', 'method' => 'post']) !!}
                    <?php 
                      $lims_supplier_list = DB::table('suppliers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.Supplier')}} *</label>
                          <select name="supplier_id" class="selectpicker form-control" required data-live-search="true" id="supplier-id" data-live-search-style="begins" title="Select Supplier...">
                              @foreach($lims_supplier_list as $supplier)
                              <option value="{{$supplier->id}}">{{$supplier->name . ' (' . $supplier->phone_number. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>
      
      <div style="display:none" id="content" class="animate-bottom">
          @yield('content')
      </div>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy; {{$general_setting->site_title}} | {{trans('file.Developed')}} {{trans('file.By')}} <a href="https://lion-coders.com" class="external">LionCoders</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    @yield('scripts')
    <script type="text/javascript">
      if ($(window).outerWidth() > 1199) {
          $('nav.side-navbar').removeClass('shrink');
      }

      function myFunction() {
          setTimeout(showPage, 150);
      }
      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
      }

      $("div.alert").delay(3000).slideUp(750);

      function confirmDelete() {
          if (confirm("Are you sure want to delete?")) {
              return true;
          }
          return false;
      }
      
      $("a#add-expense").click(function(e){
        e.preventDefault();
        $('#expense-modal').modal();
      });

      $("a#add-account").click(function(e){
        e.preventDefault();
        $('#account-modal').modal();
      });

      $("a#account-statement").click(function(e){
        e.preventDefault();
        $('#account-statement-modal').modal();
      });

      $("a#profitLoss-link").click(function(e){
        e.preventDefault();
        $("#profitLoss-report-form").submit();
      });

      $("a#report-link").click(function(e){
        e.preventDefault();
        $("#product-report-form").submit();
      });

      $("a#purchase-report-link").click(function(e){
        e.preventDefault();
        $("#purchase-report-form").submit();
      });

      $("a#sale-report-link").click(function(e){
        e.preventDefault();
        $("#sale-report-form").submit();
      });

      $("a#payment-report-link").click(function(e){
        e.preventDefault();
        $("#payment-report-form").submit();
      });

      $("a#warehouse-report-link").click(function(e){
        e.preventDefault();
        $('#warehouse-modal').modal();
      });

      $("a#user-report-link").click(function(e){
        e.preventDefault();
        $('#user-modal').modal();
      });

      $("a#customer-report-link").click(function(e){
        e.preventDefault();
        $('#customer-modal').modal();
      });

      $("a#supplier-report-link").click(function(e){
        e.preventDefault();
        $('#supplier-modal').modal();
      });

      $("a#due-report-link").click(function(e){
        e.preventDefault();
        $("#due-report-form").submit();
      });

      $(".daterangepicker-field").daterangepicker({
          callback: function(startDate, endDate, period){
            var start_date = startDate.format('YYYY-MM-DD');
            var end_date = endDate.format('YYYY-MM-DD');
            var title = start_date + ' To ' + end_date;
            $(this).val(title);
            $('#account-statement-modal input[name="start_date"]').val(start_date);
            $('#account-statement-modal input[name="end_date"]').val(end_date);
          }
      });

      $('.selectpicker').selectpicker({
          style: 'btn-link',
      });
    </script>
  </body>
</html>