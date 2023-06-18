@extends('layout')
@section('content')
<h2>CHI TIẾT KIỆN HÀNG (MÃ {{$con->CODE_ID}}) </h2>
            <div class="row height">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 float">
                            <label for="vendor"><strong>Vendor: </strong>{{$con->VENDOR}}</label>
                        </div>
                        <div class="col-md-3 float">
                            <label for="measure"><strong>Measurement System: </strong> {{$con->MEASURE}}</label>
                        </div>
                        @php
                        use Carbon\Carbon;
                        $date = Carbon::now();
                        @endphp
                        <div class="col-md-3 float">
                            <label for="date"><strong>Date: </strong>{{$con->DATE}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row height">
                <label for="code_id" style="color: brown;"><strong>Container #: </strong></label>{{$con->CODE_ID}}
            </div>
       
            <div class="row height">
                <label for="receiving"><strong>Receiving #: </strong>{{$con->RECEIVING}}</label>
               
            </div>
            
            <div class="row height2">
                <table>
                    <thead>
                        <tr>
                            <th>STYLE NO</th>
                            <th>UOM</th>
                            <th>PREFIX</th>
                            <th>SUFIX</th>
                            <th>HEIGHT</th>
                            <th>WIDTH</th>
                            <th>LENGTH</th>
                            <th>WEIGHT</th>
                            <th>UPC</th>
                            <th>SIZE1</th>
                            <th>COLOR1</th>
                            <th style="color: black;">SIZE2</th>
                            <th style="color: black;">COLOR2</th>
                            <th style="color: black;">SIZE3</th>
                            <th style="color: black;">COLOR3</th>
                            <th>#CARTON</th>
                        </tr>
                    </thead>
                    <tbody class="addrow">
                        @foreach($detail as $data)
                        <tr>
                            <input type="hidden" name="detail[]" value="{{$data->ID}}">
                            <td><input type="text" name="style_no[]" value="{{$data->STYLE_NO}}" required></td>
                            <td><input type="text" name="uom[]" value="{{$data->UOM}}" required></td>
                            <td><input type="text" name="prefix[]" value="{{$data->PREFIX}}" required></td>
                            <td><input type="text" name="sufix[]" value="{{$data->SUFIX}}"required></td>
                            <td><input type="text" name="height[]" value="{{$data->HEIGHT}}" required></td>
                            <td><input type="text" name="width[]" value="{{$data->WIDTH}}" required></td>
                            <td><input type="text" name="length[]" value="{{$data->LENGTH}}" required></td>
                            <td><input type="text" name="weight[]" value="{{$data->WEIGHT}}" required></td>
                            <td><input type="text" name="upc[]" value="{{$data->UPC}}" required></td>
                            <td><input type="text" name="size1[]" value="{{$data->SIZE1}}" required></td>
                            <td><input type="text" name="color1[]" value="{{$data->COLOR1}}" required></td>
                            <td><input type="text" name="size2[]" value="{{$data->SIZE2}}"></td>
                            <td><input type="text" name="color2[]" value="{{$data->COLOR2}}"></td>
                            <td><input type="text" name="size3[]" value="{{$data->SIZE3}}"></td>
                            <td><input type="text" name="color3[]" value="{{$data->COLOR3}}"></td>
                            <td><input type="text" name="carton[]" value="{{$data->CARTON}}" required></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                <br>
                   <a href="{{route('container.index')}}" style="text-decoration: underline; ">Main Menu</a>
            </div>
@endsection 