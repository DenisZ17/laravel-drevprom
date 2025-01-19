<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function Ramsey\Uuid\v4;

class ElementController extends Controller
{
    public function create()
    {
        return view('element.create');
    }
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|max:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'info' => 'max:2000',
                'description' => 'max:2000',
            ]
        );

        $filePath = public_path('uploads');
        $element = new Element();
        $element->title = $request->title;
        $element->description = $request->description;
        $element->info = $request->info;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move($filePath, $filename);
            $element->image = $filename;
        }
        $element->save();
        return redirect(route('knowledge'))->with('element_created', 'Деталь создана успешно!');
    }

    public function show(Element $element)
    {
        return view('element.show', [
            'element' => $element,
        ]);
    }

    public function edit(Element $element)
    {
        return view("element.edit", [

            'element' => $element,
        ]);
    }

    public function update(Request $request, Element $element)
    {
        $request->validate(
            [
                'title' => 'required|max:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'info' => 'max:2000',
                'description' => 'max:2000',
            ]
        );

        $element->title = $request->title;
        $element->description = $request->description;
        $element->info = $request->info;

        if ($request->hasFile('image')) {
            $filePath = public_path('uploads');
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move($filePath, $filename);
            // delete old photo
            if (!is_null($element->image)) {
                $oldImage = public_path('uploads/' . $element->image);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $element->image = $filename;
        }

        $element->save();

        return redirect(route('knowledge'))->with('element_updated', 'Деталь обновлена успешно!');

    }



    public function destroy(Element $element)
    {
        $element->delete();
        return redirect(to: route('knowledge'))->with('element_delete', 'Деталь удалена успешно!');
    }
}
