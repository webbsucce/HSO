<div id="search-bar-container">
    <div class="container">
        <form class="search" method="get" action="/">
            <label for="search-keyword" class="sr-only">Sök på Helsingborg.se</label>
            <div class="input-group input-group-lg">
                <input id="search-keyword" autocomplete="off" class="form-control form-control-lg" type="search"
                       name="s" placeholder="Sök efter konsert eller sida..."
                       value="{{ isset($_GET['s']) && !empty($_GET['s']) ? $_GET['s'] : ''  }}" required/>
                <span class="input-group-addon-btn">
                    <input type="submit" class="btn btn-primary btn-lg" value="Sök">
                </span>sk
            </div>
        </form>
    </div>
</div>