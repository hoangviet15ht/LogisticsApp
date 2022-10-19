<?php

namespace App\Services;

use App\Services\Interfaces\ReviewService;
use App\Models\Review;

class ReviewServiceImpl extends BaseServiceImpl implements ReviewService
{
    public function createReview(array $data) {
        // todo:
    }

    public function updateReview(Review $review, array $data) : bool {
        return $review->update($data);
    }
}
