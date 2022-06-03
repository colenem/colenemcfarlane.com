<?php

    $args = array( 
        'post_type'      => 'projects',
        'posts_per_page' => 10,
        'meta_key'       => 'position',
        'orderby'        => 'meta_value',
        'order'          => 'ASC'
    );

    $wp_query = new WP_Query( $args );
?>

<section class="projects" id="projects">
    <div class="projects__container">
        <h1>Projects</h1>
        @if ( $wp_query->have_posts() )
            @while ( $wp_query->have_posts() )
                @php
                    $wp_query->the_post();
                    $post_id               = get_the_ID();
                    $project_name          = get_the_title();
                    $project_url           = get_post_meta( $post_id, 'project_url', true );
                    $project_thumbnail_url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );

                    printf(
                        '<div class="project__list-item %1$s">
                            <a href="%2$s" target="_blank">
                                <img src="%3$s">
                            </a>
                            <a href="%2$s" target="_blank">
                                <h5>%4$s</h3>
                            </a>
                        </div>',
                        esc_html( strtr( strtolower( $project_name ), ' ', '-' ) ),
                        esc_url( $project_url ),
                        esc_url( $project_thumbnail_url ),
                        esc_html( $project_name )
                    )
                @endphp
            @endwhile
            @php wp_reset_postdata(); @endphp
        @endif
    </div>
</section>
