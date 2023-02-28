<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index() {
        $data['products'] = Product::select('id', 'name', 'price', 'image', 'img_path', 'has_addon_cat', 'status')
                            ->where('admin_id', Auth::id())
                            ->orderByDesc('created_at')->paginate(20);

        return view('admin.product.index', $data);
    }

    public function add(Request $request) {
        if($request->input()) {
            $messages = [];
            $attributes = [
                'imgFileName' => 'image',
            ];
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min_digits:1',
                'imgFileName' => 'required|image|mimes:webp,jpeg,png,jpg,svg|max:200',
            ], $messages, $attributes);

            $name = $request->input('name');
            $price = $request->input('price');
            $status = !empty($request->input('status')) ? 1 : 0;

            
            /**
             * Image
             */
            $image = $request->file('imgFileName');
            $fileName = date("YmdHis").Str::random(20).'.'.$image->getClientOriginalExtension();
            $relativeImgPath = 'assets/admin/images/product/'.date('Y').'/'.date('m').'/';

            /**
             * Image resize
             */
            $resizeDirPath = public_path($relativeImgPath);
            $createDir50 = true;
            $createDir270 = true;
            if(!File::isDirectory($resizeDirPath.'/50x30/')){
                $createDir50 = File::makeDirectory($resizeDirPath.'/50x30/', 0777, true, true);
            }
            if(!File::isDirectory($resizeDirPath.'/270x338/')){
                $createDir270 = File::makeDirectory($resizeDirPath.'/270x338/', 0777, true, true);
            }

            if($createDir50 && $createDir270) {
                $img = Image::make($image->path());
                $img->resize(50, 30, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($resizeDirPath.'/50x30/'.$fileName);
                $img->resize(270, 338, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($resizeDirPath.'/270x338/'.$fileName);

                //move original file to folder
                $image->move(public_path($relativeImgPath), $fileName);
            } else {
                return back()->withInput($request->all())->with('error', 'Failed to create image directory!');
            }

            try {
                $crtProduct = Product::create([
                    'admin_id' => Auth::id(),
                    'name' => $name,
                    'price' => $price,
                    'image' => $fileName,
                    'img_path' => $relativeImgPath,
                    'has_addon_cat' => 0,
                    'status' => $status
                ]);

                if($crtProduct) {
                    return redirect()->route('product')->with('success', 'Product has been added Successfully.');
                } else {
                    return back()->withInput($request->all())->with('error', 'We encountered an error while inserting the data, please try again later.');
                }
            } catch (\Throwable $th) {
                return back()->withInput($request->all())->with('error', 'Failed to add product, please try again!');
            }
        }
        return view('admin.product.add');
    }

    public function view($id) {
        try {
            $decrID = Crypt::decryptString($id);
            $data['product'] = Product::find($decrID)
                                ->first(['id', 'name', 'price', 'image', 'img_path', 'has_addon_cat', 'status']);

        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
        return view('admin.product.view', $data);
    }

    public function edit(Request $request, $id) {
        try {
            $decrID = Crypt::decryptString($id);
            $data['product'] = Product::where('id', $decrID)
                                ->first(['id', 'admin_id', 'name', 'price', 'image', 'img_path', 'has_addon_cat', 'status']);

            if($request->input()) {
                if($data['product']->admin_id == Auth::id()) {
                    $messages = [];
                    $attributes = [
                        'imgFileName' => 'image',
                    ];
                    $request->validate([
                        'name' => 'required|string|max:255',
                        'price' => 'required|numeric|min_digits:1',
                        'imgFileName' => $data['product']->image != '' ? 'sometimes|required|image|mimes:webp,jpeg,png,jpg,svg|max:200' : 'required|image|mimes:webp,jpeg,png,jpg,svg|max:200',
                    ], $messages, $attributes);
                    
                    $name = $request->input('name');
                    $price = $request->input('price');
                    $status = !empty($request->input('status')) ? 1 : 0;

                    /**
                     * Image
                     */
                    $image = $request->file('imgFileName');
                    if(!empty($image)) {
                        $fileName = date("YmdHis").Str::random(20).'.'.$image->getClientOriginalExtension();
                        $relativeImgPath = 'assets/admin/images/product/'.date('Y').'/'.date('m').'/';
    
                        /**
                         * Image resize
                         */
                        $resizeDirPath = public_path($relativeImgPath);
                        $createDir50 = true;
                        $createDir270 = true;
                        if(!File::isDirectory($resizeDirPath.'/50x30/')){
                            $createDir50 = File::makeDirectory($resizeDirPath.'/50x30/', 0777, true, true);
                        }
                        if(!File::isDirectory($resizeDirPath.'/270x338/')){
                            $createDir270 = File::makeDirectory($resizeDirPath.'/270x338/', 0777, true, true);
                        }
                        if($createDir50 && $createDir270) {
                            $img = Image::make($image->path());
                            $img->resize(50, 30, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })->save($resizeDirPath.'/50x30/'.$fileName);
                            $img->resize(270, 338, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })->save($resizeDirPath.'/270x338/'.$fileName);
                    
                            //move original file to folder
                            $image->move(public_path($relativeImgPath), $fileName);
                        } else {
                            return back()->withInput($request->all())->with('error', 'Failed to create image directory!');
                        }
                    }
        
                    if($decrID == $data['product']->id) {
                        $product = Product::find($data['product']->id);
                        $product->name = $name;
                        $product->price = $price;
                        $product->image = isset($fileName) ? $fileName : $data['product']->image;
                        $product->img_path = isset($relativeImgPath) ? $relativeImgPath : $data['product']->img_path;
                        $product->status = $status;
                        $product->update(); 
        
                        if($product) {
                            return redirect()->route('product')->with('success', 'Product data has been updated Successfully.');
                        } else {
                            return back()->withInput($request->all())->with('error', 'We encountered an error while updating, please try again later.');
                        }
                    } else {
                        return back()->withInput($request->all())->with('error', 'Invalid product ID!');
                    }
                } else {
                    abort(401, 'Unauthorised Access');
                }
            }
        } catch (DecryptException $e) {
            return back()->withInput($request->all())->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        return view('admin.product.edit', $data);
    }

    public function delete($id) {
        try {
            $decrID = Crypt::decryptString($id);

            $delUser = Product::find($decrID)->delete();
            if($delUser) {
                return back()->with('warning', 'Product has been deleted.');
            } else {
                return back()->with('error', 'We encountered an error while deleting the records, please try again later.');
            }
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
    }
}
