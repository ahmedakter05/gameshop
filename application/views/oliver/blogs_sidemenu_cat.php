<div class="side-widget">
    <h5><span>Services</span></h5>
    <ul class="category vertical menu" data-accordion-menu> 
        <?php foreach($blog_menu_item as $print):?>                
            <li><a href="<?php echo base_url() . 'blogs/detail/' . $print['url']; ?>"><?php echo $print['full_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>