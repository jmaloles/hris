<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Lesson extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function getSlugName()
    {
        return str_replace(" ", "-", ucwords(strtolower($this->name), " "));
    }

    public function pathDir()
    {
        return $this->topic->pathDir() . '/' . $this->getSlugName();
    }

    public function lesson_modules()
    {
        return $this->hasMany(LessonModule::class);
    }

    public function storeLessonModuleFile($file, $path)
    {
        $lessonModule = $file;
        $lessonModule->move($path, $lessonModule->getClientOriginalName());
        $lessonModuleLocation = $path . '/' . $lessonModule->getClientOriginalName();

        return $lessonModuleLocation;
    }

    public static function storeLesson($request)
    {
        $topic = Topic::find($request->get('tId'));

        $lesson = $topic->lessons()->save(new Lesson([
            'name' => $request->get('name')
        ]));

        $lessonModule = new LessonModule();
        $lessonModule->lesson_id = $lesson->id;
        $lessonModule->module = $lesson->pathDir();
        $lessonModule->save();

        File::makeDirectory($lesson->pathDir());

        return redirect()->back()->with('msg', 'Lesson "' . ucwords(strtolower($lesson->name), " ") . '" was successfully created');
    }

    public static function uploadLesson($request)
    {
        //$lesson = new Lesson();
        $lesson = Lesson::find($request->get('lId'));

        $path = $lesson->pathDir();
        $file = $request->file('module');
        $fileName = $request->file('module')->getClientOriginalName();

        $lesson->storeLessonModuleFile($file, $path);

        return redirect()->back()->with('msg', 'You have successfully uploaded Lesson "' . $fileName . '"');
    }
}
