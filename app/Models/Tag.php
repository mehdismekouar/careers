<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public static function removeDuplicates()
    {
        self::select('id', 'tag_id')
            ->groupBy('tag_id')
            ->havingRaw('COUNT(*) > 1')
            ->get()
            ->each(function ($tag) {
                self::where('tag_id', $tag->tag_id)
                    ->where('id', '>', $tag->id)
                    ->delete();
            });
    }

    public static function removeOrphans()
    {
        self::doesntHave('jobs')->each(function ($tag) {
            $tag->delete();
        });
    }
}
