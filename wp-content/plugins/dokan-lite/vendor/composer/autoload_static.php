<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb714294970ad2c2b58d4cffcbe1da5cb
{
    public static $files = array (
        'b45b351e6b6f7487d819961fef2fda77' => __DIR__ . '/..' . '/jakeasmith/http_build_url/src/http_build_url.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WeDevs\\Dokan\\' => 13,
        ),
        'A' => 
        array (
            'Appsero\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WeDevs\\Dokan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Appsero\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsero/client/src',
        ),
    );

    public static $classMap = array (
        'Appsero\\Client' => __DIR__ . '/..' . '/appsero/client/src/Client.php',
        'Appsero\\Insights' => __DIR__ . '/..' . '/appsero/client/src/Insights.php',
        'Appsero\\License' => __DIR__ . '/..' . '/appsero/client/src/License.php',
        'Appsero\\Updater' => __DIR__ . '/..' . '/appsero/client/src/Updater.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WeDevs\\Dokan\\Abstracts\\DokanBackgroundProcesses' => __DIR__ . '/../..' . '/includes/Abstracts/DokanBackgroundProcesses.php',
        'WeDevs\\Dokan\\Abstracts\\DokanCache' => __DIR__ . '/../..' . '/includes/Abstracts/DokanCache.php',
        'WeDevs\\Dokan\\Abstracts\\DokanModel' => __DIR__ . '/../..' . '/includes/Abstracts/DokanModel.php',
        'WeDevs\\Dokan\\Abstracts\\DokanPromotion' => __DIR__ . '/../..' . '/includes/Abstracts/DokanPromotion.php',
        'WeDevs\\Dokan\\Abstracts\\DokanRESTAdminController' => __DIR__ . '/../..' . '/includes/Abstracts/DokanRESTAdminController.php',
        'WeDevs\\Dokan\\Abstracts\\DokanRESTController' => __DIR__ . '/../..' . '/includes/Abstracts/DokanRESTController.php',
        'WeDevs\\Dokan\\Abstracts\\DokanShortcode' => __DIR__ . '/../..' . '/includes/Abstracts/DokanShortcode.php',
        'WeDevs\\Dokan\\Abstracts\\DokanUpgrader' => __DIR__ . '/../..' . '/includes/Abstracts/DokanUpgrader.php',
        'WeDevs\\Dokan\\Admin\\AdminBar' => __DIR__ . '/../..' . '/includes/Admin/AdminBar.php',
        'WeDevs\\Dokan\\Admin\\Hooks' => __DIR__ . '/../..' . '/includes/Admin/Hooks.php',
        'WeDevs\\Dokan\\Admin\\Menu' => __DIR__ . '/../..' . '/includes/Admin/Menu.php',
        'WeDevs\\Dokan\\Admin\\Notices\\Helper' => __DIR__ . '/../..' . '/includes/Admin/Notices/Helper.php',
        'WeDevs\\Dokan\\Admin\\Notices\\LimitedTimePromotion' => __DIR__ . '/../..' . '/includes/Admin/Notices/LimitedTimePromotion.php',
        'WeDevs\\Dokan\\Admin\\Notices\\Manager' => __DIR__ . '/../..' . '/includes/Admin/Notices/Manager.php',
        'WeDevs\\Dokan\\Admin\\Notices\\PluginReview' => __DIR__ . '/../..' . '/includes/Admin/Notices/PluginReview.php',
        'WeDevs\\Dokan\\Admin\\Notices\\SetupWizard' => __DIR__ . '/../..' . '/includes/Admin/Notices/SetupWizard.php',
        'WeDevs\\Dokan\\Admin\\Notices\\WhatsNew' => __DIR__ . '/../..' . '/includes/Admin/Notices/WhatsNew.php',
        'WeDevs\\Dokan\\Admin\\Pointers' => __DIR__ . '/../..' . '/includes/Admin/Pointers.php',
        'WeDevs\\Dokan\\Admin\\Promotion' => __DIR__ . '/../..' . '/includes/Admin/Promotion.php',
        'WeDevs\\Dokan\\Admin\\Settings' => __DIR__ . '/../..' . '/includes/Admin/Settings.php',
        'WeDevs\\Dokan\\Admin\\SetupWizard' => __DIR__ . '/../..' . '/includes/Admin/SetupWizard.php',
        'WeDevs\\Dokan\\Admin\\SetupWizardNoWC' => __DIR__ . '/../..' . '/includes/Admin/SetupWizardNoWC.php',
        'WeDevs\\Dokan\\Admin\\SetupWizardWCAdmin' => __DIR__ . '/../..' . '/includes/Admin/SetupWizardWCAdmin.php',
        'WeDevs\\Dokan\\Admin\\UserProfile' => __DIR__ . '/../..' . '/includes/Admin/UserProfile.php',
        'WeDevs\\Dokan\\Ajax' => __DIR__ . '/../..' . '/includes/Ajax.php',
        'WeDevs\\Dokan\\Assets' => __DIR__ . '/../..' . '/includes/Assets.php',
        'WeDevs\\Dokan\\Cache' => __DIR__ . '/../..' . '/includes/Cache.php',
        'WeDevs\\Dokan\\CacheInvalidate' => __DIR__ . '/../..' . '/includes/CacheInvalidate.php',
        'WeDevs\\Dokan\\Commission' => __DIR__ . '/../..' . '/includes/Commission.php',
        'WeDevs\\Dokan\\Core' => __DIR__ . '/../..' . '/includes/Core.php',
        'WeDevs\\Dokan\\Customizer' => __DIR__ . '/../..' . '/includes/Customizer.php',
        'WeDevs\\Dokan\\Customizer\\HeadingControl' => __DIR__ . '/../..' . '/includes/Customizer/HeadingControl.php',
        'WeDevs\\Dokan\\Customizer\\RadioImageControl' => __DIR__ . '/../..' . '/includes/Customizer/RadioImageControl.php',
        'WeDevs\\Dokan\\Dashboard\\Manager' => __DIR__ . '/../..' . '/includes/Dashboard/Manager.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Dashboard' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Dashboard.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Main' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Main.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Manager' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Manager.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Orders' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Orders.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Products' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Products.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Settings' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Settings.php',
        'WeDevs\\Dokan\\Dashboard\\Templates\\Withdraw' => __DIR__ . '/../..' . '/includes/Dashboard/Templates/Withdraw.php',
        'WeDevs\\Dokan\\Emails\\ContactSeller' => __DIR__ . '/../..' . '/includes/Emails/ContactSeller.php',
        'WeDevs\\Dokan\\Emails\\Manager' => __DIR__ . '/../..' . '/includes/Emails/Manager.php',
        'WeDevs\\Dokan\\Emails\\NewProduct' => __DIR__ . '/../..' . '/includes/Emails/NewProduct.php',
        'WeDevs\\Dokan\\Emails\\NewProductPending' => __DIR__ . '/../..' . '/includes/Emails/NewProductPending.php',
        'WeDevs\\Dokan\\Emails\\NewSeller' => __DIR__ . '/../..' . '/includes/Emails/NewSeller.php',
        'WeDevs\\Dokan\\Emails\\ProductPublished' => __DIR__ . '/../..' . '/includes/Emails/ProductPublished.php',
        'WeDevs\\Dokan\\Emails\\VendorCompletedOrder' => __DIR__ . '/../..' . '/includes/Emails/VendorCompletedOrder.php',
        'WeDevs\\Dokan\\Emails\\VendorNewOrder' => __DIR__ . '/../..' . '/includes/Emails/VendorNewOrder.php',
        'WeDevs\\Dokan\\Emails\\VendorWithdrawRequest' => __DIR__ . '/../..' . '/includes/Emails/VendorWithdrawRequest.php',
        'WeDevs\\Dokan\\Emails\\WithdrawApproved' => __DIR__ . '/../..' . '/includes/Emails/WithdrawApproved.php',
        'WeDevs\\Dokan\\Emails\\WithdrawCancelled' => __DIR__ . '/../..' . '/includes/Emails/WithdrawCancelled.php',
        'WeDevs\\Dokan\\Exceptions\\DokanException' => __DIR__ . '/../..' . '/includes/Exceptions/DokanException.php',
        'WeDevs\\Dokan\\Install\\Installer' => __DIR__ . '/../..' . '/includes/Install/Installer.php',
        'WeDevs\\Dokan\\Order\\Hooks' => __DIR__ . '/../..' . '/includes/Order/Hooks.php',
        'WeDevs\\Dokan\\Order\\Manager' => __DIR__ . '/../..' . '/includes/Order/Manager.php',
        'WeDevs\\Dokan\\Order\\OrderCache' => __DIR__ . '/../..' . '/includes/Order/OrderCache.php',
        'WeDevs\\Dokan\\PageViews' => __DIR__ . '/../..' . '/includes/PageViews.php',
        'WeDevs\\Dokan\\Privacy' => __DIR__ . '/../..' . '/includes/Privacy.php',
        'WeDevs\\Dokan\\ProductSections\\AbstractProductSection' => __DIR__ . '/../..' . '/includes/ProductSections/AbstractProductSection.php',
        'WeDevs\\Dokan\\ProductSections\\BestSelling' => __DIR__ . '/../..' . '/includes/ProductSections/BestSelling.php',
        'WeDevs\\Dokan\\ProductSections\\Featured' => __DIR__ . '/../..' . '/includes/ProductSections/Featured.php',
        'WeDevs\\Dokan\\ProductSections\\Latest' => __DIR__ . '/../..' . '/includes/ProductSections/Latest.php',
        'WeDevs\\Dokan\\ProductSections\\Manager' => __DIR__ . '/../..' . '/includes/ProductSections/Manager.php',
        'WeDevs\\Dokan\\ProductSections\\TopRated' => __DIR__ . '/../..' . '/includes/ProductSections/TopRated.php',
        'WeDevs\\Dokan\\Product\\Hooks' => __DIR__ . '/../..' . '/includes/Product/Hooks.php',
        'WeDevs\\Dokan\\Product\\Manager' => __DIR__ . '/../..' . '/includes/Product/Manager.php',
        'WeDevs\\Dokan\\Product\\ProductCache' => __DIR__ . '/../..' . '/includes/Product/ProductCache.php',
        'WeDevs\\Dokan\\Product\\VendorStoreInfo' => __DIR__ . '/../..' . '/includes/Product/VendorStoreInfo.php',
        'WeDevs\\Dokan\\REST\\AdminDashboardController' => __DIR__ . '/../..' . '/includes/REST/AdminDashboardController.php',
        'WeDevs\\Dokan\\REST\\AdminMiscController' => __DIR__ . '/../..' . '/includes/REST/AdminMiscController.php',
        'WeDevs\\Dokan\\REST\\AdminNoticeController' => __DIR__ . '/../..' . '/includes/REST/AdminNoticeController.php',
        'WeDevs\\Dokan\\REST\\AdminReportController' => __DIR__ . '/../..' . '/includes/REST/AdminReportController.php',
        'WeDevs\\Dokan\\REST\\ChangeLogController' => __DIR__ . '/../..' . '/includes/REST/ChangeLogController.php',
        'WeDevs\\Dokan\\REST\\Manager' => __DIR__ . '/../..' . '/includes/REST/Manager.php',
        'WeDevs\\Dokan\\REST\\OrderController' => __DIR__ . '/../..' . '/includes/REST/OrderController.php',
        'WeDevs\\Dokan\\REST\\ProductAttributeController' => __DIR__ . '/../..' . '/includes/REST/ProductAttributeController.php',
        'WeDevs\\Dokan\\REST\\ProductAttributeTermsController' => __DIR__ . '/../..' . '/includes/REST/ProductAttributeTermsController.php',
        'WeDevs\\Dokan\\REST\\ProductController' => __DIR__ . '/../..' . '/includes/REST/ProductController.php',
        'WeDevs\\Dokan\\REST\\StoreController' => __DIR__ . '/../..' . '/includes/REST/StoreController.php',
        'WeDevs\\Dokan\\REST\\StoreSettingController' => __DIR__ . '/../..' . '/includes/REST/StoreSettingController.php',
        'WeDevs\\Dokan\\REST\\WithdrawController' => __DIR__ . '/../..' . '/includes/REST/WithdrawController.php',
        'WeDevs\\Dokan\\Registration' => __DIR__ . '/../..' . '/includes/Registration.php',
        'WeDevs\\Dokan\\Rewrites' => __DIR__ . '/../..' . '/includes/Rewrites.php',
        'WeDevs\\Dokan\\Shortcodes\\BestSellingProduct' => __DIR__ . '/../..' . '/includes/Shortcodes/BestSellingProduct.php',
        'WeDevs\\Dokan\\Shortcodes\\Dashboard' => __DIR__ . '/../..' . '/includes/Shortcodes/Dashboard.php',
        'WeDevs\\Dokan\\Shortcodes\\MyOrders' => __DIR__ . '/../..' . '/includes/Shortcodes/MyOrders.php',
        'WeDevs\\Dokan\\Shortcodes\\Shortcodes' => __DIR__ . '/../..' . '/includes/Shortcodes/Shortcodes.php',
        'WeDevs\\Dokan\\Shortcodes\\Stores' => __DIR__ . '/../..' . '/includes/Shortcodes/Stores.php',
        'WeDevs\\Dokan\\Shortcodes\\TopRatedProduct' => __DIR__ . '/../..' . '/includes/Shortcodes/TopRatedProduct.php',
        'WeDevs\\Dokan\\Shortcodes\\VendorRegistration' => __DIR__ . '/../..' . '/includes/Shortcodes/VendorRegistration.php',
        'WeDevs\\Dokan\\ThemeSupport\\Astra' => __DIR__ . '/../..' . '/includes/ThemeSupport/Astra.php',
        'WeDevs\\Dokan\\ThemeSupport\\Divi' => __DIR__ . '/../..' . '/includes/ThemeSupport/Divi.php',
        'WeDevs\\Dokan\\ThemeSupport\\Electro' => __DIR__ . '/../..' . '/includes/ThemeSupport/Electro.php',
        'WeDevs\\Dokan\\ThemeSupport\\Enfold' => __DIR__ . '/../..' . '/includes/ThemeSupport/Enfold.php',
        'WeDevs\\Dokan\\ThemeSupport\\Flatsome' => __DIR__ . '/../..' . '/includes/ThemeSupport/Flatsome.php',
        'WeDevs\\Dokan\\ThemeSupport\\Manager' => __DIR__ . '/../..' . '/includes/ThemeSupport/Manager.php',
        'WeDevs\\Dokan\\ThemeSupport\\Rehub' => __DIR__ . '/../..' . '/includes/ThemeSupport/Rehub.php',
        'WeDevs\\Dokan\\ThemeSupport\\Storefront' => __DIR__ . '/../..' . '/includes/ThemeSupport/Storefront.php',
        'WeDevs\\Dokan\\ThemeSupport\\TwentyTwenty' => __DIR__ . '/../..' . '/includes/ThemeSupport/TwentyTwenty.php',
        'WeDevs\\Dokan\\Tracker' => __DIR__ . '/../..' . '/includes/Tracker.php',
        'WeDevs\\Dokan\\Traits\\AjaxResponseError' => __DIR__ . '/../..' . '/includes/Traits/AjaxResponseError.php',
        'WeDevs\\Dokan\\Traits\\ChainableContainer' => __DIR__ . '/../..' . '/includes/Traits/ChainableContainer.php',
        'WeDevs\\Dokan\\Traits\\ObjectCache' => __DIR__ . '/../..' . '/includes/Traits/ObjectCache.php',
        'WeDevs\\Dokan\\Traits\\RESTResponseError' => __DIR__ . '/../..' . '/includes/Traits/RESTResponseError.php',
        'WeDevs\\Dokan\\Traits\\Singleton' => __DIR__ . '/../..' . '/includes/Traits/Singleton.php',
        'WeDevs\\Dokan\\Traits\\TransientCache' => __DIR__ . '/../..' . '/includes/Traits/TransientCache.php',
        'WeDevs\\Dokan\\Upgrade\\AdminNotice' => __DIR__ . '/../..' . '/includes/Upgrade/AdminNotice.php',
        'WeDevs\\Dokan\\Upgrade\\Hooks' => __DIR__ . '/../..' . '/includes/Upgrade/Hooks.php',
        'WeDevs\\Dokan\\Upgrade\\Manager' => __DIR__ . '/../..' . '/includes/Upgrade/Manager.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_2_8_3_VendorBalance' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_2_8_3_VendorBalance.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_2_9_16_StoreSettings' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_2_9_16_StoreSettings.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_2_9_23_StoreName' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_2_9_23_StoreName.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_2_9_4_OrderPostAuthor' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_2_9_4_OrderPostAuthor.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_3_0_10_ProductAttributesAuthorId' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_3_0_10_ProductAttributesAuthorId.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_3_1_1_RefundTableUpdate' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_3_1_1_RefundTableUpdate.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\BackgroundProcesses\\V_3_3_8_VendorStoreTimes' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/BackgroundProcesses/V_3_3_8_VendorStoreTimes.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_1_2' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_1_2.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_1' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_1.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_3' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_3.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_4_11' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_4_11.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_4_12' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_4_12.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_5_7' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_5_7.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_6_9' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_6_9.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_7_3' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_7_3.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_7_6' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_7_6.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_8_0' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_8_0.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_8_3' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_8_3.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_8_6' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_8_6.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_9_13' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_9_13.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_9_16' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_9_16.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_9_19' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_9_19.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_9_23' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_9_23.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_2_9_4' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_2_9_4.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_0_10' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_0_10.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_0_4' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_0_4.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_1_0' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_1_0.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_1_1' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_1_1.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_2_12' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_2_12.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_3_1' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_3_1.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_3_7' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_3_7.php',
        'WeDevs\\Dokan\\Upgrade\\Upgrades\\V_3_3_8' => __DIR__ . '/../..' . '/includes/Upgrade/Upgrades/V_3_3_8.php',
        'WeDevs\\Dokan\\Vendor\\Hooks' => __DIR__ . '/../..' . '/includes/Vendor/Hooks.php',
        'WeDevs\\Dokan\\Vendor\\Manager' => __DIR__ . '/../..' . '/includes/Vendor/Manager.php',
        'WeDevs\\Dokan\\Vendor\\SetupWizard' => __DIR__ . '/../..' . '/includes/Vendor/SetupWizard.php',
        'WeDevs\\Dokan\\Vendor\\StoreListsFilter' => __DIR__ . '/../..' . '/includes/Vendor/StoreListsFilter.php',
        'WeDevs\\Dokan\\Vendor\\UserSwitch' => __DIR__ . '/../..' . '/includes/Vendor/UserSwitch.php',
        'WeDevs\\Dokan\\Vendor\\Vendor' => __DIR__ . '/../..' . '/includes/Vendor/Vendor.php',
        'WeDevs\\Dokan\\Vendor\\VendorCache' => __DIR__ . '/../..' . '/includes/Vendor/VendorCache.php',
        'WeDevs\\Dokan\\Walkers\\Category' => __DIR__ . '/../..' . '/includes/Walkers/Category.php',
        'WeDevs\\Dokan\\Walkers\\CategoryDropdownSingle' => __DIR__ . '/../..' . '/includes/Walkers/CategoryDropdownSingle.php',
        'WeDevs\\Dokan\\Walkers\\StoreCategory' => __DIR__ . '/../..' . '/includes/Walkers/StoreCategory.php',
        'WeDevs\\Dokan\\Walkers\\TaxonomyDropdown' => __DIR__ . '/../..' . '/includes/Walkers/TaxonomyDropdown.php',
        'WeDevs\\Dokan\\Widgets\\BestSellingProducts' => __DIR__ . '/../..' . '/includes/Widgets/BestSellingProducts.php',
        'WeDevs\\Dokan\\Widgets\\Manager' => __DIR__ . '/../..' . '/includes/Widgets/Manager.php',
        'WeDevs\\Dokan\\Widgets\\ProductCategoryMenu' => __DIR__ . '/../..' . '/includes/Widgets/ProductCategoryMenu.php',
        'WeDevs\\Dokan\\Widgets\\StoreCategoryMenu' => __DIR__ . '/../..' . '/includes/Widgets/StoreCategoryMenu.php',
        'WeDevs\\Dokan\\Widgets\\StoreContactForm' => __DIR__ . '/../..' . '/includes/Widgets/StoreContactForm.php',
        'WeDevs\\Dokan\\Widgets\\StoreLocation' => __DIR__ . '/../..' . '/includes/Widgets/StoreLocation.php',
        'WeDevs\\Dokan\\Widgets\\StoreOpenClose' => __DIR__ . '/../..' . '/includes/Widgets/StoreOpenClose.php',
        'WeDevs\\Dokan\\Widgets\\TopratedProducts' => __DIR__ . '/../..' . '/includes/Widgets/TopratedProducts.php',
        'WeDevs\\Dokan\\Withdraw\\Export\\CSV' => __DIR__ . '/../..' . '/includes/Withdraw/Export/CSV.php',
        'WeDevs\\Dokan\\Withdraw\\Export\\Manager' => __DIR__ . '/../..' . '/includes/Withdraw/Export/Manager.php',
        'WeDevs\\Dokan\\Withdraw\\Hooks' => __DIR__ . '/../..' . '/includes/Withdraw/Hooks.php',
        'WeDevs\\Dokan\\Withdraw\\Manager' => __DIR__ . '/../..' . '/includes/Withdraw/Manager.php',
        'WeDevs\\Dokan\\Withdraw\\Withdraw' => __DIR__ . '/../..' . '/includes/Withdraw/Withdraw.php',
        'WeDevs\\Dokan\\Withdraw\\WithdrawCache' => __DIR__ . '/../..' . '/includes/Withdraw/WithdrawCache.php',
        'WeDevs\\Dokan\\Withdraw\\Withdraws' => __DIR__ . '/../..' . '/includes/Withdraw/Withdraws.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb714294970ad2c2b58d4cffcbe1da5cb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb714294970ad2c2b58d4cffcbe1da5cb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb714294970ad2c2b58d4cffcbe1da5cb::$classMap;

        }, null, ClassLoader::class);
    }
}
