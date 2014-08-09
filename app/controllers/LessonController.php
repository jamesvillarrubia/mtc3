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

	public function create(){

		return View::make('site/lesson/create');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			//Get input
			$input = Input::all();



			//Get the author's id and store it
			if (Auth::check()){
     			$id = Auth::user()->getId();
			}else{
				//TODO: Remove for prod
				$id = 0;
			}

			//Prep for photo upload
			$destinationPath = '';
		    $filename        = '';

		    if (Input::hasFile('image')) {
		        $file            = Input::file('image');
		        $destinationPath = public_path().'/img/';
		        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
		        $uploadSuccess   = $file->move($destinationPath, $filename);
		    }



			//Create a new lesson object
			$lesson = new Lesson;

			//attach elements
			$lesson->title = $input['lesson_title'];
			$lesson->format= "";
			//$lesson->tags  = serialize(explode(',', $input['lesson_tags']));
			$lesson->levels= serialize(array($input['grade_min'], $input['grade_max']));
			$lesson->wikiword = $input['lesson_wikikeyword'];
			$lesson->img_caption = $input['lesson_image_caption'];
			$lesson->img_credit = $input['lesson_image_credit'];
			$lesson->creatorID = $id;
			$lesson->rawtext = $input['lesson_store_raw'];
			$lesson->tagtext = $input['lesson_store_tagged'];
			$lesson->cleantext = $input['lesson_store_clean'];
			$lesson->img_path = $destinationPath . $filename;
			
			$lesson->save();
    		if ($lesson) {
        		return Redirect::route('lesson.show', $lesson->id);
    		}
			/*creatorID'    	=> $user_id,
                'title'      	=> 'In mea autem etiam menandri',
                'format'    	=> serialize(array('basic')),
                'levels' 		=> serialize(array('1')),
                'description' 	=> 'First basic lesson',
                'created_at' 	=> new DateTime,
                'updated_at' 	=> new DateTime,
                'rawtext'       => $this->content1,
                'tagtext'       => $this->content1,
                'cleantext'     => $this->content1,
			"lesson_title":"test",
			"lesson_wikikeyword":"test",
			"lesson_tags":"test",
			"grade_min":"10",
			"lesson_image_caption":"tset",
			"lesson_image_credit":"test",
			"lesson_store_ckeditor":"",
			"lesson_store_raw":"",
			"lesson_store_tagged":"",
			"lesson_store_clean":""}*/


		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Lesson $lesson)
	{
		return $lesson;
		return View::make('site/lesson/index', compact('lessons'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Lesson $lesson)
	{
		//return $id;

 
	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Lesson $lesson)
	{
			$input = Input::all();
			return $input;
			$lesson->update($input);
			return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}




}

