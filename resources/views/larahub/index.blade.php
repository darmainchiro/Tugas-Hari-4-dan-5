@extends('adminlte.master')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data Pertanyaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a href="/pertanyaan/create" class="btn btn-primary mb-2">
        Buat Pertanyaan
    </a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quests as $key => $quest)
                <tr>
                    <td> {{ $key+1 }} </td>
                    <td> {{ $quest->judul }} </td>
                    <td> {{ $quest->isi }} </td>
                    <td>
                        <a href="/pertanyaan/{{$quest->id}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="/pertanyaan/{{$quest->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                        <form action="/pertanyaan/{{$quest->id}}" method="post" style="display: inline">
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
                <th>Judul</th>
                <th>Isi</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </div>
    <!-- /.card-body -->
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