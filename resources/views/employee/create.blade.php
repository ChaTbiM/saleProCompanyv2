@extends('layout.main') @section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{ trans('file.Add Employee') }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'employees.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('file.name') }} *</strong> </label>
                                    <input type="text" name="employee_name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Image') }}</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($errors->has('image'))
                                        <span>
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Department') }} *</label>
                                    <select class="form-control selectpicker" name="department_id" required>
                                        @foreach($lims_department_list as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Email') }} *</label>
                                    <input type="email" name="email" placeholder="example@example.com" required
                                        class="form-control">
                                    @if($errors->has('email'))
                                        <span>
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Phone Number') }} *</label>
                                    <input type="text" name="phone_number" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Address') }}</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.City') }}</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Country') }}</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                                <div class="form-group mt-4">
                                    <label>is salesman ?</label>
                                    <input type="checkbox" name="is_salesman" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label for="comment">Comments</label>
                                    <textarea name="comment" class="form-control" id="comment"
                                        rows="3"></textarea>
                                </div>


                                <div class="form-group">
                                    <label>{{ trans('file.File') }}</label>
                                    <input type="file" name="file-0" class="form-control files">
                                </div>


                                {{-- <div class="form-group">
                                    <label>{{ trans('file.Image') }}</label>
                                <input type="file" name="file-1" class="form-control">
                                @if($errors->has('image'))
                                    <span>
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            <div class="row justify-content-end mt-2">
                                <div class="col-md-4">
                                    <a href="# " class="btn btn-info" id="addFileInputField">
                                        <span aria-hidden="true">&#43;</span>
                                        <span class="sr-only">Add</span>
                                    </a>
                                    <a href="# " class="btn btn-danger" id="removeFileInputField">
                                        <span aria-hidden="true">&#45;</span>
                                        <span class="sr-only">remove </span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <input type="submit" value="{{ trans('file.submit') }}"
                                    class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
    $("ul#hrm").siblings('a').attr('aria-expanded', 'true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

    $('#warehouse').hide();
    $('#biller').hide();

    $('input[name="user"]').on('change', function () {
        if ($(this).is(':checked')) {
            $('#user-input').show(400);
            $('input[name="name"]').prop('required', true);
            $('input[name="password"]').prop('required', true);
            $('select[name="role_id"]').prop('required', true);
        } else {
            $('#user-input').hide(400);
            $('input[name="name"]').prop('required', false);
            $('input[name="password"]').prop('required', false);
            $('select[name="role_id"]').prop('required', false);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

    $('select[name="role_id"]').on('change', function () {
        if ($(this).val() > 2) {
            $('#warehouse').show(400);
            $('#biller').show(400);
            $('select[name="warehouse_id"]').prop('required', true);
            $('select[name="biller_id"]').prop('required', true);
        } else {
            $('#warehouse').hide(400);
            $('#biller').hide(400);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

    // add new choose file input field
    $('#addFileInputField').on('click', function (event) {
        event.preventDefault();
        // insert last 
        // select last custom file
        let lastFile = $('.files').last();
        lastFileID = lastFile.prop('name').split('-')[1];
        lastFileID++;

        let newFileName = "file-" + lastFileID;

        let newFileInput = `
            <div class="form-group">
                <label>{{ trans('file.File') }}</label>
                <input type="file" name="${newFileName}" class="form-control files">
            </div>
        `
        $(newFileInput).insertAfter(lastFile);
    })


    // remove last choose file input field
    $('#removeFileInputField').on('click', function (event) {
        event.preventDefault();
        // remove last
        let lastFileInput = $('.files').last();
        lastFileID = lastFileInput.prop('name').split('-')[1];
        if (lastFileID != 0) {
            let parentFileInputContainer = lastFileInput.parent();
            parentFileInputContainer.remove();

        }

    })
</script>
@endsection