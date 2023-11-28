<?php get_header(); ?>

<?php

$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<main class="main-projet">
    <section class="content-projet">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="projet-title"><?php the_title(); ?></h1>

                <div class="media-wrapper"> 
                    <div class="projet-img">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            $image = get_field('image_' . $i);
                            if ($image) { 
                                echo '<div class="image-block">';
                                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                echo '</div>';
                            }
                        }
                        $img_sec = get_field('img_sec');
                        if ($img_sec) :
                            echo '<img src="' . esc_url($img_sec['url']) . '" alt="' . esc_attr($img_sec['alt']) . '" />';
                        endif;

                        $image_mobile = get_field('image_mobile');
                        if ($image_mobile) :
                            echo '<div class="image-mobile-block">';
                            echo '<img class="img-mobile" src="' . esc_url($image_mobile['url']) . '" alt="' . esc_attr($image_mobile['alt']) . '" />';
                            echo '</div>';
                        endif;
                        ?>
                    </div>

                    <div class="projet-video">
                        <?php
                        $video_file = get_field('video');
                        if ($video_file) : ?>
                            <div class="video-block">
                                <video id="player" class="js-plyr" controls autoplay muted>
                                    <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4">
                                    Votre navigateur ne prend pas en charge la vidéo.
                                </video>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="projet-desc">
                    <div class="projet-objectif">
                        <?php
                        $objectif = get_field('objectif');
                        if ($objectif) :
                            echo '<h2 class="desc-title">Objectif: </h2>';
                            echo '<p>' . $objectif . '</p>';
                        endif;
                        ?>
                    </div>

                    <div class="projet-lang">
                        <?php
                        $langages = get_field('langages');
                        if ($langages) :
                            echo '<h2 class="desc-title">Langages utilisés : </h2>';
                            echo '<ul>';
                            foreach ($langages as $langage) :
                                // Convertit le nom du langage en une classe CSS
                                $langage_class = 'langage-' . strtolower($langage);
                                echo '<li class="' . $langage_class . '">' . $langage . '</li>';
                            endforeach;
                            echo '</ul>';
                        endif;
                        ?>
                        <div class="projet-theme">
                            <?php
                            $theme = get_field('theme');
                            if ($theme) :
                                echo '<h2 class="desc-title">Thème : </h2>';
                                echo '<p>' . $theme . '</p>';
                            endif;
                            ?>
                        </div>
                        <div class="projet-code">
                           <?php echo '<a href="' . get_field('code_site') . '" class="github-button" target="_blank"><i class="fa-brands fa-github"></i> Code du site</a>'; ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <div class="project-navigation">

                <!-- Lien pour le projet précédent -->
                <?php if (!empty($prev_post)) : ?>
                    <a href="<?php echo get_permalink($prev_post->ID); ?>">&larr; Projet précédent</a>
                <?php else : ?>
                    <a class="disabled">&larr; Projet précédent</a>
                <?php endif; ?>

                <!-- Lien pour le projet suivant -->
                <?php if (!empty($next_post)) : ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>">Projet suivant &rarr;</a>
                <?php else : ?>
                    <a class="disabled">Projet suivant &rarr;</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php get_footer(); ?>