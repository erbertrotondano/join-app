<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $product;
    
    public function __construct(Product $product){
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->paginate(10);
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        try{
            
            $product = $this->product->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Produto cadastrado com sucesso'
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
            
            $product = $this->product->findOrFail($id);

            return response()->json([
                'data' => $product
            ]);
        } catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        try{
            
            $product = $this->product->findOrFail($id);
            $product->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Produto atualizado com sucesso'
                ]
            ]);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try{
            $product = $this->product->findOrFail($id);
            $product->delete();
            return response()->json([
                'data' => [
                    'msg' => 'Produto excluído com sucesso'
                ]
            ]);
        } catch(\Exception $e){
            return response()->json($e->getMessage(), 401);
        }
    }

    public function productsByCategory(string $category_id){
        $products = $this->product->where('id_categoria_produto', $category_id)->paginate(10);
        return response()->json($products);
    }
}
