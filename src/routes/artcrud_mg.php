<?php

$prefix=config("artcrud_mg.url_prefix");

Route::prefix($prefix)->middleware(config("artcrud_mg.middlewares"))->group(function () {
    Route::get("/collection_crud/create", [\Artcrud_mongodb\controllers\CrudController::class, "create"])->name("artcrud_mg.create");

    Route::post("/collection_crud/docreate", [\Artcrud_mongodb\controllers\CrudController::class, "docreate"])->name("artcrud_mg.docreate");

    Route::post("/collection_crud/get_field", [\Artcrud_mongodb\controllers\CrudController::class, "get_field"])->name("artcrud_mg.get_field");

});


