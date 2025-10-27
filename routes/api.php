<?php

use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return [
        ['id' => 1, 'title' => 'Einkaufen gehen', 'done' => false],
        ['id' => 2, 'title' => 'Programmieren lernen', 'done' => true],
    ];
});
