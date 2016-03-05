@extends('layouts.app')

@section('content')
<div class="row">

              <div class="col-xs-offset-3 col-xs-6 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Horizontal Form</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Block Help</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block"> A block of help text. </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Help</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control input-inline input-medium" placeholder="Enter text">
                                                    <span class="help-inline"> Inline help. </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Input Group</label>
                                                <div class="col-md-9">
                                                    <div class="input-inline input-medium">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                            <input type="email" class="form-control" placeholder="Email Address"> </div>
                                                    </div>
                                                    <span class="help-inline"> Inline help. </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email Address</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" class="form-control" placeholder="Email Address"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" placeholder="Password">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Left Icon</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon">
                                                        <i class="fa fa-bell-o"></i>
                                                        <input type="text" class="form-control" placeholder="Left icon"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Right Icon</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-microphone"></i>
                                                        <input type="text" class="form-control" placeholder="Right icon"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Icon Input in Group Input</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="input-icon">
                                                            <i class="fa fa-lock fa-fw"></i>
                                                            <input id="newpassword" class="form-control" type="text" name="password" placeholder="password"> </div>
                                                        <span class="input-group-btn">
                                                            <button id="genpassword" class="btn btn-success" type="button">
                                                                <i class="fa fa-arrow-left fa-fw"></i> Random</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Input With Spinner</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control spinner" placeholder="Password"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Static Control</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> email@example.com </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Disabled</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder="Disabled" disabled=""> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Readonly</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder="Readonly" readonly=""> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Dropdown</label>
                                                <div class="col-md-9">
                                                    <select class="form-control">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Multiple Select</label>
                                                <div class="col-md-9">
                                                    <select multiple="" class="form-control">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Textarea</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="col-md-3 control-label">File input</label>
                                                <div class="col-md-9">
                                                    <input type="file" id="exampleInputFile">
                                                    <p class="help-block"> some help text here. </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox-list">
                                                        <label>
                                                            <div class="checker"><span><input type="checkbox"></span></div> Checkbox 1 </label>
                                                        <label>
                                                            <div class="checker"><span><input type="checkbox"></span></div> Checkbox 1 </label>
                                                        <label>
                                                            <div class="checker disabled"><span><input type="checkbox" disabled=""></span></div> Disabled </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox-list">
                                                        <label class="checkbox-inline">
                                                            <div class="checker" id="uniform-inlineCheckbox21"><span><input type="checkbox" id="inlineCheckbox21" value="option1"></span></div> Checkbox 1 </label>
                                                        <label class="checkbox-inline">
                                                            <div class="checker" id="uniform-inlineCheckbox22"><span><input type="checkbox" id="inlineCheckbox22" value="option2"></span></div> Checkbox 2 </label>
                                                        <label class="checkbox-inline">
                                                            <div class="checker disabled" id="uniform-inlineCheckbox23"><span><input type="checkbox" id="inlineCheckbox23" value="option3" disabled=""></span></div> Disabled </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Radio</label>
                                                <div class="col-md-9">
                                                    <div class="radio-list">
                                                        <label>
                                                            <div class="radio" id="uniform-optionsRadios22"><span><input type="radio" name="optionsRadios" id="optionsRadios22" value="option1" checked=""></span></div> Option 1 </label>
                                                        <label>
                                                            <div class="radio" id="uniform-optionsRadios23"><span><input type="radio" name="optionsRadios" id="optionsRadios23" value="option2" checked=""></span></div> Option 2 </label>
                                                        <label>
                                                            <div class="radio disabled" id="uniform-optionsRadios24"><span><input type="radio" name="optionsRadios" id="optionsRadios24" value="option2" disabled=""></span></div> Disabled </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Radio</label>
                                                <div class="col-md-9">
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <div class="radio" id="uniform-optionsRadios25"><span><input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" checked=""></span></div> Option 1 </label>
                                                        <label class="radio-inline">
                                                            <div class="radio" id="uniform-optionsRadios26"><span class="checked"><input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" checked=""></span></div> Option 2 </label>
                                                        <label class="radio-inline">
                                                            <div class="radio disabled" id="uniform-optionsRadios27"><span><input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" disabled=""></span></div> Disabled </label>
                                                    </div>
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
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet box purple ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Horizontal Form Height Sizing </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Large Input</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control input-lg" placeholder="Large Input"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Default Input</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Default Input"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Small Input</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control input-sm" placeholder="Default Input"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Large Select</label>
                                                <div class="col-md-9">
                                                    <select class="form-control input-lg">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Default Select</label>
                                                <div class="col-md-9">
                                                    <select class="form-control">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Small Select</label>
                                                <div class="col-md-9">
                                                    <select class="form-control input-sm">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions right1">
                                            <button type="button" class="btn default">Cancel</button>
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet box purple ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Fluid Input Groups </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <h4 class="block">Checkboxe Addons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <div class="checker"><span><input type="checkbox"></span></div> </span>
                                                    <input type="text" class="form-control"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">
                                                        <div class="checker"><span><input type="checkbox"></span></div> </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Button Addons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn red" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn blue" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Button Addons On Both Sides</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn red" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn blue" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                    </form>
                                    <h4 class="block">Buttons With Dropdowns</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                    <input type="text" class="form-control"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Buttons With Dropdowns On Both Sides</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Segmented Buttons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn default" tabindex="-1">Action</button>
                                                        <button type="button" class="btn default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input type="text" class="form-control"> </div>
                                                <!-- /.input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green" tabindex="-1">Action</button>
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- /.input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet box purple ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Fixed Input Groups </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <h4 class="block">Checkboxe Addons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <span class="input-group-addon">
                                                        <div class="checker"><span><input type="checkbox"></span></div> </span>
                                                    <input type="text" class="form-control" placeholder=".input-medium"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <input type="text" class="form-control" placeholder=".input-medium">
                                                    <span class="input-group-addon">
                                                        <div class="checker"><span><input type="checkbox"></span></div> </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Button Addons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <span class="input-group-btn">
                                                        <button class="btn red" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder=".input-medium"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <input type="text" class="form-control" placeholder=".input-medium">
                                                    <span class="input-group-btn">
                                                        <button class="btn blue" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Button Addons On Both Sides</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-large">
                                                    <span class="input-group-btn">
                                                        <button class="btn red" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder=".input-large">
                                                    <span class="input-group-btn">
                                                        <button class="btn blue" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                    </form>
                                    <h4 class="block">Buttons With Dropdowns</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                    <input type="text" class="form-control" placeholder=".input-medium"> </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group input-medium">
                                                    <input type="text" class="form-control" placeholder=".input-medium">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Buttons With Dropdowns On Both Sides</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-xlarge">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                    <input type="text" class="form-control" placeholder=".input-xlarge">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <h4 class="block">Segmented Buttons</h4>
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-large">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn default" tabindex="-1">Action</button>
                                                        <button type="button" class="btn default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder=".input-large"> </div>
                                                <!-- /.input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                    </form>
                                    <form role="form" class="margin-top-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-large">
                                                    <input type="text" class="form-control" placeholder=".input-large">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn green" tabindex="-1">Action</button>
                                                        <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Another action </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Something else here </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;"> Separated link </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- /.input-group -->
                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Validation States </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group has-success">
                                                <label class="control-label">Input with success</label>
                                                <input type="text" class="form-control" id="inputSuccess"> </div>
                                            <div class="form-group has-warning">
                                                <label class="control-label">Input with warning</label>
                                                <input type="text" class="form-control" id="inputWarning"> </div>
                                            <div class="form-group has-error">
                                                <label class="control-label">Input with error</label>
                                                <input type="text" class="form-control" id="inputError"> </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn default">Cancel</button>
                                            <button type="submit" class="btn red">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="portlet box yellow ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Validation States With Icons </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">Default input</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-info-circle tooltips" data-original-title="Email address" data-container="body"></i>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label">Input with success</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-check tooltips" data-original-title="You look OK!" data-container="body"></i>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="control-label">Input with warning</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips" data-original-title="please provide an email" data-container="body"></i>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <div class="form-group has-error">
                                                <label class="control-label">Input with error</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-exclamation tooltips" data-original-title="please write a valid email" data-container="body"></i>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn default">Cancel</button>
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="portlet box purple">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Horizontal Form Validation States </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="" class="reload" data-original-title="" title=""> </a>
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Default input</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-info-circle tooltips" data-original-title="Email address" data-container="body"></i>
                                                        <input type="text" class="form-control"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="col-md-4 control-label">Input with success</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-check tooltips" data-original-title="You look OK!" data-container="body"></i>
                                                        <input type="text" class="form-control"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="col-md-4 control-label">Input with warning</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips" data-original-title="please provide an email" data-container="body"></i>
                                                        <input type="text" class="form-control"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-error">
                                                <label class="col-md-4 control-label">Input with error</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-exclamation tooltips" data-original-title="please write a valid email" data-container="body"></i>
                                                        <input type="text" class="form-control"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-4 col-md-8">
                                                    <button type="button" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn blue">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
