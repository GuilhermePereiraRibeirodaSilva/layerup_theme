<?php
list($queried_posts) = $args;
$template_path = LAYERUP_THEME_TEMPLATES_ROOT;
?>

<section class='posts my-5 container'>
    <div class='row gy-5'>
        <?php foreach($queried_posts as $queried_post): ?>
        <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>
            <?php 
            get_template_part(
                $template_path . '/feeds/post',
                null,
                array($queried_post)
            );
            ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>