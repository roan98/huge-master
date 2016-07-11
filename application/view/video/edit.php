<div class="container">
    <h1>VideoController/edit/</h1>

    <div class="box">
        <h2>Edit a video</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->video) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>video/editSave">
                <label>Change title and url of video: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="videos_id" value="<?php echo htmlentities($this->video->video_id); ?>" />
                <input type="text" name="videos_title" value="<?php echo htmlentities($this->video->video_title); ?>" />
                <input type="text" name="videos_url" value="<?php echo htmlentities($this->video->video_url); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This video does not exist.</p>
        <?php } ?>
    </div>
</div>
