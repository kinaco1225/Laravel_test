<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $fillable = [
    'first_name',
    'last_name',
    'gender', 
    'email',
    'tel',
    'address',
    'building',
    'detail',
    'category_id'    
    ];

    public function getGenderLabelAttribute()
    {
        return match ($this->gender) {
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        };
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        return $query;
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function($q)use($keyword){
                $q->where('email', 'like', '%' . $keyword . '%');
                $q->orwhere('last_name', 'like', '%' . $keyword . '%');
                $q->orwhere('first_name', 'like', '%' . $keyword . '%');
            });
        }
        return $query;
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }

    use HasFactory;
}
