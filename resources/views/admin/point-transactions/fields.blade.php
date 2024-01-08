<div class="row">
    @include("admin.includes.input" ,
        [
            "name" => "points" ,
            "title" => "points" ,
            "required" => true,
            "type" => "number",
            "col" => "12",
          ])
</div>

<div class="row">
    @include("admin.includes.select" ,
     [
         "name" => "user_id" ,
         "title" => "user" ,
         "required" => true,
         "options" => $users,
         "col" => "12",
       ])
</div>

<div class="row">
    @include("admin.includes.textarea" ,
        [
            "name" => "note" ,
            "title" => "note" ,
            "required" => false,
            "rows" => 6,
            "col" => "12",
          ])
</div>


<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save points</button>
