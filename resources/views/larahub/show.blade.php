@extends('adminlte.master')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Detail Pertanyaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>  Judul : {{ $quest->judul }} </p>
        <p>  Isi : {{ $quest->isi }} </p>
        <a href="/jawaban/create/{{ $quest->id }}" class="btn btn-primary mb-2">
        Jawab
        </a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jawaban</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $key => $answer)
                    <tr>
                        <td> {{ $key+1 }} </td>
                        <td> {{ $answer->isi }} </td>
                        <td>
                            <a href="/jawaban/{{$answer->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <form action="/jawaban/{{$answer->id}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Jawaban</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection


@push('scripts')
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush