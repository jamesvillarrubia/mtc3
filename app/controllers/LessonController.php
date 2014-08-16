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

$str = <<<EOD
<div class="dablink">
	For the roller coaster, see 
	<a href="//simple.wikipedia.org/wiki/Robin_Hood_(roller_coaster)" title="Robin Hood (roller coaster)">
		Robin Hood (roller coaster)
	</a>
	.
</div>
<div class="thumb tright">
	<div class="thumbinner" style="width:222px;">
		<a class="image" href="//simple.wikipedia.org/wiki/File:Robin_Hood_Memorial.jpg">
			<img alt="" class="thumbimage" src="//upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Robin_Hood_Memorial.jpg/220px-Robin_Hood_Memorial.jpg" style="height:330px; width:220px" />
		</a>
	<div class="thumbcaption">
		<div class="magnify">
			<a class="internal" href="//simple.wikipedia.org/wiki/File:Robin_Hood_Memorial.jpg" title="Enlarge">
				<img alt="" src="//bits.wikimedia.org/static-1.23wmf12/skins/common/images/magnify-clip.png" style="height:11px; width:15px" />
			</a>
		</div>
		A statue of Robin Hood near the castle in
		<a class="mw-redirect" href="//simple.wikipedia.org/wiki/Nottingham,_England" title="Nottingham, England">
			Nottingham
		</a>
	</div>
</div>
<p>
	<strong>Robin Hood</strong>
	 is a 
	<a href="//simple.wikipedia.org/wiki/Folk_hero" title="Folk hero">
		folk hero
	</a>
from the
<a href="//simple.wikipedia.org/wiki/Middle_Ages" title="Middle Ages">Middle Ages</a>. He is a legendary person whom people have told stories about for many years. Robin Hood is one who still remains popular. His story has been featured in books, plays, movies and cartoons as well.</p>
<p>There are many variations of his stories. Usually, Robin Hood is an
<a href="//simple.wikipedia.org/wiki/Outlaw" title="Outlaw">outlaw</a>
who lives in
<a href="//simple.wikipedia.org/wiki/Sherwood_Forest" title="Sherwood Forest">Sherwood Forest</a> near the town of <a class="mw-redirect" href="//simple.wikipedia.org/wiki/Nottingham,_England" title="Nottingham, England">Nottingham, England</a>. His enemies are <a href="//simple.wikipedia.org/wiki/John_of_England" title="John of England">Prince John</a> (who is temporarily on the throne because his brother, King <a href="//simple.wikipedia.org/wiki/Richard_I_of_England" title="Richard I of England">Richard the Lionheart</a> is away in the <a href="//simple.wikipedia.org/wiki/Middle_East" title="Middle East">Middle East</a> fighting in the <a href="//simple.wikipedia.org/wiki/Crusades" title="Crusades">Crusades</a>), and the corrupt <a class="new" href="//simple.wikipedia.org/w/index.php?title=Sheriff_of_Nottingham&amp;action=edit&amp;redlink=1" title="Sheriff of Nottingham (not yet started)">Sheriff of Nottingham</a>, who abuse their powers and take money from the people who need it. Robin Hood uses his archery skills and his wits to steal the money back, and return it to the poor. Accompanying Robin are his faithful followers (<a class="new" href="//simple.wikipedia.org/w/index.php?title=The_Merry_Men&amp;action=edit&amp;redlink=1" title="The Merry Men (not yet started)">The Merry Men</a>). The most recognized of his merry band include <a class="new" href="//simple.wikipedia.org/w/index.php?title=Little_John&amp;action=edit&amp;redlink=1" title="Little John (not yet started)">Little John</a>, <a class="new" href="//simple.wikipedia.org/w/index.php?title=Much_the_Millers_son&amp;action=edit&amp;redlink=1" title="Much the Millers son (not yet started)">Much the Millers son</a>, <a class="new" href="//simple.wikipedia.org/w/index.php?title=Will_Scarlet&amp;action=edit&amp;redlink=1" title="Will Scarlet (not yet started)">Will Scarlet</a>, <a class="new" href="//simple.wikipedia.org/w/index.php?title=Friar_Tuck&amp;action=edit&amp;redlink=1" title="Friar Tuck (not yet started)">Friar Tuck</a> and <a class="new" href="//simple.wikipedia.org/w/index.php?title=Alan_a_Dale&amp;action=edit&amp;redlink=1" title="Alan a Dale (not yet started)">Alan a Dale</a>.</p>
<h2>In the media[<a class="mw-editsection-visualeditor" href="//simple.wikipedia.org/w/index.php?title=Robin_Hood&amp;veaction=edit&amp;section=1" title="Change section: In the media">change</a> | <a href="//simple.wikipedia.org/w/index.php?title=Robin_Hood&amp;action=edit&amp;section=1" title="Change section: In the media">edit source</a>]</h2>
<p>There have been many <a href="//simple.wikipedia.org/wiki/Movie" title="Movie">movies</a> about Robin Hood. In the 1970s, <a href="//simple.wikipedia.org/wiki/Walt_Disney_Pictures" title="Walt Disney Pictures">Disney</a> made a movie where the characters were shown to be animals. Robin and his lover (Marian) are <a href="//simple.wikipedia.org/wiki/Fox" title="Fox">foxes</a>.</p>


