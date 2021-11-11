<?php

namespace App\Contracts;

interface FilterableModel
{
    public static function getValidFilterColumns() : array;
}