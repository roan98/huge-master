<div class="container">
    <h1>VideoController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

         <p>
            <form method="post" action="<?php echo Config::get('URL');?>video/create">
                <label>Title of new video: </label><input type="text" name="videos_title" />
                <label>Url of new video: </label><input type="text" name="videos_url" />
                <input type="submit" value='Create this Video' autocomplete="off" />
            </form>
        </p>

        <?php if ($this->videos) { ?>
            <table class="video-table">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Url</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->videos as $key => $value) { ?>
                        <tr>
                            <td><?= $value->video_id; ?></td>
                            <td><?= htmlentities($value->video_title); ?></td>
                            <td><a href="<?= htmlentities($value->video_url) ?>"><?= htmlentities($value->video_url) ?></a></td>
                            <td><a href="<?= Config::get('URL') . 'video/edit/' . $value->video_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'video/delete/' . $value->video_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No videos yet. Add some!</div>
            <?php } ?>
    </div>
</div>
