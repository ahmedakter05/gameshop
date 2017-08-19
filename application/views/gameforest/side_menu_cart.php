<?php if(!empty($gameshop_menu_cart)){?>
<div class="widget">
	<div class="panel panel-default">
		<div class="panel-heading">Cart</div>
		<div class="panel-body no-padding">
			<ul class="panel-list-bordered">
				<?php $c = '1';?>
				<?php foreach ($gameshop_menu_cart as $value1): ?>
					<li><a href="<?php echo base_url() . 'games/view/' . $value1['url']; ?>"><?php echo $c . '.&nbsp;' . substr($value1['name'], 0, 25); ?>
					<div class="pull-right"><?php echo $value1['quantity'] . 'x'; ?></div></a></li>
				<?php $c++; if($c >= '6'){break;} // add +1 for desire value?> 
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="panel-body no-padding">
			<ul class="panel-list-bordered">
				<li align="right"><a href="<?php echo base_url(); ?>games/cart"><i class="fa fa-shopping-cart"></i> View Cart</a></li>
			</ul>
		</div>
	</div>
</div>
<?php } ?>