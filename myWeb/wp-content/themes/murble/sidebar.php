<aside class="col sidebar-col">
    <?php if(is_dynamic_sidebar('sidebar')){ ?>
    <ul class="widget">
        <?php dynamic_sidebar('sidebar');?>
    </ul>
   <?php } ?>
</aside>