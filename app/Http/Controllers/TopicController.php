<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Training;
use File;
use Illuminate\Support\Facades\Storage;
use App\Lesson;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Topic::store($request);

        return $store;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        //dd($topic->pathDir());
        // $topicModules = [];
        $dir = storage_path('training_modules/') . $topic->training->trainingSlugName() . '/' . $topic->topicSlugName();
        $topicModules = File::allFiles($topic->pathDir());


      return view('admin.topic.show', compact('topic', 'topicModules'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic)
    {
        $topic->delete();

        return redirect()->back()->with('msg', 'You have successfully deleted "'. ucwords($topic->name, " ") .'".');
    }

    public function uploadLessonModule(Request $request)
    {
        //$lesson = Lesson::find($request->get('tId'));
        $uploadLesson = Lesson::uploadLesson($request);

        return $uploadLesson;
    }
}
