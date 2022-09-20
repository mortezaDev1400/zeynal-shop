<?php defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) ); ?>
<ul class="uk-list uk-list-divider">
    <li class="wip-menu-item wip-plugin-name">
        <img src="<?php echo WIP_IMG_URL . 'invoice.svg'; ?>" alt="invoice">
        <strong class="wip-plugin-name"><?php echo strtoupper( WIP_NAME ); ?></strong>
        <br>
        <span class="wip-version"><?php echo __( 'version ', 'wip' ) . WIP_VER; ?></span>
    </li>
    <li class="wip-menu-item">
        <a href="#" class="wip-active" data-toggle="general">
            <span class="wip-menu-icon" uk-icon="settings"></span>
            <div class="wip-menu-title"><?php _e( 'General', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Basic invoice settings', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="shop">
            <span class="wip-menu-icon" uk-icon="world"></span>
            <div class="wip-menu-title"><?php _e( 'Shop', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Shop info settings', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="customer">
            <span class="wip-menu-icon" uk-icon="user"></span>
            <div class="wip-menu-title"><?php _e( 'Customer', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Customer info settings', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="invoice">
            <span class="wip-menu-icon" uk-icon="file-text"></span>
            <div class="wip-menu-title"><?php _e( 'Invoice', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Font, template and more...', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="post-label">
            <span class="wip-menu-icon" uk-icon="credit-card"></span>
            <div class="wip-menu-title"><?php _e( 'Post label', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Custom style of post label', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="components">
            <span class="wip-menu-icon" uk-icon="thumbnails"></span>
            <div class="wip-menu-title"><?php _e( 'Components', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Invoice and packing slip parts', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="emails">
            <span class="wip-menu-icon" uk-icon="mail"></span>
            <div class="wip-menu-title"><?php _e( 'Emails', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Send email to customer', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="sms">
            <span class="wip-menu-icon" uk-icon="tablet"></span>
            <div class="wip-menu-title"><?php _e( 'SMS', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Send sms to customer', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="labels">
            <span class="wip-menu-icon" uk-icon="file-edit"></span>
            <div class="wip-menu-title"><?php _e( 'Labels', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'All text used in invoice', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="misc">
            <span class="wip-menu-icon" uk-icon="database"></span>
            <div class="wip-menu-title"><?php _e( 'Misc', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Misc invoice settings', 'wip' ); ?></div>
        </a>
    </li>
    <li class="wip-menu-item">
        <a href="#" data-toggle="info">
            <span class="wip-menu-icon" uk-icon="info"></span>
            <div class="wip-menu-title"><?php _e( 'Information', 'wip' ); ?></div>
            <div class="wip-menu-description"><?php _e( 'Info about plugin', 'wip' ); ?></div>
        </a>
    </li>
</ul>