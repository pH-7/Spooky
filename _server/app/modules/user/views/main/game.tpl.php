<?php defined('H2O') or exit('Access denied') ?>

<h3><?php echo $this->sName ?></h3>

<script src="<?php echo H2O_ROOT_URL ?>static/js/flash.js"></script>
<script>pH7DisplayFlash("<?php echo $this->sFullFile ?>", 730, 550);</script>

<p><?php echo $this->sDescription ?></p>

<?php if (H2O\Admin::auth()): ?>
    <div>
        <a class="m_button" href="?m=user&amp;c=admin&amp;a=update&amp;id=<?php echo $this->iId ?>"><?php echo trans('Edit') ?></a> | <form class="form_link" action="?m=user&amp;c=admin&amp;a=remove" method="post" onsubmit="return confirm('<?php echo trans('Are you sure to delete this user?') ?>')"><input type="hidden" name="id" value="<?php echo $this->iId ?>" /><span class="m_button"><input type="submit" value="<?php echo trans('Delete') ?>" /></span></form>
    </div>
<?php endif ?>

<p><a class="m_button" href="?m=user&a=download&id=<?php echo $this->iId ?>"><?php echo trans('Download the User Image') ?></a></p>
<p class="italic"></p>
<?php echo $this->sVotes ?>
<?php H2O\ShareUrlForm::display() ?>
<?php H2O\ShareEmbedForm::display($this->sFullFile) ?>
