<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo e(url('public/logo', $general_setting->site_logo)); ?>" />
    <title><?php echo e($general_setting->site_title); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
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
              <li><a href="<?php echo e(url('/')); ?>"> <i class="dripicons-meter"></i><span><?php echo e(__('file.dashboard')); ?></span></a></li>
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
             

              <?php if(!empty(checkModule(1))): ?>
              <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span><?php echo e(__('file.product')); ?></span><span></a>
                <ul id="product" class="collapse list-unstyled ">
                  <li id="category-menu"><a href="<?php echo e(route('category.index')); ?>"><?php echo e(__('file.category')); ?></a></li>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="product-list-menu"><a href="<?php echo e(route('products.index')); ?>"><?php echo e(__('file.product_list')); ?></a></li>
                  <?php 
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="product-create-menu"><a href="<?php echo e(route('products.create')); ?>"><?php echo e(__('file.add_product')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php if(!empty($print_barcode_active)): ?>
                  <li id="printBarcode-menu"><a href="<?php echo e(route('product.printBarcode')); ?>"><?php echo e(__('file.print_barcode')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($adjustment_active)): ?>
                    <li id="adjustment-list-menu"><a href="<?php echo e(route('qty_adjustment.index')); ?>"><?php echo e(trans('file.Adjustment List')); ?></a></li>
                    <li id="adjustment-create-menu"><a href="<?php echo e(route('qty_adjustment.create')); ?>"><?php echo e(trans('file.Add Adjustment')); ?></a></li>
                  <?php endif; ?>
                  <?php if($stock_count_active): ?>
                    <li id="stock-count-menu"><a href="<?php echo e(route('stock-count.index')); ?>"><?php echo e(trans('file.Stock Count')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php  
              // Services
                  $index_permission_active = getPermissionActive("services-index");
                  $add_permission_active = getPermissionActive("services-add");
                  
              ?>
              <?php if(!empty($index_permission_active) && !empty(checkModule(12))): ?>
              <li><a href="#service" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span><?php echo e(__('file.service')); ?></span><span></a>
                <ul id="service" class="collapse list-unstyled ">
                  <li id="category-menu"><a href="<?php echo e(route('service_category.index')); ?>"><?php echo e(__('file.services_category')); ?></a></li>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="service-list-menu"><a href="<?php echo e(route('services.index')); ?>"><?php echo e(__('file.service_list')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="service-create-menu"><a href="<?php echo e(route('services.create')); ?>"><?php echo e(__('file.add_service')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php 
                  $index_permission_active = getPermissionActive("purchases-index");
                  // $module_active =
              ?>
              <?php if(!empty($index_permission_active) && !empty(checkModule(2)) ): ?>
              <li><a href="#purchase" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-card"></i><span><?php echo e(trans('file.Purchase')); ?></span></a>
                <ul id="purchase" class="collapse list-unstyled ">
                  <li id="purchase-list-menu"><a href="<?php echo e(route('purchases.index')); ?>"><?php echo e(trans('file.Purchase List')); ?></a></li>
                  <?php 
                    $add_permission_active = getPermissionActive("purchases-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="purchase-create-menu"><a href="<?php echo e(route('purchases.create')); ?>"><?php echo e(trans('file.Add Purchase')); ?></a></li>
                  <li id="purchase-import-menu"><a href="<?php echo e(url('purchases/purchase_by_csv')); ?>"><?php echo e(trans('file.Import Purchase By CSV')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              
              <?php endif; ?>
              
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'sales-index')->first();
                $index_permission_active = getPermissionActive("sales-index");

                $gift_card_permission = DB::table('permissions')->where('name', 'gift_card')->first();
                $gift_card_permission_active = getPermissionActive("gift_card");

                $coupon_permission = DB::table('permissions')->where('name', 'coupon')->first();
                $coupon_permission_active = getPermissionActive("coupon");
              ?>
              <?php if(checkModule(3) !== null ): ?>
              <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-cart"></i><span><?php echo e(trans('file.Sale')); ?></span></a>
                <ul id="sale" class="collapse list-unstyled ">
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="sale-list-menu"><a href="<?php echo e(route('sales.index')); ?>"><?php echo e(trans('file.Sale List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'sales-add')->first();
                    $add_permission_active = getPermissionActive("sales-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li><a href="<?php echo e(route('sale.pos')); ?>">POS</a></li>
                  <li id="sale-create-menu"><a href="<?php echo e(route('sales.create')); ?>"><?php echo e(trans('file.Add Sale')); ?></a></li>
                  <li id="sale-import-menu"><a href="<?php echo e(url('sales/sale_by_csv')); ?>"><?php echo e(trans('file.Import Sale By CSV')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php if(!empty($gift_card_permission_active)): ?>
                  <li id="gift-card-menu"><a href="<?php echo e(route('gift_cards.index')); ?>"><?php echo e(trans('file.Gift Card List')); ?></a> </li>
                  <?php endif; ?>
                  <?php if(!empty($coupon_permission_active)): ?>
                  <li id="coupon-menu"><a href="<?php echo e(route('coupons.index')); ?>"><?php echo e(trans('file.Coupon List')); ?></a> </li>
                  <?php endif; ?>
                  <li id="delivery-menu"><a href="<?php echo e(route('delivery.index')); ?>"><?php echo e(trans('file.Delivery List')); ?></a></li>
                </ul>
              </li>
              <?php endif; ?>
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'expenses-index')->first();
                $index_permission_active = getPermissionActive("expenses-index");
              ?>
              <?php if(!empty($index_permission_active) && !empty(checkModule(4)) ): ?>
              <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span><?php echo e(trans('file.Expense')); ?></span></a>
                <ul id="expense" class="collapse list-unstyled ">
                  <li id="exp-cat-menu"><a href="<?php echo e(route('expense_categories.index')); ?>"><?php echo e(trans('file.Expense Category')); ?></a></li>
                  <li id="exp-list-menu"><a href="<?php echo e(route('expenses.index')); ?>"><?php echo e(trans('file.Expense List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'expenses-add')->first();
                    $add_permission_active = getPermissionActive("expenses-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li><a id="add-expense" href=""> <?php echo e(trans('file.Add Expense')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'quotes-index')->first();
                $index_permission_active = getPermissionActive("quotes-index");
              ?>
              <?php if(!empty($index_permission_active) && !empty(checkModule(5))): ?>
              <li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document"></i><span><?php echo e(trans('file.Quotation')); ?></span><span></a>
                <ul id="quotation" class="collapse list-unstyled ">
                  <li id="quotation-list-menu"><a href="<?php echo e(route('quotations.index')); ?>"><?php echo e(trans('file.Quotation List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'quotes-add')->first();
                    $add_permission_active = getPermissionActive("quotes-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="quotation-create-menu"><a href="<?php echo e(route('quotations.create')); ?>"><?php echo e(trans('file.Add Quotation')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php 
                // $index_permission = DB::table('permissions')->where('name', 'transfers-index')->first();
                $index_permission_active = getPermissionActive("transfers-index");
              ?>
              <?php if(!empty($index_permission_active) && !empty(checkModule(6))): ?>
              <li><a href="#transfer" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-export"></i><span><?php echo e(trans('file.Transfer')); ?></span></a>
                <ul id="transfer" class="collapse list-unstyled ">
                  <li id="transfer-list-menu"><a href="<?php echo e(route('transfers.index')); ?>"><?php echo e(trans('file.Transfer List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'transfers-add')->first();
                    $add_permission_active = getPermissionActive("transfers-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="transfer-create-menu"><a href="<?php echo e(route('transfers.create')); ?>"><?php echo e(trans('file.Add Transfer')); ?></a></li>
                  <li id="transfer-import-menu"><a href="<?php echo e(url('transfers/transfer_by_csv')); ?>"><?php echo e(trans('file.Import Transfer By CSV')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php if(!empty(checkModule(7))): ?>
              <li><a href="#return" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-archive"></i><span><?php echo e(trans('file.return')); ?></span></a>
                <ul id="return" class="collapse list-unstyled ">
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'returns-index')->first();
                    $index_permission_active = getPermissionActive("returns-index");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="sale-return-menu"><a href="<?php echo e(route('return-sale.index')); ?>"><?php echo e(trans('file.Sale')); ?></a></li>
                  <?php endif; ?>
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'purchase-return-index')->first();
                    $index_permission_active = getPermissionActive("purchase-return-index");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="purchase-return-menu"><a href="<?php echo e(route('return-purchase.index')); ?>"><?php echo e(trans('file.Purchase')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
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
              <?php if((!empty($index_permission_active) || !empty($balance_sheet_permission_active) || !empty($account_statement_permission_active)) && !empty(checkModule(8))): ?>
              <li class=""><a href="#account" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-briefcase"></i><span><?php echo e(trans('file.Accounting')); ?></span></a>
                <ul id="account" class="collapse list-unstyled ">
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="account-list-menu"><a href="<?php echo e(route('accounts.index')); ?>"><?php echo e(trans('file.Account List')); ?></a></li>
                  <li><a id="add-account" href=""><?php echo e(trans('file.Add Account')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($money_transfer_permission_active)): ?>
                  <li id="money-transfer-menu"><a href="<?php echo e(route('money-transfers.index')); ?>"><?php echo e(trans('file.Money Transfer')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($balance_sheet_permission_active)): ?>
                  <li id="balance-sheet-menu"><a href="<?php echo e(route('accounts.balancesheet')); ?>"><?php echo e(trans('file.Balance Sheet')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($account_statement_permission_active)): ?>
                  <li id="account-statement-menu"><a id="account-statement" href=""><?php echo e(trans('file.Account Statement')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
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
              <?php if(!empty(checkModule(9))): ?>
              <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                  <?php if(!empty($department_active)): ?>
                  <li id="dept-menu"><a href="<?php echo e(route('departments.index')); ?>"><?php echo e(trans('file.Department')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($index_employee_active)): ?>
                  <li id="employee-menu"><a href="<?php echo e(route('employees.index')); ?>"><?php echo e(trans('file.Employee')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($attendance_active)): ?>
                  <li id="attendance-menu"><a href="<?php echo e(route('attendance.index')); ?>"><?php echo e(trans('file.Attendance')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($payroll_active)): ?>
                  <li id="payroll-menu"><a href="<?php echo e(route('payroll.index')); ?>"><?php echo e(trans('file.Payroll')); ?></a></li>
                  <?php endif; ?>
                  <li id="holiday-menu"><a href="<?php echo e(route('holidays.index')); ?>"><?php echo e(trans('file.Holiday')); ?></a></li>
                </ul>
              </li>
              <?php endif; ?>

              <?php if(!empty(checkModule(10))): ?>
              <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user"></i><span><?php echo e(trans('file.People')); ?></span></a>
                <ul id="people" class="collapse list-unstyled ">
                  <?php 
                  $index_permission_active = getPermissionActive("user-index");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="user-list-menu"><a href="<?php echo e(route('user.index')); ?>"><?php echo e(trans('file.User List')); ?></a></li>
                  <?php $add_permission_active = getPermissionActive("users-add");
                  ?>
                  <?php if($add_permission_active): ?>
                  <li id="user-create-menu"><a href="<?php echo e(route('user.create')); ?>"><?php echo e(trans('file.Add User')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'customers-index')->first();
                    $index_permission_active = getPermissionActive("customers");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="customer-list-menu"><a href="<?php echo e(route('customer.index')); ?>"><?php echo e(trans('file.Customer List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'customers-add')->first();
                    $add_permission_active = getPermissionActive("customers-add");
                    ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="customer-create-menu"><a href="<?php echo e(route('customer.create')); ?>"><?php echo e(trans('file.Add Customer')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'billers-index')->first();
                    $index_permission_active = getPermissionActive("billers-index");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="biller-list-menu"><a href="<?php echo e(route('biller.index')); ?>"><?php echo e(trans('file.Biller List')); ?></a></li>
                  <?php 
                    $add_permission = DB::table('permissions')->where('name', 'billers-add')->first();
                    $add_permission_active = getPermissionActive("billers-add");

                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="biller-create-menu"><a href="<?php echo e(route('biller.create')); ?>"><?php echo e(trans('file.Add Biller')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php 
                    // $index_permission = DB::table('permissions')->where('name', 'suppliers-index')->first();
                    $index_permission_active = getPermissionActive("suppliers-index");
                  ?>
                  <?php if(!empty($index_permission_active)): ?>
                  <li id="supplier-list-menu"><a href="<?php echo e(route('supplier.index')); ?>"><?php echo e(trans('file.Supplier List')); ?></a></li>
                  <?php 
                    // $add_permission = DB::table('permissions')->where('name', 'suppliers-add')->first();
                    $add_permission_active = getPermissionActive("suppliers-add");
                  ?>
                  <?php if(!empty($add_permission_active)): ?>
                  <li id="supplier-create-menu"><a href="<?php echo e(route('supplier.create')); ?>"><?php echo e(trans('file.Add Supplier')); ?></a></li>
                  <?php endif; ?>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php if(!empty(checkModule(11))): ?>
              <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span><?php echo e(trans('file.Reports')); ?></span></a>
                <?php
                  $profit_loss_active = getPermissionActive("profit-loss");
                  $best_seller_active = getPermissionActive("best-seller");
                  $best_seller_service_active = getPermissionActive("best-seller-service");

                  $warehouse_report_active = getPermissionActive("warehouse-report");
                  $warehouse_stock_report_active = getPermissionActive("warehouse-stock-report");
                  $product_report_active = getPermissionActive("product-report");
                  $service_report_active = getPermissionActive("service-report");


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
                  <?php if(!empty($profit_loss_active)): ?>
                  <li id="profit-loss-report-menu">
                    <?php echo Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' => 'profitLoss-report-form']); ?>

                    <input type="hidden" name="start_date" value="<?php echo e(date('Y-m').'-'.'01'); ?>" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <a id="profitLoss-link" href=""><?php echo e(trans('file.Summary Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>
                  <?php if(!empty($best_seller_active)): ?>
                  <li id="best-seller-report-menu">
                    <a href="<?php echo e(url('report/best_seller')); ?>"><?php echo e(trans('file.Best Seller')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($best_seller_service_active)): ?>
                  <li id="best-seller-service-report-menu">
                    <a href="<?php echo e(url('report/best_seller_service')); ?>"><?php echo e(trans('file.Best Service Seller ')); ?></a>
                  </li>
                  <?php endif; ?>

                  <?php if(!empty($product_report_active)): ?>
                  <li id="product-report-menu">
                    <?php echo Form::open(['route' => 'report.product', 'method' => 'post', 'id' => 'product-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="report-link" href="#"><?php echo e(trans('file.Product Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>

                  <?php if(!empty($service_report_active)): ?>
                  <li id="service-report-menu">
                    <?php echo Form::open(['route' => 'report.service', 'method' => 'post', 'id' => 'service-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <a id="service-link" href="#"><?php echo e(trans('file.Service Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>

                  <?php if(!empty($daily_sale_active)): ?>
                  <li id="daily-sale-report-menu">
                    <a href="<?php echo e(url('report/daily_sale/'.date('Y').'/'.date('m'))); ?>"><?php echo e(trans('file.Daily Sale')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($monthly_sale_active)): ?>
                  <li id="monthly-sale-report-menu">
                    <a href="<?php echo e(url('report/monthly_sale/'.date('Y'))); ?>"><?php echo e(trans('file.Monthly Sale')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($daily_purchase_active)): ?>
                  <li id="daily-purchase-report-menu">
                    <a href="<?php echo e(url('report/daily_purchase/'.date('Y').'/'.date('m'))); ?>"><?php echo e(trans('file.Daily Purchase')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($monthly_purchase_active)): ?>
                  <li id="monthly-purchase-report-menu">
                    <a href="<?php echo e(url('report/monthly_purchase/'.date('Y'))); ?>"><?php echo e(trans('file.Monthly Purchase')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($sale_report_active)): ?>
                  <li id="sale-report-menu">
                    <?php echo Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="sale-report-link" href=""><?php echo e(trans('file.Sale Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>
                  <?php if(!empty($payment_report_active)): ?>
                  <li id="payment-report-menu">
                    <?php echo Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <a id="payment-report-link" href=""><?php echo e(trans('file.Payment Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>
                  <?php if(!empty($purchase_report_active)): ?>
                  <li id="purchase-report-menu">
                    <?php echo Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' => 'purchase-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <input type="hidden" name="warehouse_id" value="0" />
                    <a id="purchase-report-link" href=""><?php echo e(trans('file.Purchase Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>
                  <?php if(!empty($warehouse_report_active)): ?>
                  <li id="warehouse-report-menu">
                    <a id="warehouse-report-link" href=""><?php echo e(trans('file.Warehouse Report')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($warehouse_stock_report_active)): ?>
                  <li id="warehouse-stock-report-menu">
                    <a href="<?php echo e(route('report.warehouseStock')); ?>"><?php echo e(trans('file.Warehouse Stock Chart')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($product_qty_alert_active)): ?>
                  <li id="qtyAlert-report-menu">
                    <a href="<?php echo e(route('report.qtyAlert')); ?>"><?php echo e(trans('file.Product Quantity Alert')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($user_report_active)): ?>
                  <li id="user-report-menu">
                    <a id="user-report-link" href=""><?php echo e(trans('file.User Report')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($customer_report_active)): ?>
                  <li id="customer-report-menu">
                    <a id="customer-report-link" href=""><?php echo e(trans('file.Customer Report')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($supplier_report_active)): ?>
                  <li id="supplier-report-menu">
                    <a id="supplier-report-link" href=""><?php echo e(trans('file.Supplier Report')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(!empty($due_report_active)): ?>
                  <li id="due-report-menu">
                    <?php echo Form::open(['route' => 'report.dueByDate', 'method' => 'post', 'id' => 'due-report-form']); ?>

                    <input type="hidden" name="start_date" value="1988-04-18" />
                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                    <a id="due-report-link" href=""><?php echo e(trans('file.Due Report')); ?></a>
                    <?php echo Form::close(); ?>

                  </li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-gear"></i><span><?php echo e(trans('file.settings')); ?></span></a>
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
                  <?php if(!empty($warehouse_permission_active)): ?>
                  <li id="warehouse-menu"><a href="<?php echo e(route('warehouse.index')); ?>"><?php echo e(trans('file.Warehouse')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($customer_group_permission_active)): ?>
                  <li id="customer-group-menu"><a href="<?php echo e(route('customer_group.index')); ?>"><?php echo e(trans('file.Customer Group')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($brand_permission_active)): ?>
                  <li id="brand-menu"><a href="<?php echo e(route('brand.index')); ?>"><?php echo e(trans('file.Brand')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($unit_permission_active)): ?>
                  <li id="unit-menu"><a href="<?php echo e(route('unit.index')); ?>"><?php echo e(trans('file.Unit')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($tax_permission_active)): ?>
                  <li id="tax-menu"><a href="<?php echo e(route('tax.index')); ?>"><?php echo e(trans('file.Tax')); ?></a></li>
                  <?php endif; ?>
                  <li id="user-menu"><a href="<?php echo e(route('user.profile', ['id' => Auth::id()])); ?>"><?php echo e(trans('file.User Profile')); ?></a></li>
                  <?php if(!empty($create_sms_permission_active)): ?>
                  <li id="create-sms-menu"><a href="<?php echo e(route('setting.createSms')); ?>"><?php echo e(trans('file.Create SMS')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($general_setting_permission_active)): ?>
                  <li id="general-setting-menu"><a href="<?php echo e(route('setting.general')); ?>"><?php echo e(trans('file.General Setting')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($mail_setting_permission_active)): ?>
                  <li id="mail-setting-menu"><a href="<?php echo e(route('setting.mail')); ?>"><?php echo e(trans('file.Mail Setting')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($sms_setting_permission_active)): ?>
                  <li id="sms-setting-menu"><a href="<?php echo e(route('setting.sms')); ?>"><?php echo e(trans('file.SMS Setting')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($pos_setting_permission_active)): ?>
                  <li id="pos-setting-menu"><a href="<?php echo e(route('setting.pos')); ?>">POS <?php echo e(trans('file.settings')); ?></a></li>
                  <?php endif; ?>
                  <?php if(!empty($hrm_setting_permission_active)): ?>
                  <li id="hrm-setting-menu"><a href="<?php echo e(route('setting.hrm')); ?>"> <?php echo e(trans('file.HRM Setting')); ?></a></li>
                  <?php endif; ?>
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
              <span class="brand-big"><?php if($general_setting->site_logo): ?><img src="<?php echo e(url('public/logo', $general_setting->site_logo)); ?>" width="50">&nbsp;&nbsp;<?php endif; ?><a href="<?php echo e(url('/')); ?>"><h1 class="d-inline"><?php echo e($general_setting->site_title); ?></h1></a></span>
              
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <?php 
                  $add_permission = DB::table('permissions')->where('name', 'sales-add')->first();
                  $add_permission_active = getPermissionActive("sales-add");

                  $empty_database_permission = DB::table('permissions')->where('name', 'empty_database')->first();
                  $empty_database_permission_active = getPermissionActive("empty_database");
                ?>
                <?php if( !empty($add_permission_active)): ?>
                <li class="nav-item"><a class="dropdown-item btn-pos btn-sm" href="<?php echo e(route('sale.pos')); ?>"><i class="dripicons-shopping-bag"></i><span> POS</span></a></li>
                <?php endif; ?>      
                <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>    
                <?php if($alert_product > 0): ?>
                <li class="nav-item">
                      <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger"><?php echo e($alert_product); ?></span>
                      </a>
                      <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">
                          <li class="notifications">
                            <a href="<?php echo e(route('report.qtyAlert')); ?>" class="btn btn-link"> <?php echo e($alert_product); ?> product exceeds alert quantity</a>
                          </li>
                      </ul>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                      <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-web"></i> <span><?php echo e(__('file.language')); ?></span> <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                          <li>
                            <a href="<?php echo e(url('language_switch/en')); ?>" class="btn btn-link"> English</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/es')); ?>" class="btn btn-link"> Español</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/ar')); ?>" class="btn btn-link"> عربى</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/pt_BR')); ?>" class="btn btn-link"> Portuguese</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/fr')); ?>" class="btn btn-link"> Français</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/de')); ?>" class="btn btn-link"> Deutsche</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/id')); ?>" class="btn btn-link"> Malay</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/hi')); ?>" class="btn btn-link"> हिंदी</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/vi')); ?>" class="btn btn-link"> Tiếng Việt</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/ru')); ?>" class="btn btn-link"> русский</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/tr')); ?>" class="btn btn-link"> Türk</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/it')); ?>" class="btn btn-link"> Italiano</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/nl')); ?>" class="btn btn-link"> Nederlands</a>
                          </li>
                          <li>
                            <a href="<?php echo e(url('language_switch/lao')); ?>" class="btn btn-link"> Lao</a>
                          </li>
                      </ul>
                </li>
                <li class="nav-item"> 
                    <a class="dropdown-item" href="<?php echo e(url('read_me')); ?>" target="_blank"><i class="dripicons-information"></i> <?php echo e(trans('file.Help')); ?></a>
                </li>
                <li class="nav-item">
                  <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span><?php echo e(ucfirst(Auth::user()->name)); ?></span> <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                      <li> 
                        <a href="<?php echo e(route('user.profile', ['id' => Auth::id()])); ?>"><i class="dripicons-user"></i> <?php echo e(trans('file.profile')); ?></a>
                      </li>
                      <?php if(!empty($general_setting_permission_active)): ?>
                      <li> 
                        <a href="<?php echo e(route('setting.general')); ?>"><i class="dripicons-gear"></i> <?php echo e(trans('file.settings')); ?></a>
                      </li>
                      <?php endif; ?>
                      <li> 
                        <a href="<?php echo e(url('my-transactions/'.date('Y').'/'.date('m'))); ?>"><i class="dripicons-swap"></i> <?php echo e(trans('file.My Transaction')); ?></a>
                      </li>
                      <li> 
                        <a href="<?php echo e(url('holidays/my-holiday/'.date('Y').'/'.date('m'))); ?>"><i class="dripicons-vibrate"></i> <?php echo e(trans('file.My Holiday')); ?></a>
                      </li>
                      <?php if(!empty($empty_database_permission_active)): ?>
                      <li>
                        <a onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')" href="<?php echo e(route('setting.emptyDatabase')); ?>"><i class="dripicons-stack"></i> <?php echo e(trans('file.Empty Database')); ?></a>
                      </li>
                      <?php endif; ?>
                      <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="dripicons-power"></i>
                            <?php echo e(trans('file.logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
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
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Expense')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'expenses.store', 'method' => 'post']); ?>

                    <?php 
                      $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                      $lims_account_list = \App\Account::where('is_active', true)->get();
                    
                    ?>
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Expense Category')); ?> *</label>
                            <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                <?php $__currentLoopData = $lims_expense_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($expense_category->id); ?>"><?php echo e($expense_category->name . ' (' . $expense_category->code. ')'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Warehouse')); ?> *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Amount')); ?> *</label>
                            <input type="number" name="amount" step="any" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Account')); ?></label>
                            <select class="form-control selectpicker" name="account_id">
                            <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($account->is_default): ?>
                                <option selected value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                                <?php else: ?>
                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Note')); ?></label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- account modal -->
      <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Account')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'accounts.store', 'method' => 'post']); ?>

                      <div class="form-group">
                          <label><?php echo e(trans('file.Account No')); ?> *</label>
                          <input type="text" name="account_no" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.name')); ?> *</label>
                          <input type="text" name="name" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Initial Balance')); ?></label>
                          <input type="number" name="initial_balance" step="any" class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Note')); ?></label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- account statement modal -->
      <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Account Statement')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'accounts.statement', 'method' => 'post']); ?>

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Account')); ?></label>
                            <select class="form-control selectpicker" name="account_id">
                            <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Type')); ?></label>
                            <select class="form-control selectpicker" name="type">
                                <option value="0"><?php echo e(trans('file.All')); ?></option>
                                <option value="1"><?php echo e(trans('file.Debit')); ?></option>
                                <option value="2"><?php echo e(trans('file.Credit')); ?></option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><?php echo e(trans('file.Choose Your Date')); ?></label>
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" required />
                                <input type="hidden" name="start_date" />
                                <input type="hidden" name="end_date" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- warehouse modal -->
      <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Warehouse Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.warehouse', 'method' => 'post']); ?>

                    <?php 
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Warehouse')); ?> *</label>
                          <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" id="warehouse-id" data-live-search-style="begins" title="Select warehouse...">
                              <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- user modal -->
      <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.User Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.user', 'method' => 'post']); ?>

                    <?php 
                      $lims_user_list = DB::table('users')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.User')); ?> *</label>
                          <select name="user_id" class="selectpicker form-control" required data-live-search="true" id="user-id" data-live-search-style="begins" title="Select user...">
                              <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . ' (' . $user->phone. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- customer modal -->
      <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Customer Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.customer', 'method' => 'post']); ?>

                    <?php 
                      $lims_customer_list = DB::table('customers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.customer')); ?> *</label>
                          <select name="customer_id" class="selectpicker form-control" required data-live-search="true" id="customer-id" data-live-search-style="begins" title="Select customer...">
                              <?php $__currentLoopData = $lims_customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name . ' (' . $customer->phone_number. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- supplier modal -->
      <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Supplier Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.supplier', 'method' => 'post']); ?>

                    <?php 
                      $lims_supplier_list = DB::table('suppliers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Supplier')); ?> *</label>
                          <select name="supplier_id" class="selectpicker form-control" required data-live-search="true" id="supplier-id" data-live-search-style="begins" title="Select Supplier...">
                              <?php $__currentLoopData = $lims_supplier_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name . ' (' . $supplier->phone_number. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="1988-04-18" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>
      
      <div style="display:none" id="content" class="animate-bottom">
          <?php echo $__env->yieldContent('content'); ?>
      </div>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy; <?php echo e($general_setting->site_title); ?> | <?php echo e(trans('file.Developed')); ?> <?php echo e(trans('file.By')); ?> <a href="https://lion-coders.com" class="external">LionCoders</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php echo $__env->yieldContent('scripts'); ?>
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

      $("a#service-link").click(function(e){
        e.preventDefault();
        $("#service-report-form").submit();
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