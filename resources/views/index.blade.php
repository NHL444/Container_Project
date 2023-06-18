@extends('layout')
@section('content')
        <div class="title">
            <h2>DANH SÁCH CONTAINER</h2>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Container ID</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($con as $data)
                    <tr>
                        <td>{{$data->CODE_ID}}</td>
                        <td>
                            <button><a href="{{route('container.view',$data->CODE_ID)}}">View</a></button>
                            <button><a href="{{route('container.edit',$data->CODE_ID)}}">Edit</a></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row height2">
            <button><a href="{{route('container.add_new_container')}}">Add New Container</a></button>
        </div>
@endsection