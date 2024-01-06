/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, InspectorControls } = wp.blockEditor;
const { CheckboxControl, PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/donation", {
  title: __("Donation58x", "jsforwphowto"),
  description: __(
    "Add a donation block with form and benefits copy",
    "jsforwphowto"
  ),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Donate", "jsforwphowto", "Donation")],
  attributes: {
    checkboxControl: {
      type: "boolean",
      default: true,
    },
  },
  edit: (props) => {
    const {
      attributes: { checkboxControl },
      className,
      setAttributes,
    } = props;
    const blockProps = useBlockProps();
    return (
      <>
        <InspectorControls>
          <PanelBody>
            <CheckboxControl
              label={__("Show Mag Offer", "jsforwpblocks")}
              help={__(
                "Choose whether or not to display the magazine offer or just the regular membership benefits.",
                "jsforwpblocks"
              )}
              checked={checkboxControl}
              onChange={(checkboxControl) => setAttributes({ checkboxControl })}
            />
          </PanelBody>
        </InspectorControls>
        <div className={className}>
          <div className='col-lg-6' {...blockProps}>
            <InnerBlocks placeholder='Use the HTML Block and Copy/Paste the Salsa Embed Code here.' />
          </div>
          <div className='col-lg-6'>
            <h3>
              <strong>Membership Benefits</strong>
            </h3>
            <p>
              Members receive special insider access and perks. It's our way of
              thanking you for what you mean to CFI.
            </p>
            <p>
              Your gift of at least <strong>$60</strong> or{" "}
              <strong>$5/month</strong> includes the following for one year:
            </p>
            <ul>
              <li>Advance invitations to events</li>
              <li>Presale tickets and special discounts</li>
              <li>Quarterly Freethought in Action newsletter</li>
            </ul>
            {checkboxControl && (
              <div className='magazine-benefit'>
                <p>
                  Your gift of at least <strong>$120</strong> or{" "}
                  <strong>$10/month</strong> includes the following for one
                  year:
                </p>
                <ul>
                  <li>All of the benefits above</li>
                  <li>
                    Choice of either <em>Skeptical Inquirer</em> or{" "}
                    <em>Free Inquiry</em> Magazine
                    <br />
                    <strong>Print and Digital Subscription</strong>
                  </li>
                </ul>
                <div className='row'>
                  <div className='col-lg-6'>
                    <div className='alert alert-success'>
                      <strong>
                        <em>Skeptical Inquirer</em>
                      </strong>
                      <br />
                      Since 1976, the Magazine committed to science, skepticism,
                      and investigation.
                    </div>
                  </div>
                  <div className='col-lg-6'>
                    <div className='alert alert-primary'>
                      <strong>
                        <em>Free Inquiry</em>
                      </strong>
                      <br />
                      Since 1980, the Magazine for Humanism, Atheism, and all
                      those living without religion.
                    </div>
                  </div>
                </div>
                <p>
                  <a>
                    <em>
                      View frequently asked questions about CFI membership and
                      magazines.
                    </em>
                  </a>
                </p>
              </div>
            )}
          </div>
        </div>
        <script src='https://centerforinquiry.org/js/everyactionmembership.js?v=1.0.0'></script>
      </>
    );
  },
  save: (props) => {
    const {
      attributes: { checkboxControl, className },
    } = props;
    const blockProps = useBlockProps.save();
    return (
      <>
        <div class={className}>
          <div class='col-lg-6' {...blockProps}>
            <InnerBlocks.Content />
          </div>
          <div class='col-lg-6'>
            <h3>
              <strong>Membership Benefits</strong>
            </h3>
            <p>
              Members receive special insider access and perks. It's our way of
              thanking you for what you mean to CFI.
            </p>
            <p>
              Your gift of at least <strong>$60</strong> or{" "}
              <strong>$5/month</strong> includes the following for one year:
            </p>
            <ul>
              <li>Advance invitations to events</li>
              <li>Presale tickets and special discounts</li>
              <li>Quarterly Freethought in Action newsletter</li>
            </ul>
            {checkboxControl && (
              <div class='magazine-benefit'>
                <p>
                  Your gift of at least <strong>$120</strong> or{" "}
                  <strong>$10/month</strong> includes the following for one
                  year:
                </p>
                <ul>
                  <li>All of the benefits above</li>
                  <li>
                    Choice of either <em>Skeptical Inquirer</em> or{" "}
                    <em>Free Inquiry</em> Magazine
                    <br />
                    <strong>Print and Digital Subscription</strong>
                  </li>
                </ul>
                <div class='row'>
                  <div class='col-lg-6'>
                    <div class='alert alert-success'>
                      <strong>
                        <em>Skeptical Inquirer</em>
                      </strong>
                      <br />
                      Since 1976, the Magazine committed to science, skepticism,
                      and investigation.
                    </div>
                  </div>
                  <div class='col-lg-6'>
                    <div class='alert alert-primary'>
                      <strong>
                        <em>Free Inquiry</em>
                      </strong>
                      <br />
                      Since 1980, the Magazine for Humanism, Atheism, and all
                      those living without religion.
                    </div>
                  </div>
                </div>
                <p>
                  <a data-toggle='modal' data-target='#faqModal'>
                    <em>
                      View frequently asked questions about CFI membership and
                      magazines.
                    </em>
                  </a>
                </p>
              </div>
            )}
          </div>
        </div>
        <script src='https://centerforinquiry.org/js/everyactionmembership.js?v=1.0.0'></script>
      </>
    );
  },
});
