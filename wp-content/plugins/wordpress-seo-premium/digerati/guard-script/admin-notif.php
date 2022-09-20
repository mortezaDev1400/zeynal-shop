<?php
defined('ABSPATH') || exit ("no access");
if( empty($this->e8f529d5d359fb5c4fcff7c) ): ?>
    <div class="notice notice-error">
        <?php if (version_compare(PHP_VERSION, '7.0.0') >= 0):?>
            <p>
                <?php printf(esc_html__( 'To activating your %s please insert you license key', 'zhaket-guard' ), $this->b96b76ede3835287764df); ?>
                <a href="<?php echo admin_url( 'admin.php?page='.$this->a2f67e38edf891b4c5dd5b14bb453a ); ?>" class="button button-primary"><?php _e('Register Activate Code', 'zhaket-guard'); ?></a>
            </p>
        <?php else:?>
            <p>
                <?php printf(esc_html__( 'Your PHP version is lower than 7. for active yoast it must be updated.', 'zhaket-guard' ), $this->b96b76ede3835287764df); ?>
            </p>
    <?php endif; ?>
    </div>
<?php elseif( $this->e9403950f8e83dcbc8be230553e055ed===true ): ?>
    <div class="notice notice-error">
        <p>
            <?php printf(esc_html__( 'There is something wrong with your %s license. please check it.', 'zhaket-guard' ), $this->b96b76ede3835287764df); ?>
            <a href="<?php echo admin_url( 'admin.php?page='.$this->a2f67e38edf891b4c5dd5b14bb453a ); ?>" class="button button-primary"><?php _e('Check Now', 'zhaket-guard'); ?></a>
        </p>
    </div>
<?php endif; ?>