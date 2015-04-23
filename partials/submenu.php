<ul class="linklist">
	<li class="linklist-header"></li>
	<?php $pages = get_child_pages_of_level(1); ?>
	<?php foreach($pages as $item): ?>
		<?php $active = (get_segment(2) === $item->post_name) ? 'active' : ''; ?>
		<li class="linklist-item <?php echo $active; ?>">
			<a class="linklist-link" href="<?php echo get_permalink($item->ID); ?>">
				<?php echo $item->post_title; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>