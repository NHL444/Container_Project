<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainerController extends Controller
{
    /*Trang main Menu */ 
    public function index(){
        $con =Container::all();
        return view('index',[
            'con'=>$con,
        ]);
    }

    /* Xem thông tin kiện hàng */
    public function view($id){

        $con =Container::where('code_id',$id)->first();
        
        // Lấy dữ liệu hai bảng
        $detail=Detail::join('container', 'detail.code_id', '=', 'container.code_id')
            ->where('container.code_id', '=',$id)
            ->select('container.*','detail.*')
            ->get();


        return view('view',[
            'con'=>$con,
            'detail'=>$detail,
        ]);
    }
    /* Lưu thông tin kiện hàng vừa tạo */
    public function store(Request $request){
        $request->validate([
            'code_id' => 'unique:container',
        ], [
            
            'container.unique' => 'Đã tồn tại mã container này',
        ]);
        /* Cập nhật dữ liệu bảng Container */
        $con = new Container();
        $con->code_id = $request->code_id; 
        $con->vendor = $request->vendor;
        $con->measure = $request->measure;
        $con->receiving = $request->receiving;
        $con->date = $request->date;
        $con->save();

       /* Cập nhật dữ liệu bảng detail */
        $count = count($_POST['style_no']);
        // dd($request->all());
        for($i=0;$i<$count;$i++){
            $data = [
                'code_id' =>$request->code_id,
                'style_no' =>$request->style_no[$i],
                'uom' =>$request->uom[$i],
                'prefix' =>$request->prefix[$i],
                'sufix' =>$request->sufix[$i],
                'height' =>$request->height[$i],
                'width' =>$request->width[$i],
                'length' =>$request->length[$i],
                'weight' =>$request->weight[$i],
                'upc' =>$request->upc[$i],
                'size1' =>$request->size1[$i],
                'color1' =>$request->color1[$i],
                'size2' =>$request->size2[$i],
                'color2' =>$request->color2[$i],
                'size3' =>$request->size2[$i],
                'color3' =>$request->color2[$i],
                'carton' =>$request->carton[$i]
     
            ];
            /* Nếu có dữ liệu tiếp tục chạy, nếu hàng trống thì kết thúc vòng lặp */
            if(empty($data['style_no'])){
                break;
            }else{
                DB::table('detail')->insert($data);
            }
        };
   

        return redirect()->back()->with('Update Successful!!');

    }

    /* Sửa thông tin kiện hàng */
    public function edit($id){

        $con =Container::where('code_id',$id)->first();
        
        // Lấy dữ liệu hai bảng
        $detail=Detail::join('container', 'detail.code_id', '=', 'container.code_id')
            ->where('container.code_id', '=',$id)
            ->select('container.*','detail.*')
            ->get();
    
    
        return view('container',[
            'con'=>$con,
                'detail'=>$detail,
        ]);
    }
    /* Cập nhật lại thông tin tin kiện hàng lên cơ sở dữ liệu */
    public function update($id, Request $request){

        /* Cập nhật bảng container */
        $con = Container::find($id);
        // dd($con);
        $con->CODE_ID = $request->code_id; 
        $con->VENDOR = $request->vendor;
        $con->measure = $request->measure;
        $con->receiving = $request->receiving;
        $con->date = $request->date;
        $con->update();

        $con_qty= Detail::where('code_id',$request->code_id)->get();

        /* Điều kiện Container có kiện hàng */
        if($con_qty->count()>0){
                   /* Xóa bỏ dữ liệu cũ và ghi lại dữ liệu vừa cập nhật khi nhấn submit */ 
            foreach ($request->detail as $key => $items) {
                DB::table('detail')->where('id', $request->detail[$key])->delete();
            }   
        }

         /* Cập nhật bảng detail */
        foreach($request->style_no as $key => $items){
            $data['code_id']  =  $request->code_id;
            $data['style_no'] =  $request->style_no[$key];
            $data['uom']      =  $request->uom[$key];
            $data['prefix']   =  $request->prefix[$key];
            $data['sufix']    =  $request->sufix[$key];
            $data['height']   =  $request->height[$key];
            $data['width']    =  $request->width[$key];
            $data['length']   =  $request->length[$key];
            $data['weight']   =  $request->weight[$key];
            $data['upc']      =  $request->upc[$key];
            $data['size1']    =  $request->size1[$key];
            $data['color1']   =  $request->color1[$key];
            $data['size2']    =  $request->size2[$key];
            $data['color2']   =  $request->color2[$key];
            $data['size3']    =  $request->size3[$key];
            $data['color3']   =  $request->color3[$key];
            $data['carton']   =  $request->carton[$key];


             DB::table('detail')->insert($data);
                    
        }
        return redirect()->back()->with('Update Successful!!');
       
    }
    
}
