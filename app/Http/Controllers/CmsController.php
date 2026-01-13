<?php
namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Cms::all();

        return view('admin.cms.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'title'           => 'required|string|max:255',
            'sub_title'       => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'sub_description' => 'nullable|string',
            'image'           => 'nullable|image|max:2048',
            'page_slug'       => 'required|string|max:150|unique:cms,page_slug',
            'section'         => 'nullable|string|max:100',
            'is_active'       => 'boolean',
        ]);

        // Handle file upload if image is provided
        if ($request->hasFile('image')) {
            $imagePath = upload_image($request->file('image'));
        } else {
            $imagePath = null;
        }

        // Save to database
        $cms = Cms::create([
            'title'           => $request->title,
            'sub_title'       => $request->sub_title,
            'description'     => $request->description,
            'sub_description' => $request->sub_description,
            'image'           => $imagePath,
            'page_slug'       => $request->page_slug,
            'section'         => $request->section,
            'is_active'       => $request->is_active ?? true,
        ]);
        return redirect()->route('admin.cms.index')->with('success', 'CMS page created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($cms)
    {
        $cms = Cms::findOrFail($cms);

        return view('admin.cms.show', compact('cms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cms)
    {
        $cms = Cms::findOrFail($cms);
        return view('admin.cms.edit', compact('cms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
        $cms = Cms::findOrFail($request->route('cm'));

        $validatedData = $request->validate([
            'title'           => 'required|string|max:255',
            'sub_title'       => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'sub_description' => 'nullable|string',
            'image'           => 'nullable|image|max:2048',
            'page_slug' => 'required|string|max:150|unique:cms,page_slug,' . $cms->id . ',id',
            'section'         => 'nullable|string|max:100',
            'is_active'       => 'boolean',
        ]);
        // Handle file upload if image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cms->image) {
                delete_image($cms->image);
            }
            $imagePath              = upload_image($request->file('image'));
            $validatedData['image'] = $imagePath;
        }
        $cms->update($validatedData);
        return redirect()->route('admin.cms.index')->with('success', 'CMS page updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cms $cm)
    {
        // Delete image if exists
        if ($cm->image) {
            delete_image($cm->image);
        }
        $cm->delete();
        return redirect()->route('admin.cms.index')->with('success', 'CMS page deleted successfully!');
    }
}
