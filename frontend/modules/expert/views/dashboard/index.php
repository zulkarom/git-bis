<?php

/* @var $this yii\web\View */

$this->title = 'Client Dashboard';
?>

<div class="row">

<!--Basic!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-body">
        <p>Basic Box without header</p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.</p>
      </div>
    </div>
  </div>

<!--With title!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-body">
          <h4 class="box-title">Box Title</h4>
        <p><code>h4.box-title</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
      </div>
    </div>
  </div>

<!--Title size!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-body">
        <h4 class="box-title">Box Title <strong>size</strong></h4>
        <p><code>h1.box-title</code>
        <code>h2.box-title</code>
        <code>h3.box-title</code>
        <code>h4.box-title</code>
        <code>h5.box-title</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
      </div>
    </div>
  </div>

<!--Title in header!-->
  <div class="col-md-6 col-12">
    <div class="box">             
      <div class="box-header with-border">
        <h4 class="box-title">Box Title in <strong>header</strong></h4>
      </div>
      <div class="box-body">
        <p><code>.box-header &gt; .box-title</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
      </div>
    </div>
  </div>

<!--Without divider!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header without-border">
        <h4 class="box-title">Box Header without<strong> divider</strong></h4>
      </div>
      <div class="box-body">
        <p><code>.box-header  .without-border</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui..</p>
      </div>
    </div>
  </div>

<!--Bold title!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title box-title-bold">Bold Title</h4>
      </div>
      <div class="box-body">
        <p><code>.box-title-bold</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
      </div>
    </div>
  </div>

<!--Title and description!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Title and <strong>description</strong> <small>More description</small></h4>
      </div>
      <div class="box-body">
        <p><code>.box-title  &lt;small&gt;description&lt;/small&gt;</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
      </div>
    </div>
  </div>

<!--Title and sidetitle!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Title and <strong>sidetitle</strong> <small class="sidetitle">More description</small></h4>
      </div>
      <div class="box-body">
        <p><code>.sidetitle</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
      </div>
    </div>
  </div>

<!--Title and subtitle!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Title and <strong>subtitle</strong> <small class="subtitle">More description below the box title</small></h4>
      </div>
      <div class="box-body">
        <p><code>.subtitle</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
      </div>
    </div>
  </div>

<!--Bordered box!-->
  <div class="col-md-6 col-12">
    <div class="box box-bordered border-primary">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Bordered</strong> box</h4>
      </div>
      <div class="box-body">
        <p><code>.box-bordered</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
      </div>
    </div>
  </div>

<!--Shadowed box!-->
  <div class="col-md-6 col-12">
    <div class="box box-shadowed">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Shadowed</strong> box</h4>
      </div>
      <div class="box-body">
        <p><code>.box-shadowed</code></p>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
      </div>
    </div>
  </div>

<!--Shadow on hover!-->
  <div class="col-md-6 col-12">
    <div class="box box-hover-shadow no-shadow">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Shadow</strong> on hover box</h4>
      </div>
      <div class="box-body">
        <p><code>.box-hover-shadow</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
    </div>
  </div>

<!--Transparent!-->
  <div class="col-md-6 col-12">
    <div class="box box-transparent no-shadow">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Transparent</strong> box</h4>
      </div>
      <div class="box-body">
        <p><code>.box-transparent</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
    </div>
  </div>

<!--Box footer!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Box <strong>footer</strong></h4>
      </div>
      <div class="box-body">
        <p><code>div.box-footer</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
      <div class="box-footer">
        <p>A footer for more content inside</p>
      </div>
    </div>
  </div>

<!--Box footer!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Box <strong>footer</strong></h4>
      </div>
      <div class="box-body">
        <p><code>div.box-footer</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
      <div class="box-footer">
        <button class="btn btn-rounded btn-primary">Submit</button>
        <button class="btn btn-rounded btn-secondary">Cancel</button>
      </div>
    </div>
  </div>

<!--Box footer!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Box <strong>footer</strong></h4>
      </div>
      <div class="box-body">
        <p><code>div.box-footer</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
      <div class="box-footer text-right">
        <button class="btn btn-rounded btn-primary">Submit</button>
        <button class="btn btn-rounded btn-secondary">Cancel</button>
      </div>
    </div>
  </div>

<!--Box footer!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Box <strong>footer</strong></h4>
      </div>
      <div class="box-body">
        <p><code>div.box-footer</code></p>
        <p>Atque corrupti quos dolores et quas molestias excepturi sint occaecati.</p>
      </div>
      <div class="box-footer text-right p-0">
        <button class="btn btn-primary"><i class="ti-check"></i></button>
      </div>
    </div>
  </div>

<!--Box footer!-->
  <div class="col-md-6 col-12">
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Box <strong>footer</strong></h4>
      </div>
      <div class="box-body">
        <p><code>div.box-footer</code></p>
        <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
      </div>
      <div class="box-footer flexbox">                   
          <input type="checkbox" id="basic_checkbox_1">
          <label for="basic_checkbox_1">Save as draft</label>
        <div class="text-right flex-grow">
          <button class="btn btn-rounded btn-sm btn-primary">Submit</button>
          <button class="btn btn-rounded btn-sm btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </div>

</div>



