<div class="col-sm-<?php the_sub_field('accordion_width');?>"><!--set width-->
<?php if( have_rows('accordion_repeater') ): ?>
				<div class="sl-accordion" role="tablist">
					<?php $i=1; while ( have_rows('accordion_repeater') ) : the_row(); ?>
						<div class="sl-card">
						    <div class="sl-card-header" role="tab" id="heading-<?php echo $i; ?>">
						      <h5 class="mb-0">
						        <a data-toggle="collapse" href="#collapse-<?php echo $i; ?>" aria-expanded="" aria-controls="collapseOne">
						         <?php the_sub_field('header'); ?>
						        </a>
						      </h5>
						    </div>
						    <div id="collapse-<?php echo $i; ?>" class="collapse <?php the_field('expand'); ?>" role="tabpanel" data-parent="#accordion" aria-labelledby="heading-<?php echo $i; ?>">
						      <div class="sl-card-body">
						       	<?php the_sub_field('content'); ?>
						      </div>
						    </div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
			<?php endif; ?>
</div>

