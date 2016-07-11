<?php

class VideoController extends Controller
{
	public function index()
	{
		$this->View->render('video/index', array(
			'videos' => VideoModel::getAllVideos()
			));
	}

	public function create()
	{
		VideoModel::createVideo(Request::post('videos_title','videos_url'));
		redirect::to('video');
	}

	public function edit($video_id)
	{
		$this->View->render('video/edit', array(
			'video' => VideoModel::getVideo($video_id)
			));
	}

	public function editSave()
	{
		VideoModel::updateVideo(Request::post('videos_id'), Request::post('videos_title'), Request::post('videos_url'));
		redirect::to('video');
	}

	public function delete($video_id)
    {
        VideoModel::deleteVideo($video_id);
        Redirect::to('video');
    }

}