<?php $__env->startSection('content'); ?>
<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-plus font-red-sunglo"></i>
                                                    <span class="caption-subject font-red-sunglo bold uppercase">Add New Research</span>
                                                    <span class="caption-helper"></span>
                                                </div>
                                                <div class="actions">
                                                    <div class="portlet-input input-inline input-small">
                                                        <div class="input-icon right">
                                                            <i class="icon-magnifier"></i>
                                                            <input type="text" class="form-control input-circle" placeholder="search..."> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->



                                                <form action="<?php echo e(route('new_research')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                  <input id="_token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>" ">
                                                    <div class="form-body">
                                                      <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger col-md-12">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">Type</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control">
                                                      <option value="1">บทความวิจัย</option>
                                                      <option value="2">บทความวิชาการ</option>
                                                  </select>
                                                          </div>
                                                      </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Title</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Authors</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="authors" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Keywords</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="keywords" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Abstract</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control"  name="abstract" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Full text file upload</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="full_text_file" id="exampleInputFile">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Publication Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="publication_name" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Published Month</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_month" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Published Year</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_year" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Issue</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="issue" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Pages</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_pages" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="button" class="btn default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>