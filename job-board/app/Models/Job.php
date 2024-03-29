<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['Entry', 'Intermediate', 'Senior'];
    public static array $category = ['IT', 'Marketing', 'Finance', 'Sales'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query) use ($filters){
            $query->where(function ($query) use ($filters){
                $query->where('title', 'like', '%'. $filters['search'] .'%')
                    ->orWhere('description', 'like', '%'. $filters['search'] .'%');
            });
        })->when($filters['min_salary'] ?? null, function ($query) use ($filters){
            $query->where('salary', '>=', $filters['min_salary']);
        })->when($filters['max_salary'] ?? null, function ($query) use ($filters){
            $query->where('salary', '<=', $filters['max_salary']);
        })->when($filters['experience'] ?? null, function ($query) use ($filters){
            $query->where('experience', '=', $filters['experience']);
        })->when($filters['category'] ?? null, function ($query) use ($filters){
            $query->where('category', $filters['category']);
        });
    }
}
