<?php

function register_donation_block() {
    // Register the donation block editor script
    wp_register_script(
        'donation-block-script',
        get_stylesheet_directory_uri() . '/blocks/donation-block/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/block.js' ),
        true // Load in footer
    );

    // Register the donation block editor styles
    wp_register_style(
        'donation-block-editor-style',
        get_stylesheet_directory_uri() . '/blocks/donation-block/editor.css',
        array( 'wp-edit-blocks' ),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/editor.css' )
    );

    // Register the donation block front-end styles
    wp_register_style(
        'donation-block-style',
        get_stylesheet_directory_uri() . '/blocks/donation-block/style.css',
        array(),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/style.css' )
    );

    // Register the donation block type
    register_block_type( 'mytheme/donation-block', array(
        'editor_script' => 'donation-block-script',
        'editor_style'  => 'donation-block-editor-style',
        'style'         => 'donation-block-style',
        'render_callback' => 'render_donation_block'
    ) );
}

add_action( 'init', 'register_donation_block' );

function render_donation_block($attributes) {
    $script_url = isset($attributes['scriptUrl']) ? esc_url($attributes['scriptUrl']) : '';

    if ($script_url) {
        wp_enqueue_script(
            'external-donation-script',
            $script_url,
            array(),
            null,
            true
        );
    }

    ob_start();
    ?>
    <div class="wp-block-mytheme-donation-block">
        <div class="col-lg-6">
            <p class="main-text"><?php echo wp_kses_post($attributes['mainText']); ?></p>
            <ul>
                <li>Advance invitations to events</li>
                <li>Presale tickets and special discounts</li>
                <li>Quarterly Freethought in Action newsletter</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <h3><strong>Membership Benefits</strong></h3>
            <p>Members receive special insider access and perks. It's our way of thanking you for what you mean to CFI.</p>
            <p>Your gift of at least <strong>$60</strong> or <strong>$5/month</strong> includes the following for one year:</p>
            <ul>
                <li>Advance invitations to events</li>
                <li>Presale tickets and special discounts</li>
                <li>Quarterly Freethought in Action newsletter</li>
            </ul>
            <p>Your gift of at least <strong>$120</strong> or <strong>$10/month</strong> includes the following for one year:</p>
            <ul>
                <li>All of the benefits above</li>
                <li>Choice of either <em>Skeptical Inquirer</em> or <em>Free Inquiry</em> Magazine<br /><strong>Print and Digital Subscription</strong></li>
            </ul>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-success">
                        <strong><em>Skeptical Inquirer</em></strong><br />
                        Since 1976, the Magazine committed to science, skepticism, and investigation.
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alert alert-primary">
                        <strong><em>Free Inquiry</em></strong><br />
                        Since 1980, the Magazine for Humanism, Atheism, and all those living without religion.
                    </div>
                </div>
            </div>
            <div class="showhide" data-type="donations" data-more-text="View frequently asked questions about CFI membership and magazines." data-less-text="Read Less" data-hidden="yes" style="text-align: center">
                <h5><strong>What should I do if I'm a current subscriber?</strong></h5>
                <p>Extending our magazines to our donors is intended to be a bonus and thank you for those who support us most. Current subscribers who are also members will continue to receive only one magazine each issue. If you are already subscribed to one of our magazines we encourage you to choose the other to receive thought-provoking material from us each month.</p>
                <h5><strong>My magazine subscription is going to expire soon, should I renew?</strong></h5>
                <p>If you would like to make a donation of $120 or $10/month or more you can let your magazine subscription expire and you'll continue to receive the magazine for one year from the date of your donation or for the duration of your monthly donations.</p>
                <p>You can also choose to continue subscribing to the magazine separately and enjoy the other membership benefits.</p>
                <h5><strong>I would rather not receive a magazine, is that okay?</strong></h5>
                <p>Of course! We appreciate being able to apply the full value of your donation to the work that we do. Choose the amount you'd like to donate on this page and you have the option to decline a magazine subscription on the next.</p>
                <h5><strong>I just want to donate, not become a member formally</strong></h5>
                <p>We never publish the list of our members and all membership benefits (aside from the Freethought in Action newsletter and magazine) are delivered via email and your secure CFI online account. Taking advantage of your membership is completely optional.</p>
                <p>If you have any other concerns about this, please contact us at <a href="mailto:development@centerforinquiry.org">development@centerforinquiry.org</a>.</p>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
