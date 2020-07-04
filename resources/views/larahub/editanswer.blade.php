@extends('adminlte.master')

@section('content')
<div class="ml-3 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Jawaban</h3>
            </div>
            <form action="/jawaban/{{ $answer->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="isi">Jawaban</label>
                        <input type="text" class="form-control" id="isi" value="{{ $answer->isi }}" name="isi" placeholder="Jawaban">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection