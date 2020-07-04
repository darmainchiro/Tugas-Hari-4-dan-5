@extends('adminlte.master')

@section('content')
    <form action="/jawaban" method="post">
        @csrf
        <div class="card-body">
        <h3>  Pertanyaan : {{ $quest->isi }} </h3>
            <input type="hidden" class="form-control" id="pertanyaan_id" name="pertanyaan_id" value="{{ $quest->id }}">
            <div class="form-group">
                <label for="isi">Jawaban</label>
                <input type="text" class="form-control" id="isi" name="isi" placeholder="Jawaban">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection