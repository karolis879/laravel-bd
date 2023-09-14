<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\story;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }
    /**
     * 
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        $story = Story::all();
        return view('stories.index', [
            'stories' => $story
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stories = Story::all();

        return view('stories.create', [
            'stories' => $stories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */


    // ...
    
    public function store(Request $request)
    {
        $story = new Story();
        $story->story = $request->story;
        $story->image = $this->storeImage($request);
        $story->sum_wanted = $request->sum;
        $story->sum_now = 0;
    
        $story->save();
    
        // Get the ID of the saved story
        // $storyId = $story->id;
    
        // Process and store gallery images if they exist
        // if ($request->hasFile('gallery')) {
        //     $galleryImages = [];
        //     foreach ($request->file('gallery') as $galleryImage) {
        //         $newImageName = uniqid() . '-' . $galleryImage->getClientOriginalName();
        //         $galleryImage->move(public_path('gallery'), $newImageName);
        //         $galleryImages[] = asset('gallery/' . $newImageName);
        //     }
    
        //     // Insert gallery images and associate them with the story
        //     DB::table('img_gallery')->insert([
        //         'gallery' => json_encode($galleryImages),
        //         'author_id' => $storyId,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    
        return redirect()
            ->route('story-index')
            ->with('success', 'New story has been added!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('stories.edit', [
            'story' => Story::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Story::where('id', $id)->update($request->except(['_token', '_method']));
        return redirect(route('story-index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Story::destroy($id);

        return redirect(route('story-index'))->with('message', 'Deleted sucesufully!');
    }

   private function storeImage($request) {
    $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();

    // Move the uploaded image to the public/images directory
    $request->image->move(public_path('images'), $newImageName);

    // Return the URL for the image using the asset() function
    return asset('images/' . $newImageName);
}

public function addToSum(Request $request, $storyId)
{
    $story = Story::findOrFail($storyId);
    $amount = $request->input('amount', 0); // Get the amount from the input, default to 0

    // Update the sum of the story
    $story->sum_now += $amount;
    $story->save();

    return redirect()->back()->with('message', 'Sum updated successfully.');
}


}