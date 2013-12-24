<?php

/**
 * story actions.
 *
 * @package    continuethisstory
 * @subpackage story
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class storyActions extends sfActions {

    public function executeView(sfWebRequest $request) {
	$this->forward404If(!$this->story = Doctrine::getTable('Story')->retrieveBySlug($request->getParameter('slug')) );
	$this->story_pieces = $this->story->getPieces()->getData();

	$this->last_story_piece = end($this->story_pieces);

	
	$this->can_modify_last_piece = ($this->getUser()->getGuardUser() != null
						&& ($this->last_story_piece->next_writer_id == null || $this->last_story_piece->next_writer_id == '' )
						&& $this->last_story_piece->writer_id == $this->getUser()->getGuardUser()->getId());

	$this->allowed_to_write_next = ($this->getUser() != null
					&& $this->getUser()->getFbId() != null
					&& $this->getUser()->getFbId() == $this->last_story_piece->getNextWriterId());
	//echo 'can_modify_last_piece';var_dump($this->can_modify_last_piece);
	//echo 'allowed_to_write_next';var_dump($this->allowed_to_write_next);
	//if I'm the writer but no next-writer id, allow edit of current
	$this->form = null;
	if ($this->can_modify_last_piece) {
	    $this->form = new StoryPieceFrontendForm($this->last_story_piece);

	} else {
	    if ($this->allowed_to_write_next) {
		$storyPiece = new StoryPiece();
		$storyPiece->Story = $this->story;
		$this->form = new StoryPieceFrontendForm($storyPiece);
		
	    }
	}
	if ($request->isMethod('post')) {
	    $storyPieceFields = $request->getParameter('story_piece');

	    $this->form->bind($storyPieceFields);
	    if ($this->form->isValid()) {
		$this->form->save();
		$this->added = true;
		$this->redirect('story/view?slug=' . $this->story->slug);
	    }
	}



    }

    public function executeTag(sfWebRequest $request) {

	$this->forward404Unless($request->hasParameter('tag'));
	$this->tag = $request->getParameter('tag');
	$this->stories = Doctrine::getTable('Story')->getByTagName($this->tag);

    }

    public function executeCreate(sfWebRequest $request) {
	$this->form = new StoryFrontendCreateForm();
	$this->form->setDefault('culture',$this->getUser()->getCulture());
	//$this->form->setDefault('creator_id',$this->getUser()->getGuardUser()->getId());

	if ($request->isMethod('post')) {
	    $storyFields = $request->getParameter('story');
	    //var_dump($storyFields);die();
	    //$storyFields['creator_id'] = $this->getUser()->getGuardUser();

	    $this->form->bind($storyFields);
	    if ($this->form->isValid()) {
		$this->form->save();
		$this->added = true;
		$this->redirect('story/view?slug=' . $this->form->getObject()->getSlug());
	    }
	}
    }
    public function executeChangeNextWriter(sfWebRequest $request) {
	if (!$request->isMethod('post')) {
	    $this->forward404();
	}
	$this->forward404Unless($story_piece = Doctrine::getTable('StoryPiece')->findOneById($request->getParameter('story_piece_id')));
	$this->forward404Unless($story = Doctrine::getTable('Story')->findOneById($request->getParameter('story_id')));
	//some validation
	$logged_user_id = $this->getUser()->getGuardUser()->getId();
	$user_id = $request->getParameter('user_id', $logged_user_id);
	if ($story->creator_id != $logged_user_id) {
	    $this->forward404();
	}
	//everything is good!
	$story_piece->next_writer_id = $this->getUser()->getFbId();
	$story_piece->save();
	$$redirect_url = $request->getParameter('url', 'story/view?slug=' . $story->slug);
	$this->redirect($$redirect_url);

    }
}
