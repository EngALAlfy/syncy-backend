<div class="row">
    @include("admin.includes.input" ,
        [
            "name" => "name" ,
            "title" => "name" ,
            "required" => true,
            "col" => "8",
          ])

    @include("admin.includes.input" ,
    [
        "name" => "code" ,
        "title" => "code" ,
        "required" => true,
        "col" => "4",
      ])

</div>

<div class="form-group">
    @include("admin.includes.image-uploader")
</div>

<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Save country</button>
