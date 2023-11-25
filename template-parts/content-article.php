<div class="container">
    <header class="content-header">
        <div class="post-header" style="display:flex; gap: 3; flex-direction: row; justify-content: flex-start;">
            <!-- Display the post thumbnail -->
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
                <p>Posted by: <?php the_author(); ?></p>
            </div>
            <!-- Display the post title -->
            <div class="post-title" style="margin-left: 50px;">
                <h1><?php the_title(); ?></h1>
                <!-- Display the post author -->
                <!-- Display the post content -->
                <div class="post-content">
                    <?php the_content(); ?>

                </div>

            </div>
        </div>
    </header>
    <div class="meta mb-3">
        <span class="date"><?php the_date(); ?></span>
        <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>') ?>
        <span class="tag"><i class='fa fa-tag'></i> tag</span>
        <span class="tag"><i class="fa fa-tag"></i> category</span>
        <span class="comment"><a href="#comments"><i class='fa fa-comment'></i> <?php comments_number(); ?></a></span>
    </div>

    <!-- Display the comments template -->
    <?php comments_template(); ?>
</div>
