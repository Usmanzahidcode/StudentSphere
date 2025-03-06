<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class File extends Model {
    protected $fillable = [
        'name',
        'path',
        'filename',
        'mime_type',
        'size',
        'file_origin_id',
        'file_origin_type',
        'file_type_id',
        'disk'
    ];

    public function fileOrigin(): MorphTo {
        return $this->morphTo('file_origin');
    }

    public function fileType(): BelongsTo {
        return $this->belongsTo(FileType::class);
    }

    public function url() {
        return Storage::disk($this->disk)->url($this->path);
    }
}
