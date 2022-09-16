<aside class="page-sidebar">
    <div class="widget">
        <h2>Search Our Blog</h2>
        <div class="sidebar-search">
            <form action="/" method="get">
                <input type="text" name="s" id="s" value="<?php echo get_search_query( true ); ?>" data-swplive="true" placeholder="Search for a Topic">
                <input type="hidden" name="post_type" value="post">
                <button type="submit"><i class="icon-search"></i></button>
            </form>
        </div>
    </div>
    <?php dynamic_sidebar( 'sidebar' ); ?>
</aside>
