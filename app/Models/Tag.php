<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs() {
        return $this->belongsToMany(Job::class);
    }

    public static function removeDuplicates()
    {
        $duplicates = self::select('id', 'tag_id')
            ->groupBy('tag_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $duplicate) {
            self::where('tag_id', $duplicate->tag_id)
                ->where('id', '>', $duplicate->id)
                ->delete();
        }
    }
}
