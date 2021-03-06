<!--Body-->
<div class="container-fluid" id="cardContainer">
    <div class="headingContainer">
        <h1>Featured</h1>
    </div>
    <div class="bodyContainer">
        <div class="contentContainer">
            <div class="row row-cols-1 row-cols-md-3 g-4 collectionCard">
                <?php if (count($posts) != 0 || count($posts) != NULL) : ?>
                    <?php foreach ($posts as $item) : ?>
                        <div class="col col-remove-margin">
                            <div class="card">
                                <div class="boxImageContainer" style="background: url('<?= base_url("uploads/posts/") . $item->post_photo ?>') center no-repeat; background-size: 100% 100%;">
                                </div>
                                <div class="card-body colcard-body d-flex align-items-center">
                                    <div>
                                        <div class="center-card">
                                            <h5 class="card-title"><?= $item->post_title ?></h5>
                                            <p class="card-text"><?= $item->post_description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="noitems">
                        <p id="head">No Posts Yet!</p>
                        <p id="sub">You can Add Post at <a href="<?= base_url('home/collection'); ?>">MY COLLECTION</a></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>