<?php

namespace App\Http\Filters\V1;

class ProjectFilter extends QueryFilter {

    protected $sortable = [
        'title',
        'status',
        'startsAt' => 'start_datetime',
        'endsAt' => 'end_datetime',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    public function include($value) {
        return $this->builder->with($value);
    }

    public function status($value) {

        return $this->builder->whereIn('status', explode(',', $value));
    }

    public function title($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('title', 'like', $likeStr);
    }

    public function startsAt($value) {
        $dates = explode(',', $value);

        if(count($dates) > 1) {
            return $this->builder->whereBetween('start_datetime', $dates);
        }

        return $this->builder->whereDate('start_datetime', $value);
    }

    public function endsAt($value) {
        $dates = explode(',', $value);

        if(count($dates) > 1) {
            return $this->builder->whereBetween('end_datetime', $dates);
        }

        return $this->builder->whereDate('end_datetime', $value);
    }

    public function createdAt($value) {
        $dates = explode(',', $value);

        if(count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->whereDate('created_at', $value);
    }

    public function updatedAt($value) {
        $dates = explode(',', $value);

        if(count($dates) > 1) {
            return $this->builder->whereBetween('updated_at', $dates);
        }

        return $this->builder->whereDate('updated_at', $value);
    }
}
