<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;

class ProductCategoryController extends Controller
{
    private $category;
    
    public function __construct(ProductCategory $category){
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->paginate(10);
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
         $data = $request->all();
         try{
            $category = $this->category->create($data);
            return response()->json([
                'data' => [
                    'msg' => 'Categoria cadastrada com sucesso'
                ]
            ]);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $category = $this->category->findOrFail($id);
            return response()->json($category);    
        } catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, string $id)
    {
        $data = $request->all();
        try{
            $category = $this->category->findOrFail($id);
            $category->update($data);
            return response()->json([
                'data' => [
                    'msg' => 'Categoria editada com sucesso'
                ]
            ]);
        } catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $category = $this->category->findOrFail($id);
            $category->delete();
            return response()->json([
                'data' => [
                    'msg' => 'Categoria excluída com sucesso'
                ]
            ]);
        } catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }
}
