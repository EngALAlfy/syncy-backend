<div class="row">
    @include("admin.includes.input" ,
        [
            "name" => "amount" ,
            "title" => "amount" ,
            "required" => true,
            "type" => "number",
            "col" => "12",
          ])
</div>

<div class="row">
    @include("admin.includes.select" ,
        [
            "name" => "method" ,
            "title" => "method" ,
            "options" => collect(\App\Helpers\TransactionMethod::cases())->pluck("name" , "name"),
            "required" => true,
            "col" => "6",
          ])

    @include("admin.includes.select" ,
     [
         "name" => "user_id" ,
         "title" => "user" ,
         "required" => true,
         "options" => $users,
         "col" => "6",
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

<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save pay</button>
