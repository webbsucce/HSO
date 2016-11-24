<div id="social">
    <h1 class="social-title">Sagt i sociala medier</h1>
    <div class="social-container">
        <h1 class="social-container-title">
            <span>Facebook</span>
            <img src="{{ get_stylesheet_directory_uri() ."/assets/dist/images"  }}/social-fb.png">
            <div class="clear"></div>
        </h1>
        <?php
            // retrive facebook page post
            $token = "EAAX1n57FwsEBANjMHQgjZC356IZAO23sMRkihZCvSQO2vLJnU0ddlW1nrLIjJFobdsDDG1QDbyIG714ZA3NYKADawJjfmAmhuxeuUT6mmAyyk8dZCZBJPqZCTcpNlCytdT81losxzCLbuf5AW0SF1dv213OgFOqwtYZD";
            $json_string = file_get_contents("https://graph.facebook.com/v2.8/119986928062804/posts?access_token=$token&format=json&method=get");
            $json_array = json_decode($json_string,true);

            $single_post = null;
            if(isset($json_array['data']) && !empty($json_array['data'])){
                $single_post = $json_array['data'][0];
            }
        ?>
        @if($single_post)
        <p class="description">
            {{  wp_trim_words(wp_strip_all_tags($single_post['message']),55," [...]")   }}
        </p>
        @endif
        <a class="link" href="https://www.facebook.com/konserthuset">Gå till facebook</a>
    </div>
</div>