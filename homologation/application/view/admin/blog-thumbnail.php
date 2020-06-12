<div class="row">
    <div class="col-es-12">
        <h1 class="text-center">
            <?php
            echo get_defined_vars()['data']['content']['model']['admin']['title'];
            ?>
        </h1>
    </div>
</div>
<div class="row">
    <table class="table table-grey thumbnail-table">
        <thead>
            <tr>
                <th><?php echo get_defined_vars()['data']['content']['model']['admin']['translationImage']; ?></th>
                <th><?php echo get_defined_vars()['data']['content']['model']['admin']['translationName']; ?></th>
                <th><?php echo get_defined_vars()['data']['content']['model']['admin']['translationAction']; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo get_defined_vars()['data']['content']['model']['admin']['list'];
            ?>
        </tbody>
    </table>
</div>