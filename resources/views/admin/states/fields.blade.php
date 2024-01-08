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
    @include("admin.includes.select" ,
     [
         "name" => "country_id" ,
         "title" => "country" ,
         "required" => true,
         "options" => $countries,
         "col" => "12",
       ])
</div>

<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save state</button>
