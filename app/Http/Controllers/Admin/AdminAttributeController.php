<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use App\Models\Type;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAttributeController extends Controller
{
    public function index(Request $request)
    {
        $attibutes = Attribute::with('category:id,c_name', 'type');

        if ($type = $request->type) $attibutes->where('atb_type_id', $type);

        $attibutes = $attibutes->orderByDesc('id')->get();

        $types = Type::all();
        $viewData = [
            'attibutes' => $attibutes,
            'types' => $types
        ];

        return view('admin.attribute.index', $viewData);
    }

    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admin.attribute.create',compact('categories', 'types'));
    }

    public function store(AdminRequestAttribute $request)
    {
        $data = $request->except('_token');
        $data['atb_slug']     = $request->atb_name;
        $data['created_at'] = Carbon::now();

        $id = Attribute::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $types = Type::all();
        $categories = Category::all();
        return view('admin.attribute.update', compact('attribute', 'categories', 'types'));
    }

    public function update(AdminRequestAttribute $request, $id)
    {
        $attribute          = Attribute::find($id);
        $attribute->atb_name = $request->atb_name;
        $attribute->atb_slug = Str::slug($request->atb_name);
        $attribute->atb_type_id = $request->atb_type_id;
        $attribute->updated_at = Carbon::now();
        $attribute->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $attribute          = Attribute::find($id);
        if ($attribute) $attribute->delete();

        return redirect()->back();
    }
}
