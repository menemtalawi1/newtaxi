<?php $__env->startSection('main'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Meta
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url(LOGIN_USER_TYPE.'/dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo e(url(LOGIN_USER_TYPE.'/metas')); ?>">Meta</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Meta Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::open(['url' => 'admin/edit_meta/'.$result->id, 'class' => 'form-horizontal']); ?>

              <div class="box-body">
              <span class="text-danger">(*)Fields are Mandatory</span>
                <div class="form-group">
                  <label for="input_url" class="col-sm-3 control-label">Page URL</label>
                  <div class="col-md-7 col-sm-offset-1">
                    <?php echo Form::text('url', $result->url, ['class' => 'form-control', 'id' => 'input_url', 'placeholder' => 'Page URL', 'readonly' => 'true']); ?>

                    <span class="text-danger"><?php echo e($errors->first('url')); ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_title" class="col-sm-3 control-label">Page Title<em class="text-danger">*</em></label>
                  <div class="col-md-7 col-sm-offset-1">
                    <?php echo Form::text('title', $result->title, ['class' => 'form-control', 'id' => 'input_title', 'placeholder' => 'Page Title']); ?>

                    <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_description" class="col-sm-3 control-label">Meta Description</label>
                  <div class="col-md-7 col-sm-offset-1">
                    <?php echo Form::textarea('description', $result->description, ['class' => 'form-control', 'id' => 'input_description', 'placeholder' => 'Meta Description', 'rows' => 3]); ?>

                    <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_keywords" class="col-sm-3 control-label">Keywords</label>
                  <div class="col-md-7 col-sm-offset-1">
                    <?php echo Form::textarea('keywords', $result->keywords, ['class' => 'form-control', 'id' => 'input_keywords', 'placeholder' => 'Meta Keywords', 'rows' => 3]); ?>

                    <span class="text-danger"><?php echo e($errors->first('keywords')); ?></span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
                 <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
              </div>
              <!-- /.box-footer -->
            <?php echo Form::close(); ?>

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampps\htdocs\newtaxi\resources\views/admin/metas/edit.blade.php ENDPATH**/ ?>