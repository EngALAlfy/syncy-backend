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
            "required" => true,
            "rows" => 5,
            "col" => "12",
          ])
</div>

<div class="row">
    @include("admin.includes.textarea" ,
        [
            "name" => "desc" ,
            "title" => "description" ,
            "required" => true,
            "rows" => 10,
            "col" => "12",
          ])
</div>


<div class="row">
    @include("admin.includes.input" ,
        [
            "name" => "custom_email" ,
            "title" => "custom email" ,
            "type" => "email",
            "col" => "6",
          ])

    @include("admin.includes.input" ,
        [
            "name" => "custom_phone" ,
            "title" => "custom phone" ,
            "type" => "phone",
            "col" => "6",
          ])
</div>

<div class="row">
    @include("admin.includes.select" ,
        [
            "name" => "category_id" ,
            "title" => "category" ,
            "required" => true,
            "options" => $categories,
            "col" => "6",
          ])

    @include("admin.includes.select" ,
      [
          "name" => "state_id" ,
          "title" => "state" ,
          "required" => true,
          "options" => $states,
          "col" => "6",
        ])
</div>

<div class="row">
    @include("admin.includes.input" ,
      [
          "name" => "price" ,
          "title" => "price" ,
          "type" => "number",
          "col" => "4",
        ])
    @include("admin.includes.select" ,
     [
         "name" => "owner_id" ,
         "title" => "Owner" ,
         "required" => true,
         "options" => $users,
         "col" => "8",
       ])
</div>

<div class="form-group">
    @include("admin.includes.image-uploader")
</div>

<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save post</button>
