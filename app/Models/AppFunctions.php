<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class AppFunctions extends Model
{
    use HasFactory;
    
    /*
     * Settings Constants used for main etings and other mutiple settings used accros the application
     */

    const GLOBAL_SITE_SETTINGS   = 1;
    const HEADER_SETTINGS        = 2;
    const FOOTER_SETTINGS        = 3;

    /*
     * Global Status used accros the application
     */

    const STATUS_PENDING   = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT     = 2;
    const STATUS_ARCHIVED  = 3;
    const STATUS_DELETED   = 4;
    const STATUS_INACTIVE  = 5;

    /*
     * Predefine category for the job applications
     */ 

    const CATEGORY_BASIC_INFO = 'Basic Informtion';
    const CATEGORY_EDUCATION  = 'Education';
    const CATEGORY_WORK_EXP   = 'Work Experience';
    const CATEGORY_DOCUMENTS  = 'Upload Documents'; 

    public static function generateUniqueSlug($title, $table, $slugField = 'slug') {
        // Generate the initial slug
        $slug = Str::slug($title);

        // Base slug to be used for generating unique slugs
        $originalSlug = $slug;
        $count = 1;

        // Check if the slug exists in the database
        while (DB::table($table)->where($slugField, $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public static function stringToColorCode($str) {
		$code = dechex(crc32($str));
        $code = substr($code, 0, 6);
        return $code;
	}

	public static function getInitialsAttribute($name) {
		$name_array = explode(' ',trim($name));
	
		$firstWord = $name_array[0];
		$lastWord = $name_array[count($name_array)-1];
	
		return $firstWord[0]."".$lastWord[0];
	}

    public function get_replies($commentID) {
		$commentData = DB::table('comments')->where(array('response' => $commentID))->get();

		$responseData = '';

		foreach($commentData as $comment):
			$responseData .= '<div class="media mt-4  comment-' . $comment->id . '">';
			$initials = self::getInitialsAttribute($comment->author); 
            $responseData .= '<div class="user-thumb" style="background: #' . self::stringToColorCode($initials) . '">' . $initials . '</div>';
            $responseData .= '<div class="media-body">';
            $responseData .= '<h6><a class="text-secondary font-weight-bold" href="">' . $comment->author . '</a> <small><i>' . date('d F Y', strtotime($comment->created_at)) . '</i></small></h6>';
            $responseData .= '<p>'.$comment->body.'</p>';
			$responseData .= '</div>';
			$responseData .= '</div>';
		endforeach;

		return $responseData;
	}

}
