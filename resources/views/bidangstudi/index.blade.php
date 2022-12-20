
@extends('adminlte::page')
@section('title', 'List Bidang Studi')
@section('content_header')
    <h1 class="m-0 text-dark">List Bidang Studi</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('bidstudi.create')}}" class="btn
btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Bidang Studi</th>
                                <th>Bidang Studi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bidstudi as $key => $bs)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bs->id}}</td>
                                <td>{{$bs->bidangstudi}}</td>
                                <td>
                                    <a href="{{route('bidstudi.edit', $bs)}}" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="{{route('bidstudi.destroy',$bs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                            @if($bidstudi->count() == 0)
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
    @push('js')
    <form action="" method="post" id="delete-form">
        @csrf
        @method('delete')
    </form>
    <script>
        function notificationBeforeDelete(event, element) {
            event.preventDefault();
            if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                $('#delete-form').attr('action', $(element).attr('href')).submit();
            }
        }
    </script>
@endpush
