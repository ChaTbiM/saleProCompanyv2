@extends('layout.main') @section('content')
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {!! Form::open(['route' => ['addFiles', $employee_id], 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group col-md-6">
                        <label for="file-0">{{ trans('file.File') }}</label>
                        <input type="file" id="file-0" name="file-0" class="form-control files">
                    </div>
                    <div class="col-md-12 my-2 text-center">
                        <div class="col-md-6 justify-content-start">
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
                    <div class="col-md-3">

                    </div>
                    <button class="btn btn-primary" type="submit">{{ trans('file.submit') }}</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{ trans('file.files') }}</h4>
                    </div>
                    <div class="card-body d-flex  flex-wrap">
                        @if (isset($files))
                        @foreach ($files as $file)
                        <div class="card col-md-3">
                            <div class="card-header pb-0 mx-auto d-flex align-items-center">{{$file->file_link}} </div>
                            <div class="card-body d-flex text-center py-0">

                                <a href={{url("/public/files/employee/$file->file_link")}} download class="mx-auto">
                                    <i class="dripicons-document file__icon" style="font-size:100px"></i>
                                </a>
                            </div>

                            <a href={{url("/public/files/employee/$file->file_link")}} download role="button"
                                class="btn btn-primary "> {{ trans('file.download') }} </a>
                            {{ Form::open(['route' => ['deleteFile', $file->id], 'method' => 'DELETE'] ) }}

                            <a class="w-100"><button type="submit" class="w-100 btn btn-danger mt-3">
                                    {{ trans('file.delete') }}</button></a>

                            {!! Form::close() !!}
                            {{-- <div class="card-footer"> --}}
                            {{-- </div> --}}
                        </div>


                        @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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