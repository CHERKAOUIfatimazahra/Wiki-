<?php
foreach ($wikis as $wiki): 
    if ($wiki['status'] == 'Published'): ?>
        <div style="width:30em" class="col-sm-4  m-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $wiki['title'] ?></h5>
                    <p class="card-text"><?= $wiki['content'] ?></p>
                    <a href="/single_page" class="btn btn-warning">Go somewhere</a>
                </div>
            </div>
        </div>
    <?php endif;
endforeach;
?>