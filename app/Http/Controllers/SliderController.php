<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @get list api user
     */
    public function index()
    {
        $sliders = Slider::where(['status' => true])->get();
        $countSlider = count($sliders);
        if (count($sliders) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get list data slider success',
                'total' => $countSlider,
                'data' => $sliders
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data slider faild',
                'total' => $countSlider,
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * @param Request $title and $thumb
     * @return \Illuminate\Http\JsonResponse
     * @post data slider
     */

    public function create(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|unique:slider',
            'thumb' => 'required|image'
        ]);

        if ($request->hasFile('thumb')) {
            // luu file
            $file = $request->file('thumb');

            //hienthi ten anh
            $fileName = $file->getClientOriginalName();

            //hien thi duoi cua ten anh
            $filExit = $file->getClientOriginalExtension();

            //name images generate time()
            $fileName = str_replace("." . $filExit, "", $fileName) . rand('111111111111', '999999999999') . '-' . time() . "." . $filExit;

            //$UrlImages = 'public/uploads/';
            $file->move(base_path() . '/public/uploads/', $fileName);

        }

        $slider = Slider::create(
            [
                'title' => $request->title,
                'thumb' => $fileName
            ]
        );
        if ($slider) {
            $data = [
                'code' => 0,
                'message' => 'create data a slider success',
                'data' => $slider
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'create data a slider faild',
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * @param Request $request
     * @param null $id and $title
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function update(Request $request, $id = null)
    {
        $id = (int)$id;
        $slider = Slider::find($id);
        if (!$slider) {
            $data = [
                'code' => 1,
                'message' => 'update data a slider faild',
                'data' => []
            ];
            return response()->json($data, 200);
        }
        $this->validate($request, [
//            'title' => 'unique:slider',
            'thumb' => 'image'
        ]);
        $fileName = $slider->thumb;
        if ($request->hasFile('thumb')) {
            // luu file
            $file = $request->file('thumb');

            //hienthi ten anh
            $fileName = $file->getClientOriginalName();

            //hien thi duoi cua ten anh
            $filExit = $file->getClientOriginalExtension();

            //name images generate time()
            $fileName = str_replace("." . $filExit, "", $fileName) . rand('111111111111', '999999999999') . '-' . time() . "." . $filExit;

            $file->move(base_path() . '/public/uploads/', $fileName);

        }
        if (!$request->allFiles()) {
            $slider->title = 'images' . time();
        }
            $slider->thumb = $fileName;
            $slider->status = (int) $request->status;

        $slider->save();
        if ($slider) {
            $data = [
                'code' => 0,
                'message' => 'update data a slider success',
                'data' => $slider
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'update data a slider faild',
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }


}
