<?php $__env->startSection('main'); ?>

<main id="site-content" role="main" ng-controller="help">
  <div id="help-search-container-banner-id" class="media-photo media-photo-block help-search-container help-search-container-banner">
    <div class="media-cover background-cover help-search-bg" style="background-image:url('images/help.jpeg')" ></div>
    <div class="container">
      <h1>
        <?php echo e(trans('messages.help.welcome')); ?>

      </h1>
      <form class="help-search-form">
        <div id="help-search-container" class="search-container">
          <input class="search-input" type="text" name="q" autocomplete="off" maxlength="1024" value="" placeholder="<?php echo e(trans('messages.help.search_anything')); ?>" id="help_search">
        </div>
      </form>
    </div>
  </div>

  <div class="help-nav">
    <div class="subnav">
      <div class="container"> 
        <ul class="subnav-list">
          <li>
            <a class="subnav-item" href="<?php echo e(url('help')); ?>" data-node-id="0" aria-selected="<?php echo e(((@$is_subcategory != 'no' || Route::current()->uri() != 'help/topic/{id}/{category}') && (@$is_subcategory != 'no' || Route::current()->uri() != 'help/article/{id}/{question}') && Route::current()->uri() != 'help') ? 'false' : 'true'); ?>">
              <?php echo e(trans('messages.help.help_center')); ?>

            </a>
          </li>
          <?php if((@$is_subcategory != 'no' || Route::current()->uri() != 'help/topic/{id}/{category}') && (@$is_subcategory != 'no' || Route::current()->uri() != 'help/article/{id}/{question}') && Route::current()->uri() != 'help'): ?>
          <li>
            <a class="subnav-item" href="#" data-node-id="0" aria-selected="true">
              <?php echo e(@$result[0]->category_name); ?>

            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="row help-wrap">
        <div class="col-sm-3 left-menu">
          <div class="sub_menu_header visible-xs-block">
            <h2>help menu</h2>
            <i class="fa fa-bars"></i>
          </div>
          <div class="navtree">
            <ul class="sidenav-list navtree-list" id="navtree" style="display: block; <?php echo e((Route::current()->uri() == 'help' || $is_subcategory == 'no') ? 'left: 0px;' : 'left: -300px;'); ?>">
              <?php for($i=0; $i < count(@$category); $i++): ?> 
              <li>
                <a href="<?php echo e((count(@$category[$i]->subcategory)) ? 'javascript:void(0);' : url('help/topic/'.@$category[$i]->category_id.'/'.str_slug(@$category[$i]->category_name,'-'))); ?>" class="sidenav-item <?php echo e((count(@$category[$i]->subcategory)) ? 'navtree-next' : ''); ?>" data-id="<?php echo e(@$category[$i]->category_id); ?>" data-name="<?php echo e(@$category[$i]->category->name); ?>" aria-selected="<?php echo e(((Route::current()->uri() == 'help/topic/{id}/{category}' || Route::current()->uri() == 'help/article/{id}/{question}') && (@$category[$i]->category->id == @$result[0]->category_id)) ? 'true' : 'false'); ?>"> <?php echo e(@$category[$i]->category_name); ?>

                  <span class="visible-xs"><i class="icon icon-chevron-right"></i></span>
                </a>
                <?php if(count(@$category[$i]->subcategory)): ?>
                <ul class="sidenav-list navtree-list" id="navtree-<?php echo e(@$category[$i]->category_id); ?>" style="<?php echo e((Route::current()->uri() == 'help/topic/{id}/{category}' || Route::current()->uri() == 'help/article/{id}/{question}') ? ((@$result[0]->category_id == @$category[$i]->category->id) ? 'display:block;' : '') : ''); ?>">
                  <li>
                    <a href="javascript:void(0);" class="sidenav-item navtree-back" data-id="<?php echo e(@$category[$i]->category_id); ?>" data-name="<?php echo e(@$category[$i]->category->name); ?>">
                      <i class="icon icon-arrow-left"></i>
                      <?php echo e(trans('messages.help.back')); ?>

                    </a>
                  </li>
                  <?php for($j=0; $j<count(@$category[$i]->subcategory); $j++): ?>
                  <?php if(@$category[$i]->subcategory_(@$category[$i]->subcategory[$j]->id)->count()): ?>
                  <li>
                    <a href="<?php echo e(url('help/topic/'.@$category[$i]->subcategory[$j]->id.'/'.str_slug(@$category[$i]->subcategory[$j]->name,'-'))); ?>" class="sidenav-item" aria-selected="<?php echo e((@$result[0]->subcategory_id == @$category[$i]->subcategory[$j]->id && Route::current()->uri() != 'help') ? 'true' : 'false'); ?>"><?php echo e(@$category[$i]->subcategory[$j]->name_lang); ?>

                      <span class="visible-xs"><i class="icon icon-chevron-right"></i></span>
                    </a>
                  </li>
                  <?php endif; ?>
                  <?php endfor; ?>
                </ul>
                <?php endif; ?>
              </li>
              <?php endfor; ?>
            </ul>
          </div>
        </div>

        <?php if(Route::current()->uri() == 'help/topic/{id}/{category}'): ?>
        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-offset-1 help-content text-copy navtree-content breadcrumbs-content">
          <h2>
            <?php echo e((@$subcategory_count == 0) ? @$result[0]->category_name : @$result[0]->subcategory_name); ?>

          </h2>

          <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url('help/article/'.$row->id.'/'.str_slug($row->question_lang,'-'))); ?>" class="article-link link-reset article-link-panel">
            <div class="col-middle-alt article-link-left">
              <i class="icon icon-light-gray icon-size-2 icon-description article-link-icon"></i>
            </div><div class="col-middle-alt article-link-right">
            <?php echo e(str_replace('SITE_NAME', $site_name, $row->question_lang)); ?>

          </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php elseif(Route::current()->uri() == 'help/article/{id}/{question}'): ?>

      <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-offset-1 help-content text-copy navtree-content breadcrumbs-content">
        <div class="help-center-sm">
          <div class="space-8">
            <h2><?php echo e(str_replace('SITE_NAME', $site_name, $result[0]->question_lang)); ?></h2>
            <div class="text-copy space-8 img-alignment">
              <?php echo str_replace('SITE_NAME', $site_name, $result[0]->answer_lang); ?>

            </div>
          </div>
        </div>
      </div>

      <?php else: ?>
      <div class="col-md-8 col-offset-1 help-content text-copy navtree-content breadcrumbs-content">
        <div class="popular-topics">
          <div class="row row-space-6">
            <h2><?php echo e(trans('messages.help.suggested_helps')); ?></h2>
            <div class="homepage-articles-list">
              <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e(url('help/article/'.$row->id.'/'.str_slug($row->question,'-'))); ?>" class="article-link homepage-article-link-panel link-reset">
                <div class="article-link-right col-middle-alt">
                  <?php echo e(str_replace('SITE_NAME', $site_name, $row->question_lang)); ?>

                </div>
               </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php if($result->count() == 0): ?>
              <?php echo e(trans('messages.help.no_suggested_helps')); ?>

              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php if(Route::current()->uri() != 'help'): ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.navtree > .sidenav-list.navtree-list').addClass('active');
  });
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampps\htdocs\new\resources\views/home/help.blade.php ENDPATH**/ ?>