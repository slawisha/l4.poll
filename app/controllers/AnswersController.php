<?php

class AnswersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index($pollsId)
	{
		return Answer::where('poll_id', '=', $pollsId)->get();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /answers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		$answer = new Answer();
		$answer->poll_id = Input::get('poll_id'); 
		$answer->votes = 0; 
		$answer->text = Input::get('answer');
		$answer->save(); 
	}

	/**
	 * Display the specified resource.
	 * GET /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /answers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$answer = Answer::find($id);
		$answer->text = Input::get('answer');
		$answer->votes = Input::get('votes');
		$answer->save();
	}

	public function vote($id)
	{
		$answer = Answer::find($id);
		$votes = $answer->votes;
		$answer->votes = ++$votes;
		$answer->save();
		return Response::json($votes, '200');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Answer::find($id)->delete();
	}

}