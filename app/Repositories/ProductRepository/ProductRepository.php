<?php

namespace AgulhasMimos\Repositories\ProductRepository;

use AgulhasMimos\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    function model()
    {
        return 'AgulhasMimos\Models\Product';
    }
}