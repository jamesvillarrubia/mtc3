<?php

class LessonController extends BaseController {
    /**
     * Lesson Model
     * @var Lesson
     */
    protected $lesson;

    /**
     * Inject the models.
     * @param Lesson $lesson
     */
    public function __construct(Lesson $lesson)
    {
        parent::__construct();
        $this->lesson = $lesson;
    }
	//Shows a PAGE of lessons
	public function index(){

		// Grab all the lessons
        $lessons = $this->lesson->first();//->orderBy('created_at', 'DESC')->paginate(10);

 		echo '<pre>';
 		var_dump($lessons->toArray());
    	echo '</pre>';
    	exit();
        // Show the page
       	return View::make('site/lesson/index', compact('lessons'));
   //     return $lessons;
	}
	public function getShow($lesson){

		// Check if the lesson exists
		if (is_null($lesson))
		{
			// If we ended up in here, it means that
			// a page or a blog post didn't exist.
			// So, this means that it is time for
			// 404 error page.
			return App::abort(404);
		}
/*
		// Get current user and check permission
        $user = $this->user->currentUser();
        $canEdit = false;
        if(!empty($user)) {
            $canEdit = $user->can('post_comment');
        }
*/

		return View::make('site/lesson/view_lesson', compact('lesson'));
	}


	public function getEdit(Lesson $lesson){
		return View::make('edit');
	}

	public function postEdit(){

	}

	public function getDelete(Lesson $lesson){
		return View::make('delete');
	}

	public function postDelete(){

	}

}

