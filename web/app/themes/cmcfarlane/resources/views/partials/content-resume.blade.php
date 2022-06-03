@php
    $args = array( 
        'post_type'      => 'jobs',
        'posts_per_page' => 10,
        'meta_key'       => 'position',
        'orderby'        => 'meta_value',
        'order'          => 'ASC'
    );

    $wp_query = new WP_Query( $args );
@endphp

<section class="resume" id="resume">
    <div class="resume__container">
        <h1>Resume</h1>
        @if ( $wp_query->have_posts() )
            @while ( $wp_query->have_posts() )
                @php
                    $wp_query->the_post();
                    $post_id                   = get_the_ID();
                    $job_title                 = get_post_meta( $post_id, 'job_title', true );
                    $company_organization_name = get_post_meta( $post_id, 'company_organization_name', true );
                    $employment_duration       = get_post_meta( $post_id, 'employment_duration', true );
                    $job_responsibilities      = array_column( get_post_meta( $post_id, 'job_responsibilities', true ), 'job_responsibilty' );                    
                @endphp
                <div class="work-experience__list-item @php echo esc_html( strtr( strtolower( get_the_title() ), ' ', '-' ) ) @endphp">
                    <h5>@php echo esc_html( $employment_duration ) @endphp</h5>
                    <h3>@php echo esc_html( $job_title ) @endphp</h3>
                    <h4>@php echo esc_html( $company_organization_name ) @endphp</h4>
                    <ul>
                        @foreach ( $job_responsibilities as $job_responsibility )
                            <li>@php echo esc_html( $job_responsibility ) @endphp</li>
                        @endforeach
                    </ul>
                </div>
            @endwhile
            @php wp_reset_postdata(); @endphp
        @endif
        <a href="#blank" class="resume--button">Download My Resume</a>
    </div>
</section>
