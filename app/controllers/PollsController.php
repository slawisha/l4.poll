<?php

class PollsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /polls
	 *
	 * @return Response
	 */
	public function index()
	{
		$perPage = Input::get('perpage');
		return Poll::orderBy('order','ASC')->paginate($perPage);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /polls/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /polls
	 *
	 * @return Response
	 */
	public function store()
	{
		$poll = new Poll();
		$poll->question = Input::get('question');
		$poll->order = Input::get('order');
		$poll->save();
	}

	/**
	 * Display the specified resource.
	 * GET /polls/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Poll::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /polls/{id}/edit
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
	 * PUT /polls/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$poll= Poll::find($id);
		$poll->question = Input::get('question');
		$poll->order = Input::get('order');
		$poll->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /polls/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Poll::find($id)->delete();
	}

}