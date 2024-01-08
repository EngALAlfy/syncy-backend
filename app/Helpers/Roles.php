<?php

namespace App\Helpers;

enum Roles:int
{
   case SUPER_ADMIN = 1;
   case ADMIN = 2;
   case DATA_ENTRY = 3;
   case USER = 4;
}
