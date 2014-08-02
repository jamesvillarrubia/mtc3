<?php

class AdminLessonsController extends AdminController {


    /**
     * Post Model
     * @var Post
     */
    protected $lesson;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Lesson $lesson)
    {
        parent::__construct();
        $this->lesson = $lesson;
    }

    /**
     * Show a list of all the blog posts.
     *
     * @return View
     */
    public function getIndex()
    {
   		return 'Hello';
   	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
    {
   		return 'Hello';
   	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
   		return 'Hello';
   	}

    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($post)
    {
   		return 'Hello';
   	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($post)
    {
   		return 'Hello';
   	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($post)
	{
   		return 'Hello';
   	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function getDelete($post)
    {
   		return 'Hello';
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete($post)
    {
   		return 'Hello';
   	}

    /**
     * Show a list of all the blog posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
   		return 'Hello';
   	}
}