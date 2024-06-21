<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTag extends Model
{
    use HasFactory;

    protected $table = 'job_tag';

    public static function removeDuplicates()
    {
        $duplicates = self::select('id', 'job_id', 'tag_id')
            ->groupBy('job_id', 'tag_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $duplicate) {
            self::where('job_id', $duplicate->job_id)
                ->where('tag_id', $duplicate->tag_id)
                ->where('id', '>', $duplicate->id)
                ->delete();
        }
    }
}
