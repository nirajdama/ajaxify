<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1>Form</h1>

        <form class="ajax-form" method="post" action="<?php echo base_url('welcome/submitform1') ?>">
            <?php echo set_value('input-txtfield') ? set_value('input-txtfield') : "" ?>
            <div class="form-group">
                <label for="input-txtfield">TextField</label>
                <input type="text" class="form-control" name="input-txtfield" id="input-txtfield" placeholder="Text Field" value="">
            </div>
            <div class="custom-error" id="input-txtfield-error">
                <?php print_errors('input-txtfield-error'); ?>
            </div>

            <div class="form-group">
                <label for="input-textarea">Textarea</label>
                <textarea name="input-textarea" placeholder="Textarea" class="form-control" id="input-textarea"><?php echo set_value('input-textarea') ? set_value('input-textarea') : "" ?></textarea>
            </div>
            <div class="custom-error" id="input-textarea-error">
                <?php print_errors('input-textarea-error'); ?>
            </div>

            <div class="form-group">
                <label>Radio button</label>
                <br/>
                <label>
                    <input type="radio" name="input-radio" value="1" <?php echo set_radio('input-radio', 1); ?>>R1
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="input-radio" value="2" <?php echo set_radio('input-radio', 2); ?>>R2
                </label>
            </div>

            <div class="form-group">
                <label>Checkbox</label>
                <br/><input type="checkbox" name="input-checkbox[]" <?php echo set_checkbox('input-checkbox', 1); ?> value="1"> C1
                <br/><input type="checkbox" name="input-checkbox[]" <?php echo set_checkbox('input-checkbox', 2); ?> value="2"> C2
            </div>

            <button class="btn btn-default">Submit</button>
        </form>
    </div>
</div>