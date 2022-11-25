<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->productModel = new Product();

    }

    public function listProducts()
    {
        $productModel = new Product();
        $products = $productModel->all();
        return view('product.list', [
            'products' => $products
        ]);
    }

    public function newProduct()
    {
        $productType = new ProductType();
        $productTypes = $productType->getSelector();
        return view('product.create', [
            'types' => $productTypes
        ]);
    }

    public function saveNewProduct(Request $request)
    {
        $params = $request->all();
        $params['price'] = $params['price'] * 100;
//        $params['promotional_price'] = $params['promotional_price'] * 100;

        $product = new Product($params);
        $product->save();

        return redirect('/products')->with('status', 'Produto Salvo');
    }

    public function editProduct($id)
    {
        $productType = new ProductType();
        $productTypes = $productType->getSelector();

        $product = $this->productModel->find($id);

        return view('product.edit', [
            'product' => $product,
            'types' => $productTypes
        ]);
    }

    public function saveProduct(Request $request)
    {
        $params = $request->all();
        $product = $this->productModel->find($params['id']);

        $params['price'] = $params['price'] * 100;
//        $params['promotional_price'] = $params['promotional_price'] * 100;


        $product->update($params);


        return redirect('/products')->with('status', 'Produto Salvo');
    }


}
