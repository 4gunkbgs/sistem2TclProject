@extends('layouts.master2')

@section('content')
    
<div class="container-fluid mt-2 mb-2 ">
    <div class="h1 text-center">
        To-do List
    </div>    
</div>

<hr>                
<div class="card">
    <div class="card-body">
        <table class="table table-success table-striped">
            <thead>                                               
                <tr>
                    <th> Judul </th>
                    <th> Catatan </th>
                    <th> Tag </th>
                    <th> Tanggal </th>                
                </tr>
                @foreach ($dataTodoUser as $data)
                <tr>
                    <td> {{ $data['judul'] }}</td>
                    <td> {{ $data['comment2']['isi']}}</td>
                    <td> {{ $data['tags']}}</td>
                    <td> {{ $data['tanggal']}}</td>
                </tr>
                 @endforeach
            </thead>
            <tbody>                                    
            </tbody>
        </table>    
    </div>
</div>
@endsection