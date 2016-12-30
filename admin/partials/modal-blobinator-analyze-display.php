<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.blobinator.com
 * @since      1.0.0
 *
 * @package    Blobinator
 * @subpackage Blobinator/admin/partials
 */

?>

<div id="dialog-blobinator-error" class="hidden">Error</div>

<div id="modal-blobinator-results" class="wrap hidden">

    <form id="analyze-text-form" name="analyze-text-form" action="" method="post" class="form">

        <input type="hidden" name="action" value="blobinator_analyze" />

        <?php wp_nonce_field( 'ba_op_verify' ); ?>

        <input type="hidden" id="blobinator_text_to_analyze" name="blobinator_text_to_analyze" />

    </form>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <div id="post-body-content">

                <div class="postbox">

                    <h2><span><?php esc_attr_e( 'Emotions Detected', 'wp_admin_style' ); ?></span></h2>

                    <div class="inside">
                        <div id="emotion_chart">
                            <svg id="emotion_chart_svg"></svg>
                        </div>
                    </div>

                </div>

            </div>

            <div id="postbox-container-1" class="postbox-container">

                <div class="postbox">

                    <h2><span><?php esc_attr_e( 'Tone Analysis', 'wp_admin_style' ); ?></span></h2>

                    <div class="inside">
                        <div id="overall_tone"></div>

                        <div id="sentiment_chart">
                            <svg></svg>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <br class="clear">

    <h4><span><?php esc_attr_e( 'Keywords Extracted', 'wp_admin_style' ); ?></span></h4>

    <div id="blobinator_add_keywords_as_tags_div">
        <button class="hidden" onClick="blobinator_add_keywords_to_post_tags(); return false;" class="button" type="submit" id="blobinator-add-keywords-as-tags" name="blobinator-add-keywords-as-tags">Add Keywords to Post Tags</button>
    </div>

    <div class="inside">
        <div id="keywords_chart">
            <svg></svg>
        </div>
    </div>

    <h4><span><?php esc_attr_e( 'Concepts Extracted', 'wp_admin_style' ); ?></span></h4>

    <div id="blobinator_add_concepts_as_tags_div">
        <button style="margin-bottom: 5px" class="hidden" onClick="blobinator_add_concepts_to_post_tags(); return false;" class="button" type="submit" id="blobinator-add-concepts-as-tags" name="blobinator-add-concepts-as-tags">Add Concepts to Post Tags</button>
    </div>

    <div id="concepts"></div>

    <div id="spinner" class="spinner is-inactive" style="float:none; width:100%; height: auto; padding:10px 0 10px 50px; background-position: center center;"></div>

</div>
