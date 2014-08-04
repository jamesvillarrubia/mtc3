<?php

//app/models/Lessons.php

class Lesson extends Eloquent{
	

	/**
	 * Get the lesson's raw_text.
	 *
	 * @return string
	 */
	public function getRaw()
	{
		return nl2br($this->rawtext);
	}
	/**
	 * Get the lesson's tagged_text.
	 *
	 * @return string
	 */
	public function getTagged()
	{
		return nl2br($this->tagtext);
	}

	/**
	 * Get the lesson's clean_text.
	 *
	 * @return string
	 */
	public function getClean()
	{
		return nl2br($this->cleantext);
	}

	/**
	 * Get the lesson's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'creatorID');
	}

	/**
	 * Get the lesson's levels.
	 *
	 * @return array
	 */
	public function levels()
	{
		return unserialize($this->levels);
	}

	/**
	 * Get the lesson's format.
	 *
	 * @return array
	 */
	public function format()
	{
		return unserialize($this->format);
	}

	/**
	 * Get the lesson's title.
	 *
	 * @return string
	 */
	public function title()
	{
		return $this->title;
	}

	/**
	 * Get the lesson's description.
	 *
	 * @return array
	 */
	public function desc()
	{
		return nl2br($this->description);
	}


    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }

	
}