EOD;



        //check if its our form, if not return JSON response Error.
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting.'
            ) );
        }
 		
 		$stage = Input::get('lesson_stage');

 		/******************
		 * CLEAN THE TEXT		 
 		 ******************/
 //		switch ($stage){
 //			case 1:
 				
 				$alchemyapi = new AlchemyAPI();
				//return "Sentiment: ".$response["docSentiment"]["type"];
 		
 				//base clean the text
 				$html = Input::get('lesson_raw');

 		//******
 		$html = $str;		
 				$base_clean = clean_my_html($html, '<ul><sup><li><ol><b><p><strong><br><table><td><th><tr><tbody><i><div><img><a><span><h1><h2><h3><h4><h5><h6>');
 				
 				//full clean the text
 				$full_clean = clean_my_html($html, '<p><strong><br><table><td><th><tr><tbody><i><a><h1><h2><h3><h4><h5><h6>');
 				
 				//return $full_clean;

 				$stripped = clean_my_html($full_clean, '');

 				//Send to Question Generator
				//$response = $alchemyapi->entities('text',$html, array('sentiment'=>0));
				//return '<pre>'.print_r($response,true).'</pre>';
				$response = $alchemyapi->combined('text',$stripped, null);
				$keylist = array();
				//Keywords
		/*		foreach($response['keywords'] as $num => $keyarray){
					$keylist[] = $keyarray['text'];	
				}

				//Concepts
				foreach($response['concepts'] as $num => $keyarray){
					$keylist[] = $keyarray['text'];	
				}
				//Entities
				foreach($response['entities'] as $num => $keyarray){
					$keylist[] = $keyarray['text'];	
				}
*/
				//return '<pre>'.print_r($keylist,true).print_r($response,true).'</pre>';

 				//pass cleaned text to wrapper
 				$wrapped = wrap_my_html($html);

 				return $wrapped;
 				
 				//Return the wrapped text 
 				return Response::json(array('newstage'=>2,'wrapped'=>$wrapped));

 			//Receive tagged html
 //			case 2:
 				//Parse tags out

 				//Send tags to Alchemy

 				//Parse response into potential array of questions

 				//generate question array

 				//Pass question array to template?

 				return Response::json(array('newstage'=>3));
// 				break;
// 			case 3:

 				//Save the Lesson element

//				break;
// 		}
    	/******************
		 * SEND THE TEXT		 
 		 ******************/

 		/******************
		 * MATCH THE RESPONSE		 
 		 ******************/

 		/******************
		 * WRAP THE TEXT		 
 		 ******************/

 		/******************
		 * SEND IT BACK
 		 ******************/


        $lesson_title = Input::get( 'lesson_title' );
        $lesson_wikikeyword = Input::get( 'lesson_wikikeyword' );
 
        //.....
        //validate data
        //and then store it in DB
        //.....
 
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
 
        return Response::json( $response );
  




























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

