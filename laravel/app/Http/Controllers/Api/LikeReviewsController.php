<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeReviewsController extends Controller
{

    /**
     * Like a product review
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }


    /**
     * Unlike a product review
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
