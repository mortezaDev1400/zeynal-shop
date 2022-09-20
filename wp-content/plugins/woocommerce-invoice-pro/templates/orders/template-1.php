<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$labels = new WIP_Labels_Manager();
$wc_countries = get_option('woocommerce_specific_allowed_countries');
$statuses = wc_get_order_statuses();
$state = $_GET['state'] ?? null;
$status = $_GET['status'] ?? null;
$start = $_GET['start-date'] ?? null;
$end = $_GET['end-date'] ?? null;
$orders = new WIP_Orders_Table($state, $status, $start, $end);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo $labels->get_label('orders') ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    <meta name="fontiran.com:license" content="62ATP3">
    <link rel="stylesheet" href="<?php echo WIP_CSS_URL; ?>persian-datepicker.css">
    <link rel="stylesheet" href="<?php echo WIP_CSS_URL; ?>orders-1.css">
    <?php echo $this->get_styles(); ?>
</head>
<body class="<?php echo $this->body_class(); ?>">
<?php if (!$orders->is_download_pdf()): ?>
    <nav class="filter-nav">
        <form method="get">
            <input type="hidden" name="action" value="<?php echo $this->action; ?>">
            <input type="hidden" name="type" value="<?php echo $this->type; ?>">
            <select name="state">
                <option value=""><?php _e('Filter by state', 'wip'); ?></option>
                <option value="all" <?php selected($state, 'all'); ?>><?php _e('All', 'wip'); ?></option>
                <?php if ($wc_countries): ?>
                    <?php foreach ($wc_countries as $country): ?>
                        <?php $states = WIP_Helper::get_states($country); ?>
                        <?php if ($states): ?>
                            <optgroup label="<?php echo WIP_Helper::get_country($country); ?>">
                                <?php foreach ($states as $code => $name): ?>
                                    <option value="<?php echo $code; ?>" <?php selected($state, $code); ?>><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <select name="status">
                <option value=""><?php _e('Filter by status', 'wip'); ?></option>
                <option value="all" <?php selected($status, 'all'); ?>><?php _e('All', 'wip'); ?></option>
                <?php foreach ($statuses as $code => $name): ?>
                    <option value="<?php echo str_replace('wc-', '', $code); ?>" <?php selected($status, str_replace('wc-', '', $code)); ?>><?php echo $name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" class="datepicker-field" name="start-date" value="<?php echo esc_attr($start); ?>" placeholder="<?php _e('Start date', 'wip'); ?>" autocomplete="off">
            <input type="text" class="datepicker-field" name="end-date" value="<?php echo esc_attr($end); ?>" placeholder="<?php _e('End date', 'wip'); ?>" autocomplete="off">
            <input type="submit" value="<?php echo __('Filter', 'wip'); ?>">
        </form>
    </nav>
<?php endif; ?>
<div class="container">
    <?php if ($state && $status): ?>
        <?php echo $orders->get_header($wc_countries); ?>
        <?php echo $orders->render_html(); ?>
    <?php else: ?>
        <div class="no-orders"><?php _e('Use the filter to display the order list.', 'wip'); ?></div>
    <?php endif; ?>
    <?php if (!$orders->is_download_pdf()): ?>
        <div class="print">
            <a href="#" class="button" onclick="print()"><?php _e('Print this page', 'wip'); ?></a>
            <?php if ($this->options->get_option('download-pdf')): ?>
                <a href="<?php echo add_query_arg(['download' => 'pdf']); ?>" class="button"><?php _e('Download PDF', 'wip'); ?></a>
            <?php endif; ?>
            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" style="display: inline-block;">
                <?php wp_nonce_field('orders_exporter', 'orders_exporter_nonce'); ?>
                <input type="hidden" name="action" value="orders_exporter">
                <input type="hidden" name="state" value="<?php echo esc_attr($state); ?>">
                <input type="hidden" name="status" value="<?php echo esc_attr($status); ?>">
                <input type="hidden" name="start_date" value="<?php echo esc_attr($start); ?>">
                <input type="hidden" name="end_date" value="<?php echo esc_attr($end); ?>">
                <button class="button"><?php _e('Download CSV', 'wip'); ?></button>
            </form>
            <a href="#" onclick="location.href = document.referrer; return false;" class="button"><?php _e('Return', 'wip'); ?></a>
        </div>
    <?php endif; ?>
</div>
<?php if (get_bloginfo('language') == 'fa-IR'): ?>
    <script src="<?php echo includes_url(); ?>js/jquery/jquery.js?ver=1.12.4-wp"></script>
    <script src="<?php echo WIP_JS_URL; ?>persian-datepicker.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            if ($('.datepicker-field').length) {
                $('.datepicker-field').persianDatepicker({formatDate: "YYYY-MM-DD"});
            }
        });
    </script>
<?php if ($this->options->get_option('persian-number')): ?>
    <script src="<?php echo WIP_JS_URL; ?>persianumber.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('body').persiaNumber();
        });
    </script>
<?php endif; ?>
<?php endif; ?>
</body>
</html>