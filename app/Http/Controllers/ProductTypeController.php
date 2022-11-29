<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    protected $productTypeModel;


    public function __construct()
    {
        $this->productTypeModel = new ProductType();
    }

    public function listProductTypes()
    {
        $productTypes = $this->productTypeModel->orderBy('position')->get();
        return view('groups.list', [
            'product_types' => $productTypes
        ]);
    }

    public function newProductType()
    {
        $typeCount = $this->productTypeModel->count();
        return view('groups.create', [
            'count' => $typeCount
        ]);
    }

    public function saveNewProductType(Request $request)
    {
        $params = $request->all();

        $productType = new ProductType($params);
        $productType->save();

        return redirect('/groups')->with('status', 'Grupo Salvo');
    }

    public function editProductType($id)
    {

        $productType = $this->productTypeModel->find($id);
        $typeCount = $this->productTypeModel->count();

        return view('groups.edit', [
            'product_type' => $productType,
            'count' => $typeCount
        ]);
    }

    public function saveProductType(Request $request)
    {
        $params = $request->all();
        $productType = $this->productTypeModel->find($params['id']);

        $productType->update($params);
        return redirect('/groups')->with('status', 'Grupo Salvo');
    }

}
