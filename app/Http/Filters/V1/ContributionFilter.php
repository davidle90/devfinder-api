<?php

namespace App\Http\Filters\V1;

class ContributionFilter extends QueryFilter {

    protected $sortable = [
        'role',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    public function include($value) {
        return $this->builder->with($value);
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
