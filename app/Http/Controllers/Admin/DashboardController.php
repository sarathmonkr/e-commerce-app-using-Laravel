<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customerdata;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('admin.dashboard', compact('products'));
    }
    public function employeedash()
    {
        $products = Products::all();
        return view('employee.dashboard', compact('products'));
    }
    public function prodadd()
    {
        return view('employee.add');
    }
    public function empview($id)
    {
        $product = Products::find($id);
        return view('employee.view', compact('product'));
    }
    public function custdash()
    {
        return view('home');
    }

    // for inserting products details
    public function storeprod(Request $request)
    {
        $products = new Products();
        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $products->img = $filename;
        }
        $products->save();
        return redirect()->back()->with('status', 'Product added');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        return view('employee.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        if ($request->hasFile('img')) {
            $destination = 'uploads/products/' . $products->img;
            if (file::exist($destination)) {
                file::delete($destination);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $products->img = $filename;
        }
        $products->update();
        return redirect()->back()->with('status', 'Product Updated');
    }
    public function delete($id)
    {
        $product = Products::find($id);
        $destination = 'uploads/students/' . $product->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        return redirect()->back()->with('status', 'Product Deleted');
    }
    public function approve($id)
    {
        $product = Products::find($id);
        $product->status = '1';
        $product->update();
        return redirect()->back()->with('status', 'Product Approved');
    }
    public function admview($id)
    {
        $product = Products::find($id);
        return view('admin.view', compact('product'));
    }
    // To change delivery status
    public function delivered($id)
    {
        $cdata = customerdata::find($id);
        $cdata->delivery_status = "Delivered";
        $cdata->update();
        return redirect()->back()->with('status', 'Status Changed');
    }
    // to fetch order data
    public function admorder()
    {
        $cdata = customerdata::all();
        return view('admin.orders', compact('cdata'));
    }
}

