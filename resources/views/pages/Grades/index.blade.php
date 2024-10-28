@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_sidebar.Grades_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_sidebar.Grades_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="button x-small" data-toggle="modal"
                                    data-target="#exampleModal">
                                    {{ trans('Grades.add_Grade') }}
                                </button>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('Grades.Name') }}</th>
                                                <th>{{ trans('Grades.Notes') }}</th>
                                                <th>{{ trans('Grades.Processes') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($grades as $grade)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $grade->Name }}</td>
                                                    <td>{{ $grade->Notes }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#edit{{ $grade->id }}"
                                                            title="{{ trans('Grades.Edit') }}"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete{{ $grade->id }}"
                                                            title="{{ trans('Grades.Delete') }}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>

                                                    <!-- edit_modal_Grade -->
                                                    <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title" id="exampleModalLabel">
                                                                        {{ trans('Grades.edit_Grade') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- edit_form -->
                                                                    <form action="{{route('grades.update' , $grade->id)}}" method="POST">
                                                                        @csrf
                                                                        {{ method_field('PUT') }}
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label for="Name"
                                                                                    class="mr-sm-2">{{ trans('Grades.stage_name_ar') }}
                                                                                    :</label>
                                                                                <input id="Name" type="text"
                                                                                    name="Name" class="form-control"
                                                                                    value="{{ $grade->getTranslation('Name', 'ar') }}"
                                                                                    required>
                                                                                <input id="id" type="hidden"
                                                                                    name="id" class="form-control"
                                                                                    value="{{ $grade->id }}">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="Name_en"
                                                                                    class="mr-sm-2">{{ trans('Grades.stage_name_en') }}
                                                                                    :</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="{{ $grade->getTranslation('Name', 'en') }}"
                                                                                    name="Name_en" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                                                                                :</label>
                                                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->Notes }}</textarea>
                                                                        </div>
                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">{{ trans('Grades.submit') }}</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- delete_modal_Grade -->
                                                    <div class="modal fade" id="delete{{ $grade->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title" id="exampleModalLabel">
                                                                        {{ trans('Grades.delete_Grade') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('grades.destroy', $grade->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                        {{ trans('Grades.Warning_Grade') }}
                                                                        <input id="id" type="hidden"
                                                                            name="id" class="form-control"
                                                                            value="{{ $grade->id }}">
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">{{ trans('Grades.submit') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach



                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action=" {{ route('grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('Grades.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('Grades.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Grades.submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
