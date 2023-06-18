@extends('layout')
@section('content')
<h2>THÊM KIỆN HÀNG</h2>
        <form action="{{route('container.store')}}" method="POST">
            @csrf
            <div class="row height">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 float">
                            <label for="vendor" style="width: 170px;"><strong>Vendor</strong></label>
                            <select name="vendor" class="form-control" style="border: 1px solid; margin-left:38px;" >
                                <option value="VictoryAircraft">Victory Aircraft</option>       
                                <option value="Vinconship">Vinconship</option>    
                                <option value="SaigonContainer">Saigon Container</option>                         
                            </select>
                        </div>
                        <div class="col-md-3 float">
                            <label for="measure"><strong>Measurement System</strong></label>
                            <select name="measure" class="form-control" style="border: 1px solid;" >
                                <option value="Imperial">US-Imperial</option>    
                                <option value="Metric">Metric</option>    
                            </select>
                        </div>
                        @php
                        use Carbon\Carbon;
                        $date = Carbon::now();
                        @endphp
                        <div class="col-md-3 float">
                            <label for="date"><strong>Date</strong></label>
                            <input type="text" value="{{$date}}" name="date" style="width: 200px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row height">
                <label for="code_id" style="color: brown;"><strong>Container #:</strong></label>
                <input type="text" class="form-control" name="code_id" placeholder="ID_Code" style="width: 200px;">
                @error('code_id')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
       
            <div class="row height">
                <label for="receiving"><strong>Receiving #: </strong></label>
                <input type="text" class="form-control" name="receiving" placeholder="Receiving" style="width: 150px">
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
                        <tr>
                            {{-- <td contenteditable class="edit" style="font-size:20px;" data-key_id="{{$data->code_id}}">1</td> --}}
                            <td><input type="text" name="style_no[]" required></td>
                            <td><input type="text" name="uom[]" required></td>
                            <td><input type="text" name="prefix[]" required></td>
                            <td><input type="text" name="sufix[]" required></td>
                            <td><input type="text" name="height[]" required></td>
                            <td><input type="text" name="width[]" required></td>
                            <td><input type="text" name="length[]" required></td>
                            <td><input type="text" name="weight[]" required></td>
                            <td><input type="text" name="upc[]" required></td>
                            <td><input type="text" name="size1[]" required></td>
                            <td><input type="text" name="color1[]" required></td>
                            <td><input type="text" name="size2[]"></td>
                            <td><input type="text" name="color2[]"></td>
                            <td><input type="text" name="size3[]"></td>
                            <td><input type="text" name="color3[]"></td>
                            <td><input type="text" name="carton[]" required></td>
                        </tr>
                    </tbody>
                    
                </table>
                <div class="row height height2">
                    <button type="button" class="add" id="add">Add</button>
                    <input type="text" class="form-control" id="rows"> rows
                </div>
                <div class="row height">
                    <button type="submit" class="">Submit</button>
                    <button><a href="{{route('container.add_new_container')}}">Cancle</a></button>
                </div>
                   <a href="{{route('container.index')}}" style="text-decoration: underline; ">Main Menu</a>
            </div>
            
           
        </form>
@endsection 