<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
     protected $table = 'researchs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'authors','field','keywords', 'abstract',
        'type','publication_name','published_year','issue',
        'published_month','published_page','creator','cited',
        'cited_count','full_text_file','article_file','cover_file',
        'title_thai','prize_name','issuer','prize_level','weight',
        'article_level','book_type','subject','course','degree','subject_type','project'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getShortTitle(){
      return  iconv_substr($this->title, 0,120, "UTF-8");
    }
    public function getShortAbstract(){
      return  iconv_substr($this->abstract, 0,300, "UTF-8")."...";
    }
}
