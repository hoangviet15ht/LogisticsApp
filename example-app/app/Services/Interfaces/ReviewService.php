<?php

namespace App\Services\Interfaces;

use App\Models\Review;
use Illuminate\Http\Request;
use Throwable;

interface ReviewService
{
    public function createReview(array $data);
    public function updateReview(Review $review,array $data) : bool;
}
