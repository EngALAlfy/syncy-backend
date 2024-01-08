<div class="row">
    @include("admin.includes.input" ,
        [
            "name" => "name" ,
            "title" => "name" ,
            "required" => true,
            "col" => "12",
          ])
</div>

<div class="row">
    @include("admin.includes.textarea" ,
        [
            "name" => "short_desc" ,
            "title" => "short description" ,
            "required" => false,
            "rows" => 5,
            "col" => "12",
          ])
</div>

<div class="row">
    @include("admin.includes.select" ,
     [
         "name" => "parent_id" ,
         "title" => "parent category" ,
         "required" => false,
         "options" => $categories,
         "col" => "12",
       ])
</div>

<div class="form-group">
    @include("admin.includes.image-uploader")
</div>

<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save category</button>
