<!--Body-->
<div class="settingsBody">
    <div class="settingsCard">
        <div class="settingsImage">
            <img src="<?= base_url("uploads/user_profile/") . $user_details->userinfo_image ?>" alt="user-image">
            <img src="<?= base_url("uploads/user_profile/") . $user_details->userinfo_image ?>" alt="user-image">
        </div>
        <div class="settingsDetails">
            <div class="settingsContent">
                <h2><?= $user_details->userinfo_firstname ?> <?= $user_details->userinfo_lastname ?></h2>
                <p>
                    <span> <b>Email Address:</b> <?= $user_details->user_email ?></span>
                    <br><span> <b><?php echo "Bio: " ?></b><?= $user_details->userinfo_bio ?></span>
                </p>
                <div class="settingButtons">
                    <a class href="<?= base_url() ?>home/editprofile_view">Edit Profile</a>
                    <a class href="<?= base_url() ?>home/changepassword_view">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>