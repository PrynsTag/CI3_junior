<!--Body-->
<div class="container-fluid" id="cardContainer">
    <div class="headingContainer">
        <h1>My Collection</h1>
    </div>
    <div class="bodyContainer">
        <div class="contentContainer">
            <ul class="nav justify-content-end collectionCard additemnavbar">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . "home/addcollection_view" ?>">Add Post</a>
                </li>
            </ul>
            <div class="row row-cols-1 row-cols-md-3 g-4 collectionCard">
                <?php if (count($posts) != 0 || count($posts) != NULL) : ?>
                    <?php foreach ($posts as $item) : ?>
                        <div class="col col-remove-margin">
                            <div class="card">
                                <div class="boxImageContainer" style="background: url('<?= base_url('uploads/posts/') . $item->post_photo ?>') center no-repeat; background-size: 100% 100%;"></div>
                                <div class="card-body colcard-body d-flex align-items-center">
                                    <div>
                                        <div class="center-card">
                                            <h5 class="card-title"><?= $item->post_title ?></h5>
                                            <p class="card-text"><?= $item->post_description ?></p>
                                        </div>
                                        <div class="button-1">
                                            <a href="<?= base_url('home/deletecollection/'); ?><?= $item->post_id ?>">Delete Item</a>
                                        </div>
                                        <div class="button-2">
                                            <a href="<?= base_url('home/editcollection_view/'); ?><?= $item->post_id ?>">Edit Item</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="noitems">
                        <p id="head">No Posts Yet!</p>
                        <p id="sub">You can start by pressing the 'Add Post' button</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>