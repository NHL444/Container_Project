@extends('layout')
@section('content')
<h2>CẬP NHẬT KIỆN HÀNG (MÃ {{$con->CODE_ID}}) </h2>
        @if(\Session::has('success'))
            <div class="succWrap"><strong>Thành Công</strong>: {{ \Session::get('success') }}</div>
        @elseif(\Session::has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{URL::to('/container/update/'.$con->ID)}}" method="POST">
            @csrf
            <div class="row height">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 float">
                            <label for="vendor" style="width: 170px"><strong>Vendor</strong></label>
                            <select name="vendor" class="form-control" style="border: 1px solid; margin-left:38px;">
                                <option>Chọn</option>
                                <option value="VictoryAircraft" @if($con->VENDOR == "VictoryAircraft") selected @endif>Victory Aircraft</option>       
                                <option value="Vinconship" @if($con->VENDOR == "Viconship") selected @endif>Vinconship</option>    
                                <option value="SaigonContainer" @if($con->VENDOR == "SaigonContainer") selected @endif>Saigon Container</option>                        
                            </select>
                        </div>
                        <div class="col-md-3 float">
                            <label for="measure"><strong>Measurement System</strong></label>
                            <select name="measure" class="form-control" style="border: 1px solid;" >
                                <option>Chọn</option>
                                <option value="Imperial" @if($con->MEASURE == "Imperial") selected @endif>US-Imperial</option>    
                                <option value="Metric" @if($con->MEASURE == "Metric") selected @endif>Metric</option>    
                                {{-- @foreach($product as $val)
                                    <option value="{{$val->pro_name}}">{{$val->pro_name}}</option>                      
                                @endforeach --}}
                            </select>
                        </div>
                        @php
                        use Carbon\Carbon;
                        $date = Carbon::now();
                        @endphp
                        <div class="col-md-3 float">
                            <label for="date"><strong>Date</strong></label>
                            <input type="text" value="{{$con->DATE}}" name="date" style="width: 150px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row height">
                <label for="code_id" style="color: brown;"><strong>Container #:</strong></label>
                <input type="text" class="form-control" name="code_id" placeholder="Code_ID" value="{{$con->CODE_ID}}" readonly style="width: 200px">
            </div>
       
            <div class="row height">
                <label for="receiving"><strong>Receiving #:  </strong></label>
                <input type="text" class="form-control" name="receiving" placeholder="Receiving" value="{{$con->RECEIVING}}" style="width: 150px">
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
                <div class="row height height2">

                        <button type="button" class="add" id="add">Add</button>
                        <input type="text" class="form-control" name="rows" id="rows"> rows

                </div>
                <div class="row height">
                    <button type="submit" class="">Submit</button>
                    <button><a href="{{route('container.edit',$con->CODE_ID)}}">Cancle</a></button>
                </div>
                   <a href="{{route('container.index')}}" style="text-decoration: underline; ">Main Menu</a>
            </div>
            
           
        </form>
@endsection 