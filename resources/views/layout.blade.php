<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container</title>
    <style>
        .main{
            padding: 8px;
            margin: 8px;
            width: 60%;
        }
        .col-md-3{
            width: 30%;
   
        }
        .col-md-12 .col-lg-12{
            width: 100%;

        }
        .row{
            width: 100%;
        }
        .float{
            float: left;
        }
        .height{
            height: 30px;
        }
        .clearfix{
            clear: both;
        }
        .height2{
            padding-top: 30px;
        }
        table, td, th{
            border: 1px solid black;
            /* border-radius: 10px; */
            /* width: 100px; */
            /* border-collapse: collapse;  */
        }
        th{
            color: brown;
            font-size: 18px;
            text-align: left;
        }
        a{
            text-decoration: none;
        }
        input{
            width: 90px;
        }
    </style>

</head>
<body>
    <div class="main">
      @yield('content')
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    {{-- Chức năng thêm hàng sử dựng JS --}}
    <script type="text/javascript">
            $('document').ready(function(){
                $('#add').click(function(e){
                    $('#rows').val();
                    
                    /* Điều kiện: Khi nhấn nút Add mà không nhập số hàng thì mặc định sẽ thêm một hàng mới */
                    
                    if($('#rows').val() <= 1){
                        e.preventDefault();
                        $('.addrow').append('<tr><td><input type="text" name="style_no[]" id="add"></td>'+
                            '<td><input type="text" name="uom[]" id="add"></td>'+
                            '<td><input type="text" name="prefix[]" id="add"></td>'+
                            '<td><input type="text" name="sufix[]" id="add"></td>'+
                            '<td><input type="text" name="height[]" id="add"></td>'+
                            '<td><input type="text" name="width[]" id="add"></td>'+
                            '<td><input type="text" name="length[]" id="add"></td>'+
                            '<td><input type="text" name="weight[]" id="add"></td>'+
                            '<td><input type="text" name="upc[]" id="add"></td>'+
                            '<td><input type="text" name="size1[]" id="add"></td>'+
                            '<td><input type="text" name="color1[]" id="add"></td>'+
                            '<td><input type="text" name="size2[]" id="add"></td>'+
                            '<td><input type="text" name="color2[]" id="add"></td>'+
                            '<td><input type="text" name="size3[]" id="add"></td>'+
                            '<td><input type="text" name="color3[]" id="add"></td>'+
                            '<td><input type="text" name="carton[]" id="add"></td></tr>');
                    }else{
                        var i = $('#rows').val();
                        for(var n=0;n<i;n++){
                            e.preventDefault();
                        $('.addrow').append('<tr><td><input type="text" name="style_no[]" id="add"></td>'+
                            '<td><input type="text" name="uom[]" id="add"></td>'+
                            '<td><input type="text" name="prefix[]" id="add"></td>'+
                            '<td><input type="text" name="sufix[]" id="add"></td>'+
                            '<td><input type="text" name="height[]" id="add"></td>'+
                            '<td><input type="text" name="width[]" id="add"></td>'+
                            '<td><input type="text" name="length[]" id="add"></td>'+
                            '<td><input type="text" name="weight[]" id="add"></td>'+
                            '<td><input type="text" name="upc[]" id="add"></td>'+
                            '<td><input type="text" name="size1[]" id="add"></td>'+
                            '<td><input type="text" name="color1[]" id="add"></td>'+
                            '<td><input type="text" name="size2[]" id="add"></td>'+
                            '<td><input type="text" name="color2[]" id="add"></td>'+
                            '<td><input type="text" name="size3[]" id="add"></td>'+
                            '<td><input type="text" name="color3[]" id="add"></td>'+
                            '<td><input type="text" name="carton[]" id="add"></td></tr>');
                        }
                    }
                });
            });
    </script>
</body>
</html>