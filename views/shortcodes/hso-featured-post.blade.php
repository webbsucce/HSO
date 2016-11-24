<div id="blog">
    <h1 class="blog-title">Chefens blogg</h1>
    <div class="blog-content">
        <?php
            // get latest blog post
            $latest_posts = wp_get_recent_posts();
            $lastest_post = null;

            if(!empty($latest_posts)){
                $lastest_post = $latest_posts[0];
            }
        ?>

        @if($lastest_post)
            <h1 class="blog-content-title"><a href="{{ get_permalink($lastest_post['ID']) }}">{{ $lastest_post["post_title"] }}</a></h1>
            <span class="blog-content-date">Publicerat: <span>{{ date('Y-m-d',strtotime($lastest_post["post_date"])) }}</span></span>
            <p class="blog-content-detail">
                <?php
                    // get trimmed content
                    $post_content = $lastest_post['post_content'];
                    $post_content = apply_filters('the_content', $post_content);
                    $post_content = str_replace(']]>', ']]&gt;', $post_content);
                    $post_content = wp_trim_excerpt($post_content);
                    echo wp_trim_words($post_content,25,' [...]');
                ?>
            </p>
        @endif

        <div class="blog-content-author">
            <div class="blog-content-author-image" style="background-image:url('{{ get_stylesheet_directory_uri() ."/assets/dist/images"  }}/blog-author.png')"></div>
            <h1 class="blog-content-author-title">{{ get_field('name', 'option') }}</h1>
            <h2 class="blog-content-author-subtitle">{{ get_field('title', 'option') }}</h2>
            <div class="clearfix"></div>
        </div>
    </div>
</div>