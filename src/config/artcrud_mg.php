<?php


return [
    "url_prefix"=>env('admin_prefix','admin'),
    "public_path_for_files"=>"images",
    "permission"=>"manage_crud",
    "debug"=>false,
    "middlewares"=>["web","artadmin.check_login","artadmin.permission:manage_crud"],
    "lfm_prefix"=>"/".env('admin_prefix')."/filemanager",
    "fields" => [
        \Artcrud_mongodb\fields\string\StringField::class,
        \Artcrud_mongodb\fields\select\SelectField::class,
        \Artcrud_mongodb\fields\multiselect\MultiSelectField::class,
        \Artcrud_mongodb\fields\number\NumberField::class,
        \Artcrud_mongodb\fields\numberfloat\NumberfloatField::class,
        \Artcrud_mongodb\fields\image\ImageField::class,
        \Artcrud_mongodb\fields\file\FileField::class,
        \Artcrud_mongodb\fields\images\ImagesField::class,
        \Artcrud_mongodb\fields\files\FilesField::class,
        \Artcrud_mongodb\fields\slug\SlugField::class,
        \Artcrud_mongodb\fields\textarea\TextareaField::class,
        \Artcrud_mongodb\fields\checkbox\CheckboxField::class,
        \Artcrud_mongodb\fields\fields\editor\EditorField::class,
        \Artcrud_mongodb\fields\filelfm\FileLfmField::class,
        \Artcrud_mongodb\fields\fileslfm\FilesLfmField::class

    ],

    'template_migration_up'=>'  Schema::create("%name_table%", function (Blueprint $table) {
            $table->id();
            $table->integer("sort")->nullable(true);
            $table->integer("enable")->default(1);
             //code//
            $table->timestamps();
        });',
    'template_migration_down'=>' Schema::dropIfExists("%name_table%");',
    'template_model'=>[
        'path_to_model'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/model/Sample.php"),
        'new_name_space'=>'App\Models',
        'path_to_store'=>app_path("Models"),
    ],
    'template_views'=>[
        'create'=>[
            'path_to_view'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/views/create.blade.php"),
            'path_to_store'=>base_path("resources/views/admin/"),
            'short_alias'=>'admin',
        ],
        'edit'=>[
            'path_to_view'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/views/edit.blade.php"),
            'path_to_store'=>base_path("resources/views/admin/"),
            'short_alias'=>'admin',
        ],
        'index'=>[
            'path_to_view'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/views/index_new.blade.php"),
            'head_title'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/views/head_title.blade.php"),
            'path_to_store'=>base_path("resources/views/admin/"),
            'short_alias'=>'admin',
        ],
        'show'=>[
            'path_to_view'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/views/show.blade.php"),
            'path_to_store'=>base_path("resources/views/admin/"),
            'short_alias'=>'admin',
        ]
    ],
    'template_controller'=>[
        'template_path'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/controller/Sample.php"),
        'new_name_space'=>'\App\Http\Controllers\admin',
        'store_controller'=>app_path("Http/Controllers/admin")

    ],

    'template_route'=>[
        'route_url_prefix'=>'/admin/',
        'route_name_prefix'=>'admin',
        /* insert in file comment
         //insert_dynamic_routes_heere//
        */
        'template_path'=>base_path("vendor/noistudio/artcrud-mongodb/src/templates/route/sample.txt"),
        'route_store_path'=>base_path("routes/admin/tables.php"),
    ],

];
