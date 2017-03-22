<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Topic extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'training_id'];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function topic_modules()
    {
        return $this->hasMany(TopicModule::class);
    }

    public function storeTopicModuleFile($file, $path)
    {
        if( $file == "" ) {
            $topicModuleLocation = "N/A";
        } else {
            $topicModule = $file;
            $topicModule->move($path, $topicModule->getClientOriginalName());
            $topicModuleLocation = $path;
        }

        return $topicModuleLocation;
    }

    public function topicSlugName()
    {
        $tSlug = str_replace(" ", '-', ucwords(strtolower($this->name), " "));

        return $tSlug;
    }

    public function pathDir()
    {
        $dir = $this->training->pathDir() . '/' . $this->topicSlugName();

        return $dir;
    }

    public function getFileCountInsideDir()
    {
        $fileDir = File::files($this->pathDir());

        return count($fileDir);
    }

    public static function store($request)
    {
        $training = Training::find($request->get('tid'));

        $topic = $training->topics()->save(new Topic([
            'name' => strtoupper(trim($request->get('name'))),
        ]));

        $topic->topic_modules()->save(new TopicModule([
            'module' => $topic->pathDir()
        ]));

        File::makeDirectory($topic->pathDir());

        return redirect()->back()->with('msg', 'Topic "'. ucwords($topic->name, " ") .'" was successfully created.');
    }

}
