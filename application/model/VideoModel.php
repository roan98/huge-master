<?php

class VideoModel
{
	public static function getAllVideos()
	{
		$database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM videos";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
	}

	public static function getVideo($video_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT video_id, video_title, video_url FROM videos WHERE video_id = :video_id";
        $query = $database->prepare($sql);
        $query->execute(array(':video_id' => $video_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }


	public static function createVideo()
    {
    	$videos_title = Request::post("videos_title");
    	$videos_url = Request::post("videos_url");
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO videos (video_title, video_url) VALUES (:videos_title, :videos_url)";
        $query = $database->prepare($sql);
        $query->execute(array(':videos_title' => $videos_title, ':videos_url' => $videos_url,));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_CREATION_FAILED'));
        return false;
    }

        public static function updateVideo()
    {
    	$videos_id = Request::post("videos_id");
 		$videos_title = Request::post("videos_title");
 		$videos_url = Request::post("videos_url");
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE videos SET video_title = :videos_title, video_url = :videos_url WHERE video_id = :videos_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':videos_id' => $videos_id, ':videos_title' => $videos_title, ':videos_url' => $videos_url,));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_EDITING_FAILED'));
        return false;
    }

    public static function deleteVideo($video_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM videos WHERE video_id = :video_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':video_id' => $video_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_VIDEO_DELETION_FAILED'));
        return false;
    }

}