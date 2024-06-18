<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        try{

            $data = Product::with('user', 'category')->get();

            return ApiFormatter::sendResponse(200, 'success', $data);
        }catch (\Exception $err){
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'notes' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);

            $data = Product::create([
                'name' => $request->name,
                'notes' => $request->notes,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);

            return ApiFormatter::sendResponse(200, 'success', $data);
        } catch (\Exception $err) {
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'notes' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);

            $checkProses = Product::where('id', $id)->update([
                'name' => $request->name,
                'notes' => $request->notes,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);

            if ($checkProses) {
                $data = Product::find($id);
                return ApiFormatter::sendResponse(200, 'success', $data);
            } else {
                return ApiFormatter::sendResponse(400, 'bad request', 'Gagal mengubah data!');
            }
        } catch (\Exception $err) {
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $checkProses = Product::where('id', $id)->delete();

            return ApiFormatter::sendResponse(200, 'success', 'Data Product berhasil dihapus');
        } catch (\Exception $err) {
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }
}
