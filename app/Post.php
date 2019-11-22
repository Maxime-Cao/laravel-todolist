<?php

// Post.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'done','title_task_1','title_task_2','title_task_3','task_1','task_2','task_3','task_1_done','task_2_done','task_3_done'];
}
