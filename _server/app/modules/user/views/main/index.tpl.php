<?php defined('H2O') or exit('Access denied') ?>

<?php if (!empty($this->sErrMsg)): ?>
    <?php echo $this->sErrMsg ?>
<?php else: ?>

    <div class="box-left">

        <div role="search" class="design-box">
            <h3><?php echo trans('Search') ?></h3>
            <?php H2O\SearchForm::display(true) ?>
        </div>

        <div class="design-box">
            <h3><?php echo trans('Categories') ?></h3>
            <ul>
                <?php foreach($this->oCategories as $oCategory): ?>
                    <li><a href="?m=user&amp;a=category&amp;name=<?php echo H2O\Url::encode($oCategory->name) ?>" title="<?php echo $oCategory->name ?>"><?php echo $oCategory->name ?></a> - (<?php echo $oCategory->totalCatUsers ?>)</li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="design-box">
            <h3><?php echo trans('Top Popular') ?></h3>
            <ul>
                <?php foreach($this->oTopViews as $oViews): ?>
                    <li><a href="?m=user&amp;a=user&amp;id=<?php echo $oViews->userId ?>" title="<?php echo $oViews->name ?>"><?php echo $oViews->title ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="design-box">
            <h3><?php echo trans('Top Rated') ?></h3>
            <ul>
                <?php foreach($this->oTopRating as $oRating): ?>
                    <li><a href="?m=user&amp;a=user&amp;id=<?php echo $oRating->userId ?>" title="<?php echo $oRating->name ?>"><?php echo $oRating->title ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="design-box">
            <h3><?php echo trans('Newest') ?></h3>
            <ul>
                <?php foreach($this->oLatest as $oNew): ?>
                    <li><a href="?m=user&amp;a=user&amp;id=<?php echo $oNew->userId ?>" title="<?php echo $oNew->name ?>"><?php echo $oNew->title ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>

    </div>

    <div class="center box-right">
        <?php foreach($this->oUsers as $oUser): ?>
            <?php if (is_file(H2O_PUBLIC_DATA_PATH . 'user/img/thumb/' . $oUser->thumb) && is_file(H2O_PUBLIC_DATA_PATH . 'user/file/' . $oUser->file)): ?>
                <h3><a href="?m=user&amp;a=user&amp;id=<?php echo $oUser->userId ?>"><?php echo $oUser->title ?></a></h3>
                <div class="content">
                    <p><a href="?m=user&amp;a=user&amp;id=<?php echo $oUser->userId ?>" rel="nofollow"><img alt="<?php echo $oUser->title ?>" title="<?php echo $oUser->title ?>" src="<?php echo H2O_PUBLIC_DATA_URL ?>user/img/thumb/<?php echo $oUser->thumb ?>" width="95" height="66" class="thumb_img" /></a></p>
                    <p><strong><?php echo $oUser->title ?></strong></p>
                    <p><?php echo $oUser->description ?></p>

                    <?php if (H2O\Admin::auth()): ?>
                        <div>
                            <a class="m_button" href="?m=user&amp;c=admin&amp;a=update&amp;id=<?php echo $oUser->userId ?>"><?php echo trans('Edit') ?></a> | <form class="form_link" action="?m=user&amp;c=admin&amp;a=remove" method="post" onsubmit="return confirm('<?php echo trans('Are you sure to delete this user?') ?>')"><input type="hidden" name="id" value="<?php echo $oUser->userId ?>" /><span class="m_button"><input type="submit" value="<?php echo trans('Delete') ?>" /></span></form>
                        </div>
                    <?php endif ?>
                    <hr />
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

<?php endif ?>

 <?php include H2O_ROOT_PATH . 'themes/' . $this->sTplName . '/tpl/inc/pagination.inc.tpl.php' ?>
